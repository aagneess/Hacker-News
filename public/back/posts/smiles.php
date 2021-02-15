<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['post_id'])) {
    $postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['loggedIn']['id'];

    // Check if smiles exist.
    $statement = $pdo->prepare("SELECT * FROM smiles WHERE post_id = :post_id AND smiling_user = :smiling_user");
    $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
    $statement->bindParam(":smiling_user", $userId, PDO::PARAM_INT);
    $statement->execute();
    $smile = $statement->fetch(PDO::FETCH_ASSOC);

    // If not, then add smile.
    if (!$smile) {
        $statement = $pdo->prepare("INSERT INTO smiles (post_id, smiling_user) VALUES (:post_id, :smiling_user);");
        $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
        $statement->bindParam(":smiling_user", $userId, PDO::PARAM_INT);
        $statement->execute();
    } else { // If it already exists, then remove it instead.
        $statement = $pdo->prepare("DELETE FROM smiles WHERE post_id = :post_id AND smiling_user = :smiling_user;");
        $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
        $statement->bindParam(":smiling_user", $userId, PDO::PARAM_INT);
        $statement->execute();
    }

    // Return the amount.
    $smiles = fetchSmileAmount((string)$postId, $pdo);
}

header("Content-Type: application/json");
echo json_encode($smiles);

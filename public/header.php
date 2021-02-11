<!-- Gets the backend up and running. -->
<?php require __DIR__ . '/./back/autoload.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- General CSS insertion. -->
    <link rel="stylesheet" href="/public/assets/styles/app.css">
    <!-- @font-face insertion. -->
    <link rel="stylesheet" href="/public/assets/styles/fonts.css">
    <!-- Modern-Normalize CSS insertion. -->
    <link rel="stylesheet" href="/public/assets/styles/modern-normalize.css">
    <!-- Favicon -->
    <link rel="icon" type="images/png" href="/public/resources/media/icons/favicon.svg">
</head>

<body>
    <?php require __DIR__ . '/navigation.php'; ?>

    <div class="container py-5">

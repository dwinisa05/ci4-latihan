<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?= base_url("/bootstrap/css/bootstrap.min.css") ?>">
</head>

<body>
    <?= $this->include('layouts/navbars') ?>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
    <script src="<?= base_url("/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
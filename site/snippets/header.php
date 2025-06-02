<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="#">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $site->title() ?></title>
  <?= css('/assets/css/style.css') ?>
</head>

<body>
  <header>
    <a class="unstyled-link" href="<?= $site->url() ?>">
      <img src="/assets/img/logo.jpg" style="width: 180px" alt="">
    </a>
    <!-- <?= $site->title() ?> -->

  </header>

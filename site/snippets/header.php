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
  <?php if (isset($nologo)) : ?>
    <!-- no header on this page -->
  <?php else: ?>
    <header>
      <a class="unstyled-link" href="<?= $site->url() ?>">
        <img src="/assets/img/logo.jpg" style="width: 180px" alt="">
      </a>
    <h1 style="position:absolute;top:-10rem;"> <?= $site->title() ?> </h1>
    </header>
  <?php endif ?>

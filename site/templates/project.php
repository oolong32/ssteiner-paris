<?php snippet('header') ?>

<main>
  <article class="project">
  <section class="project-description">
    <small><?= $startDate . '–' . $endDate ?></small>
    <h1><?= $page->title()->html() ?></h1>
    <?= $page->text()->kirbytext() ?>
  </section>

  <?php if ($files) : ?>
    <!-- display downloads -->
    <section class="downloads">
      <h2>Downloads</h2>
      <ul class="downloads-list">
      <?php foreach ($files as $file) : ?>
        <li>
          <a href="<?= $file->url() ?>"><?= $file->name() ?></a>
        </li>
      <?php endforeach ?>
      </ul>
    </section>
  <?php endif ?>

  <?php if ($images) : ?>
    <!-- display images -->
    <section class="images">
    <?php foreach ($images as $image) : ?>
      <figure class="image-container">
        <img src="<?= $image->url() ?>" alt="<?= $altText ?>">
      </figure>
    <?php endforeach ?>
    </section>
  <?php endif ?>

  </article>
</main>

<?php snippet('footer') ?>

<?php snippet('header') ?>

<strong>hier kein Logo!</strong>

<main>
  <article class="project">
  <section class="project-description">
    <h1><?= $page->title()->html() ?></h1>
    <p class="project-artists"><strong><?= $page->artists()->html() ?></strong></p>
    <p class="additional-info"><?= $page->additionalinfo() ?></p>
    <p class="date"><?= $startDate . '–' . $endDate ?></p>

  </section>

  <?php if ($files) : ?>
    <!-- display downloads -->
    <section class="downloads">
      <ul class="downloads-list unstyled-list">
      <?php foreach ($files as $file) : ?>
        <li>
          <a href="<?= $file->url() ?>"><?= $file->name() ?></a>
        </li>
      <?php endforeach ?>
      </ul>
    </section>
  <?php endif ?>

  <?php if ($images) : ?>

    <p class="photo-credits"><?= $page->photocredits() ?></p>

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

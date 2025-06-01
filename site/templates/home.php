<?php snippet('header') ?>

  <main>
    <!-- <h2><?= $page->title()->html() ?></h2> -->

    <?php if ($projects) : ?>
      <!-- list project previews -->
      <?php foreach ($projects as $project): ?>
        <section class="project-preview">
          <small><?= $project->startdate()->toDate('d.m.Y') ?>–<?= $project->enddate()->toDate('d.m.Y') ?></small>
          <h1 class="project-title">
            <a class="unstyled-link" href="<?= $project->url() ?>"><?= $project->title()->html() ?></a>
          </h1>

          <p class="project-artist"><?= $project->artists() ?></p>
          <p class="project-preview-text"></p>

          <?php if ($image = $project->images()->first()): ?>
          <!-- display fisrt project image -->
          <figure class="project-preview-image">
            <img src="<?= $image->url() ?>" alt="<?= $project->title() ?>">
          </figure>
          <?php endif ?>

        </section>

      <?php endforeach ?>
    <?php endif ?>

  </main>

<?php snippet('footer') ?>

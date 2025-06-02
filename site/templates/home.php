<?php snippet('header') ?>

  <main>
      <section class="home-text">
        <?= $page->text()->kirbytext() ?>
      </section>


    <?php if ($projects) : ?>
      <!-- list project previews -->
      <?php foreach ($projects as $project): ?>
        <section class="project-preview">
          <a class="unstyled-link" href="<?= $project->url() ?>">
            <h1 class="project-title"><?= $project->title()->html() ?></h1>
            <p class="artists"><strong><?= $project->artists() ?></strong></p>
            <p style="margin: 0;"><?= $project->additionalinfo()  ?></p>
            <p style="margin: 0;"><?= $project->startdate()->toDate('d.m.Y') ?>–<?= $project->enddate()->toDate('d.m.Y') ?></p>

            <p class="project-artist"></p>
            <p class="project-preview-text"></p>

            <?php if ($image = $project->images()->first()): ?>
            <!-- display fisrt project image -->
            <figure class="project-preview-image">
              <img src="<?= $image->url() ?>" alt="<?= $project->title() ?>">
            </figure>
            <?php endif ?>
          </a>
        </section>

      <?php endforeach ?>
    <?php endif ?>

  </main>

<?php snippet('footer') ?>

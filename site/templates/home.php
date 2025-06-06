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
            <p style="margin: 0;"><?= $project->date() ?></p>

            <p class="project-artist"></p>
            <p class="project-preview-text"></p>

            <?php if ($image = $project->files()->filterBy('template', 'previewimg')->first() ) : ?>

            <!-- display preview image -->
            <figure class="project-preview-image">
              <?php $portrait = $image->dimensions()->portrait() ?? false; ?>
              <img
                class="<?= $portrait ? 'portrait' : 'landscape' ?>"
                src="<?= $image->url() ?>"
                alt="<?= $image->alt() ?? $project->title() ?>">
            <figcaption><?= $image->caption() ?? '' ?></figcaption>
            </figure>
            <?php endif ?>
          </a>
        </section>

      <?php endforeach ?>
    <?php endif ?>

  </main>

<?php snippet('footer') ?>

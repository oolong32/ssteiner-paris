<?php snippet('header', ['nologo' => true,]) ?>

<main>
  <article class="project">
  <section class="project-description">
    <h1><?= $page->title()->html() ?></h1>
    <p class="project-artists"><strong><?= $page->artists()->html() ?></strong></p>
    <p class="additional-info"><?= $page->additionalinfo() ?></p>
    <p class="date"><?= $page->date() ?></p>

  </section>

  <?php if ($documents) : ?>
    <!-- display downloads -->
    <section class="downloads">
      <ul class="downloads-list unstyled-list">
      <?php foreach ($documents as $document) : ?>
        <li>
          <?php $text = ('' != $document->linktext()) ? $document->linktext() : $document->name() ?>
          <a href="<?= $document->url() ?>"><?= $text ?></a>
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

        <?php $imageAlt = $image->alt();
        $alttext = ($imageAlt  != '') ? $imageAlt : $defaultAlt;
        $portrait = $image->dimensions()->portrait() ?? false;
        ?>
        <img
        class="<?= $portrait ? 'portrait' : 'landscape' ?>"
        src="<?= $image->url() ?>"
        alt="<?= $alttext ?>">
        <?php if ( $image->caption() != '' ) : ?>
          <figcaption><?= $image->caption() ?></figcaption>
        <?php endif ?>
      </figure>
    <?php endforeach ?>
    </section>
  <?php endif ?>

  </article>
</main>

<?php snippet('footer') ?>

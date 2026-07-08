<?php snippet('header') ?>

<main class="newsletter">
  <h2 style="font-size: unset;"><?= $page->title() ?></h2>
  <p><?= $page->kirbyText() ?></p>

<?php 
    // Controller: site/controllers/newsletter.php
?>

<form method="post" class="newsletter-form">
    <?php if (isset($success)): ?>
        <p class="success"><?= $success ?></p>
    <?php else: ?>
        <!-- Vorname -->
        <section>
            <label for="firstname">First name *<br>
              <input type="text" id="firstname" name="firstname" value="<?= $formData['firstname'] ?? '' ?>" required>
            </label>
            <?php if (isset($errors['firstname'])): ?>
                <p class="error"><?= $errors['firstname'] ?></p>
            <?php endif; ?>
        </section>

        <!-- Nachname -->
        <section>
            <label for="lastname">Last name *<br>
              <input type="text" id="lastname" name="lastname" value="<?= $formData['lastname'] ?? '' ?>" required>
            </label>
            <?php if (isset($errors['lastname'])): ?>
                <p class="error"><?= $errors['lastname'] ?></p>
            <?php endif; ?>
        </section>

        <!-- E-Mail -->
        <section>
            <label for="email">E-Mail Address *<br>
              <input type="email" id="email" name="email" value="<?= $formData['email'] ?? '' ?>" required>
            </label>
            <?php if (isset($errors['email'])): ?>
                <p class="error"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </section>

        <button type="submit">Subscribe</button>

        <!-- Allgemeiner API-Fehler -->
        <?php if (isset($errors['api'])): ?>
            <p class="error"><?= implode(', ', $errors['api']) ?></p>
        <?php endif; ?>
    <?php endif; ?>
</form>
<!-- 
<form method="post" action="https://newsletter.infomaniak.com/v3/api/1/newsletters/webforms/24980/submit" class="inf-form"><input type="email" name="email" style="display:none" /><input type="hidden" name="key" value="eyJpdiI6ImxcLzdURXFvUlwvSkdKNGVoZHBoR0JhS00xVStuTHQxNUJqbEx1dzlRRm84ND0iLCJtYWMiOiJhMzk3ZjgzOGIxNDRiOTEwYjNkM2NlZDdlNzkxZWEyYTEyYTk4YmJhNTk4MWMxZDc3NTYyMzA2Zjc4ZmRmYTA4IiwidmFsdWUiOiIrZjBTMWJXSlR4RkhNRE83SERDNVJLcDRXbGZESVdEQzZwWXh2QVlrXC8zWT0ifQ==">
  <input type="hidden" name="webform_id" value="24980">
  <div class="inf-main_6a0e4d2996f4d0a603dbbb30d0b0f17b">
    <h4>Newsletter</h4>
    <span>Ne manquez pas les promotions et les nouveautés que nous réservons à nos fidèles abonnés.</span>
    <div class="inf-success" style="display:none">
      <h4>Inscription validée. Un mail de confirmation vous a été envoyé. Vérifiez votre boîte mail.</h4>
      <p> <a href="#" class="inf-btn">&laquo;</a> </p>
   </div>
   <div class="inf-content">
     <div class="inf-input inf-input-text">
      <input type="email" name="inf[1]" data-inf-meta="1" data-inf-error="" required="required" placeholder="Email *" >
     </div>
     <div class="inf-rgpd">Votre adresse de messagerie est uniquement utilisée pour vous envoyer notre lettre d&#039;information ainsi que des informations concernant nos activités. Vous pouvez à tout moment utiliser le lien de désabonnement intégré dans chacun de nos mails.</div>
       <script src="https://newsletter.infomaniak.com/v3/static/mcaptcha/altcha.min.js?v=1783350000" type="module"></script>
       <altcha-widget hidelogo hidefooter floating challengeurl="https://newsletter.infomaniak.com/v3/altcha-challenge" ></altcha-widget>
       <script src="https://newsletter.infomaniak.com/v3/static/mcaptcha/altcha-index.js?v=1783350000" defer></script>
       <script src="https://newsletter.infomaniak.com/v3/static/webform_index.js?v=1783350000"></script>
       <div class="inf-submit"> <input type="submit" style="margin-top: 25px;" value="Valider"> </div>
      </div>
    </div>
  </form>
-->

</main>

<?php snippet('footer') ?>

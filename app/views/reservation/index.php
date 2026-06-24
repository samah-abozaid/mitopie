<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- HERO RESERVATION -->
<div class="s-hero-trouver">
  <div>
    <div class="hero-bread"><a href="<?= url() ?>">Accueil</a> / Réserver</div>
    <h1 class="hero-h1">Réserver vos produits</h1>
    <p class="hero-sub">Passez votre commande à l'avance et récupérez-la<br>à la ferme ou au marché de Gorron.</p>
  </div>
  <div class="hero-address-card">
    <div class="addr-icon">📅</div>
    <div class="addr-title">Retraits possibles</div>
    <div class="addr-text">Samedi 11h–12h30 · Ferme<br>Mercredi 8h30–12h30 · Marché Gorron</div>
  </div>
</div>

<!-- RESERVATION FORM -->
<div class="s-contact">
  <p class="section-eyebrow">Formulaire de réservation</p>
  <h2 class="section-h2">Votre demande</h2>
  <div class="contact-layout">

    <div class="contact-info">
      <div class="contact-info-item">
        <div class="ci-icon">🥕</div>
        <div>
          <div class="ci-title">Légumes &amp; Œufs</div>
          <div class="ci-text">Disponibles chaque semaine à la ferme et au marché.</div>
        </div>
      </div>
      <div class="contact-info-item">
        <div class="ci-icon">🐑</div>
        <div>
          <div class="ci-title">Agneaux &amp; Viandes</div>
          <div class="ci-text">Sur commande uniquement — précisez votre demande dans le message.</div>
        </div>
      </div>
      <div class="contact-info-item">
        <div class="ci-icon">📞</div>
        <div>
          <div class="ci-title">Besoin d'aide ?</div>
          <div class="ci-text">aurore@mitopie.fr<br>Nous confirmons sous 24h.</div>
        </div>
      </div>
    </div>

    <div class="contact-form-card">
      <div class="form-title">Votre réservation</div>

      <?php if ($success): ?>
        <p style="color:#2E7D32;background:#E8F5E9;padding:12px;border-radius:8px;margin-bottom:16px;">
          ✅ Votre réservation a bien été enregistrée ! Nous vous confirmons par email sous 24h.
        </p>
      <?php endif; ?>
      <?php if ($error): ?>
        <p style="color:#B71C1C;background:#FFEBEE;padding:12px;border-radius:8px;margin-bottom:16px;">
          ⚠️ <?= h($error) ?>
        </p>
      <?php endif; ?>

      <?php if (!$success): ?>
      <form method="POST" action="<?= url('reservation') ?>">
        <div class="form-row">
          <label class="form-label">Nom complet <span style="color:#B71C1C">*</span></label>
          <input class="form-input" type="text" name="nom" required placeholder="Prénom Nom"
                 value="<?= h($_POST['nom'] ?? '') ?>">
        </div>
        <div class="form-row">
          <label class="form-label">Email <span style="color:#B71C1C">*</span></label>
          <input class="form-input" type="email" name="email" required placeholder="vous@exemple.fr"
                 value="<?= h($_POST['email'] ?? '') ?>">
        </div>
        <div class="form-row">
          <label class="form-label">Téléphone (optionnel)</label>
          <input class="form-input" type="tel" name="telephone" placeholder="06 XX XX XX XX"
                 value="<?= h($_POST['telephone'] ?? '') ?>">
        </div>
        <div class="form-row">
          <label class="form-label">Date de retrait souhaitée <span style="color:#B71C1C">*</span></label>
          <input class="form-input" type="date" name="date_retrait" required
                 min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                 value="<?= h($_POST['date_retrait'] ?? '') ?>">
          <small style="color:#777;font-size:12px;">Samedi (ferme) ou mercredi (marché Gorron)</small>
        </div>
        <div class="form-row">
          <label class="form-label">Produits souhaités / message</label>
          <textarea class="form-input textarea" name="message"
                    placeholder="Ex : 2 kg de tomates, 1 boîte d'œufs, 1 agneau entier…"><?= h($_POST['message'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="form-btn">Envoyer ma réservation →</button>
      </form>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

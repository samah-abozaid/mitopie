<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- HERO TROUVER -->
<div class="s-hero-trouver">
  <div>
    <div class="hero-bread"><a href="<?= url() ?>">Accueil</a> / Nous trouver</div>
    <h1 class="hero-h1">Où nous trouver ?</h1>
    <p class="hero-sub">À la ferme, au marché ou via Locavor —<br>plusieurs façons de profiter de nos produits.</p>
  </div>
  <div class="hero-address-card">
    <div class="addr-icon">📍</div>
    <div class="addr-title">Adresse principale</div>
    <div class="addr-text">Le Moulin de Favières<br>53120 Brecé, Mayenne</div>
    <a href="https://maps.google.com/?q=Le+Moulin+de+Favieres+Brece+53120" target="_blank" rel="noopener" class="addr-link">→ Ouvrir dans Google Maps</a>
  </div>
</div>

<!-- MAP + HORAIRES -->
<div class="s-map">
  <p class="section-eyebrow">Localisation</p>
  <h2 class="section-h2">La ferme sur la carte</h2>
  <div class="map-layout">
    <div class="map-placeholder">
      <div class="map-pin"><span>🌿</span></div>
      <div class="map-label">
        Mitopie — Ferme bio
        <span>Le Moulin de Favières, Brecé</span>
      </div>
      <a href="https://maps.google.com/?q=Le+Moulin+de+Favieres+Brece+53120" target="_blank" rel="noopener" class="map-gmaps">📍 Google Maps →</a>
    </div>
    <div class="map-info-col">
      <div class="info-box">
        <div class="info-box-header">
          <div class="info-box-icon">🏡</div>
          <div>
            <div class="info-box-title">Vente à la ferme</div>
            <div class="info-box-sub">Le Moulin de Favières</div>
          </div>
        </div>
        <div class="horaire-row"><span class="horaire-day">Samedi</span><span class="horaire-time">11h – 12h30</span><span class="horaire-badge badge-green">Ouvert</span></div>
        <div class="horaire-row"><span class="horaire-day">Lundi – Vendredi</span><span class="horaire-time">Fermé au public</span><span class="horaire-badge badge-gray">Fermé</span></div>
        <div class="horaire-row"><span class="horaire-day">Dimanche</span><span class="horaire-time">Fermé</span><span class="horaire-badge badge-gray">Fermé</span></div>
      </div>
      <div class="info-box">
        <div class="info-box-header">
          <div class="info-box-icon">🛒</div>
          <div>
            <div class="info-box-title">Marché de Gorron</div>
            <div class="info-box-sub">Présence hebdomadaire</div>
          </div>
        </div>
        <div class="horaire-row"><span class="horaire-day">Mercredi</span><span class="horaire-time">8h30 – 12h30</span><span class="horaire-badge badge-green">Hebdo</span></div>
      </div>
      <div class="info-box">
        <div class="info-box-header">
          <div class="info-box-icon">📦</div>
          <div>
            <div class="info-box-title">Distribution Locavor</div>
            <div class="info-box-sub">Brecé &amp; Mayenne</div>
          </div>
        </div>
        <div class="horaire-row"><span class="horaire-day">Vendredi soir (Brecé)</span><span class="horaire-time">18h30 – 19h30</span><span class="horaire-badge badge-green">Hebdo</span></div>
        <div class="horaire-row"><span class="horaire-day">Vendredi soir (Mayenne)</span><span class="horaire-time">15h30 – 17h30</span><span class="horaire-badge badge-green">Hebdo</span></div>
      </div>
    </div>
  </div>
</div>

<!-- 3 POINTS DE VENTE -->
<div class="s-points">
  <p class="section-eyebrow">Nos points de vente</p>
  <h2 class="section-h2">3 façons de nous acheter</h2>
  <div class="points-grid">
    <div class="point-card">
      <div class="point-num">1</div>
      <div class="point-icon">🏡</div>
      <div class="point-title">À la ferme</div>
      <div class="point-rows">
        <div class="point-row"><span>📍</span><span>Le Moulin de Favières, Brecé</span></div>
        <div class="point-row"><span>🕐</span><span>Samedi 11h–12h30</span></div>
        <div class="point-row"><span>🐕</span><span>Animaux acceptés tenus en laisse</span></div>
      </div>
      <a href="https://maps.google.com/?q=Le+Moulin+de+Favieres+Brece+53120" target="_blank" rel="noopener" class="point-cta">Voir sur la carte →</a>
    </div>
    <div class="point-card">
      <div class="point-num">2</div>
      <div class="point-icon">🛒</div>
      <div class="point-title">Marché de Gorron</div>
      <div class="point-rows">
        <div class="point-row"><span>📍</span><span>Place du marché, Gorron (53)</span></div>
        <div class="point-row"><span>🕐</span><span>Mercredi 8h30–12h30</span></div>
        <div class="point-row"><span>🥕</span><span>Légumes, œufs, viande</span></div>
      </div>
      <a href="https://maps.google.com/?q=Gorron+53120" target="_blank" rel="noopener" class="point-cta">Itinéraire →</a>
    </div>
    <div class="point-card">
      <div class="point-num">3</div>
      <div class="point-icon">📱</div>
      <div class="point-title">Paniers Locavor</div>
      <div class="point-rows">
        <div class="point-row"><span>🖥</span><span>Commandez sur locavor.fr</span></div>
        <div class="point-row"><span>📅</span><span>Commande : ven. au mer. minuit</span></div>
        <div class="point-row"><span>📦</span><span>Retrait : ven. 18h30 ou sam. 11h</span></div>
      </div>
      <a href="https://www.locavor.fr" target="_blank" rel="noopener" class="point-cta">Commander sur Locavor →</a>
    </div>
  </div>
</div>

<!-- CONTACT FORM -->
<div class="s-contact">
  <p class="section-eyebrow">Contactez-nous</p>
  <h2 class="section-h2">Envoyez-nous un message</h2>
  <div class="contact-layout">
    <div class="contact-info">
      <div class="contact-info-item"><div class="ci-icon">📍</div><div><div class="ci-title">Adresse</div><div class="ci-text">Le Moulin de Favières<br>53120 Brecé, Mayenne</div></div></div>
      <div class="contact-info-item"><div class="ci-icon">🕐</div><div><div class="ci-title">Vente à la ferme</div><div class="ci-text">Samedi 11h–12h30</div></div></div>
      <div class="contact-info-item"><div class="ci-icon">📧</div><div><div class="ci-title">Email</div><div class="ci-text">aurore@mitopie.fr</div></div></div>
    </div>
    <div class="contact-form-card">
      <div class="form-title">Votre message</div>
      <?php if ($success): ?>
        <p style="color:#2E7D32;background:#E8F5E9;padding:12px;border-radius:8px;margin-bottom:16px;">
          ✅ Votre message a bien été envoyé. Nous vous répondrons rapidement.
        </p>
      <?php endif; ?>
      <?php if ($error): ?>
        <p style="color:#B71C1C;background:#FFEBEE;padding:12px;border-radius:8px;margin-bottom:16px;">
          ⚠️ <?= h($error) ?>
        </p>
      <?php endif; ?>
      <form method="POST" action="<?= url('trouver') ?>">
        <div class="form-row">
          <label class="form-label">Votre nom</label>
          <input class="form-input" type="text" name="nom" required placeholder="Prénom Nom">
        </div>
        <div class="form-row">
          <label class="form-label">Votre email</label>
          <input class="form-input" type="email" name="email" required placeholder="vous@exemple.fr">
        </div>
        <div class="form-row">
          <label class="form-label">Votre message</label>
          <textarea class="form-input textarea" name="message" required placeholder="Votre question ou demande…"></textarea>
        </div>
        <button type="submit" class="form-btn">Envoyer le message →</button>
      </form>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

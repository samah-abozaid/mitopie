<?php require __DIR__ . '/layout/admin_layout.php'; ?>

<div class="main-body">
  <!-- STAT CARDS -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-card-top">
        <span class="stat-card-icon">🥕</span>
        <span class="stat-card-badge badge-up">Actif</span>
      </div>
      <div class="stat-card-num"><?= $nbProduits ?></div>
      <div class="stat-card-lbl">Produits au catalogue</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-top">
        <span class="stat-card-icon">📂</span>
        <span class="stat-card-badge badge-up">Actif</span>
      </div>
      <div class="stat-card-num"><?= $nbCategories ?></div>
      <div class="stat-card-lbl">Catégories</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-top">
        <span class="stat-card-icon">🌿</span>
        <span class="stat-card-badge badge-up">Bio</span>
      </div>
      <div class="stat-card-num">100%</div>
      <div class="stat-card-lbl">Agriculture biologique</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-top">
        <span class="stat-card-icon">📅</span>
        <?php if ($nbReservations > 0): ?>
          <span class="stat-card-badge" style="background:#FFF3E0;color:#E65100;">En attente</span>
        <?php else: ?>
          <span class="stat-card-badge badge-up">OK</span>
        <?php endif; ?>
      </div>
      <div class="stat-card-num"><?= $nbReservations ?></div>
      <div class="stat-card-lbl">Réservations en attente</div>
    </div>
  </div>

  <!-- QUICK ACTIONS -->
  <div class="section-header">
    <span class="section-title">Actions rapides</span>
  </div>
  <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:24px;">
    <a href="<?= url('admin', 'produits') ?>" class="header-btn" style="text-decoration:none;">📋 Gérer les produits</a>
    <a href="<?= url('admin', 'createProduct') ?>" class="header-btn" style="text-decoration:none;background:var(--g3);">➕ Ajouter un produit</a>
    <a href="<?= url('admin', 'reservations') ?>" class="header-btn" style="text-decoration:none;background:#5C6BC0;">📅 Réservations</a>
    <a href="<?= url() ?>" class="header-btn" style="text-decoration:none;background:#555;" target="_blank">🌐 Voir le site</a>
  </div>

  <!-- SITE INFO -->
  <div class="section-header">
    <span class="section-title">Informations du site</span>
  </div>
  <div style="background:#fff;border-radius:12px;border:1px solid #E8F5E9;padding:20px;">
    <p style="font-size:13px;color:var(--muted);line-height:1.8;">
      <strong style="color:var(--text);">Ferme Mitopie</strong> · Le Moulin de Favières, 53120 Brecé<br>
      Vente directe · Samedi 11h–12h30 · Marché de Gorron mercredi 8h30–12h30
    </p>
  </div>
</div>

<?php require __DIR__ . '/layout/admin_footer.php'; ?>

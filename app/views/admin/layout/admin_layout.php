<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($title ?? 'Administration — Mitopie') ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>

<div class="dashboard">
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="sidebar-logo-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#1B5E20" stroke-width="2.5" width="14" height="14">
          <path d="M12 2C6 2 2 8 2 12s4 10 10 10 10-4 10-10S18 2 12 2z"/>
          <path d="M12 2c0 0-4 4-4 10s4 10 4 10"/>
          <path d="M2 12h20"/>
        </svg>
      </div>
      <div>
        <span class="sidebar-logo-text">Mitopie</span>
        <span class="sidebar-logo-sub">Administration</span>
      </div>
    </div>

    <div class="sidebar-section-label">Navigation</div>
    <a href="<?= url('admin', 'dashboard') ?>" class="sidebar-item <?= ($activePage ?? '') === 'dashboard' ? 'active' : '' ?>">
      <span class="sidebar-icon">📊</span> Tableau de bord
    </a>
    <a href="<?= url('admin', 'produits') ?>" class="sidebar-item <?= ($activePage ?? '') === 'produits' ? 'active' : '' ?>">
      <span class="sidebar-icon">🥕</span> Produits
    </a>
    <a href="<?= url('admin', 'createProduct') ?>" class="sidebar-item">
      <span class="sidebar-icon">➕</span> Ajouter un produit
    </a>
    <a href="<?= url('admin', 'reservations') ?>" class="sidebar-item <?= ($activePage ?? '') === 'reservations' ? 'active' : '' ?>">
      <span class="sidebar-icon">📅</span> Réservations
    </a>

    <div class="sidebar-section-label">Site</div>
    <a href="<?= url() ?>" target="_blank" class="sidebar-item">
      <span class="sidebar-icon">🌐</span> Voir le site
    </a>

    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="sidebar-avatar"><?= strtoupper(substr($_SESSION['admin_nom'] ?? 'A', 0, 1)) ?></div>
        <div>
          <div class="sidebar-user-name"><?= h($_SESSION['admin_nom'] ?? '') ?></div>
          <div class="sidebar-user-role">Administratrice</div>
        </div>
      </div>
      <a href="<?= url('admin', 'logout') ?>" class="sidebar-logout">→ Déconnexion</a>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="main-header">
      <div>
        <div class="main-header-title"><?= h($pageHeading ?? $title ?? '') ?></div>
        <div class="main-header-sub"><?= h($pageSubtitle ?? '') ?></div>
      </div>
      <?php if (!empty($headerAction)): ?>
        <a href="<?= $headerAction['url'] ?>" class="header-btn" style="text-decoration:none;"><?= $headerAction['label'] ?></a>
      <?php endif; ?>
    </div>

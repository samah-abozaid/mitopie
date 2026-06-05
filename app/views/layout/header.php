<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($title ?? 'Mitopie') ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>

<nav class="s-nav" id="navbar">
  <a href="<?= url() ?>" class="nav-logo">
    <div class="nav-logo-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="#1B5E20" stroke-width="2.5" width="18" height="18">
        <path d="M12 2C6 2 2 8 2 12s4 10 10 10 10-4 10-10S18 2 12 2z"/>
        <path d="M12 2c0 0-4 4-4 10s4 10 4 10"/>
        <path d="M2 12h20"/>
      </svg>
    </div>
    <div>
      <span class="nav-logo-text">Mitopie</span>
      <span class="nav-logo-sub">Ferme bio · Brecé</span>
    </div>
  </a>

  <div class="nav-links" id="navLinks">
    <a href="<?= url() ?>"               class="<?= ($activePage ?? '') === 'accueil'  ? 'active' : '' ?>">Accueil</a>
    <a href="<?= url('produits') ?>"     class="<?= ($activePage ?? '') === 'produits' ? 'active' : '' ?>">Produits</a>
    <a href="<?= url('histoire') ?>"     class="<?= ($activePage ?? '') === 'histoire' ? 'active' : '' ?>">Notre histoire</a>
    <a href="<?= url('trouver') ?>"      class="<?= ($activePage ?? '') === 'trouver'  ? 'active' : '' ?>">Nous trouver</a>
    <a href="https://www.locavor.fr" target="_blank" rel="noopener" class="nav-cta">Commander sur Locavor →</a>
  </div>

  <button class="nav-burger" id="burgerBtn" aria-label="Menu">
    <span class="burger-line"></span>
    <span class="burger-line short"></span>
    <span class="burger-line"></span>
  </button>
</nav>

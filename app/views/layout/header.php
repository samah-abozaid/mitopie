<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($title ?? 'Mitopie') ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css?v=<?= filemtime(ROOT . '/public/css/style.css') ?>">
</head>
<body>

<!-- HEADER BANNER -->
<div class="s-header-banner">
  <a href="<?= url() ?>" class="header-banner-logo">
    <img src="<?= BASE_URL ?>public/images/image.png?v=<?= filemtime(ROOT . '/public/images/image.png') ?>" alt="Mitopie">
  </a>
  <div class="header-banner-text">
    <span class="header-banner-name">Mitopie</span>
    <span class="header-banner-sub">Ferme bio · Brecé</span>
  </div>
</div>

<!-- NAVBAR -->
<nav class="s-nav" id="navbar">
  <div class="nav-links" id="navLinks">
    <a href="<?= url() ?>"               class="<?= ($activePage ?? '') === 'accueil'    ? 'active' : '' ?>">Accueil</a>
    <a href="<?= url('produits') ?>"     class="<?= ($activePage ?? '') === 'produits'   ? 'active' : '' ?>">Produits</a>
    <a href="<?= url('histoire') ?>"     class="<?= ($activePage ?? '') === 'histoire'   ? 'active' : '' ?>">Notre histoire</a>
    <a href="<?= url('trouver') ?>"      class="<?= ($activePage ?? '') === 'trouver'    ? 'active' : '' ?>">Nous trouver</a>
    <a href="<?= url('reservation') ?>"  class="<?= ($activePage ?? '') === 'reservation'? 'active' : '' ?>">Réserver</a>
    <a href="https://www.locavor.fr" target="_blank" rel="noopener" class="nav-cta">Commander sur Locavor →</a>
  </div>

  <button class="nav-burger" id="burgerBtn" aria-label="Menu">
    <span class="burger-line"></span>
    <span class="burger-line short"></span>
    <span class="burger-line"></span>
  </button>
</nav>

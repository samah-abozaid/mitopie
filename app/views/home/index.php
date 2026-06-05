<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- HERO -->
<section class="s-hero">
  <div class="hero-bg-circle" style="width:400px;height:400px;top:-150px;right:-100px;"></div>
  <div class="hero-bg-circle" style="width:200px;height:200px;bottom:-80px;left:40px;"></div>
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-tag"><span></span> Agriculture biologique · Brecé, Mayenne</div>
      <h1 class="hero-h1">La nature dans<br>votre <em>assiette</em></h1>
      <p class="hero-p">Légumes de saison, œufs colorés et agneaux élevés avec passion.<br>Vente directe à la ferme et sur les marchés locaux.</p>
      <div class="hero-btns">
        <a href="<?= url('produits') ?>" class="btn-primary">🛒 Voir nos produits</a>
        <a href="<?= url('histoire') ?>" class="btn-outline">Notre histoire</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><div class="stat-num">2020</div><div class="stat-label">Année de création</div></div>
        <div class="stat-item"><div class="stat-num">3</div><div class="stat-label">Gammes de produits</div></div>
        <div class="stat-item"><div class="stat-num">Bio</div><div class="stat-label">Agriculture certifiée</div></div>
      </div>
    </div>
    <div class="hero-right">
      <div class="hero-card">
        <div class="hero-card-icon">🥚</div>
        <div class="hero-card-label">Disponible cette semaine</div>
        <div class="hero-card-value">Œufs colorés</div>
        <div class="hero-card-note">Poules de races élevées en plein air</div>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="s-cats">
  <div class="section-header">
    <div>
      <p class="section-eyebrow">Ce que nous produisons</p>
      <h2 class="section-h2">Nos catégories</h2>
    </div>
    <a href="<?= url('produits') ?>" class="see-all">Voir tout →</a>
  </div>
  <div class="cats-grid">
    <?php
    $catClasses = ['cat-legume', 'cat-poule', 'cat-agneau'];
    $catBadges  = ['Saison en cours', 'Disponible', 'Sur commande'];
    foreach ($categories as $i => $cat): ?>
      <a href="<?= url('produits') ?>" class="cat-card <?= $catClasses[$i % 3] ?>">
        <div class="cat-top">
          <div class="cat-emoji"><?= h($cat->icone) ?></div>
          <div class="cat-name"><?= h($cat->nom) ?></div>
          <div class="cat-count"><?= h($cat->description) ?></div>
        </div>
        <div class="cat-bottom">
          <span class="cat-badge"><?= $catBadges[$i % 3] ?></span>
          <span class="cat-arrow">→</span>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="s-products">
  <div class="section-header">
    <div>
      <p class="section-eyebrow">À la une</p>
      <h2 class="section-h2">Produits du moment</h2>
    </div>
    <a href="<?= url('produits') ?>" class="see-all">Tous les produits →</a>
  </div>
  <div class="prod-grid">
    <?php
    $imgClass = ['l' => 'l', 'p' => 'p', 'a' => 'a'];
    $catMap   = [1 => 'l', 2 => 'p', 3 => 'a'];
    foreach ($products as $prod): ?>
      <div class="prod-card">
        <div class="prod-img <?= $catMap[$prod->categorie_id] ?? 'l' ?>">
          <span class="prod-saison-tag"><?= h($prod->saison) ?></span>
        </div>
        <div class="prod-body">
          <div class="prod-name"><?= h($prod->nom) ?></div>
          <div class="prod-sub"><?= h($prod->unite) ?> · Bio</div>
          <div class="prod-footer">
            <span class="prod-price"><?= number_format($prod->prix, 2, ',', '') ?> €</span>
            <div class="prod-btn">+</div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ABOUT STRIP -->
<section class="s-about">
  <div class="about-avatar-wrap">
    <div class="about-avatar">A</div>
  </div>
  <div class="about-content">
    <p class="about-eyebrow">La paysanne derrière Mitopie</p>
    <h2 class="about-name">Aurore Mengual</h2>
    <p class="about-p">Passionnée de jardinage et d'animaux depuis toujours, Aurore a créé Mitopie en 2020 au Moulin de Favières à Brecé. Elle cultive légumes et élève ses animaux avec soin, dans le respect de la nature et du bien-être animal.</p>
    <a href="<?= url('histoire') ?>" class="about-btn">Lire son histoire →</a>
  </div>
</section>

<!-- INFOS PRATIQUES -->
<section class="s-info">
  <div class="info-card">
    <div class="info-icon">📍</div>
    <div>
      <div class="info-title">À la ferme</div>
      <div class="info-text">Le Moulin de Favières<br>53120 Brecé<br>Sam. 11h–12h30</div>
      <a href="<?= url('trouver') ?>" class="info-link">Voir sur la carte →</a>
    </div>
  </div>
  <div class="info-card">
    <div class="info-icon">🛒</div>
    <div>
      <div class="info-title">Marché de Gorron</div>
      <div class="info-text">Tous les mercredis<br>de 8h30 à 12h30</div>
      <a href="<?= url('trouver') ?>" class="info-link">En savoir plus →</a>
    </div>
  </div>
  <div class="info-card">
    <div class="info-icon">📦</div>
    <div>
      <div class="info-title">Paniers Locavor</div>
      <div class="info-text">Commande du vendredi<br>au mercredi minuit.<br>Retrait vendredi 18h30–19h30</div>
      <a href="https://www.locavor.fr" target="_blank" rel="noopener" class="info-link">Commander sur Locavor →</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>

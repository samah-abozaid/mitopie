<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- HERO PRODUITS -->
<div class="s-hero-prod">
  <div>
    <div class="hero-bread"><a href="<?= url() ?>">Accueil</a> / Produits</div>
    <h1 class="hero-h1">Nos produits</h1>
    <p class="hero-sub">Tout est cultivé et élevé avec soin à Brecé, selon les saisons.</p>
    <div class="hero-count-row">
      <div class="count-box"><div class="count-num"><?= count($productsByCategory) ?></div><div class="count-lbl">Catégories</div></div>
      <div class="count-box"><div class="count-num"><?= array_sum(array_map(fn($g) => count($g['products']), $productsByCategory)) ?>+</div><div class="count-lbl">Produits</div></div>
      <div class="count-box"><div class="count-num">Bio</div><div class="count-lbl">Certifié</div></div>
    </div>
  </div>
  <div style="display:flex;gap:10px;">
    <?php foreach ($productsByCategory as $group): ?>
      <div class="hero-cat-pill">
        <div style="font-size:28px;margin-bottom:4px;"><?= h($group['category']->icone) ?></div>
        <div style="font-size:11px;color:#A5D6A7;"><?= h($group['category']->nom) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- SEASON BANNER -->
<div class="s-saison-banner">
  <div class="saison-dot"></div>
  🌞 <strong>En ce moment</strong> — Légumes de saison, œufs colorés disponibles. Agneau sur commande.
</div>

<!-- CATALOGUE -->
<div class="s-catalogue">
  <?php
  $sectionClasses = ['legume', 'poule', 'agneau'];
  $imgClasses     = ['l', 'p', 'a'];
  foreach ($productsByCategory as $i => $group):
    $cat      = $group['category'];
    $products = $group['products'];
    $cls      = $sectionClasses[$i % 3];
    $imgCls   = $imgClasses[$i % 3];
  ?>
    <div class="cat-section">
      <div class="cat-section-header <?= $cls ?>">
        <span class="cat-section-icon"><?= h($cat->icone) ?></span>
        <span class="cat-section-name"><?= h($cat->nom) ?></span>
        <span class="cat-section-count">(<?= count($products) ?> produits)</span>
      </div>
      <div class="prod-grid">
        <?php foreach ($products as $prod):
          $dispoClass = match($prod->disponibilite) {
              'disponible'    => 'oui',
              'sur_commande'  => 'cmd',
              default         => 'non',
          };
          $dispoLabel = match($prod->disponibilite) {
              'disponible'    => 'Dispo',
              'sur_commande'  => 'Sur commande',
              default         => 'Bientôt',
          };
        ?>
          <div class="prod-card">
            <div class="prod-img <?= $imgCls ?>">
              <div class="prod-tag-row">
                <span class="tag-saison"><?= h($prod->saison) ?></span>
                <span class="tag-dispo <?= $dispoClass ?>"><?= $dispoLabel ?></span>
              </div>
            </div>
            <div class="prod-body">
              <div class="prod-name"><?= h($prod->nom) ?></div>
              <div class="prod-desc"><?= h($prod->description) ?></div>
              <div class="prod-footer">
                <div>
                  <span class="prod-price"><?= number_format($prod->prix, 2, ',', '') ?> €</span>
                  <span class="prod-unit"> / <?= h($prod->unite) ?></span>
                </div>
                <?php if ($prod->disponibilite === 'disponible'): ?>
                  <div class="prod-btn">+</div>
                <?php elseif ($prod->disponibilite === 'sur_commande'): ?>
                  <div class="prod-btn" style="background:var(--g3);">✉</div>
                <?php else: ?>
                  <div class="prod-btn" style="background:#ccc;cursor:not-allowed;">+</div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- LOCAVOR CTA -->
<div class="s-locavor">
  <div class="locavor-left">
    <div class="eyebrow">Commander en ligne</div>
    <h3>Vous voulez recevoir un panier ?</h3>
    <p>Commandez du vendredi au mercredi minuit sur Locavor.<br>Retrait vendredi 18h30–19h30 ou samedi 11h–12h30.</p>
  </div>
  <a href="https://www.locavor.fr" target="_blank" rel="noopener" class="locavor-btn">📦 Commander sur Locavor →</a>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

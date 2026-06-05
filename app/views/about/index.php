<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- HERO HISTOIRE -->
<div class="s-hero-hist">
  <div class="hero-deco"></div>
  <div class="hero-deco2"></div>
  <div class="avatar-big">A</div>
  <div class="hist-hero-txt">
    <div class="hist-eyebrow">La paysanne derrière Mitopie</div>
    <h1 class="hist-h1">Aurore Mengual</h1>
    <div class="hist-role">Maraîchère &amp; éleveuse · Brecé, Mayenne · Depuis 2020</div>
    <div class="hist-quote">"Je serai paysanne" — une évidence qui a tout changé.</div>
  </div>
</div>

<!-- TIMELINE -->
<div class="s-timeline">
  <p class="section-eyebrow">Son parcours</p>
  <h2 class="section-h2">Une passion qui est devenue un métier</h2>
  <div class="timeline">
    <div class="tl-item">
      <div class="tl-dot filled"></div>
      <div class="tl-year">Avant 2017</div>
      <div class="tl-title">L'amour de la terre naît</div>
      <div class="tl-text">Nantaise d'origine, Aurore développe dès ses premières années une passion profonde pour le jardinage et les animaux. Elle lance ses premières activités de maraîchage, l'élevage de poules et de moutons depuis sa maison.</div>
    </div>
    <div class="tl-item">
      <div class="tl-dot filled"></div>
      <div class="tl-year">2017</div>
      <div class="tl-title">L'installation à Brecé</div>
      <div class="tl-text">Aurore s'installe au Moulin de Favières à Brecé, en Mayenne. Ce magnifique lieu devient le berceau de son projet agricole. Elle décide d'y ouvrir son entreprise et de franchir le cap professionnel.</div>
    </div>
    <div class="tl-item">
      <div class="tl-dot filled"></div>
      <div class="tl-year">2018 – 2019</div>
      <div class="tl-title">La formation "Paysans créatifs"</div>
      <div class="tl-text">Aurore s'inscrit auprès de la CIAP 53 au stage "Paysans créatifs". Pendant un an, elle se forme à la Ferme des Fontaines (maraîchage bio, élevage ovin viande) et chez Les Bergers dans l'Âme (élevage ovin lait, fromagerie bio).</div>
    </div>
    <div class="tl-item">
      <div class="tl-dot filled"></div>
      <div class="tl-year">2020</div>
      <div class="tl-title">La naissance de Mitopie</div>
      <div class="tl-text">Le 1er avril 2020, l'entreprise MITOPIE voit le jour. Aurore lance officiellement sa ferme biologique avec maraîchage, poules de races et élevage d'agneaux — vente directe à la ferme, au marché de Gorron et sur Locavor.</div>
    </div>
    <div class="tl-item">
      <div class="tl-dot"></div>
      <div class="tl-year">Aujourd'hui</div>
      <div class="tl-title">Une ferme en plein essor</div>
      <div class="tl-text">Mitopie continue de grandir avec des produits de haute qualité, un engagement fort pour le bien-être animal et une agriculture respectueuse de l'environnement.</div>
    </div>
  </div>
</div>

<!-- VALEURS -->
<div class="s-valeurs">
  <p class="section-eyebrow">Ce qui nous guide</p>
  <h2 class="section-h2">Nos valeurs</h2>
  <div class="valeurs-grid">
    <div class="valeur-card">
      <div class="valeur-icon">🌿</div>
      <div class="valeur-title">Agriculture biologique</div>
      <div class="valeur-text">Tous nos produits sont cultivés et élevés dans le respect des normes biologiques, sans pesticides ni intrants chimiques.</div>
    </div>
    <div class="valeur-card">
      <div class="valeur-icon">🐑</div>
      <div class="valeur-title">Bien-être animal</div>
      <div class="valeur-text">Nos animaux grandissent en plein air, dans de grandes prairies, avec une alimentation naturelle et un soin quotidien attentif.</div>
    </div>
    <div class="valeur-card">
      <div class="valeur-icon">🤝</div>
      <div class="valeur-title">Circuit court local</div>
      <div class="valeur-text">Vente directe à la ferme, au marché et via Locavor — pour que chaque euro reste dans l'économie locale mayennaise.</div>
    </div>
  </div>
</div>

<!-- GALERIE -->
<div class="s-galerie">
  <p class="section-eyebrow">La ferme en images</p>
  <h2 class="section-h2">Quelques photos</h2>
  <div class="galerie-grid">
    <div class="photo-card p1">🌱<div class="photo-overlay">Le jardin maraîcher</div></div>
    <div class="photo-card p2">🐔<div class="photo-overlay">Les poules de race</div></div>
    <div class="photo-card p3">🐑<div class="photo-overlay">Le troupeau</div></div>
    <div class="photo-card p4">🌾<div class="photo-overlay">Le Moulin de Favières</div></div>
  </div>
</div>

<!-- CTA -->
<div class="s-contact-cta">
  <div>
    <div class="cta-eyebrow">Envie d'en savoir plus ?</div>
    <h3 class="cta-h3">Venez nous rendre visite à la ferme</h3>
    <p class="cta-p">Nous sommes ouverts le samedi de 11h à 12h30 au Moulin de Favières.<br>N'hésitez pas à nous contacter pour toute question.</p>
  </div>
  <div class="cta-btns">
    <a href="<?= url('trouver') ?>" class="btn-g5">📍 Nous trouver</a>
    <a href="<?= url('trouver') ?>" class="btn-ghost">📧 Nous contacter</a>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

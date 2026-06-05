<?php
$pageHeading  = 'Produits';
$pageSubtitle = count($products) . ' produit(s) au catalogue';
$headerAction = ['url' => url('admin', 'createProduct'), 'label' => '+ Ajouter un produit'];
require __DIR__ . '/../layout/admin_layout.php';
?>

<div class="main-body">
  <table class="prod-table">
    <thead>
      <tr>
        <th></th>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Disponibilité</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $catNames = [];
      foreach ($categories as $cat) {
          $catNames[$cat->id] = $cat->nom;
      }
      foreach ($products as $prod):
        $dispoLabel = match($prod->disponibilite) {
            'disponible'   => ['label' => 'Disponible',    'class' => 'dot-green'],
            'sur_commande' => ['label' => 'Sur commande',  'class' => 'dot-orange'],
            default        => ['label' => 'Indisponible',  'class' => 'dot-red'],
        };
        $catSlug = ['Légumes' => 'legume', 'Poules & Œufs' => 'poule', 'Animaux' => 'agneau'];
        $nom = $catNames[$prod->categorie_id] ?? '';
        $pillClass = $catSlug[$nom] ?? 'legume';
      ?>
        <tr>
          <td class="prod-emoji-cell">🌿</td>
          <td class="prod-name-cell"><?= h($prod->nom) ?></td>
          <td><span class="prod-cat-pill pill-<?= $pillClass ?>"><?= h($nom) ?></span></td>
          <td><?= number_format($prod->prix, 2, ',', '') ?> € / <?= h($prod->unite) ?></td>
          <td>
            <span class="dispo-dot">
              <span class="<?= $dispoLabel['class'] ?>"></span>
              <?= $dispoLabel['label'] ?>
            </span>
          </td>
          <td>
            <div class="action-btns">
              <a href="<?= url('admin', 'editProduct', ['id' => $prod->id]) ?>" class="btn-edit">✏️ Modifier</a>
              <a href="<?= url('admin', 'deleteProduct', ['id' => $prod->id]) ?>"
                 class="btn-del"
                 onclick="return confirm('Supprimer « <?= h($prod->nom) ?> » ?')">🗑 Supprimer</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/../layout/admin_footer.php'; ?>

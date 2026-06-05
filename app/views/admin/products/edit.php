<?php
$pageHeading  = 'Modifier : ' . h($product->nom);
$pageSubtitle = 'Mise à jour d\'un produit existant';
require __DIR__ . '/../layout/admin_layout.php';
?>

<div class="main-body">
  <?php if ($error): ?>
    <p style="color:#B71C1C;background:#FFEBEE;padding:12px;border-radius:8px;margin-bottom:16px;"><?= h($error) ?></p>
  <?php endif; ?>

  <div class="edit-modal-wrap">
    <div class="edit-modal-header">
      <span class="edit-modal-title">Modifier : <?= h($product->nom) ?></span>
    </div>
    <form method="POST" action="<?= url('admin', 'editProduct', ['id' => $product->id]) ?>">
      <div class="edit-modal-body">
        <div class="edit-form-grid">
          <div>
            <label class="edit-label">Nom *</label>
            <input class="edit-input" type="text" name="nom" required
                   value="<?= h($_POST['nom'] ?? $product->nom) ?>">
          </div>
          <div>
            <label class="edit-label">Prix (€) *</label>
            <input class="edit-input" type="number" name="prix" step="0.01" min="0" required
                   value="<?= h($_POST['prix'] ?? $product->prix) ?>">
          </div>
          <div>
            <label class="edit-label">Unité</label>
            <input class="edit-input" type="text" name="unite"
                   value="<?= h($_POST['unite'] ?? $product->unite) ?>">
          </div>
          <div>
            <label class="edit-label">Catégorie *</label>
            <select class="edit-select" name="categorie_id" required>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat->id ?>"
                  <?= (($_POST['categorie_id'] ?? $product->categorie_id) == $cat->id) ? 'selected' : '' ?>>
                  <?= h($cat->icone . ' ' . $cat->nom) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label class="edit-label">Saison</label>
            <select class="edit-select" name="saison">
              <?php foreach (['Printemps','Été','Automne','Hiver','Toute saison'] as $s): ?>
                <option value="<?= $s ?>"
                  <?= (($_POST['saison'] ?? $product->saison) === $s) ? 'selected' : '' ?>><?= $s ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label class="edit-label">Disponibilité</label>
            <select class="edit-select" name="disponibilite">
              <?php $dispo = $_POST['disponibilite'] ?? $product->disponibilite; ?>
              <option value="disponible"   <?= $dispo === 'disponible'   ? 'selected' : '' ?>>✅ Disponible</option>
              <option value="sur_commande" <?= $dispo === 'sur_commande' ? 'selected' : '' ?>>📅 Sur commande</option>
              <option value="indisponible" <?= $dispo === 'indisponible' ? 'selected' : '' ?>>❌ Indisponible</option>
            </select>
          </div>
          <div class="edit-form-full">
            <label class="edit-label">Description</label>
            <textarea class="edit-input" name="description" rows="3"><?= h($_POST['description'] ?? $product->description) ?></textarea>
          </div>
          <div class="edit-form-full">
            <label class="edit-label">Image (nom du fichier)</label>
            <input class="edit-input" type="text" name="image"
                   value="<?= h($_POST['image'] ?? $product->image) ?>">
          </div>
          <div class="edit-form-full">
            <label style="display:flex;align-items:center;gap:8px;font-size:13px;cursor:pointer;">
              <input type="checkbox" name="visible" style="width:16px;height:16px;"
                <?= (isset($_POST['visible']) || (empty($_POST) && $product->visible)) ? 'checked' : '' ?>>
              Produit visible sur le site
            </label>
          </div>
        </div>
      </div>
      <div class="edit-modal-footer">
        <a href="<?= url('admin', 'produits') ?>" class="btn-cancel" style="text-decoration:none;">Annuler</a>
        <button type="submit" class="btn-save">✅ Enregistrer les modifications</button>
      </div>
    </form>
  </div>
</div>

<?php require __DIR__ . '/../layout/admin_footer.php'; ?>

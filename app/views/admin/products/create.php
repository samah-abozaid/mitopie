<?php
$pageHeading  = 'Ajouter un produit';
$pageSubtitle = 'Nouveau produit au catalogue';
require __DIR__ . '/../layout/admin_layout.php';
?>

<div class="main-body">
  <?php if ($error): ?>
    <p style="color:#B71C1C;background:#FFEBEE;padding:12px;border-radius:8px;margin-bottom:16px;"><?= h($error) ?></p>
  <?php endif; ?>

  <div class="edit-modal-wrap">
    <div class="edit-modal-header">
      <span class="edit-modal-title">Informations du produit</span>
    </div>
    <form method="POST" action="<?= url('admin', 'createProduct') ?>">
      <div class="edit-modal-body">
        <div class="edit-form-grid">
          <div>
            <label class="edit-label">Nom *</label>
            <input class="edit-input" type="text" name="nom" required value="<?= h($_POST['nom'] ?? '') ?>" placeholder="ex: Tomates cerise">
          </div>
          <div>
            <label class="edit-label">Prix (€) *</label>
            <input class="edit-input" type="number" name="prix" step="0.01" min="0" required value="<?= h($_POST['prix'] ?? '') ?>" placeholder="2.50">
          </div>
          <div>
            <label class="edit-label">Unité</label>
            <input class="edit-input" type="text" name="unite" value="<?= h($_POST['unite'] ?? 'pièce') ?>" placeholder="kg, pièce, sachet…">
          </div>
          <div>
            <label class="edit-label">Catégorie *</label>
            <select class="edit-select" name="categorie_id" required>
              <option value="">— Choisir —</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat->id ?>" <?= (($_POST['categorie_id'] ?? '') == $cat->id) ? 'selected' : '' ?>>
                  <?= h($cat->icone . ' ' . $cat->nom) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label class="edit-label">Saison</label>
            <select class="edit-select" name="saison">
              <?php foreach (['Printemps','Été','Automne','Hiver','Toute saison'] as $s): ?>
                <option value="<?= $s ?>" <?= (($_POST['saison'] ?? 'Toute saison') === $s) ? 'selected' : '' ?>><?= $s ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label class="edit-label">Disponibilité</label>
            <select class="edit-select" name="disponibilite">
              <option value="disponible"   <?= (($_POST['disponibilite'] ?? '') === 'disponible')   ? 'selected' : '' ?>>✅ Disponible</option>
              <option value="sur_commande" <?= (($_POST['disponibilite'] ?? '') === 'sur_commande') ? 'selected' : '' ?>>📅 Sur commande</option>
              <option value="indisponible" <?= (($_POST['disponibilite'] ?? '') === 'indisponible') ? 'selected' : '' ?>>❌ Indisponible</option>
            </select>
          </div>
          <div class="edit-form-full">
            <label class="edit-label">Description</label>
            <textarea class="edit-input" name="description" rows="3" placeholder="Courte description du produit…"><?= h($_POST['description'] ?? '') ?></textarea>
          </div>
          <div class="edit-form-full">
            <label class="edit-label">Image (nom du fichier)</label>
            <input class="edit-input" type="text" name="image" value="<?= h($_POST['image'] ?? 'default.jpg') ?>" placeholder="tomate.jpg">
          </div>
          <div class="edit-form-full">
            <label style="display:flex;align-items:center;gap:8px;font-size:13px;cursor:pointer;">
              <input type="checkbox" name="visible" checked style="width:16px;height:16px;">
              Produit visible sur le site
            </label>
          </div>
        </div>
      </div>
      <div class="edit-modal-footer">
        <a href="<?= url('admin', 'produits') ?>" class="btn-cancel" style="text-decoration:none;">Annuler</a>
        <button type="submit" class="btn-save">✅ Enregistrer le produit</button>
      </div>
    </form>
  </div>
</div>

<?php require __DIR__ . '/../layout/admin_footer.php'; ?>

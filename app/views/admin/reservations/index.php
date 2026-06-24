<?php require __DIR__ . '/../layout/admin_layout.php'; ?>

<div class="main-body">

  <!-- STAT CARDS -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-card-top"><span class="stat-card-icon">⏳</span><span class="stat-card-badge" style="background:#FFF3E0;color:#E65100;">En attente</span></div>
      <div class="stat-card-num"><?= $nbEnAttente ?></div>
      <div class="stat-card-lbl">Réservations en attente</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-top"><span class="stat-card-icon">✅</span><span class="stat-card-badge badge-up">Confirmé</span></div>
      <div class="stat-card-num"><?= $nbConfirme ?></div>
      <div class="stat-card-lbl">Confirmées</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-top"><span class="stat-card-icon">❌</span><span class="stat-card-badge" style="background:#FFEBEE;color:#B71C1C;">Annulé</span></div>
      <div class="stat-card-num"><?= $nbAnnule ?></div>
      <div class="stat-card-lbl">Annulées</div>
    </div>
  </div>

  <!-- TABLE -->
  <div class="section-header">
    <span class="section-title">Toutes les réservations</span>
  </div>

  <?php if (empty($reservations)): ?>
    <p style="color:var(--muted);padding:20px;">Aucune réservation pour le moment.</p>
  <?php else: ?>
  <div style="background:#fff;border-radius:12px;border:1px solid #E8F5E9;overflow:hidden;">
    <table style="width:100%;border-collapse:collapse;font-size:13px;">
      <thead>
        <tr style="background:#F1F8E9;">
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Nom</th>
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Email</th>
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Téléphone</th>
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Date retrait</th>
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Statut</th>
          <th style="padding:12px 16px;text-align:left;font-weight:600;color:var(--text);">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservations as $r): ?>
        <tr style="border-top:1px solid #F1F8E9;">
          <td style="padding:12px 16px;font-weight:500;"><?= h($r->nom) ?></td>
          <td style="padding:12px 16px;color:var(--muted);"><?= h($r->email) ?></td>
          <td style="padding:12px 16px;color:var(--muted);"><?= h($r->telephone ?? '—') ?></td>
          <td style="padding:12px 16px;"><?= h(date('d/m/Y', strtotime($r->date_retrait))) ?></td>
          <td style="padding:12px 16px;">
            <?php if ($r->statut === 'en_attente'): ?>
              <span style="background:#FFF3E0;color:#E65100;padding:3px 10px;border-radius:20px;font-size:12px;">En attente</span>
            <?php elseif ($r->statut === 'confirme'): ?>
              <span style="background:#E8F5E9;color:#2E7D32;padding:3px 10px;border-radius:20px;font-size:12px;">Confirmé</span>
            <?php else: ?>
              <span style="background:#FFEBEE;color:#B71C1C;padding:3px 10px;border-radius:20px;font-size:12px;">Annulé</span>
            <?php endif; ?>
          </td>
          <td style="padding:12px 16px;">
            <div style="display:flex;gap:6px;flex-wrap:wrap;">
              <?php if ($r->statut !== 'confirme'): ?>
                <a href="<?= url('admin', 'confirmReservation', ['id' => $r->id]) ?>"
                   style="background:#E8F5E9;color:#2E7D32;padding:4px 10px;border-radius:6px;text-decoration:none;font-size:12px;">
                  ✅ Confirmer
                </a>
              <?php endif; ?>
              <?php if ($r->statut !== 'annule'): ?>
                <a href="<?= url('admin', 'cancelReservation', ['id' => $r->id]) ?>"
                   style="background:#FFF3E0;color:#E65100;padding:4px 10px;border-radius:6px;text-decoration:none;font-size:12px;"
                   onclick="return confirm('Annuler cette réservation ?')">
                  ❌ Annuler
                </a>
              <?php endif; ?>
              <a href="<?= url('admin', 'deleteReservation', ['id' => $r->id]) ?>"
                 style="background:#FFEBEE;color:#B71C1C;padding:4px 10px;border-radius:6px;text-decoration:none;font-size:12px;"
                 onclick="return confirm('Supprimer définitivement cette réservation ?')">
                🗑
              </a>
            </div>
            <?php if ($r->message): ?>
              <div style="margin-top:6px;color:var(--muted);font-size:11px;max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"
                   title="<?= h($r->message) ?>">
                💬 <?= h($r->message) ?>
              </div>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>

</div>

<?php require __DIR__ . '/../layout/admin_footer.php'; ?>

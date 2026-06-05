<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($title) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>

<div class="login-page">
  <div class="login-deco1"></div>
  <div class="login-deco2"></div>
  <div class="login-card">
    <div class="login-logo">
      <div class="login-logo-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#76FF03" stroke-width="2.5" width="20" height="20">
          <path d="M12 2C6 2 2 8 2 12s4 10 10 10 10-4 10-10S18 2 12 2z"/>
          <path d="M12 2c0 0-4 4-4 10s4 10 4 10"/>
          <path d="M2 12h20"/>
        </svg>
      </div>
      <div>
        <span class="login-logo-text">Mitopie</span>
        <span class="login-logo-sub">Espace administration</span>
      </div>
    </div>

    <div class="login-title">Connexion</div>
    <div class="login-sub">Réservé à la gérante de la ferme</div>

    <?php if ($error): ?>
      <p style="color:#B71C1C;background:#FFEBEE;padding:10px;border-radius:8px;font-size:13px;margin-bottom:16px;">
        ⚠️ <?= h($error) ?>
      </p>
    <?php endif; ?>

    <form method="POST" action="<?= url('admin', 'login') ?>">
      <div class="form-row">
        <label class="form-label">Adresse email</label>
        <div class="form-input-wrap">
          <input class="form-input" type="email" name="email" required
                 placeholder="aurore@mitopie.fr"
                 value="<?= h($_POST['email'] ?? '') ?>">
          <span class="input-icon">📧</span>
        </div>
      </div>
      <div class="form-row">
        <label class="form-label">Mot de passe</label>
        <div class="form-input-wrap">
          <input class="form-input" type="password" name="password" required placeholder="••••••••">
          <span class="input-icon">🔒</span>
        </div>
      </div>
      <button type="submit" class="login-btn">Se connecter →</button>
    </form>

    <div class="login-security">
      <span class="lock-icon">🔒</span>
      Connexion sécurisée · Accès protégé
    </div>
    <a href="<?= url() ?>" class="login-back">← Retour au site</a>
  </div>
</div>

</body>
</html>

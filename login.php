<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zoute Snack – Inloggen</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="assets/css/login.css" />
</head>
<body class="login-page">
 
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-logo">🧂</div>
      <h1 class="login-title">Zoute Snack</h1>
      <p class="login-sub">Beheerdersportaal – log in om verder te gaan</p>
 
      <div class="login-form">
        <div class="form-group">
          <label for="username">Gebruikersnaam</label>
          <input type="text" id="username" class="form-input" placeholder="bijv. admin" autocomplete="username" />
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord</label>
          <div class="password-wrap">
            <input type="password" id="password" class="form-input" placeholder="••••••••" autocomplete="current-password" />
            <button class="toggle-pw" onclick="togglePw()" type="button">👁</button>
          </div>
        </div>
 
        <p id="login-error" class="login-error hidden">❌ Onjuiste inloggegevens. Probeer opnieuw.</p>
 
        <button class="btn-primary full-width login-btn" onclick="doLogin()">Inloggen</button>
        <a href="index.html" class="terug-link">← Terug naar de website</a>
      </div>
    </div>
 
    <div class="login-deco">
      <span>🍟</span>
      <span>🍔</span>
      <span>🌭</span>
      <span>🥤</span>
      <span>🧆</span>
      <span>🍦</span>
    </div>
  </div>
 
  <script>
    const ADMIN_USER = 'admin';
    const ADMIN_PASS = 'zoute123';
 
    function doLogin() {
      const user = document.getElementById('username').value.trim();
      const pass = document.getElementById('password').value;
      const err  = document.getElementById('login-error');
 
      if (user === ADMIN_USER && pass === ADMIN_PASS) {
        sessionStorage.setItem('admin_ingelogd', 'true');
        window.location.href = 'admin.html';
      } else {
        err.classList.remove('hidden');
        document.getElementById('password').value = '';
        document.getElementById('password').focus();
      }
    }
 
    function togglePw() {
      const pw = document.getElementById('password');
      pw.type = pw.type === 'password' ? 'text' : 'password';
    }
 
    ['username','password'].forEach(id => {
      document.getElementById(id).addEventListener('keydown', e => {
        if (e.key === 'Enter') doLogin();
      });
    });
  </script>
</body>
</html>
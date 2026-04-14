<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zoute Snack – Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="assets/css/admin.css" />
</head>
<body>
 
  <!-- ADMIN HEADER -->
  <header>
    <div class="logo">🧂 Zoute Snack <span class="admin-badge">Admin</span></div>
    <nav>
      <a href="#bestellingen" class="nav-link">bestellingen</a>
      <a href="#menu-beheer" class="nav-link">menu beheer</a>
      <a href="#crud-create" class="nav-link">create</a>
      <a href="#crud-update" class="nav-link">update</a>
      <a href="#crud-delete" class="nav-link">delete</a>
    </nav>
    <button class="btn-primary" onclick="uitloggen()">🚪 Uitloggen</button>
  </header>
 
  <!-- STATS -->
  <section id="overzicht" class="admin-section">
    <h2 class="section-title">Dashboard</h2>
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">📦</div>
        <div class="stat-value">0</div>
        <div class="stat-label">Bestellingen vandaag</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">💶</div>
        <div class="stat-value">€0</div>
        <div class="stat-label">Omzet vandaag</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">⏳</div>
        <div class="stat-value" id="stat-wachten">0</div>
        <div class="stat-label">Wachtend</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">✅</div>
        <div class="stat-value" id="stat-klaar">0</div>
        <div class="stat-label">Afgehandeld</div>
      </div>
    </div>
  </section>
 
  <!-- BESTELLINGEN -->
  <section id="bestellingen" class="admin-section dark-section">
    <h2 class="section-title light">📦 Bestellingen</h2>
    <div class="orders-toolbar">
      <select id="filter-status" class="form-input filter-select" onchange="filterOrders()">
        <option value="alle">Alle bestellingen</option>
        <option value="wachtend">Wachtend</option>
        <option value="bezig">Bezig</option>
        <option value="klaar">Klaar</option>
      </select>
    </div>
    <div class="orders-list" id="orders-list"></div>
  </section>
 
 
  <!-- CREATE -->
  <section id="crud-create" class="admin-section crud-section">
    <div class="crud-header create-header">
      <span class="crud-icon">➕</span>
      <div>
        <h2 class="section-title">Create</h2>
        <p class="section-sub">Voeg een nieuw product toe aan het menu</p>
      </div>
    </div>
    <div class="crud-form-grid">
      <div class="crud-field">
        <label>Productnaam</label>
        <input type="text" id="c-naam" class="form-input" placeholder="bijv. Cheese Burger" />
      </div>
      <div class="crud-field">
        <label>Emoji</label>
        <input type="text" id="c-emoji" class="form-input" placeholder="bijv. 🍔" />
      </div>
      <div class="crud-field">
        <label>Beschrijving</label>
        <input type="text" id="c-beschrijving" class="form-input" placeholder="Korte omschrijving" />
      </div>
      <div class="crud-field">
        <label>Prijs (€)</label>
        <input type="number" id="c-prijs" class="form-input" placeholder="bijv. 4.50" step="0.01" min="0" />
      </div>
      <div class="crud-field">
        <label>Categorie</label>
        <select id="c-categorie" class="form-input">
          <option value="Hoofdgerechten">🍔 Hoofdgerechten</option>
          <option value="Bijgerechten">🍟 Bijgerechten</option>
          <option value="Dranken & Desserts">🥤 Dranken & Desserts</option>
        </select>
      </div>
    </div>
    <button class="btn-primary crud-btn" onclick="crudCreate()">➕ Product aanmaken</button>
    <div id="create-result" class="crud-result hidden"></div>
  </section>
 
  <!-- UPDATE -->
  <section id="crud-update" class="admin-section dark-section crud-section">
    <div class="crud-header update-header">
      <span class="crud-icon">✏️</span>
      <div>
        <h2 class="section-title light">Update</h2>
        <p class="section-sub">Wijzig een bestaand product</p>
      </div>
    </div>
    <div class="crud-form-grid">
      <div class="crud-field">
        <label>Selecteer product</label>
        <select id="u-select" class="form-input" onchange="laadProductInForm()">
          <option value="">— Kies een product —</option>
        </select>
      </div>
      <div class="crud-field">
        <label>Nieuwe naam</label>
        <input type="text" id="u-naam" class="form-input" placeholder="Productnaam" />
      </div>
      <div class="crud-field">
        <label>Nieuwe beschrijving</label>
        <input type="text" id="u-beschrijving" class="form-input" placeholder="Beschrijving" />
      </div>
      <div class="crud-field">
        <label>Nieuwe prijs (€)</label>
        <input type="number" id="u-prijs" class="form-input" placeholder="bijv. 5.00" step="0.01" min="0" />
      </div>
      <div class="crud-field">
        <label>Nieuwe categorie</label>
        <select id="u-categorie" class="form-input">
          <option value="Hoofdgerechten">🍔 Hoofdgerechten</option>
          <option value="Bijgerechten">🍟 Bijgerechten</option>
          <option value="Dranken & Desserts">🥤 Dranken & Desserts</option>
        </select>
      </div>
    </div>
    <button class="btn-primary crud-btn" onclick="crudUpdate()">✏️ Product bijwerken</button>
    <div id="update-result" class="crud-result hidden"></div>
  </section>
 
  <!-- DELETE -->
  <section id="crud-delete" class="admin-section crud-section">
    <div class="crud-header delete-header">
      <span class="crud-icon">🗑️</span>
      <div>
        <h2 class="section-title">Delete</h2>
        <p class="section-sub">Verwijder een product uit het menu</p>
      </div>
    </div>
    <div class="delete-select-wrap">
      <div class="crud-field">
        <label>Selecteer product om te verwijderen</label>
        <select id="d-select" class="form-input" onchange="toonDeletePreview()">
          <option value="">— Kies een product —</option>
        </select>
      </div>
      <div id="delete-preview" class="delete-preview hidden">
        <span id="delete-preview-emoji"></span>
        <div>
          <strong id="delete-preview-naam"></strong>
          <span id="delete-preview-prijs"></span>
        </div>
      </div>
    </div>
    <button class="btn-primary crud-btn delete-btn" onclick="crudDelete()">🗑️ Product verwijderen</button>
    <div id="delete-result" class="crud-result hidden"></div>
  </section>
 
  <!-- FOOTER -->
  <footer>
    <div class="footer-inner">
      <div class="footer-brand">🧂 Zoute Snack Admin</div>
      <p>© 2026 Zoute Snack – Beheerderspaneel</p>
      <div class="footer-links">
        <a href="index.html">Terug naar website</a>
      </div>
    </div>
  </footer>
 
  <div id="toast" class="toast"></div>
  <script src="admin.js"></script>
</body>
</html>
 
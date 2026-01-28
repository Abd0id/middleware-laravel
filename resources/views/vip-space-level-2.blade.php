<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP Space - Level 2: Le Contrôleur</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --success: #00FF88;
            --primary: #00AAFF;
            --dark: #0D0D0D;
            --dark-card: #1A1A1A;
            --text: #E0E0E0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Mono', monospace;
            background: var(--dark);
            color: var(--text);
            min-height: 100vh;
            padding: 2rem;
            position: relative;
        }

        /* Success indicator */
        .success-tape {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--success);
            height: 4px;
            z-index: 1000;
            box-shadow: 0 0 10px var(--success);
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            position: relative;
        }

        .level-badge {
            display: inline-block;
            background: var(--success);
            color: var(--dark);
            padding: 0.5rem 1rem;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.5);
        }

        .title {
            font-family: 'Press Start 2P', cursive;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            color: var(--success);
            margin-bottom: 1rem;
            line-height: 1.5;
            text-shadow: 0 0 20px rgba(0, 255, 136, 0.5);
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .improvement-card {
            background: var(--dark-card);
            border: 2px solid var(--success);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .improvement-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .improvement-card h2 {
            font-family: 'Press Start 2P', cursive;
            font-size: 1rem;
            color: var(--success);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .improvement-card p {
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }

        .benefit-item {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--success);
            border-radius: 4px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.3);
        }

        .benefit-item h3 {
            color: var(--success);
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .benefit-item p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .code-comparison {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 2rem 0;
        }

        @media (max-width: 768px) {
            .code-comparison {
                grid-template-columns: 1fr;
            }
        }

        .code-block {
            background: #000;
            border: 2px solid var(--success);
            border-radius: 4px;
            padding: 1.5rem;
            font-family: 'Space Mono', monospace;
            overflow-x: auto;
            position: relative;
        }

        .code-block.old {
            border-color: #FF4444;
            opacity: 0.7;
        }

        .code-label {
            position: absolute;
            top: -10px;
            right: 10px;
            background: var(--dark);
            padding: 0.3rem 0.8rem;
            font-size: 0.7rem;
            font-family: 'Press Start 2P', cursive;
            border-radius: 4px;
        }

        .code-label.old {
            color: #FF4444;
        }

        .code-label.new {
            color: var(--success);
        }

        .code-block pre {
            color: var(--success);
            line-height: 1.6;
        }

        .code-block.old pre {
            color: #FF4444;
        }

        .architecture-diagram {
            background: var(--dark-card);
            border: 2px solid var(--primary);
            border-radius: 8px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
        }

        .architecture-diagram h3 {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.9rem;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .diagram-flow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .diagram-box {
            background: rgba(0, 170, 255, 0.1);
            border: 2px solid var(--primary);
            border-radius: 4px;
            padding: 1rem 1.5rem;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
            color: var(--primary);
        }

        .diagram-arrow {
            color: var(--success);
            font-size: 2rem;
        }

        .next-level-info {
            background: var(--dark-card);
            border: 2px solid var(--primary);
            border-left: 4px solid var(--success);
            border-radius: 8px;
            padding: 2rem;
            margin-top: 2rem;
        }

        .next-level-info h3 {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.9rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 1rem 2rem;
            text-decoration: none;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 0 rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .button.primary {
            background: var(--success);
            color: var(--dark);
        }

        .button.secondary {
            background: transparent;
            border: 2px solid var(--text);
            color: var(--text);
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 0 rgba(0, 0, 0, 0.3);
        }

        .stats-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }

        .stat {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.1);
            border-radius: 4px;
        }

        .stat-value {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.5rem;
            color: var(--success);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="success-tape"></div>

<div class="container">
    <div class="level-badge">NIVEAU 2 - LE CONTRÔLEUR ✓</div>

    <h1 class="title">Bien joué ! 🎉</h1>
    <p class="subtitle">Vous avez amélioré l'architecture</p>

    <div class="stats-bar">
        <div class="stat">
            <span class="stat-value">+50%</span>
            <span class="stat-label">Maintenabilité</span>
        </div>
        <div class="stat">
            <span class="stat-value">+75%</span>
            <span class="stat-label">Testabilité</span>
        </div>
        <div class="stat">
            <span class="stat-value">+60%</span>
            <span class="stat-label">Réutilisabilité</span>
        </div>
    </div>

    <div class="improvement-card">
        <h2>✅ Améliorations apportées</h2>
        <p>En migrant vers un contrôleur, vous avez appliqué le principe de <strong>séparation des responsabilités</strong> (Separation of Concerns).</p>
    </div>

    <div class="code-comparison">
        <div class="code-block old">
            <span class="code-label old">❌ AVANT</span>
            <pre>// routes/web.php
Route::get('/vip-space',
  function () {
    // Logique ici
    // Encore de la logique
    // Encore plus...
    return view('vip');
});</pre>
        </div>

        <div class="code-block new">
            <span class="code-label new">✅ MAINTENANT</span>
            <pre>// routes/web.php
Route::get('/vip-space',
  [VipController::class,
   'index']);

// VipController.php
public function index() {
  return view('vip');
}</pre>
        </div>
    </div>

    <div class="benefits-grid">
        <div class="benefit-item">
            <h3>📦 Organisation</h3>
            <p>Le code est maintenant organisé selon le pattern MVC</p>
        </div>
        <div class="benefit-item">
            <h3>🔄 Réutilisation</h3>
            <p>La logique peut être réutilisée ailleurs dans l'application</p>
        </div>
        <div class="benefit-item">
            <h3>🧪 Tests</h3>
            <p>Les contrôleurs sont faciles à tester unitairement</p>
        </div>
        <div class="benefit-item">
            <h3>📖 Lisibilité</h3>
            <p>Le fichier de routes reste propre et lisible</p>
        </div>
    </div>

    <div class="architecture-diagram">
        <h3>🏗️ Architecture MVC</h3>
        <div class="diagram-flow">
            <div class="diagram-box">Route</div>
            <span class="diagram-arrow">→</span>
            <div class="diagram-box">Controller</div>
            <span class="diagram-arrow">→</span>
            <div class="diagram-box">View</div>
        </div>
        <p style="margin-top: 1.5rem; opacity: 0.8;">Chaque composant a une responsabilité claire</p>
    </div>

    <div class="next-level-info">
        <h3>🔐 Prochaine étape : Sécurité</h3>
        <p>Actuellement, n'importe qui peut accéder à cette page. Il manque une couche de sécurité !</p>
        <br>
        <p>Dans le niveau suivant, vous allez découvrir les <strong>Middlewares</strong> - les gardiens de votre application.</p>
        <br>
        <p>Un middleware intercepte chaque requête <strong>avant</strong> qu'elle n'atteigne le contrôleur et peut :</p>
        <ul style="margin-left: 2rem; margin-top: 1rem; line-height: 2;">
            <li>Vérifier une clé d'accès</li>
            <li>Authentifier l'utilisateur</li>
            <li>Valider des permissions</li>
            <li>Logger les tentatives d'accès</li>
        </ul>
    </div>

    <div class="code-block" style="margin-top: 2rem;">
            <pre>// Aperçu du niveau 3
Route::get('/vip-space', [VipController::class, 'index'])
    ->middleware(CheckVipAccess::class); // 🛡️ Le gardien !

// CheckVipAccess.php
public function handle($request, Closure $next) {
    if ($request->query('key') !== '1234') {
        return redirect('/')->with('error', 'Accès refusé');
    }
    return $next($request);
}</pre>
    </div>

    <div class="button-group">
        <a href="/?progress=2" class="button secondary">← Menu principal</a>
        <a href="#" class="button primary" onclick="alert('Complétez le niveau 3 en ajoutant un middleware !'); return false;">→ Niveau 3: Le Gardien</a>
    </div>
</div>

<script>
    // Animate stats on load
    window.addEventListener('load', () => {
        const stats = document.querySelectorAll('.stat-value');
        stats.forEach((stat, index) => {
            setTimeout(() => {
                stat.style.animation = 'pulse 0.5s ease';
            }, index * 200);
        });
    });

    const style = document.createElement('style');
    style.textContent = `
            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.2); }
            }
        `;
    document.head.appendChild(style);
</script>
</body>
</html>

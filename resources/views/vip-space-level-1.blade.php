<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP Space - Level 1: Route Sale</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --danger: #FF4444;
            --warning: #FFA500;
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

        .warning-tape {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: repeating-linear-gradient(
                45deg,
                var(--danger),
                var(--danger) 10px,
                var(--warning) 10px,
                var(--warning) 20px
            );
            height: 8px;
            z-index: 1000;
            animation: scroll 1s linear infinite;
        }

        @keyframes scroll {
            0% { background-position: 0 0; }
            100% { background-position: 28px 0; }
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            position: relative;
        }

        .level-badge {
            display: inline-block;
            background: var(--danger);
            color: white;
            padding: 0.5rem 1rem;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
            margin-bottom: 2rem;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 49% { opacity: 1; }
            50%, 100% { opacity: 0.5; }
        }

        .title {
            font-family: 'Press Start 2P', cursive;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            color: var(--danger);
            margin-bottom: 1rem;
            line-height: 1.5;
            text-shadow: 3px 3px 0 rgba(255, 68, 68, 0.3);
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--warning);
            margin-bottom: 2rem;
        }

        .warning-box {
            background: var(--dark-card);
            border: 3px solid var(--danger);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .warning-box::before {
            content: '⚠️';
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 3rem;
            opacity: 0.2;
        }

        .warning-box h2 {
            font-family: 'Press Start 2P', cursive;
            font-size: 1rem;
            color: var(--danger);
            margin-bottom: 1rem;
        }

        .warning-box p {
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .warning-list {
            list-style: none;
            margin: 1rem 0;
        }

        .warning-list li {
            padding: 0.5rem 0;
            padding-left: 2rem;
            position: relative;
        }

        .warning-list li::before {
            content: '❌';
            position: absolute;
            left: 0;
        }

        .code-block {
            background: #000;
            border: 2px solid var(--danger);
            border-radius: 4px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            font-family: 'Space Mono', monospace;
            overflow-x: auto;
            box-shadow: inset 0 0 20px rgba(255, 68, 68, 0.2);
        }

        .code-block pre {
            color: var(--danger);
            line-height: 1.6;
        }

        .info-box {
            background: var(--dark-card);
            border: 2px solid var(--warning);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .info-box h3 {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            color: var(--warning);
            margin-bottom: 1rem;
        }

        .next-button {
            display: inline-block;
            margin-top: 2rem;
            padding: 1rem 2rem;
            background: var(--danger);
            color: white;
            text-decoration: none;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 0 rgba(0, 0, 0, 0.3);
        }

        .next-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 0 rgba(0, 0, 0, 0.3);
        }

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            color: var(--text);
            text-decoration: none;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .back-link:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="warning-tape"></div>

<div class="container">
    <div class="level-badge">NIVEAU 1 - ROUTE SALE</div>

    <h1 class="title">Zone VIP Accessible !</h1>
    <p class="subtitle">Mais à quel prix... 🤔</p>

    <div class="warning-box">
        <h2>⚠️ Avertissement de Sécurité</h2>
        <p>Vous avez réussi à accéder à cette page, mais la méthode utilisée présente des problèmes majeurs :</p>

        <ul class="warning-list">
            <li>Logique métier dans le fichier de routes</li>
            <li>Code difficile à tester</li>
            <li>Pas de réutilisation possible</li>
            <li>Maintenance cauchemardesque</li>
            <li>Aucune séparation des responsabilités</li>
        </ul>
    </div>

    <div class="code-block">
            <pre>// 🚨 Ce qui se passe actuellement dans routes/web.php
Route::get('/vip-space', function () {
    return view('vip-space');
});

// ❌ Problème : Tout est mélangé !
// La route fait TROP de choses</pre>
    </div>

    <div class="info-box">
        <h3>💡 Ce que vous devez comprendre :</h3>
        <p>Une route devrait être comme un <strong>panneau de direction</strong> sur l'autoroute. Elle indique où aller, mais elle ne construit pas la destination !</p>
        <br>
        <p>Dans Laravel, les routes doivent simplement <strong>aiguiller</strong> les requêtes vers les contrôleurs qui font le vrai travail.</p>
    </div>

    <div class="code-block">
            <pre>// ✅ Ce qu'on va faire au prochain niveau
Route::get('/vip-space', [VipController::class, 'index']);

// Propre, lisible, maintenable !</pre>
    </div>

    <a href="/?progress=1" class="back-link">← Retour au menu principal</a>
    <br>
    <a href="#" class="next-button" onclick="alert('Complétez d\'abord le niveau 2 en créant un contrôleur !'); return false;">→ Niveau suivant (Verrouillé)</a>
</div>

<script>
    // Add shake effect
    document.querySelectorAll('.warning-box').forEach(box => {
        setInterval(() => {
            box.style.animation = 'shake 0.5s ease';
            setTimeout(() => {
                box.style.animation = '';
            }, 500);
        }, 5000);
    });

    const style = document.createElement('style');
    style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
                20%, 40%, 60%, 80% { transform: translateX(2px); }
            }
        `;
    document.head.appendChild(style);
</script>
</body>
</html>

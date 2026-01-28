<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Quest - Live Coding Challenge</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-color: #0D0D0D;
            color: #E0E0E0;
            font-family: 'Space Mono', monospace;
            overflow-x: hidden;
        }

        /* Animated Grid Background */
        .grid-bg {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 255, 136, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 136, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: grid-scroll 20s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        /* Scanline Effect */
        .scanline {
            position: fixed;
            inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 255, 136, 0.03) 50%);
            background-size: 100% 4px;
            pointer-events: none;
            z-index: 9999;
            animation: scanline 8s linear infinite;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        /* Header */
        header {
            text-align: center;
            margin-bottom: 3rem;
            animation: glitch-in 0.8s ease-out;
        }

        header h1 {
            font-family: 'Press Start 2P', cursive;
            font-size: clamp(1.5rem, 5vw, 3rem);
            color: #00FF88;
            margin-bottom: 1rem;
            line-height: 1.6;
            text-shadow: 0 0 10px #00FF88, 0 0 20px #00FF88, 3px 3px 0 #FF0080;
        }

        header p {
            font-size: 1.25rem;
            color: #FFD700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            animation: blink 2s infinite;
        }

        /* Progress Section */
        .progress-section {
            background: #1A1A1A;
            border: 2px solid #FFD700;
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 3rem;
            animation: slide-in 0.6s ease-out 0.5s both;
        }

        .progress-title {
            font-family: 'Press Start 2P', cursive;
            font-size: 1rem;
            color: #FFD700;
            margin-bottom: 1rem;
            text-align: center;
        }

        .progress-bar-container {
            width: 100%;
            height: 2rem;
            background: #0D0D0D;
            border: 2px solid #00FF88;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(to right, #00FF88, #FF0080);
            transition: width 1s ease-out;
            animation: progress-pulse 2s ease-in-out infinite;
        }

        .progress-text {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.75rem;
            color: white;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        }

        .progress-hint {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.875rem;
            opacity: 0.8;
        }

        /* Quest Cards */
        .quest-grid {
            display: grid;
            gap: 2rem;
        }

        .quest-card {
            position: relative;
            background: #1A1A1A;
            border: 2px solid #444;
            border-radius: 0.5rem;
            padding: 2rem;
            overflow: hidden;
            transition: all 0.3s ease;
            opacity: 0.5;
        }

        .quest-card.unlocked {
            border-color: #00FF88;
            opacity: 1;
        }

        .quest-card.unlocked:hover {
            border-color: #FF0080;
            transform: translateX(10px);
            box-shadow: 0 0 30px rgba(255, 0, 128, 0.3), inset 0 0 30px rgba(255, 0, 128, 0.1);
        }

        .quest-card.animating-unlock {
            animation: card-unlock-full 1s ease-out forwards;
        }

        .quest-card.animating-lock {
            animation: card-lock-full 0.6s ease-out forwards;
        }

        /* Lock Button */
        .lock-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 3rem;
            z-index: 10;
            cursor: pointer;
            background: none;
            border: none;
            transition: all 0.3s ease;
            opacity: 0.5;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
        }

        .lock-btn:hover {
            transform: scale(1.25);
            opacity: 1;
            filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
        }

        .lock-btn:active {
            transform: scale(0.9);
        }

        .quest-card.unlocked .lock-btn {
            opacity: 0.8;
        }

        .lock-btn .lock-icon {
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .lock-btn.shaking .lock-icon {
            animation: lock-shake 0.6s ease-in-out;
        }

        .lock-btn.glowing-unlock {
            animation: unlock-glow-full 1s ease-out;
        }

        .lock-btn.glowing-lock {
            animation: lock-glow-full 0.6s ease-out;
        }

        .lock-btn.bouncing .lock-icon {
            animation: lock-bounce 0.4s ease-out;
        }

        /* Card Content */
        .quest-header {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .quest-header {
                flex-direction: row;
                align-items: flex-start;
            }
        }

        .quest-level {
            font-family: 'Press Start 2P', cursive;
            font-size: 2.5rem;
            min-width: 80px;
            color: #444;
            transition: all 0.5s ease;
        }

        .quest-card.unlocked .quest-level {
            color: #00FF88;
            text-shadow: 0 0 10px #00FF88;
        }

        .quest-level.pop {
            animation: level-pop 0.5s ease-out;
        }

        .quest-info {
            flex: 1;
        }

        .quest-title {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.25rem;
            color: #FF0080;
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .quest-description {
            color: #E0E0E0;
            line-height: 1.6;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .badge-bad {
            background: #FF4444;
            color: white;
        }

        .badge-good {
            background: #00FF88;
            color: #0D0D0D;
        }

        .badge-best,
        .badge-expert {
            background: #FFD700;
            color: #0D0D0D;
        }

        .badge.pulse {
            animation: badge-pulse 0.6s ease-out;
        }

        /* Code Block */
        .code-block {
            background: black;
            border: 1px solid #00FF88;
            border-radius: 4px;
            padding: 1rem;
            font-family: 'Space Mono', monospace;
            font-size: 0.875rem;
            box-shadow: inset 0 0 10px rgba(0, 255, 136, 0.2);
            overflow-x: auto;
            transition: all 0.5s ease;
        }

        .code-block.glow {
            box-shadow: inset 0 0 10px rgba(0, 255, 136, 0.2), 0 0 20px rgba(0, 255, 136, 0.4);
        }

        .code-block code {
            color: #00FF88;
            white-space: pre-wrap;
        }

        /* Stats */
        .quest-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .stat-item.highlight {
            animation: stat-highlight 0.5s ease-out;
        }

        .stat-icon {
            color: #FFD700;
        }

        /* Action Button */
        .quest-btn {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 1rem 2rem;
            border-radius: 4px;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.75rem;
            text-transform: uppercase;
            text-decoration: none;
            background: linear-gradient(to bottom right, #00FF88, #FF0080);
            color: #0D0D0D;
            box-shadow: 0 4px 0 rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            border: none;
        }

        .quest-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 0 rgba(0, 0, 0, 0.3), 0 0 20px #00FF88;
        }

        .quest-btn:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.3);
        }

        .quest-card:not(.unlocked) .quest-btn {
            pointer-events: none;
            opacity: 0.5;
        }

        .quest-btn.reveal {
            animation: btn-reveal 0.5s ease-out;
        }

        /* Reset Button */
        .reset-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
            background: rgba(255, 68, 68, 0.9);
            border: 2px solid #FF4444;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-family: 'Space Mono', monospace;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
            backdrop-filter: blur(4px);
        }

        .reset-btn:hover {
            background: #FF4444;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 68, 68, 0.5);
        }

        .reset-btn:active {
            transform: translateY(0);
        }

        /* ==================== ANIMATIONS ==================== */

        @keyframes grid-scroll {
            0% { transform: translateY(0); }
            100% { transform: translateY(50px); }
        }

        @keyframes scanline {
            0% { transform: translateY(0); }
            100% { transform: translateY(4px); }
        }

        @keyframes glitch-in {
            0% {
                opacity: 0;
                transform: translateY(-20px);
                filter: blur(10px);
            }
            50% {
                transform: translateX(-5px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
                filter: blur(0);
            }
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes blink {
            0%, 49% { opacity: 1; }
            50%, 100% { opacity: 0.3; }
        }

        @keyframes progress-pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Enhanced Lock Shake Animation */
        @keyframes lock-shake {
            0%, 100% { transform: rotate(0deg) scale(1); }
            10% { transform: rotate(-20deg) scale(1.1); }
            20% { transform: rotate(20deg) scale(1.15); }
            30% { transform: rotate(-20deg) scale(1.1); }
            40% { transform: rotate(20deg) scale(1.05); }
            50% { transform: rotate(-15deg) scale(1.1); }
            60% { transform: rotate(15deg) scale(1.05); }
            70% { transform: rotate(-10deg) scale(1); }
            80% { transform: rotate(10deg) scale(1); }
            90% { transform: rotate(-5deg) scale(1); }
        }

        /* Lock Bounce when icon changes */
        @keyframes lock-bounce {
            0% { transform: scale(1); }
            30% { transform: scale(1.4); }
            50% { transform: scale(0.9); }
            70% { transform: scale(1.15); }
            100% { transform: scale(1); }
        }

        /* Full unlock animation for card */
        @keyframes card-unlock-full {
            0% {
                border-color: #444;
                opacity: 0.5;
                box-shadow: none;
            }
            20% {
                border-color: #FFD700;
                box-shadow: 0 0 30px rgba(255, 215, 0, 0.6), inset 0 0 20px rgba(255, 215, 0, 0.2);
            }
            40% {
                border-color: #FFFF00;
                box-shadow: 0 0 50px rgba(255, 255, 0, 0.7), inset 0 0 30px rgba(255, 255, 0, 0.3);
            }
            60% {
                border-color: #00FF88;
                opacity: 1;
                box-shadow: 0 0 60px rgba(0, 255, 136, 0.8), inset 0 0 40px rgba(0, 255, 136, 0.3);
            }
            80% {
                box-shadow: 0 0 40px rgba(0, 255, 136, 0.5), inset 0 0 20px rgba(0, 255, 136, 0.15);
            }
            100% {
                border-color: #00FF88;
                opacity: 1;
                box-shadow: 0 0 15px rgba(0, 255, 136, 0.3);
            }
        }

        /* Lock animation for card */
        @keyframes card-lock-full {
            0% {
                border-color: #00FF88;
                opacity: 1;
                box-shadow: 0 0 15px rgba(0, 255, 136, 0.3);
            }
            30% {
                border-color: #FF4444;
                box-shadow: 0 0 30px rgba(255, 68, 68, 0.5);
            }
            60% {
                border-color: #666;
                box-shadow: 0 0 20px rgba(100, 100, 100, 0.3);
            }
            100% {
                border-color: #444;
                opacity: 0.5;
                box-shadow: none;
            }
        }

        /* Unlock glow on lock button */
        @keyframes unlock-glow-full {
            0% {
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
            }
            25% {
                filter: drop-shadow(0 0 30px rgba(255, 215, 0, 1)) drop-shadow(0 0 60px rgba(255, 215, 0, 0.8));
            }
            50% {
                filter: drop-shadow(0 0 40px rgba(0, 255, 136, 1)) drop-shadow(0 0 80px rgba(0, 255, 136, 0.6));
            }
            75% {
                filter: drop-shadow(0 0 30px rgba(0, 255, 136, 0.8));
            }
            100% {
                filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.4));
            }
        }

        /* Lock glow on lock button */
        @keyframes lock-glow-full {
            0% {
                filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.4));
            }
            30% {
                filter: drop-shadow(0 0 25px rgba(255, 68, 68, 0.8));
            }
            60% {
                filter: drop-shadow(0 0 15px rgba(255, 68, 68, 0.5));
            }
            100% {
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
            }
        }

        /* Level number pop */
        @keyframes level-pop {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        /* Badge pulse */
        @keyframes badge-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.15); box-shadow: 0 0 20px currentColor; }
            100% { transform: scale(1); }
        }

        /* Stat highlight */
        @keyframes stat-highlight {
            0% { transform: translateX(0); opacity: 0.5; }
            50% { transform: translateX(5px); opacity: 1; }
            100% { transform: translateX(0); opacity: 1; }
        }

        /* Button reveal */
        @keyframes btn-reveal {
            0% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Particles container */
        .particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            animation: particle-fly 1s ease-out forwards;
        }

        @keyframes particle-fly {
            0% {
                opacity: 1;
                transform: translate(0, 0) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(var(--tx), var(--ty)) scale(0);
            }
        }
    </style>
</head>
<body>
<div class="grid-bg"></div>
<div class="scanline"></div>

<div class="container">
    <header>
        <h1>Laravel Quest</h1>
        <p>&#9654; Live Coding Challenge &#9664;</p>
    </header>

    <section class="progress-section">
        <div class="progress-title">&#127918; Progression Globale</div>
        <div class="progress-bar-container">
            <div class="progress-bar" id="progressBar" style="width: 0%"></div>
            <div class="progress-text" id="progressText">NIVEAU 0 / 4</div>
        </div>
        <p class="progress-hint">&#128161; Astuce : Cliquez sur les cadenas pour (de)verrouiller les niveaux pendant votre live coding !</p>
    </section>

    <div class="quest-grid" id="questGrid"></div>
</div>

<button class="reset-btn" id="resetBtn" title="Reinitialiser toute la progression">&#128260; Reset</button>

<script>
    const questLevels = [
        {
            level: 1,
            title: "La Route Sale",
            description: "Creer une route rapide avec une fonction anonyme (Closure)",
            badgeType: "bad",
            badgeText: "Mauvaise Pratique",
            code: [
                "Route::get('/vip-space', function () {",
                "  return \"Acces direct !\";",
                "});"
            ],
            stats: [
                { icon: "&#9889;", text: "Rapide mais sale" },
                { icon: "&#128221;", text: "Code difficile a maintenir" },
                { icon: "&#127919;", text: "Competence: Routes de base" }
            ],
            href: "/vip-space-level-1",
            buttonText: "Commencer le niveau"
        },
        {
            level: 2,
            title: "Le Controleur",
            description: "Migration vers une architecture propre avec controleur",
            badgeType: "good",
            badgeText: "Bonne Pratique",
            code: [
                "Route::get('/vip-space-level-2',",
                "  [VipController::class, 'index']);"
            ],
            stats: [
                { icon: "&#127959;", text: "Architecture MVC" },
                { icon: "&#9851;", text: "Code reutilisable" },
                { icon: "&#127919;", text: "Competence: Controleurs" }
            ],
            href: "/vip-space-level-2?step=controller",
            buttonText: "Niveau Verrouille"
        },
        {
            level: 3,
            title: "Le Gardien",
            description: "Ajouter un middleware pour securiser l'acces",
            badgeType: "best",
            badgeText: "Meilleure Pratique",
            code: [
                "Route::get('/vip-space-level-3', ...)",
                "  ->middleware(CheckVipAccess::class);"
            ],
            stats: [
                { icon: "&#128737;", text: "Securite renforcee" },
                { icon: "&#128272;", text: "Authentification" },
                { icon: "&#127919;", text: "Competence: Middleware" }
            ],
            href: "/vip-space-level-3?step=middleware&key=1234",
            buttonText: "Niveau Verrouille"
        },
        {
            level: 4,
            title: "Le Systeme Complet",
            description: "Systeme complet avec toutes les bonnes pratiques",
            badgeType: "expert",
            badgeText: "Expert Laravel",
            code: [
                "// Route propre",
                "// Controleur organise",
                "// Middleware de securite",
                "// Vue elegante"
            ],
            stats: [
                { icon: "&#10024;", text: "Code production-ready" },
                { icon: "&#128640;", text: "Optimise & Securise" },
                { icon: "&#127919;", text: "Maitrise complete" }
            ],
            href: "/vip-space?step=complete&key=1234",
            buttonText: "Niveau Verrouille"
        }
    ];

    let unlockedLevels = JSON.parse(localStorage.getItem('laravelQuestProgress') || '[]');

    function saveProgress() {
        localStorage.setItem('laravelQuestProgress', JSON.stringify(unlockedLevels));
    }

    function updateProgressBar() {
        var level = unlockedLevels.length;
        const progress = (unlockedLevels.length / 4) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
        document.getElementById('progressText').textContent = `NIVEAU ${unlockedLevels.length} / 4`;
    }

    // New helper to update all links dynamically
    function updateAllQuestLinks() {
        const currentProgress = unlockedLevels.length;

        document.querySelectorAll('.quest-card').forEach(card => {
            const level = parseInt(card.dataset.level);
            const quest = questLevels.find(q => q.level === level);
            const btn = card.querySelector('.quest-btn');

            if (quest && btn) {
                const separator = quest.href.includes('?') ? '&' : '?';
                btn.href = `${quest.href}${separator}level=${currentProgress}`;
            }
        });
    }

    function createParticles(card, color) {
        const particlesContainer = document.createElement('div');
        particlesContainer.className = 'particles';
        card.appendChild(particlesContainer);

        for (let i = 0; i < 12; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.background = color;
            particle.style.left = '50%';
            particle.style.top = '50%';
            particle.style.setProperty('--tx', (Math.random() - 0.5) * 200 + 'px');
            particle.style.setProperty('--ty', (Math.random() - 0.5) * 200 + 'px');
            particle.style.animationDelay = Math.random() * 0.2 + 's';
            particlesContainer.appendChild(particle);
        }

        setTimeout(() => particlesContainer.remove(), 1200);
    }

    function createQuestCard(quest, index) {
        const isUnlocked = unlockedLevels.includes(quest.level);
        const card = document.createElement('div');
        card.className = `quest-card ${isUnlocked ? 'unlocked' : ''}`;
        card.style.animation = `slide-in 0.6s ease-out ${index * 0.1}s both`;
        card.dataset.level = quest.level;

        // Calculate initial link state
        const currentProgress = unlockedLevels.length;
        const separator = quest.href.includes('?') ? '&' : '?';
        const initialHref = `${quest.href}${separator}level=${currentProgress}`;

        card.innerHTML = `
                <button class="lock-btn" title="Cliquer pour (de)verrouiller ce niveau">
                    <span class="lock-icon">${isUnlocked ? '&#128275;' : '&#128274;'}</span>
                </button>
                <div class="quest-header">
                    <div class="quest-level">${String(quest.level).padStart(2, '0')}</div>
                    <div class="quest-info">
                        <h2 class="quest-title">${quest.title}</h2>
                        <p class="quest-description">${quest.description}</p>
                        <span class="badge badge-${quest.badgeType}">${quest.badgeText}</span>
                    </div>
                </div>
                <div class="code-block">
                    <code>${quest.code.join('\n')}</code>
                </div>
                <div class="quest-stats">
                    ${quest.stats.map(stat => `
                        <div class="stat-item">
                            <span class="stat-icon">${stat.icon}</span>
                            <span>${stat.text}</span>
                        </div>
                    `).join('')}
                </div>
                <a href="${initialHref}" class="quest-btn">
                    &#8594; ${isUnlocked ? 'Acceder au niveau' : quest.buttonText} &#8592;
                </a>
            `;

        const lockBtn = card.querySelector('.lock-btn');
        const lockIcon = card.querySelector('.lock-icon');
        const questLevel = card.querySelector('.quest-level');
        const badge = card.querySelector('.badge');
        const codeBlock = card.querySelector('.code-block');
        const questBtn = card.querySelector('.quest-btn');
        const statItems = card.querySelectorAll('.stat-item');

        let isAnimating = false;

        lockBtn.addEventListener('click', function(e) {
            e.preventDefault();

            if (isAnimating) return;
            isAnimating = true;

            const currentlyUnlocked = unlockedLevels.includes(quest.level);

            // Start shake animation
            lockBtn.classList.add('shaking');

            if (currentlyUnlocked) {
                // LOCKING: Red glow, then lock
                lockBtn.classList.add('glowing-lock');
                card.classList.add('animating-lock');

                setTimeout(() => {
                    lockIcon.innerHTML = '&#128274;';
                    lockBtn.classList.add('bouncing');
                }, 300);

                setTimeout(() => {
                    unlockedLevels = unlockedLevels.filter(l => l !== quest.level);
                    saveProgress();
                    updateProgressBar();
                    updateAllQuestLinks(); // Update all links immediately

                    card.classList.remove('unlocked');
                    questBtn.innerHTML = `&#8594; ${quest.buttonText} &#8592;`;
                }, 400);

                setTimeout(() => {
                    lockBtn.classList.remove('shaking', 'glowing-lock', 'bouncing');
                    card.classList.remove('animating-lock');
                    isAnimating = false;
                }, 700);

            } else {
                // UNLOCKING: Golden to green glow with particles
                lockBtn.classList.add('glowing-unlock');
                card.classList.add('animating-unlock');

                // Change icon partway through
                setTimeout(() => {
                    lockIcon.innerHTML = '&#128275;';
                    lockBtn.classList.add('bouncing');
                    createParticles(card, '#00FF88');
                }, 400);

                // Add cascading element animations
                setTimeout(() => {
                    questLevel.classList.add('pop');
                    codeBlock.classList.add('glow');
                }, 500);

                setTimeout(() => {
                    badge.classList.add('pulse');
                }, 600);

                setTimeout(() => {
                    statItems.forEach((item, i) => {
                        setTimeout(() => item.classList.add('highlight'), i * 80);
                    });
                }, 650);

                setTimeout(() => {
                    questBtn.classList.add('reveal');
                }, 800);

                // Update state
                setTimeout(() => {
                    unlockedLevels.push(quest.level);
                    unlockedLevels.sort((a, b) => a - b);
                    saveProgress();
                    updateProgressBar();
                    updateAllQuestLinks(); // Update all links immediately

                    card.classList.add('unlocked');
                    questBtn.innerHTML = `&#8594; Acceder au niveau &#8592;`;
                }, 500);

                // Cleanup
                setTimeout(() => {
                    lockBtn.classList.remove('shaking', 'glowing-unlock', 'bouncing');
                    card.classList.remove('animating-unlock');
                    questLevel.classList.remove('pop');
                    badge.classList.remove('pulse');
                    codeBlock.classList.remove('glow');
                    statItems.forEach(item => item.classList.remove('highlight'));
                    questBtn.classList.remove('reveal');
                    isAnimating = false;
                }, 1100);
            }
        });

        return card;
    }

    function renderQuests() {
        const grid = document.getElementById('questGrid');
        grid.innerHTML = '';
        questLevels.forEach((quest, index) => {
            grid.appendChild(createQuestCard(quest, index));
        });
        updateProgressBar();
    }

    document.getElementById('resetBtn').addEventListener('click', function() {
        if (confirm('Reinitialiser toute la progression ?')) {
            unlockedLevels = [];
            saveProgress();
            renderQuests();
        }
    });

    // Initial render
    renderQuests();
</script>
</body>
</html>

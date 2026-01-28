<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP Space - Level 4: Système Complet 🏆</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Cormorant+Garamond:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --gold: #D4AF37;
            --dark: #0A0A0A;
            --dark-lighter: #1A1A1A;
            --gold-light: #F4E4B7;
            --shadow: rgba(212, 175, 55, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cormorant Garamond', serif;
            background: var(--dark);
            color: var(--gold-light);
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Animated Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(212, 175, 55, 0.03) 0%, transparent 50%);
            pointer-events: none;
            animation: backgroundPulse 15s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Decorative Corner Elements */
        .corner-decoration {
            position: fixed;
            width: 200px;
            height: 200px;
            border: 1px solid var(--gold);
            opacity: 0.3;
            pointer-events: none;
            z-index: 1;
        }

        .corner-decoration.top-left {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            animation: cornerGlowTL 3s ease-in-out infinite;
        }

        .corner-decoration.bottom-right {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            animation: cornerGlowBR 3s ease-in-out infinite 1.5s;
        }

        @keyframes cornerGlowTL {
            0%, 100% { box-shadow: -10px -10px 30px var(--shadow); }
            50% { box-shadow: -5px -5px 15px var(--shadow); }
        }

        @keyframes cornerGlowBR {
            0%, 100% { box-shadow: 10px 10px 30px var(--shadow); }
            50% { box-shadow: 5px 5px 15px var(--shadow); }
        }

        /* Main Container */
        .container {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            z-index: 2;
        }

        /* VIP Badge */
        .vip-badge {
            width: 120px;
            height: 120px;
            margin-bottom: 2rem;
            position: relative;
            animation: fadeInScale 1s ease-out;
        }

        .vip-badge svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 0 20px var(--shadow));
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Main Title */
        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 10vw, 7rem);
            font-weight: 900;
            text-align: center;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 50%, var(--gold) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
            line-height: 1.1;
            animation: fadeInUp 1s ease-out 0.2s both;
            text-shadow: 0 0 60px var(--shadow);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Subtitle */
        .subtitle {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            font-weight: 300;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--gold-light);
            letter-spacing: 0.3em;
            text-transform: uppercase;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        /* Content Card */
        .vip-card {
            background: linear-gradient(135deg, var(--dark-lighter) 0%, rgba(26, 26, 26, 0.8) 100%);
            border: 1px solid var(--gold);
            border-radius: 4px;
            padding: 3rem;
            max-width: 600px;
            width: 100%;
            box-shadow: 
                0 0 60px rgba(212, 175, 55, 0.1),
                inset 0 1px 0 rgba(212, 175, 55, 0.1);
            animation: fadeInUp 1s ease-out 0.6s both;
            position: relative;
            overflow: hidden;
        }

        .vip-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .vip-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .vip-card p {
            font-size: 1.2rem;
            line-height: 1.8;
            color: var(--gold-light);
            text-align: center;
            margin-bottom: 1rem;
        }

        /* Features List */
        .features {
            margin-top: 2rem;
            display: grid;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(212, 175, 55, 0.05);
            border-left: 2px solid var(--gold);
            transition: all 0.3s ease;
            animation: fadeInLeft 0.6s ease-out both;
        }

        .feature-item:nth-child(1) { animation-delay: 0.8s; }
        .feature-item:nth-child(2) { animation-delay: 1s; }
        .feature-item:nth-child(3) { animation-delay: 1.2s; }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .feature-item:hover {
            background: rgba(212, 175, 55, 0.1);
            border-left-width: 4px;
            padding-left: 1.5rem;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            color: var(--gold);
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 1.1rem;
            color: var(--gold-light);
        }

        /* Access Info */
        .access-info {
            margin-top: 3rem;
            padding: 1.5rem;
            background: rgba(212, 175, 55, 0.1);
            border: 1px dashed var(--gold);
            border-radius: 4px;
            text-align: center;
            animation: fadeInUp 1s ease-out 1.4s both;
        }

        .access-info strong {
            color: var(--gold);
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--gold);
            border-radius: 50%;
            animation: float 10s infinite ease-in-out;
            opacity: 0;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 0.6;
            }
            50% {
                transform: translateY(-100vh) translateX(50px);
                opacity: 0.3;
            }
            90% {
                opacity: 0.2;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .vip-card {
                padding: 2rem;
            }

            .corner-decoration {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <!-- Corner Decorations -->
    <div class="corner-decoration top-left"></div>
    <div class="corner-decoration bottom-right"></div>

    <!-- Floating Particles -->
    <div class="particles">
        @for ($i = 0; $i < 20; $i++)
            <div class="particle" style="
                left: {{ rand(0, 100) }}%;
                animation-delay: {{ rand(0, 1000) / 100 }}s;
                animation-duration: {{ rand(8, 15) }}s;
            "></div>
        @endfor
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Level 4 Badge -->
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="display: inline-block; background: linear-gradient(135deg, #D4AF37, #FFD700); color: #0A0A0A; padding: 0.5rem 1.5rem; font-family: 'Press Start 2P', cursive; font-size: 0.7rem; border-radius: 4px; box-shadow: 0 0 30px rgba(212, 175, 55, 0.8);">
                🏆 NIVEAU 4 - SYSTÈME COMPLET 🏆
            </div>
        </div>
        
        <!-- VIP Badge -->
        <div class="vip-badge">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="48" fill="none" stroke="#D4AF37" stroke-width="1.5"/>
                <circle cx="50" cy="50" r="42" fill="none" stroke="#D4AF37" stroke-width="0.5"/>
                <polygon points="50,20 55,40 75,40 60,52 65,72 50,60 35,72 40,52 25,40 45,40" fill="#D4AF37"/>
                <text x="50" y="90" font-family="Playfair Display, serif" font-size="12" font-weight="700" fill="#D4AF37" text-anchor="middle">VIP</text>
            </svg>
        </div>

        <!-- Main Title -->
        <h1 class="main-title">Félicitations !</h1>
        
        <!-- Subtitle -->
        <p class="subtitle">Maître Laravel</p>

        <!-- VIP Card -->
        <div class="vip-card">
            <h2>🎉 Parcours Terminé avec Succès</h2>
            <p>Vous avez complété tous les niveaux et maîtrisé l'architecture Laravel professionnelle !</p>
            <p>De la route basique au système complet sécurisé, vous avez progressé à travers chaque étape.</p>

            <!-- Features -->
            <div class="features">
                <div class="feature-item">
                    <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="feature-text"><strong>Niveau 1 :</strong> Route avec Closure (Mauvaise pratique)</span>
                </div>
                <div class="feature-item">
                    <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="feature-text"><strong>Niveau 2 :</strong> Migration vers Contrôleur (Bonne pratique)</span>
                </div>
                <div class="feature-item">
                    <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="feature-text"><strong>Niveau 3 :</strong> Protection par Middleware (Meilleure pratique)</span>
                </div>
                <div class="feature-item">
                    <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="feature-text"><strong>Niveau 4 :</strong> Système Complet Production-Ready</span>
                </div>
            </div>

            <!-- Access Info -->
            <div class="access-info">
                <strong>🎓 Compétences Acquises :</strong><br>
                ✅ Architecture MVC propre<br>
                ✅ Séparation des responsabilités<br>
                ✅ Sécurisation avec Middleware<br>
                ✅ Code maintenable et testable<br>
                ✅ Bonnes pratiques Laravel
            </div>
            
            <div style="text-align: center; margin-top: 2rem; padding: 1.5rem; background: rgba(212, 175, 55, 0.15); border-radius: 4px;">
                <p style="font-size: 1.1rem; margin-bottom: 1rem;">Vous êtes maintenant prêt pour des projets Laravel professionnels ! 🚀</p>
                <a href="/" style="display: inline-block; margin-top: 1rem; padding: 1rem 2rem; background: var(--gold); color: var(--dark); text-decoration: none; font-weight: 700; border-radius: 4px; transition: all 0.3s ease;">← Retour au menu</a>
            </div>
        </div>
    </div>

    <script>
        // Add subtle parallax effect to particles on mouse move
        document.addEventListener('mousemove', (e) => {
            const particles = document.querySelectorAll('.particle');
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            particles.forEach((particle, index) => {
                const speed = (index % 3 + 1) * 10;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;
                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });

        // Add subtle glow effect on card hover
        const card = document.querySelector('.vip-card');
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    </script>
</body>
</html>

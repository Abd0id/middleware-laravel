<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP Space - Level 3: Le Gardien</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --shield: #00D4FF;
            --success: #00FF88;
            --gold: #FFD700;
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

        /* Secure indicator */
        .secure-border {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 3px solid var(--shield);
            pointer-events: none;
            z-index: 1000;
            animation: glow 2s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { 
                box-shadow: inset 0 0 20px var(--shield), 
                            0 0 20px var(--shield); 
            }
            50% { 
                box-shadow: inset 0 0 40px var(--shield), 
                            0 0 40px var(--shield); 
            }
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            position: relative;
        }

        .level-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--shield), var(--success));
            color: var(--dark);
            padding: 0.5rem 1rem;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .shield-icon {
            font-size: 4rem;
            text-align: center;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .title {
            font-family: 'Press Start 2P', cursive;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            color: var(--shield);
            margin-bottom: 1rem;
            line-height: 1.5;
            text-align: center;
            text-shadow: 0 0 30px rgba(0, 212, 255, 0.8);
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--success);
            margin-bottom: 3rem;
            text-align: center;
        }

        .security-card {
            background: var(--dark-card);
            border: 2px solid var(--shield);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .security-card::before {
            content: '🛡️';
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 8rem;
            opacity: 0.05;
        }

        .security-card h2 {
            font-family: 'Press Start 2P', cursive;
            font-size: 1rem;
            color: var(--shield);
            margin-bottom: 1.5rem;
        }

        .middleware-flow {
            background: #000;
            border: 2px solid var(--shield);
            border-radius: 8px;
            padding: 2rem;
            margin: 2rem 0;
        }

        .flow-title {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.9rem;
            color: var(--gold);
            margin-bottom: 2rem;
            text-align: center;
        }

        .flow-steps {
            display: grid;
            gap: 1rem;
        }

        .flow-step {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(0, 212, 255, 0.1);
            border-left: 3px solid var(--shield);
            transition: all 0.3s ease;
            animation: slideIn 0.6s ease both;
        }

        .flow-step:nth-child(1) { animation-delay: 0.1s; }
        .flow-step:nth-child(2) { animation-delay: 0.2s; }
        .flow-step:nth-child(3) { animation-delay: 0.3s; }
        .flow-step:nth-child(4) { animation-delay: 0.4s; }
        .flow-step:nth-child(5) { animation-delay: 0.5s; }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .flow-step:hover {
            background: rgba(0, 212, 255, 0.2);
            transform: translateX(10px);
        }

        .step-number {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.5rem;
            color: var(--shield);
            min-width: 50px;
        }

        .step-content h3 {
            color: var(--success);
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .step-content p {
            opacity: 0.9;
            line-height: 1.6;
        }

        .code-block {
            background: #000;
            border: 2px solid var(--success);
            border-radius: 4px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            font-family: 'Space Mono', monospace;
            overflow-x: auto;
            box-shadow: inset 0 0 20px rgba(0, 255, 136, 0.1);
        }

        .code-block pre {
            color: var(--success);
            line-height: 1.8;
        }

        .code-comment {
            color: #888;
        }

        .security-benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }

        .benefit-card {
            background: rgba(0, 212, 255, 0.1);
            border: 2px solid var(--shield);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            background: rgba(0, 212, 255, 0.2);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.3);
        }

        .benefit-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .benefit-card h3 {
            color: var(--shield);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .benefit-card p {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .final-level-teaser {
            background: linear-gradient(135deg, var(--dark-card), rgba(255, 215, 0, 0.1));
            border: 3px solid var(--gold);
            border-radius: 8px;
            padding: 2rem;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
        }

        .final-level-teaser::before {
            content: '🏆';
            position: absolute;
            top: -30px;
            right: -30px;
            font-size: 10rem;
            opacity: 0.1;
        }

        .final-level-teaser h2 {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.2rem;
            color: var(--gold);
            margin-bottom: 1.5rem;
            text-shadow: 0 0 20px var(--gold);
        }

        .completion-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
            text-align: center;
        }

        .stat {
            background: rgba(255, 215, 0, 0.1);
            border: 2px solid var(--gold);
            border-radius: 4px;
            padding: 1rem;
        }

        .stat-value {
            font-family: 'Press Start 2P', cursive;
            font-size: 2rem;
            color: var(--gold);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
            justify-content: center;
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
            text-align: center;
        }

        .button.gold {
            background: var(--gold);
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

        .key-display {
            background: rgba(0, 212, 255, 0.2);
            border: 2px dashed var(--shield);
            border-radius: 8px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: center;
        }

        .key-display code {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.2rem;
            color: var(--shield);
            background: var(--dark);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            display: inline-block;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="secure-border"></div>

    <div class="container">
        <div class="level-badge">NIVEAU 3 - LE GARDIEN 🛡️</div>
        
        <div class="shield-icon">🛡️</div>
        
        <h1 class="title">Zone Sécurisée !</h1>
        <p class="subtitle">Protection par Middleware activée</p>

        <div class="security-card">
            <h2>🔐 Système de sécurité opérationnel</h2>
            <p style="line-height: 1.8;">Félicitations ! Vous avez franchi le <strong>Middleware</strong> - le gardien invisible de votre application Laravel. Cette couche de sécurité intercepte et valide chaque requête avant qu'elle n'atteigne votre contrôleur.</p>
        </div>

        <div class="key-display">
            <p>✅ Accès autorisé avec la clé :</p>
            <code>?key=1234</code>
            <p style="margin-top: 1rem; opacity: 0.8;">Sans cette clé, vous seriez redirigé vers l'accueil</p>
        </div>

        <div class="middleware-flow">
            <div class="flow-title">🔄 Flux de Requête avec Middleware</div>
            <div class="flow-steps">
                <div class="flow-step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3>Requête entrante</h3>
                        <p>L'utilisateur tente d'accéder à /vip-space</p>
                    </div>
                </div>
                <div class="flow-step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3>Interception Middleware</h3>
                        <p>CheckVipAccess intercepte la requête</p>
                    </div>
                </div>
                <div class="flow-step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3>Vérification</h3>
                        <p>Le middleware vérifie la présence du paramètre 'key'</p>
                    </div>
                </div>
                <div class="flow-step">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <h3>Décision</h3>
                        <p>Clé valide ? → Continue | Clé invalide ? → Redirect</p>
                    </div>
                </div>
                <div class="flow-step">
                    <div class="step-number">05</div>
                    <div class="step-content">
                        <h3>Contrôleur & Vue</h3>
                        <p>Si autorisé, la requête atteint le contrôleur</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="code-block">
            <pre><span class="code-comment">// app/Http/Middleware/CheckVipAccess.php</span>
public function handle($request, Closure $next)
{
    <span class="code-comment">// Vérification de la clé d'accès</span>
    if ($request->query('key') !== '1234') {
        return redirect('/')
            ->with('error', 'Accès refusé !');
    }
    
    <span class="code-comment">// Autoriser la requête à continuer</span>
    return $next($request);
}

<span class="code-comment">// routes/web.php</span>
Route::get('/vip-space', [VipController::class, 'index'])
    ->middleware(CheckVipAccess::class);</pre>
        </div>

        <div class="security-benefits">
            <div class="benefit-card">
                <div class="benefit-icon">🔒</div>
                <h3>Contrôle d'accès</h3>
                <p>Validation avant traitement</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🧩</div>
                <h3>Réutilisable</h3>
                <p>Applicable à plusieurs routes</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <h3>Performance</h3>
                <p>Bloque avant le contrôleur</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🎯</div>
                <h3>Séparation</h3>
                <p>Logique de sécurité isolée</p>
            </div>
        </div>

        <div class="final-level-teaser">
            <h2>🏆 Niveau Final : Le Système Complet</h2>
            <p style="line-height: 1.8; margin-bottom: 2rem;">Vous avez maintenant maîtrisé les trois piliers d'une application Laravel professionnelle. Le niveau final combine tout ce que vous avez appris dans un système complet et production-ready.</p>

            <div class="completion-stats">
                <div class="stat">
                    <span class="stat-value">100%</span>
                    <span class="stat-label">Architecture</span>
                </div>
                <div class="stat">
                    <span class="stat-value">100%</span>
                    <span class="stat-label">Sécurité</span>
                </div>
                <div class="stat">
                    <span class="stat-value">100%</span>
                    <span class="stat-label">Best Practices</span>
                </div>
            </div>

            <div class="code-block">
                <pre><span class="code-comment">// Niveau 4 : Tout ensemble !</span>
✅ Routes propres et organisées
✅ Contrôleurs avec logique métier
✅ Middlewares pour la sécurité
✅ Vues élégantes et responsive
✅ Gestion d'erreurs appropriée
✅ Code documenté et testable</pre>
            </div>
        </div>

        <div class="button-group">
            <a href="/?progress=3" class="button secondary">← Menu principal</a>
            <a href="/vip-space?step=complete&key=1234" class="button gold">→ Niveau Final 🏆</a>
        </div>
    </div>

    <script>
        // Animate shield
        const shield = document.querySelector('.shield-icon');
        setInterval(() => {
            shield.style.animation = 'none';
            setTimeout(() => {
                shield.style.animation = 'float 3s ease-in-out infinite, pulse 2s ease-in-out infinite';
            }, 10);
        }, 6000);
    </script>
</body>
</html>

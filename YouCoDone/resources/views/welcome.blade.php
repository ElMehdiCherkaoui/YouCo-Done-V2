@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lora:wght@400;500;600&display=swap');

    * {
        font-family: 'Lora', serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
    }

    .gradient-dark {
        background: linear-gradient(135deg, #1a1a2e 0%, #252540 100%);
    }

    .gradient-accent-light {
        background: linear-gradient(135deg, #faf8f3 0%, #f5f1ea 100%);
    }

    /* Animated floating backgrounds */
    .float-1::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(212, 165, 116, 0.15) 0%, transparent 70%);
        top: -200px;
        right: -200px;
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .float-2::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(212, 165, 116, 0.1) 0%, transparent 70%);
        bottom: -100px;
        left: -100px;
        border-radius: 50%;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(30px); }
    }

    /* Gradient text accent */
    .text-accent-gold {
        color: #d4a574;
    }

    /* Underline animation */
    .underline-accent::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: #d4a574;
        margin: 15px auto 0;
    }

    /* Card hover animation */
    .card-hover {
        transition: all 0.4s ease;
    }

    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
    }

    /* Feature card shine effect */
    .feature-shine::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(212, 165, 116, 0.15), transparent);
        transition: left 0.6s ease;
    }

    .feature-shine:hover::before {
        left: 100%;
    }

    /* Button animations */
    .btn-primary {
        background: #d4a574;
        color: #1a1a2e;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(212, 165, 116, 0.4);
    }

    .btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid #d4a574;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #d4a574;
        color: #1a1a2e;
        transform: translateY(-3px);
    }

    /* Image animations */
    .image-slide-in {
        animation: slideIn 0.8s ease 0.2s backwards;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Staggered animations */
    .animate-delay-1 { animation-delay: 0.1s; }
    .animate-delay-2 { animation-delay: 0.2s; }
    .animate-delay-3 { animation-delay: 0.3s; }

    .fade-in-up {
        animation: fadeInUp 0.6s ease both;
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

    .text-appear {
        animation: textAppear 0.8s ease forwards;
    }

    @keyframes textAppear {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Accent underline */
    .accent-underline::after {
        content: '';
        display: block;
        width: 0;
        height: 4px;
        background: #d4a574;
        animation: lineGrow 0.8s ease 0.3s forwards;
    }

    @keyframes lineGrow {
        from { width: 0; }
        to { width: 100%; }
    }

    /* Step number hover */
    .step-hover {
        transition: all 0.3s ease;
    }

    .step-hover:hover {
        transform: scale(1.1);
    }

    /* Testimonial glass effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(212, 165, 116, 0.2);
        transition: all 0.4s ease;
    }

    .glass-card:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(212, 165, 116, 0.4);
        transform: translateY(-5px);
    }

    /* Badge animation */
    .badge-animate {
        animation: badgeFloat 0.8s ease 0.4s both;
    }

    @keyframes badgeFloat {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hide-mobile {
            display: none;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="gradient-dark text-white min-h-screen flex items-center relative overflow-hidden float-1 float-2">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center relative z-10">
            <!-- Hero Text -->
            <div class="text-appear">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Trouvez votre <span class="text-accent-gold inline-block">restaurant <br>parfait</span>
                </h1>
                <p class="text-lg md:text-xl text-purple-100 mb-10 leading-relaxed font-light">
                    Explorez les meilleures tables de votre région. Réservez en quelques clics et vivez une expérience gastronomique inoubliable.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 flex-wrap">
                    <a href="/restaurants" class="btn-primary px-8 py-4 font-bold rounded-lg text-center transition uppercase tracking-widest text-sm">
                        Découvrir les Restaurants
                    </a>
                    <a href="/register" class="btn-secondary px-8 py-4 font-bold rounded-lg text-center transition uppercase tracking-widest text-sm">
                        S'inscrire Gratuitement
                    </a>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="hidden lg:block relative">
                <div class="image-slide-in">
                    <div class="rounded-3xl overflow-hidden shadow-2xl relative h-96 md:h-full">
                        <img 
                            src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=800&h=800&fit=crop" 
                            alt="Restaurant dining" 
                            class="w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 bg-gradient-to-tr from-black/40 to-transparent pointer-events-none"></div>
                        <div class="absolute bottom-8 left-8 bg-accent-300 text-slate-900 px-6 py-3 rounded-lg font-bold shadow-lg badge-animate">
                            Premium Restaurants
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS SECTION -->
<section class="gradient-accent-light py-20 md:py-32 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-20">
            <!-- Stat 1 -->
            <div class="text-center fade-in-up">
                <div class="text-6xl md:text-7xl font-bold text-slate-900 mb-3">500+</div>
                <p class="text-xl md:text-2xl text-slate-800 font-semibold mb-2">Restaurants Partenaires</p>
                <p class="text-slate-600">Sélectionnés avec soin</p>
            </div>

            <!-- Stat 2 -->
            <div class="text-center fade-in-up animate-delay-1">
                <div class="text-6xl md:text-7xl font-bold text-slate-900 mb-3">50K+</div>
                <p class="text-xl md:text-2xl text-slate-800 font-semibold mb-2">Clients Satisfaits</p>
                <p class="text-slate-600">Chaque mois</p>
            </div>

            <!-- Stat 3 -->
            <div class="text-center fade-in-up animate-delay-2">
                <div class="text-6xl md:text-7xl font-bold text-accent-gold mb-3">4.8★</div>
                <p class="text-xl md:text-2xl text-slate-800 font-semibold mb-2">Note Moyenne</p>
                <p class="text-slate-600">Basée sur 10K+ avis</p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="py-20 md:py-32 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-4 underline-accent">
                Pourquoi BookMyTable?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="feature-shine relative p-10 md:p-12 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 card-hover overflow-hidden fade-in-up">
                <div class="text-5xl mb-6">🔍</div>
                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Recherche Avancée</h3>
                <p class="text-slate-700 mb-8 leading-relaxed">
                    Filtrez par cuisine, ambiance, prix et disponibilités pour trouver exactement ce que vous cherchez.
                </p>
                <ul class="space-y-3 text-slate-700">
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Filtres intelligents
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Photos haute qualité
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Avis vérifiés
                    </li>
                </ul>
            </div>

            <!-- Feature 2 -->
            <div class="feature-shine relative p-10 md:p-12 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 card-hover overflow-hidden fade-in-up animate-delay-1">
                <div class="text-5xl mb-6">⚡</div>
                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Réservation Instant</h3>
                <p class="text-slate-700 mb-8 leading-relaxed">
                    Confirmez votre table en moins d'une minute. Pas d'appels téléphoniques, tout en ligne.
                </p>
                <ul class="space-y-3 text-slate-700">
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Confirmation immédiate
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Rappel SMS gratuit
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Gestion facile
                    </li>
                </ul>
            </div>

            <!-- Feature 3 -->
            <div class="feature-shine relative p-10 md:p-12 rounded-2xl bg-gradient-to-br from-amber-50 to-amber-100 border border-amber-200 card-hover overflow-hidden fade-in-up animate-delay-2">
                <div class="text-5xl mb-6">⭐</div>
                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Avis Authentiques</h3>
                <p class="text-slate-700 mb-8 leading-relaxed">
                    Lisez les témoignages vérifiés d'autres clients pour faire le meilleur choix.
                </p>
                <ul class="space-y-3 text-slate-700">
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Clients vérifiés
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Photos réelles
                    </li>
                    <li class="flex items-center">
                        <span class="text-accent-gold font-bold mr-3">✓</span>
                        Notes honnêtes
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- PROCESS SECTION -->
<section class="py-20 md:py-32 px-4 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-4 underline-accent">
                Comment ça Marche?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center fade-in-up">
                <div class="step-hover w-20 h-20 rounded-full bg-gradient-to-br from-orange-400 to-amber-500 text-white flex items-center justify-center text-4xl font-bold mx-auto mb-6 shadow-lg">
                    1
                </div>
                <h4 class="text-2xl font-bold text-slate-900 mb-3">Cherchez</h4>
                <p class="text-slate-600 leading-relaxed">Entrez votre localisation, date et nombre de personnes</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center fade-in-up animate-delay-1">
                <div class="step-hover w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center text-4xl font-bold mx-auto mb-6 shadow-lg">
                    2
                </div>
                <h4 class="text-2xl font-bold text-slate-900 mb-3">Explorez</h4>
                <p class="text-slate-600 leading-relaxed">Découvrez les restaurants disponibles et leurs avis</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center fade-in-up animate-delay-2">
                <div class="step-hover w-20 h-20 rounded-full bg-gradient-to-br from-orange-500 to-red-500 text-white flex items-center justify-center text-4xl font-bold mx-auto mb-6 shadow-lg">
                    3
                </div>
                <h4 class="text-2xl font-bold text-slate-900 mb-3">Réservez</h4>
                <p class="text-slate-600 leading-relaxed">Sélectionnez votre créneau horaire préféré</p>
            </div>

            <!-- Step 4 -->
            <div class="text-center fade-in-up animate-delay-3">
                <div class="step-hover w-20 h-20 rounded-full bg-gradient-to-br from-green-500 to-emerald-500 text-white flex items-center justify-center text-4xl font-bold mx-auto mb-6 shadow-lg">
                    4
                </div>
                <h4 class="text-2xl font-bold text-slate-900 mb-3">Savourez</h4>
                <p class="text-slate-600 leading-relaxed">Profitez de votre expérience culinaire</p>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS SECTION -->
<section class="gradient-dark text-white py-20 md:py-32 px-4 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent-gold rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Ce que disent nos clients</h2>
            <div class="w-20 h-1 bg-accent-gold mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="glass-card p-10 rounded-xl fade-in-up">
                <div class="flex items-center mb-6">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-accent-gold to-amber-500 flex items-center justify-center text-white font-bold text-xl mr-4">
                        M
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Marie Dupont</h4>
                        <div class="text-accent-gold text-sm tracking-widest">★★★★★</div>
                    </div>
                </div>
                <p class="text-purple-100 italic leading-relaxed">
                    "BookMyTable m'a permis de trouver un restaurant magnifique pour l'anniversaire de mon mari. La réservation a été ultra simple et rapide. Je recommande!"
                </p>
            </div>

            <!-- Testimonial 2 -->
            <div class="glass-card p-10 rounded-xl fade-in-up animate-delay-1">
                <div class="flex items-center mb-6">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center text-white font-bold text-xl mr-4">
                        P
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Pierre Martin</h4>
                        <div class="text-accent-gold text-sm tracking-widest">★★★★★</div>
                    </div>
                </div>
                <p class="text-purple-100 italic leading-relaxed">
                    "Excellent service! J'utilise BookMyTable régulièrement. Les avis sont vraiment utiles et les restaurants proposés sont de grande qualité."
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div class="glass-card p-10 rounded-xl fade-in-up animate-delay-2">
                <div class="flex items-center mb-6">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-orange-400 to-red-400 flex items-center justify-center text-white font-bold text-xl mr-4">
                        S
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Sophie Laurent</h4>
                        <div class="text-accent-gold text-sm tracking-widest">★★★★★</div>
                    </div>
                </div>
                <p class="text-purple-100 italic leading-relaxed">
                    "Meilleure application pour réserver au restaurant! Interface intuitive, restaurants variés, et service client très réactif. À utiliser sans hésiter!"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="gradient-dark text-white py-20 md:py-32 px-4 relative overflow-hidden float-1">
    <div class="max-w-4xl mx-auto text-center relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Prêt à découvrir votre prochaine table?
        </h2>
        <p class="text-xl text-purple-100 mb-12 leading-relaxed font-light">
            Rejoignez des milliers de clients satisfaits et réservez dès maintenant
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center flex-wrap">
            <a href="/register" class="btn-primary px-10 py-4 font-bold rounded-lg text-center transition uppercase tracking-widest text-sm">
                S'inscrire Maintenant
            </a>
            <a href="/restaurants" class="btn-secondary px-10 py-4 font-bold rounded-lg text-center transition uppercase tracking-widest text-sm">
                Voir les Restaurants
            </a>
        </div>
    </div>
</section>

@endsection
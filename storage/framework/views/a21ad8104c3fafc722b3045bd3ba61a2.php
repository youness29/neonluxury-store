

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <style>

/* 🔥 Scroll Animations */
    .scroll-animate {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .scroll-animate.left {
        transform: translateX(-100px);
    }

    .scroll-animate.right {
        transform: translateX(100px);
    }

    .scroll-animate.zoom {
        transform: scale(0.8);
    }

    .scroll-animate.rotate {
        transform: rotate(10deg) scale(0.9);
    }

    .scroll-animate.visible {
        opacity: 1;
        transform: translate(0) scale(1) rotate(0);
    }

    /* تأخيرات مختلفة للعناصر */
    .scroll-animate.delay-1 { transition-delay: 0.1s; }
    .scroll-animate.delay-2 { transition-delay: 0.2s; }
    .scroll-animate.delay-3 { transition-delay: 0.3s; }
    .scroll-animate.delay-4 { transition-delay: 0.4s; }
    .scroll-animate.delay-5 { transition-delay: 0.5s; }

    /* تأثيرات خاصة للكاردز */
    .product-card {
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .product-card:hover {
        transform: translateY(-10px) scale(1.02);
    }

    /* تأثيرات دخول متتالية للعناصر */
    .stagger-animate > * {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }

    .stagger-animate.visible > * {
        opacity: 1;
        transform: translateY(0);
    }

    /* تأثيرات خاصة للقسم النيون */
    .neon-section .scroll-animate {
        transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    /* تأثير الـ Fade In مع Blur */
    .scroll-animate.blur {
        filter: blur(10px);
    }

    .scroll-animate.visible.blur {
        filter: blur(0);
    }

    /* تأثير الـ Slide From Bottom مع Spring */
    .scroll-animate.spring {
        transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* تأثير الـ Flip */
    .scroll-animate.flip {
        transform: perspective(1000px) rotateX(90deg);
    }

    .scroll-animate.visible.flip {
        transform: perspective(1000px) rotateX(0);
    }
    .neon-content {
        position: relative;
        z-index: 10;
    }

    .neon-title {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 1rem;
        text-shadow: 
            0 0 8px var(--accent-color),
            0 0 15px var(--primary-color),
            0 0 25px var(--accent-color);
        animation: flicker 2s infinite alternate;
    }

    @keyframes flicker {
        0%, 18%, 22%, 25%, 53%, 57%, 100% {
            opacity: 1;
        }
        20%, 24%, 55% {
            opacity: 0.7;
        }
    }

    .neon-btn {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 700;
        text-transform: uppercase;
        transition: all 0.3s;
        box-shadow: 0 0 15px var(--primary-color);
        display: inline-block;
        margin-top: 15px;
    }

    .neon-btn:hover {
        background: var(--accent-color);
        border-color: var(--accent-color);
        color: white;
        box-shadow: 0 0 20px var(--accent-color), 0 0 40px var(--accent-color);
        transform: translateY(-2px);
    }

    /* قسم المنتجات */
    .products-section {
        padding: 50px 0;
        background: #f9fafb;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 40px;
        color: var(--secondary-color);
    }

    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .product-info {
        padding: 15px;
    }

    .product-name {
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 5px;
        color: #1e293b;
    }

    .product-description {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 15px;
    }

    .product-price {
        font-weight: 700;
        font-size: 1.2rem;
        color: var(--accent-color);
    }

    .add-to-cart {
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    .add-to-cart:hover {
        background: var(--accent-color);
    }

    .view-all-btn {
        display: block;
        text-align: center;
        margin: 40px auto 0;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
        max-width: 220px;
    }

    .view-all-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(236, 72, 153, 0.4);
    }

    /* قسم العروض */
    .promo-section {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: white;
        padding: 70px 0;
        text-align: center;
    }

    .promo-title {
        font-size: 2.4rem;
        font-weight: 900;
        margin-bottom: 20px;
    }

    .promo-text {
        max-width: 600px;
        margin: auto;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    /* قسم الشهادات */
    .testimonials-section {
        background: #f3f4f6;
        padding: 60px 0;
    }

    .testimonial-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin: 15px;
        border-left: 5px solid var(--accent-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .rating { color: #facc15; margin-bottom: 10px; }

    .testimonial-text { color: #374151; margin-bottom: 20px; }

    .client-info { display: flex; align-items: center; }

    .client-avatar {
        width: 50px; height: 50px; border-radius: 50%;
        background: var(--secondary-color); color: white;
        display: flex; align-items: center; justify-content: center;
        font-weight: bold; margin-right: 15px;
    }

    .client-name { font-weight: 600; color: #1f2937; }
    .client-date { font-size: 0.9rem; color: #6b7280; }

        @keyframes neon-flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: 
                    0 0 5px var(--primary-color),
                    0 0 10px var(--primary-color),
                    0 0 20px var(--primary-color);
            }
            20%, 24%, 55% {
                text-shadow: none;
            }
        }

        .led-counter {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .led-digit {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            padding: 15px;
            min-width: 60px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(79, 70, 229, 0.4);
        }

        .led-number {
            font-size: 2rem;
            font-weight: 900;
            color: var(--primary-color);
            text-shadow: 0 0 8px var(--primary-color);
            position: relative;
            z-index: 2;
        }

        .led-label {
            color: #a5b4fc;
            font-size: 0.8rem;
            margin-top: 5px;
            text-transform: uppercase;
        }

        .neon-btn {
            background: transparent;
            color: blanchedalmond;
            border: 2px solid var(--primary-color);
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 700;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 
                0 0 10px var(--primary-color),
                inset 0 0 10px var(--primary-color);
            display: inline-block;
            margin: 10px 0;
        }

        .neon-btn:hover {
            background: var(--primary-color);
            color: white;
            box-shadow: 
                0 0 20px var(--primary-color),
                0 0 40px var(--primary-color),
                inset 0 0 20px var(--primary-color);
            transform: translateY(-2px);
        }

        .led-strip {
            position: absolute;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--primary-color), 
                var(--secondary-color), 
                var(--primary-color), 
                transparent);
            animation: led-move 3s infinite linear;
        }

        .led-strip-top { top: 0; }
        .led-strip-bottom { bottom: 0; }

        @keyframes led-move {
            0% { background-position: -100% 0; }
            100% { background-position: 200% 0; }
        }

        .glowing-circle {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.3) 0%, transparent 70%);
            filter: blur(15px);
            animation: float 6s infinite ease-in-out;
        }

        .circle-1 {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .circle-2 {
            bottom: 30%;
            right: 15%;
            animation-delay: 2s;
        }

        .circle-3 {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-15px) scale(1.1); }
        }

        /* تحسينات للهاتف */
        @media (max-width: 768px) {
            .neon-title {
                font-size: 1.8rem;
            }
            
            .led-digit {
                min-width: 50px;
                padding: 10px;
            }
            
            .led-number {
                font-size: 1.5rem;
            }
            
            .neon-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            
            .glowing-circle {
                width: 150px;
                height: 150px;
            }
        }

        /* قسم المنتجات - تصميم جديد للهاتف */
        .products-section {
            padding: 40px 0;
            background: #f8fafc;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            margin: 10px auto;
            border-radius: 3px;
        }

        .products-container {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 15px;
            padding: 10px 5px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        
        .products-container::-webkit-scrollbar {
            display: none;
        }

        .product-card {
            flex: 0 0 calc(100% - 40px);
            scroll-snap-align: start;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        @media (min-width: 640px) {
            .product-card {
                flex: 0 0 calc(50% - 20px);
            }
        }
        
        @media (min-width: 768px) {
            .products-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                overflow-x: visible;
                gap: 20px;
            }
            
            .product-card {
                flex: none;
            }
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: #1f2937;
        }

        .product-description {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .add-to-cart {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: var(--secondary-color);
        }

        .view-all-btn {
            display: block;
            text-align: center;
            margin: 30px auto 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            max-width: 200px;
        }

        .view-all-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        }

        /* قسم العروض */
        .promo-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 60px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .promo-content {
            position: relative;
            z-index: 2;
        }

        .promo-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .promo-text {
            font-size: 1.1rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .animate-pulse {
            animation: pulse-bar 2s infinite alternate;
        }
        
        .animate-pulse.delay-200 { animation-delay: 0.2s; }
        .animate-pulse.delay-400 { animation-delay: 0.4s; }

        @keyframes pulse-bar {
            0% { opacity: 0.5; transform: scaleX(0.8); }
            100% { opacity: 1; transform: scaleX(1.2); }
        }

        /* قسم آراء العملاء */
        .testimonials-section {
            background: #f1f5f9;
            padding: 50px 0;
        }

        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            margin: 15px;
            border-top: 4px solid var(--primary-color);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .rating {
            color: #fbbf24;
            margin-bottom: 15px;
        }

        .testimonial-text {
            color: #4b5563;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .client-info {
            display: flex;
            align-items: center;
        }

        .client-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
        }

        .client-name {
            font-weight: 600;
            color: #1f2937;
        }

        .client-date {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* تصميم متجاوب للهاتف */
        @media (max-width: 768px) {
            .testimonials-container {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                padding: 10px 5px;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }
            
            .testimonials-container::-webkit-scrollbar {
                display: none;
            }
            
            .testimonial-card {
                flex: 0 0 calc(100% - 40px);
                scroll-snap-align: start;
            }
            
            .section-title {
                font-size: 1.7rem;
            }
            
            .promo-title {
                font-size: 1.8rem;
            }
            
            .promo-text {
                font-size: 1rem;
            }
        }
        
        @media (min-width: 768px) {
            .testimonials-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }
            
            .testimonial-card {
                margin: 0;
            }
        }
              

    /* 🌌 Neon Hero Section */
    .neon-section {
        position: relative;
        background: radial-gradient(circle at 50% 50%, #1a1a40, #0a0a0a);
        color: white;
        padding: 130px 0;
        text-align: center;
        overflow: hidden;
    }

    .neon-section::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, var(--primary-color), var(--accent-color), var(--secondary-color), var(--primary-color));
        animation: rotateBG 18s linear infinite;
        z-index: 0;
        opacity: 0.1;
    }

    @keyframes rotateBG {
        100% { transform: rotate(360deg); }
    }

    .neon-content {
        position: relative;
        z-index: 10;
        animation: fadeIn 1.8s ease-out forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .neon-title {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 15px var(--accent-color), 0 0 30px var(--primary-color);
        animation: glowPulse 3s infinite alternate;
    }

    @keyframes glowPulse {
        from { text-shadow: 0 0 10px var(--accent-color), 0 0 20px var(--primary-color); }
        to { text-shadow: 0 0 25px var(--accent-color), 0 0 50px var(--primary-color); }
    }

    .neon-btn {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 14px 36px;
        border-radius: 40px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 15px var(--primary-color);
    }

    .neon-btn::before {
        content: "";
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: all 0.4s ease;
    }

    .neon-btn:hover::before {
        left: 100%;
    }

    .neon-btn:hover {
        background: var(--accent-color);
        border-color: var(--accent-color);
        color: white;
        box-shadow: 0 0 25px var(--accent-color), 0 0 50px var(--accent-color);
        transform: translateY(-3px);
    }

    /* 🌟 Floating Glow Circles */
    .glowing-circle {
        position: absolute;
        border-radius: 50%;
        filter: blur(30px);
        opacity: 0.5;
        animation: float 8s infinite ease-in-out alternate;
    }

    .circle-1 {
        width: 280px; height: 280px;
        background: var(--primary-color);
        top: 20%; left: 10%;
    }

    .circle-2 {
        width: 220px; height: 220px;
        background: var(--accent-color);
        bottom: 15%; right: 15%;
        animation-delay: 2s;
    }

    .circle-3 {
        width: 180px; height: 180px;
        background: var(--secondary-color);
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        animation-delay: 4s;
    }

    @keyframes float {
        from { transform: translateY(0) scale(1); opacity: 0.6; }
        to { transform: translateY(-30px) scale(1.1); opacity: 0.9; }
    }

    /* 🎇 Cards animation */
    .product-card, .testimonial-card {
        animation: fadeUp 1s ease-out forwards;
        opacity: 0;
    }
    .product-card:nth-child(odd), .testimonial-card:nth-child(odd) {
        animation-delay: 0.2s;
    }
    .product-card:nth-child(even), .testimonial-card:nth-child(even) {
        animation-delay: 0.4s;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .community-grid img {
    transition: transform 0.3s ease;
}

.community-grid img:hover {
    transform: scale(1.05);
}
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
} 

.animate-scroll {
    display: flex;
    width: max-content;
    animation: scroll 18s linear infinite;
}
     .testimonials-section {
        background: #f3f4f6;
        padding: 60px 0;
    }

    @media (max-width: 768px) {
        .testimonials-section {
            padding: 40px 0;
        }
    }

    .testimonials-scroll-container {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding: 20px 0;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }

    .testimonials-scroll-container::-webkit-scrollbar {
        display: none;
    }
    .testimonial-card {
        flex: 0 0 calc(100% - 40px);
        scroll-snap-align: start;
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin: 0 10px;
        border-left: 5px solid var(--accent-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s;
    }

    @media (min-width: 768px) {
        .testimonial-card {
            flex: 0 0 calc(50% - 20px);
        }
    }

    @media (min-width: 1024px) {
        .testimonials-scroll-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            overflow-x: visible;
            gap: 20px;
        }
        
        .testimonial-card {
            flex: none;
            margin: 0;
        }
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .rating { 
        color: #facc15; 
        margin-bottom: 10px; 
    }
 .testimonial-text { 
        color: #374151; 
        margin-bottom: 20px; 
        line-height: 1.6;
    }

    .client-info { 
        display: flex; 
        align-items: center; 
    }

    .client-avatar {
        width: 50px; 
        height: 50px; 
        border-radius: 50%;
        background: var(--secondary-color); 
        color: white;
        display: flex; 
        align-items: center; 
        justify-content: center;
        font-weight: bold; 
        margin-right: 15px;
    }

    .client-name { 
        font-weight: 600; 
        color: #1f2937; 
    }
    .client-date { 
        font-size: 0.9rem; 
        color: #6b7280; 
    }
    </style>



<!-- New Neon LED Section -->
<!-- قسم العرض النيون مع خلفية صورة -->
<section class="neon-section relative bg-cover bg-center bg-no-repeat" 
    style="background-image: url('<?php echo e(asset('images/neon.jpg')); ?>');">

    <!-- Overlay باش يوضح الكتابة -->
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="neon-content text-center text-white">
            <h2 class="neon-title scroll-animate zoom delay-1">LED Flash Sale</h2>

            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto scroll-animate delay-2">
                Exclusive neon collection with stunning LED effects. Limited edition products with glowing features!
            </p>

            <div class="scroll-animate right delay-3">
                <a href="<?php echo e(route('products.index')); ?>" class="neon-btn inline-block">
                    <i class="fas fa-bolt mr-2"></i>Shop Neon Collection
                </a>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto stagger-animate">
                <div class="bg-black bg-opacity-40 rounded-lg p-6 text-center backdrop-blur-sm scroll-animate left delay-1">
                    <i class="fas fa-truck text-4xl mb-4 text-purple-400"></i>
                    <h3 class="text-xl font-bold mb-2">Free Shipping</h3>
                    <p class="text-purple-200">On all neon products worldwide</p>
                </div>
                <div class="bg-black bg-opacity-40 rounded-lg p-6 text-center backdrop-blur-sm scroll-animate zoom delay-2">
                    <i class="fas fa-star text-4xl mb-4 text-purple-400"></i>
                    <h3 class="text-xl font-bold mb-2">Premium Quality</h3>
                    <p class="text-purple-200">High-end LED technology</p>
                </div>
                <div class="bg-black bg-opacity-40 rounded-lg p-6 text-center backdrop-blur-sm scroll-animate right delay-3">
                    <i class="fas fa-shield-alt text-4xl mb-4 text-purple-400"></i>
                    <h3 class="text-xl font-bold mb-2">2-Year Warranty</h3>
                    <p class="text-purple-200">Full coverage on all products</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- قسم المنتجات مع تأثيرات متقدمة -->
<section class="products-section">
    <div class="container mx-auto px-4">
        <!-- العنوان مع تأثير Flip -->
        <h2 class="section-title scroll-animate flip">Featured Products</h2>
        
        <!-- حاوية المنتجات مع تأثير Stagger -->
        <div class="products-container stagger-animate">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $firstImage = $product->getFirstImageAttribute();
        ?>

        <div class="product-card scroll-animate blur delay-<?php echo e(($index % 5) + 1); ?>">
            <!-- محتوى البطاقة -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden transition-all duration-300 
                        hover:shadow-xl hover:-translate-y-1 border border-gray-100 flex flex-col">
                
                <a href="<?php echo e(route('products.show', $product->id)); ?>" 
                   class="block relative group overflow-hidden">
                    <div class="relative pt-[70%]">
                        <?php if($firstImage): ?>
                            <img src="<?php echo e(asset('storage/' . $firstImage)); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover 
                                        transition-transform duration-500 group-hover:scale-105">
                        <?php else: ?>
                            <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-3xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if($product->created_at->gt(now()->subDays(10))): ?>
                        <div class="absolute top-3 left-3">
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold 
                                         px-2.5 py-0.5 rounded-full">New</span>
                        </div>
                    <?php endif; ?>
                </a>

                <div class="p-4 flex-grow flex flex-col">
                    <h3 class="font-semibold text-gray-900 mb-1 line-clamp-1"><?php echo e($product->name); ?></h3>
                    <p class="text-gray-500 text-sm mb-3 line-clamp-2 flex-grow">
                        <?php echo e(Str::limit($product->description, 50)); ?>

                    </p>
                    
                    <div class="flex justify-between items-center mt-auto">
                        <span class="text-indigo-600 font-bold text-lg"><?php echo e($product->price); ?> MAD</span>

                        <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>" class="add-to-cart-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="size" value="<?php echo e($product->sizes->first()->size ?? ''); ?>">
                                <input type="hidden" name="price" value="<?php echo e($product->sizes->first()->price ?? $product->price); ?>">
                                <button type="submit" class="bg-indigo-100 hover:bg-indigo-200 transition-all duration-300 text-indigo-600 p-2.5 rounded-lg shadow-sm text-sm">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 scroll-animate">No products available at the moment.</p>
    <?php endif; ?>
</div>


        <!-- زر View All مع تأثير Spring -->
        <a href="#" class="view-all-btn scroll-animate spring delay-3">
            <i class="fas fa-list ml-2"></i>View All Products
        </a>
    </div>
</section>

<!-- قسم العروض مع تأثيرات ديناميكية -->
<section class="promo-section">
    <div class="container mx-auto px-4">
        <div class="promo-content">
            <!-- العنوان مع تأثير من الأعلى -->
            <h2 class="promo-title scroll-animate delay-1">Light Up Your Space!</h2>
            
            <!-- النص مع تأثير من اليسار -->
            <p class="promo-text scroll-animate left delay-2">
                Discover our exclusive neon LED products and turn your room into a glowing paradise. Limited-time offer!
            </p>
            
            <!-- الزر مع تأثير من اليمين -->
            <div class="scroll-animate right delay-3">
                <a href="#" class="neon-btn">
                    <i class="fas fa-bolt mr-2"></i>Shop Neon Now
                </a>
            </div>

            <!-- الخطوط المتحركة مع تأثيرات متتالية -->
            <div class="mt-12 flex justify-center gap-6 stagger-animate">
                <div class="w-16 h-2 bg-purple-300 rounded-full animate-pulse scroll-animate zoom delay-1"></div>
                <div class="w-24 h-2 bg-indigo-300 rounded-full animate-pulse delay-200 scroll-animate zoom delay-2"></div>
                <div class="w-20 h-2 bg-pink-300 rounded-full animate-pulse delay-400 scroll-animate zoom delay-3"></div>
            </div>
        </div>
    </div>
</section>

<!-- Community Neon Showcase Section -->
<section class="testimonials-section py-16 overflow-hidden">
<section class="community-section py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4 scroll-animate zoom delay-1">
            Rejoignez notre communauté sur Instagram
        </h2>
        <p class="mb-10 scroll-animate delay-2">
            Partagez votre magnifique néon accroché à vos murs en nous envoyant une photo sur DM !
        </p>

        <div class="community-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 stagger-animate">
            <?php $__currentLoopData = $communityPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-gray-800 rounded-lg overflow-hidden scroll-animate fade delay-<?php echo e(($loop->index % 5) + 1); ?>">
                <a href="<?php echo e($post->link); ?>" target="_blank">
                    <img src="<?php echo e($post->image ? asset('storage/' . $post->image) : asset('images/placeholder.png')); ?>"
                         alt="Community Post"
                         class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr" target="_blank" class="neon-btn mt-10 inline-block scroll-animate delay-3">
            Visitez notre page Instagram
        </a>
    </div>
</section>
</section>



<!-- قسم الشهادات مع تأثيرات فريدة -->
<section class="testimonials-section">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center scroll-animate rotate mb-12">Our Clients' Reviews</h2>

        <div class="testimonials-scroll-container">
            <?php $__currentLoopData = [
                [
                    'name' => 'Ahmed Al-Saadi',
                    'rating' => 5,
                    'text' => "One of the best stores I've ever dealt with! High-quality products and very fast delivery.",
                    'date' => 'Client since 2022',
                    'avatar' => 'AA'
                ],
                [
                    'name' => 'Fatima Al-Abdullah',
                    'rating' => 4.5,
                    'text' => "The product quality exceeded my expectations, and shipping was very fast.",
                    'date' => 'Client since 2023',
                    'avatar' => 'FA'
                ],
                [
                    'name' => 'Mohammed Al-Shammari',
                    'rating' => 5,
                    'text' => "Excellent customer service with fast responses, and the products matched the advertised quality.",
                    'date' => 'Client since 2021',
                    'avatar' => 'MA'
                ],
                [
                    'name' => 'Sara Al-Mutairi',
                    'rating' => 3.5,
                    'text' => "Good quality products, but I wish there were more variety in designs.",
                    'date' => 'Client since 2022',
                    'avatar' => 'SA'
                ],
                [
                    'name' => 'John Al-Salem',
                    'rating' => 5,
                    'text' => "Amazing experience! The product arrived on time and was exactly as described.",
                    'date' => 'Client since 2020',
                    'avatar' => 'JA'
                ]
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="testimonial-card scroll-animate delay-<?php echo e(($index % 5) + 1); ?>">
                <div class="rating">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php if($i <= floor($testimonial['rating'])): ?>
                            <i class="fas fa-star"></i>
                        <?php elseif($i - 0.5 <= $testimonial['rating']): ?>
                            <i class="fas fa-star-half-alt"></i>
                        <?php else: ?>
                            <i class="fas fa-star-o"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <p class="testimonial-text"><?php echo e($testimonial['text']); ?></p>
                <div class="client-info">
                    <div class="client-avatar"><?php echo e($testimonial['avatar']); ?></div>
                    <div>
                        <h4 class="client-name"><?php echo e($testimonial['name']); ?></h4>
                        <p class="client-date"><?php echo e($testimonial['date']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<script>
    // Countdown Timer for Neon Section
    function updateNeonCountdown() {
        const neonDays = document.getElementById('neon-days');
        const neonHours = document.getElementById('neon-hours');
        const neonMinutes = document.getElementById('neon-minutes');
        const neonSeconds = document.getElementById('neon-seconds');
        
        // Set the countdown date (7 days from now for neon section)
        const countdownDate = new Date();
        countdownDate.setDate(countdownDate.getDate() + 7);
        
        const interval = setInterval(() => {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            
            const daysValue = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hoursValue = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutesValue = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const secondsValue = Math.floor((distance % (1000 * 60)) / 1000);
            
            neonDays.textContent = daysValue.toString().padStart(2, '0');
            neonHours.textContent = hoursValue.toString().padStart(2, '0');
            neonMinutes.textContent = minutesValue.toString().padStart(2, '0');
            neonSeconds.textContent = secondsValue.toString().padStart(2, '0');
            
            if (distance < 0) {
                clearInterval(interval);
                neonDays.textContent = '00';
                neonHours.textContent = '00';
                neonMinutes.textContent = '00';
                neonSeconds.textContent = '00';
            }
        }, 1000);
    }
    
    // Start countdown when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        updateNeonCountdown();
    });

     document.addEventListener("mousemove", function(e) {
            let circles = document.querySelectorAll(".glowing-circle");
            circles.forEach((circle, index) => {
                let speed = (index + 1) * 20;
                let x = (window.innerWidth - e.pageX * speed) / 100;
                let y = (window.innerHeight - e.pageY * speed) / 100;
                circle.style.transform = `translate(${x}px, ${y}px) scale(1)`;
            });
        });
         const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // إذا كان العنصر يحتوي على stagger-animate
                if (entry.target.classList.contains('stagger-animate')) {
                    const children = entry.target.children;
                    Array.from(children).forEach((child, index) => {
                        setTimeout(() => {
                            child.classList.add('visible');
                        }, index * 150);
                    });
                }
            }
        });
    }, observerOptions);

    // مراقبة جميع العناصر التي تحتوي على scroll-animate
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('.scroll-animate, .stagger-animate');
        animatedElements.forEach(el => observer.observe(el));
    });

    // إعادة تحريك العناصر عند إعادة تحميل الصفحة
    window.addEventListener('beforeunload', function() {
        const animatedElements = document.querySelectorAll('.scroll-animate, .stagger-animate');
        animatedElements.forEach(el => el.classList.remove('visible'));
    });

    // تأثيرات إضافية عند hover على البطاقات
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\home.blade.php ENDPATH**/ ?>
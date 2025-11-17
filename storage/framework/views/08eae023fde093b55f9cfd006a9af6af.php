

<?php $__env->startSection('content'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Your LED Partner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 6rem 1rem 4rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center bottom;
        }
        
        .hero-content { position: relative; z-index: 2; }
        .hero h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.025em; line-height: 1.2; }
        .hero p { font-size: 1.125rem; max-width: 700px; margin: 1.5rem auto; color: #e2e8f0; line-height: 1.6; }

        .service-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            border: 1px solid #f1f5f9;
            min-height: 380px;
            display: flex;
            flex-direction: column;
        }
        
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.75rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subtitle {
            font-size: 1rem;
            color: #64748b;
            max-width: 700px;
            margin: 0 auto 3rem;
            text-align: center;
            line-height: 1.6;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .cta-section {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            padding: 4rem 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,192C672,181,768,139,864,128C960,117,1056,139,1152,149.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center bottom;
        }

        .cta-content { position: relative; z-index: 2; }
        .price-tag { font-size: 1.25rem; font-weight: 700; color: #059669; margin: 1rem 0; }
        .floating-shapes { position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: 1; }
        .shape { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.1); }
        .shape-1 { width: 80px; height: 80px; top: 10%; left: 10%; }
        .shape-2 { width: 120px; height: 120px; bottom: 10%; right: 10%; }

        /* 🔹 Slider Style for Mobile */
        .services-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .services-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1024px) {
            .services-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Mobile-specific improvements */
        @media (max-width: 767px) {
            .hero {
                padding: 4rem 1rem 3rem;
            }
            
            .hero h1 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }
            
            .hero p {
                font-size: 1rem;
                margin: 1rem auto;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .section-subtitle {
                font-size: 0.9rem;
                margin-bottom: 2rem;
            }
            
            .service-card {
                min-height: 350px;
                margin: 0 auto;
                max-width: 100%;
            }
            
            .service-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            
            .cta-section {
                padding: 3rem 1rem;
            }
            
            .cta-section h2 {
                font-size: 1.75rem;
            }
            
            .cta-section p {
                font-size: 1rem;
            }
            
            .btn-primary {
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
                width: 100%;
                text-align: center;
            }
            
            .service-card .btn-primary {
                margin-top: auto;
            }
        }

        /* تحسينات إضافية للشاشات الصغيرة جداً */
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.75rem;
            }
            
            .hero p {
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .service-card {
                padding: 1.5rem;
                min-height: 320px;
            }
            
            .service-card h3 {
                font-size: 1.125rem;
            }
            
            .service-card p {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    <!-- 🔹 Hero Section -->
    <section class="hero">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        
        <div class="hero-content container mx-auto">
            <h1>Light Up Your World with <span class="text-yellow-300">the Art of LED</span></h1>
            <p>
                We specialize in designing and manufacturing luminous signs, neon art, and LED decorations.  
                Our mission is to bring your spaces to life with unique, modern, and personalized creations.  
                Combine design, innovation, and light to make your brand or interior shine.
            </p>

            <div class="mt-8">
                <a href="#services" class="btn-primary">
                    <i class="fas fa-arrow-down mr-2"></i> Discover Our Services
                </a>
            </div>
        </div>
    </section>

    <!-- 🔹 Services Section -->
    <section id="services" class="container mx-auto py-12 px-4">
        <div class="mb-12">
            <h2 class="section-title">Our Premium Services</h2>
            <p class="section-subtitle">
                A complete range of LED and signage services designed to meet all your lighting and branding needs — 
                from concept to final installation.
            </p>
        </div>

        <div class="services-container">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="service-card">
                    <div class="p-6 flex flex-col h-full">
                        <div class="service-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4"><?php echo e($service->name); ?></h3>
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow">
                            <?php echo e($service->description ?? 'A professional lighting solution tailored to your specific needs.'); ?>

                        </p>
                        
                        <?php if($service->price): ?>
                            <div class="price-tag"><?php echo e(number_format($service->price, 2)); ?> MAD</div>
                        <?php endif; ?>
                        
                        <a href="<?php echo e(route('contact.show')); ?>" class="btn-primary text-center py-3 mt-auto">
                            <i class="fas fa-paper-plane mr-2"></i> Request a Quote
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-8">
                    <div class="text-gray-400 text-5xl mb-4">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">No Services Available</h3>
                    <p class="text-gray-500">Our services will be online soon.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 🔹 Call-to-Action Section -->
    <section class="cta-section">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        
        <div class="cta-content container mx-auto">
            <h2 class="text-3xl font-bold mb-4">Ready to Bring Your Vision to Light?</h2>
            <p class="text-lg text-gray-300 mb-8 max-w-2xl mx-auto">
                Contact us today for a free consultation and discover how we can illuminate your space 
                with creativity and innovation.
            </p>
            <a href="<?php echo e(route('contact.show')); ?>" class="btn-primary bg-white text-indigo-700 hover:bg-gray-100">
                <i class="fas fa-envelope mr-2"></i> Contact Us
            </a>
        </div>
    </section>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\services\index.blade.php ENDPATH**/ ?>
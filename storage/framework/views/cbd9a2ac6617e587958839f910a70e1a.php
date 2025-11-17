<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Service</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg,#f5f7fa 0%,#c3cfe2 100%); min-height: 100vh; }
        .card { backdrop-filter: blur(8px); background: rgba(255,255,255,0.9); box-shadow: 0 8px 20px rgba(0,0,0,0.08); border-radius: 16px; }
        .btn-success { background: linear-gradient(135deg,#10b981 0%,#059669 100%); padding:0.6rem 1.2rem; border-radius:10px; color:white; font-weight:500; transition:.3s; }
        .btn-success:hover { transform: translateY(-2px); box-shadow:0 5px 12px rgba(16,185,129,0.3); }
        label { font-weight: 600; color:#374151; margin-bottom: 6px; display: block; }
        input, textarea { width: 100%; padding:10px; border-radius:8px; border:1px solid #d1d5db; transition:.3s; }
        input:focus, textarea:focus { outline:none; border-color:#6366f1; box-shadow:0 0 0 3px rgba(99,102,241,0.2); }
    </style>
</head>

<body class="py-8 px-4">
    <div class="container mx-auto max-w-lg">
        <div class="card p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800"> Ajouter Service</h1>

            <form action="<?php echo e(route('admin.services.store')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3"></textarea>
                </div>

                <div>
                    <label for="price">Prix (MAD)</label>
                    <input type="number" step="0.01" id="price" name="price">
                </div>

                <button type="submit" class="btn-success w-full"> Enregistrer</button>
            </form>
        </div>
    </div>
</body>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\services\create.blade.php ENDPATH**/ ?>
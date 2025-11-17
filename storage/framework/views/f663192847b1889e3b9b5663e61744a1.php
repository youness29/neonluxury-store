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
    <title>Modifier Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); 
            min-height: 100vh; 
        }
        .card { 
            backdrop-filter: blur(10px); 
            background: rgba(255,255,255,0.95); 
            box-shadow: 0 15px 35px rgba(50,50,93,0.1),0 5px 15px rgba(0,0,0,0.07); 
            border-radius: 20px; 
            padding: 2rem; 
            width: 100%; 
            max-width: 500px; 
            margin: auto; 
        }
        .btn-primary { 
            background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); 
            border-radius:12px; 
            padding: 0.8rem 1.5rem; 
            color:white; 
            transition: all 0.3s; 
            display: block; 
            text-align: center; 
        }
        .btn-primary:hover { 
            transform: translateY(-2px); 
            box-shadow:0 7px 14px rgba(102,126,234,0.4); 
        }
        .btn-secondary { 
            background: linear-gradient(135deg,#868686 0%,#5a5a5a 100%); 
            border-radius:12px; 
            padding: 0.8rem 1.5rem; 
            color:white; 
            transition: all 0.3s; 
            display: block; 
            text-align: center; 
        }
        .btn-secondary:hover { 
            transform: translateY(-2px); 
            box-shadow:0 7px 14px rgba(90,90,90,0.4); 
        }
        .form-control { 
            width: 100%; 
            padding: 0.8rem 1rem; 
            border-radius: 12px; 
            border: 2px solid #e2e8f0; 
            margin-bottom: 1rem; 
            background: rgba(255,255,255,0.9); 
            transition: all 0.3s; 
        }
        .form-control:focus { 
            outline:none; 
            border-color:#667eea; 
            box-shadow:0 0 0 3px rgba(102,126,234,0.2); 
        }
        label { 
            font-weight: 600; 
            color: #4a5568; 
            display:block; 
            margin-bottom: 0.4rem; 
        }
    </style>
</head>

<body class="flex items-center justify-center py-10 px-4">
    <div class="card">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">✏️ Modifier Category</h1>

        <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="<?php echo e($category->name); ?>" class="form-control" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4"><?php echo e($category->description); ?></textarea>
            </div>

            <div class="flex flex-col md:flex-row gap-3">
                <button type="submit" class="btn-primary w-full md:w-1/2">✅ Mettre à jour</button>
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn-secondary w-full md:w-1/2">⬅️ Retour</a>
            </div>
        </form>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\categories\edit.blade.php ENDPATH**/ ?>
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
    <title>Liste des Services</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg,#f5f7fa 0%,#c3cfe2 100%); min-height: 100vh; }
        .card { backdrop-filter: blur(10px); background: rgba(255,255,255,0.95); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border-radius: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { background: rgba(102,126,234,0.1); font-weight: 600; color:#374151; }
        tr:hover { background: rgba(102,126,234,0.05); }
        .btn-primary { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); padding: 0.6rem 1.2rem; border-radius: 10px; color:white; font-weight:500; transition:.3s; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow:0 5px 12px rgba(102,126,234,0.3); }
        .btn-warning { background: linear-gradient(135deg,#fbbf24 0%,#f59e0b 100%); padding:0.4rem 0.9rem; border-radius:8px; color:white; transition:.3s; display:inline-block; }
        .btn-warning:hover { box-shadow:0 4px 8px rgba(245,158,11,0.4); }
        .btn-danger { background: linear-gradient(135deg,#ef4444 0%,#dc2626 100%); padding:0.4rem 0.9rem; border-radius:8px; color:white; transition:.3s; }
        .btn-danger:hover { box-shadow:0 4px 8px rgba(220,38,38,0.4); }
        /* Responsive Fix */
        @media (max-width: 768px) {
            th, td { padding: 10px; font-size: 14px; }
            .btn-warning, .btn-danger { padding: 0.3rem 0.7rem; font-size: 13px; }
            td.flex { flex-wrap: wrap; gap: 0.5rem; }
        }
    </style>
</head>

<body class="py-8 px-4">
    <div class="container mx-auto max-w-6xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 flex items-center">
             Liste des Services
        </h1>

        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn-primary inline-block mb-4">➕ Ajouter Service</a>

        <?php if(session('success')): ?>
            <div class="p-3 mb-4 rounded bg-green-100 text-green-800 font-medium">
                ✅ <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card overflow-x-auto p-4">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->id); ?></td>
                        <td><?php echo e($service->name); ?></td>
                        <td><?php echo e($service->description); ?></td>
                        <td><?php echo e($service->price); ?> MAD</td>
                        <td class="flex gap-2">
                            <a href="<?php echo e(route('admin.services.edit', $service)); ?>" class="btn-warning"> Modifier</a>
                            <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-danger"> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\services\index.blade.php ENDPATH**/ ?>
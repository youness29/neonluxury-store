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
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }

        .card { backdrop-filter: blur(10px); background: rgba(255,255,255,0.85); box-shadow: 0 15px 35px rgba(50,50,93,0.1),0 5px 15px rgba(0,0,0,0.07); border-radius: 20px; transition: transform 0.3s, box-shadow 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 18px 40px rgba(50,50,93,0.15),0 8px 20px rgba(0,0,0,0.1); }

        .btn-primary { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); border-radius:12px; transition: all 0.3s; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow:0 7px 14px rgba(102,126,234,0.4); }
        .btn-secondary { background: linear-gradient(135deg,#868686 0%,#5a5a5a 100%); border-radius:12px; transition: all 0.3s; }
        .btn-secondary:hover { transform: translateY(-2px); box-shadow:0 7px 14px rgba(90,90,90,0.4); }
        .btn-danger { background: linear-gradient(135deg,#ff6b6b 0%,#ee5a52 100%); border-radius:8px; transition: all 0.3s; }
        .btn-danger:hover { transform: translateY(-2px); box-shadow:0 4px 8px rgba(255,107,107,0.4); }

        .size-select { width: 100%; padding: 0.5rem 1rem; border-radius: 12px; border: 2px solid #e2e8f0; transition: all 0.3s; background: rgba(255,255,255,0.9); }
        .size-select:focus { outline:none; border-color:#667eea; box-shadow:0 0 0 3px rgba(102,126,234,0.2); }

        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 12px; border-bottom: 1px solid #e2e8f0; text-align: left; }
        th { background: rgba(102,126,234,0.1); }
        tr:hover { background: rgba(102,126,234,0.05); }
        img.product-img { width: 80px; height: 80px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }

        /* Responsive */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr { display: block; }
            thead tr { display: none; }
            tr { margin-bottom: 1rem; border-bottom: 2px solid #e2e8f0; }
            td { text-align: right; padding-left: 50%; position: relative; }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                width: 45%;
                font-weight: bold;
                text-align: left;
            }
            .flex { flex-direction: column; gap: 0.5rem; }
            img.product-img { width: 100%; height: auto; }
        }
    </style>
</head>

<body class="py-8 px-4">
    <div class="container mx-auto max-w-6xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 flex items-center">
            <i class="fas fa-boxes mr-3 text-purple-500"></i> Product List
        </h1>

        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary text-white px-6 py-2 inline-block mb-4">➕ Add New Product</a>

        <div class="card p-6 overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Size & Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    // استخدام الدالة المساعدة للحصول على الصور كمصفوفة
    $images = $product->images_array;
    $firstImage = count($images) > 0 ? $images[0] : null;
?>
<tr>
    <td data-label="Image">
        <?php if($firstImage): ?>
            <img src="<?php echo e(asset('storage/' . $firstImage)); ?>" 
                 class="product-img" 
                 alt="<?php echo e($product->name); ?>">
        <?php else: ?>
            <span class="text-gray-500">لا توجد صورة</span>
        <?php endif; ?>
    </td>
    <td data-label="Name"><?php echo e($product->name); ?></td>
    <td data-label="Description"><?php echo e(Str::limit($product->description, 50)); ?></td>
    <td data-label="Category"><?php echo e($product->category ? $product->category->name : '—'); ?></td>
    <td data-label="Size & Price">
        <?php if($product->sizes->count()): ?>
            <select class="size-select">
                <?php $__currentLoopData = $product->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($size->size); ?> → <?php echo e($size->price); ?> DH</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php else: ?>
            <?php echo e($product->price); ?> DH (Default)
        <?php endif; ?>
    </td>
    <td data-label="Actions" class="flex gap-2">
        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" 
           class="btn-secondary text-white px-3 py-1">✏️ Edit</a>
        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="inline">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn-danger text-white px-3 py-1" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\products\index.blade.php ENDPATH**/ ?>
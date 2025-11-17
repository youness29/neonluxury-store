

<?php $__env->startSection('content'); ?>
<section class="container mx-auto py-8 px-4 mt-20">
    <div class="container mx-auto max-w-7xl">
        <!-- Title -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight mb-3">
                Discover Our Collection
            </h2>
            <p class="text-base text-gray-600 max-w-3xl mx-auto">
                Explore our carefully curated selection of premium products designed to elevate your experience.
            </p>
            <span class="block w-20 h-1 bg-indigo-600 mx-auto mt-4 rounded-full"></span>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="<?php echo e(route('products.index')); ?>" 
              class="mb-8 bg-white p-4 rounded-xl shadow-md border border-gray-100">
            <div class="flex flex-col md:flex-row gap-4 items-end">
                <!-- Category Filter -->
                <div class="flex-1 w-full">
                    <label for="category" class="block text-gray-700 font-medium mb-2 text-sm">Category</label>
                    <select name="category" id="category"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 
                               focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Categories</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" 
                                <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="w-full">
                    <label class="block text-gray-700 font-medium mb-2 text-sm">Price Range</label>
                    <div class="flex space-x-2">
                        <input type="number" name="min_price" id="min_price" value="<?php echo e(request('min_price')); ?>"
                            placeholder="Min"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="self-center text-gray-400">-</span>
                        <input type="number" name="max_price" id="max_price" value="<?php echo e(request('max_price')); ?>"
                            placeholder="Max"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-2 w-full">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 
                               transition-colors duration-300 flex items-center justify-center shadow-md text-sm">
                        <i class="fas fa-filter mr-1"></i> Apply
                    </button>
                    <a href="<?php echo e(route('products.index')); ?>"
                        class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 
                               transition-colors duration-300 flex items-center justify-center text-sm">
                        <i class="fas fa-redo mr-1"></i> Reset
                    </a>
                </div>
            </div>
        </form>

        <!-- Results Count -->
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-600 text-sm">
                Showing <span class="font-semibold"><?php echo e($products->count()); ?></span> of 
                <span class="font-semibold"><?php echo e($products->total()); ?></span> products
            </p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $firstImage = $product->getFirstImageAttribute();
                ?>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300 
                            hover:shadow-md border border-gray-100 flex flex-col text-center">
                    
                    <a href="<?php echo e(route('products.show', $product->id)); ?>" 
                       class="block relative group overflow-hidden">
                        <div class="relative pt-[100%]">
                            <?php if($firstImage): ?>
                                <img src="<?php echo e(asset('storage/' . $firstImage)); ?>" 
                                     alt="<?php echo e($product->name); ?>" 
                                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <?php else: ?>
                                <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-lg"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>

                    <div class="p-2 flex-grow flex flex-col">
                        <h3 class="font-medium text-gray-900 mb-1 line-clamp-1 text-xs"><?php echo e($product->name); ?></h3>
                        <span class="text-indigo-600 font-bold text-xs mb-1"><?php echo e($product->price); ?> MAD</span>
                        
                        <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>" class="add-to-cart-form mt-auto">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="size" value="<?php echo e($product->sizes->first()->size ?? ''); ?>">
                            <input type="hidden" name="price" value="<?php echo e($product->sizes->first()->price ?? $product->price); ?>">
                            <button type="submit" 
                                    class="w-full bg-indigo-100 hover:bg-indigo-200 text-indigo-600 rounded-md py-1.5 text-xs transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-cart-plus mr-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-8">
                    <div class="inline-block p-3 bg-indigo-50 rounded-full mb-3">
                        <i class="fas fa-search text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Aucun produit trouvé</h3>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <?php echo e($products->appends(request()->query())->links('vendor.pagination.tailwind')); ?>

        </div>
    </div>
</section>

<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* تحسينات للعرض على الهواتف */
    @media (max-width: 640px) {
        .container {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }
        
        section {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        
        .grid > div {
            margin-bottom: 0.5rem;
        }
        
        /* تحسين حجم الخطوط للنصوص الصغيرة */
        .text-xs {
            font-size: 0.7rem;
        }
        
        /* تحسين الأزرار لتصبح أكثر ملاءمة للمس */
        button, a {
            min-height: 2.5rem;
        }
    }
</style>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\shop\products.blade.php ENDPATH**/ ?>
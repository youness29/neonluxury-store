

<?php $__env->startSection('content'); ?>
<section class="py-20 px-4 bg-gray-50">
    <div class="container mx-auto max-w-2xl text-center">

        <!-- ✅ Success Icon -->
        <div class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full bg-green-100 text-green-600">
            <i class="fas fa-check text-4xl"></i>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-4">Order Placed Successfully!</h1>
        <p class="text-gray-600 mb-8">
            Thank you <span class="font-semibold"><?php echo e($order->customer_name); ?></span> for your order.<br>
            We will contact you soon at 
            <?php if($order->customer_email): ?> <span class="text-indigo-600"><?php echo e($order->customer_email); ?></span> <?php endif; ?>
            <?php if($order->customer_phone): ?> or <span class="text-indigo-600"><?php echo e($order->customer_phone); ?></span> <?php endif; ?>
        </p>

        <!-- 🧾 Order Details -->
        <div class="bg-white shadow-md rounded-xl p-6 text-left">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Order #<?php echo e($order->id); ?></h2>

            <ul class="divide-y divide-gray-200 mb-4">
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-900"><?php echo e($item->product->name); ?></p>
                            <p class="text-sm text-gray-500">Qty: <?php echo e($item->quantity); ?></p>
                        </div>
                        <span class="text-gray-700"><?php echo e($item->price * $item->quantity); ?> MAD</span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="flex justify-between text-lg font-bold text-gray-800">
                <span>Total:</span>
                <span><?php echo e(number_format($order->total, 2)); ?> MAD</span>
            </div>
        </div>

        <!-- 🔘 Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('products.index')); ?>" 
               class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
               Continue Shopping
            </a>
            
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\checkout\success.blade.php ENDPATH**/ ?>
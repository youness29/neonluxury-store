

<?php $__env->startSection('content'); ?>
<div  class="container mx-auto py-12 px-4 mt-24">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Your Shopping Cart</h1>
            <p class="text-gray-600">Review and manage your items</p>
        </div>

        <!-- Cart Content -->
        <?php if(session('cart') && count(session('cart')) > 0): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Cart Items -->
            <div class="divide-y divide-gray-100">
                <?php
                    $subtotal = 0;
                ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $lineTotal = $item['price'] * $item['quantity'];
                        $subtotal += $lineTotal;
                    ?>
                    <div class="p-6 flex flex-col sm:flex-row items-start gap-4">
                        <div class="w-full sm:w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                            <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg"><?php echo e($item['name']); ?></h3>
                                    <p class="text-gray-600 text-sm mt-1">Size: <?php echo e($item['size']); ?></p>
                                </div>
                                <p class="text-lg font-bold text-indigo-600"><?php echo e(number_format($item['price'], 2)); ?> MAD</p>
                            </div>
      <div class="flex items-center mt-4">
<div class="flex items-center border border-gray-300 rounded-lg">
    <button type="button" class="update-qty w-8 h-8 flex items-center justify-center text-gray-600"
            data-id="<?php echo e($id); ?>" data-action="decrease">−</button>

    <span class="w-8 h-8 flex items-center justify-center font-medium" id="qty-<?php echo e($id); ?>">
        <?php echo e($item['quantity']); ?>

    </span>

    <button type="button" class="update-qty w-8 h-8 flex items-center justify-center text-gray-600"
            data-id="<?php echo e($id); ?>" data-action="increase">+</button>
</div>


    <form method="POST" action="<?php echo e(route('cart.remove', $id)); ?>" class="ml-4">
        <?php echo csrf_field(); ?>
        <button type="submit" class="text-red-500 hover:text-red-700 flex items-center">
            <i class="fas fa-trash-alt mr-1"></i>
            <span>Remove</span>
        </button>
    </form>
</div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
<?php
    $total = $subtotal;
?>
            </div>

           <!-- Order Summary -->
<div class="bg-gray-50 p-6 border-t border-gray-200">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>
    <div class="space-y-3">
        <div class="flex justify-between">
            <span class="text-gray-600">Subtotal</span>
            <span class="font-medium" id="subtotal"><?php echo e($subtotal); ?> MAD</span>
        </div>
        <div class="flex justify-between pt-3 border-t border-gray-200">
            <span class="text-lg font-semibold">Total</span>
            <span class="text-lg font-bold text-indigo-600" id="total"><?php echo e(number_format($total, 2)); ?> MAD</span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex flex-col sm:flex-row gap-3">
        <a href="<?php echo e(route('products.index')); ?>" class="flex-1 text-center bg-white border border-gray-300 text-gray-700 font-medium py-3 px-4 rounded-lg hover:bg-gray-50 transition-colors">
            Continue Shopping
        </a>
        <a href="<?php echo e(route('checkout.index')); ?>" class="flex-1 text-center bg-indigo-600 text-white font-medium py-3 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
            Proceed to Checkout
        </a>
    </div>
</div>


        <!-- Clear Cart Button -->
        <form method="POST" action="<?php echo e(route('cart.clear')); ?>" class="mt-6 text-center">
            <?php echo csrf_field(); ?>
            <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
                <i class="fas fa-trash-alt mr-2"></i> Clear Entire Cart
            </button>
        </form>
        <?php else: ?>
        <!-- Empty Cart State -->
        <div class="bg-white rounded-xl shadow-md p-8 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full mb-4">
                <i class="fas fa-shopping-cart text-xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-600 mb-6">Looks like you haven't added any items to your cart yet.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="inline-block bg-indigo-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-indigo-700 transition-colors">
                Start Shopping
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
    /* Custom styles for enhanced visual appeal */
    .bg-gray-50 {
        background-color: #f9fafb;
    }
    
    /* Smooth transitions for interactive elements */
    button, a {
        transition: all 0.3s ease;
    }
    
    /* Hover effects for cart items */
    .divide-y > div:hover {
        background-color: #f8f9fa;
    }
    
    /* Custom styling for quantity input */
    .flex.items-center.border button {
        transition: background-color 0.2s ease;
    }
    
    .flex.items-center.border button:hover {
        background-color: #f3f4f6;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.update-qty').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let action = this.getAttribute('data-action');

            let currentQty = parseInt(document.getElementById(`qty-${id}`).textContent);

            if (action === "decrease" && currentQty > 1) {
                currentQty--;
            } else if (action === "increase") {
                currentQty++;
            }

            fetch(`/cart/update/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ quantity: currentQty })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`qty-${id}`).textContent = data.quantity;
                    document.getElementById('subtotal').textContent = data.subtotal.toFixed(2) + " MAD";
                    document.getElementById('total').textContent = data.total.toFixed(2) + " MAD";
                }
            });
        });
    });
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\cart\index.blade.php ENDPATH**/ ?>
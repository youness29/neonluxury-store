

<?php $__env->startSection('content'); ?>
<section class="container mx-auto py-12 px-4 mt-24">
    <div class="container mx-auto max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>

            <form id="checkoutForm" action="<?php echo e(route('checkout.place')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="payment_method" id="payment_method" value="cod">
                <input type="hidden" name="payment_intent_id" id="payment_intent_id" value="">

                <div>
                    <label class="block font-medium">Full Name *</label>
                    <input name="customer_name" required class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block font-medium">Email</label>
                    <input name="customer_email" type="email" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block font-medium">Phone</label>
                    <input name="customer_phone" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block font-medium">Address</label>
                    <textarea name="customer_address" class="w-full border rounded p-2"></textarea>
                </div>

                <div class="mt-4">
                    <label class="block font-medium mb-2">Payment Method</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="payment_choice" value="cod" checked onchange="selectPayment('cod')">
                            <span>Cash on Delivery</span>
                        </label>

                        
                    </div>
                </div>

                <div id="stripeSection" class="hidden mt-4">
                    <label class="block font-medium mb-2">Card Details</label>
                    <div id="card-element" class="p-3 border rounded"></div>
                    <div id="card-errors" class="text-red-500 mt-2"></div>
                </div>

                <button id="placeOrderBtn" type="submit" class="w-full bg-indigo-600 text-white py-2 rounded">
                    Place Order
                </button>
            </form>
        </div>

        <!-- Order Summary same as before -->
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-6">Order Summary</h2>
            <ul class="divide-y">
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                    <li class="py-3 flex justify-between">
                        <div>
                            <p class="font-semibold"><?php echo e($item['name']); ?></p>
                            <p class="text-sm text-gray-500">Qty: <?php echo e($item['quantity']); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="font-medium"><?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?> MAD</p>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="mt-4 flex justify-between text-lg font-bold">
                <span>Total</span><span><?php echo e(number_format($total, 2)); ?> MAD</span>
            </div>
        </div>
    </div>
</section>

<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("<?php echo e(config('services.stripe.key')); ?>");
    let elements;
    let cardElement;
    let clientSecret = null;

    function selectPayment(mode) {
        document.getElementById('payment_method').value = (mode === 'cod') ? 'cod' : 'online';

        if (mode === 'online') {
            document.getElementById('stripeSection').classList.remove('hidden');
            initStripeIfNeeded();
        } else {
            document.getElementById('stripeSection').classList.add('hidden');
        }
    }

    function initStripeIfNeeded() {
        if (elements) return; // already initialized

        elements = stripe.elements();
        cardElement = elements.create('card');
        cardElement.mount('#card-element');
    }

    // When user submits form
    document.getElementById('checkoutForm').addEventListener('submit', async function(e) {
        const method = document.getElementById('payment_method').value;
        if (method === 'cod') {
            // normal submit -> server will create order as COD
            return; // let form submit
        }

        // online payment -> prevent default, create PaymentIntent, confirm card
        e.preventDefault();

        // Create PaymentIntent from server
        const resp = await fetch("<?php echo e(route('checkout.createPaymentIntent')); ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({})
        });
        const data = await resp.json();
        if (data.error) {
            alert(data.error);
            return;
        }
        clientSecret = data.clientSecret;

        // Confirm card payment
        const {error, paymentIntent} = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: document.querySelector('input[name="customer_name"]').value,
                    email: document.querySelector('input[name="customer_email"]').value
                }
            }
        });

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            return;
        }

        if (paymentIntent && paymentIntent.status === 'succeeded') {
            // set hidden input payment_intent_id then submit form to create order
            document.getElementById('payment_intent_id').value = paymentIntent.id;
            // set payment_method to online
            document.getElementById('payment_method').value = 'online';
            // now submit form (server will verify PI and create order)
            e.target.submit();
        } else {
            alert('Payment did not succeed. Status: ' + (paymentIntent ? paymentIntent.status : 'unknown'));
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\checkout\index.blade.php ENDPATH**/ ?>
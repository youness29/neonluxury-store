

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-12 px-4 mt-24">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Product Image Gallery -->
            <div>
                <!-- Main Image -->
                <div class="rounded-xl overflow-hidden shadow-lg bg-white p-4 mb-6 border border-gray-100">
                    <?php
                        $images = $product->images_array;
                        $firstImage = $product->getFirstImageAttribute();
                    ?>
                    
                    <img src="<?php echo e($firstImage ? asset('storage/' . $firstImage) : asset('images/default-product.jpg')); ?>" 
                         alt="<?php echo e($product->name); ?>" 
                         class="w-full h-96 object-cover transition-transform duration-500 hover:scale-105 rounded-lg"
                         id="mainImage">
                </div>

                <!-- Thumbnail Gallery -->
                <?php if(count($images) > 1): ?>
                <div class="grid grid-cols-4 gap-4">
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cursor-pointer border-2 border-transparent hover:border-indigo-500 rounded-lg transition-all duration-300 thumbnail-item <?php echo e($index === 0 ? 'border-indigo-500' : ''); ?>"
                         onclick="changeMainImage('<?php echo e(asset('storage/' . $image)); ?>', this)">
                        <img src="<?php echo e(asset('storage/' . $image)); ?>" 
                             alt="<?php echo e($product->name); ?> - Image <?php echo e($index + 1); ?>"
                             class="w-full h-20 object-cover rounded-lg">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php echo e($product->name); ?></h1>
                
                <p class="text-gray-600 text-lg mb-2"><?php echo e($product->short_description); ?></p>

                
                
                <!-- Sizes & Prices -->
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-200 mb-8">
                    <h3 class="font-semibold text-xl mb-4 text-gray-800 flex items-center">
                        <i class="fas fa-ruler-combined mr-2 text-indigo-500"></i> Available Sizes & Prices
                    </h3>
                    
                    <select id="sizeSelect" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                            onchange="updateSelectedSize(this)">
                        <option value="" disabled selected>-- Please select a size --</option>
                        <?php $__currentLoopData = $product->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($size->size); ?>" data-price="<?php echo e($size->price); ?>">
                                <?php echo e($size->size); ?> - <?php echo e(number_format($size->price, 2)); ?> MAD
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Selected Size & Price -->
                <div class="bg-indigo-50 p-4 rounded-xl mb-6 hidden border-l-4 border-indigo-500" id="selectedSizeContainer">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-600">Selected:</span>
                            <span class="font-medium ml-2 text-gray-800" id="selectedSizeText">Please select a size</span>
                        </div>
                        <span class="text-indigo-600 font-bold text-xl" id="selectedPriceText">0.00 MAD</span>
                    </div>
                </div>

                <!-- Add to Cart -->
                <form id="addToCartForm" class="add-to-cart-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="size" id="selectedSizeInput">
                    <input type="hidden" name="price" id="selectedPriceInputHidden">

                    <div class="flex items-center space-x-4 mb-6">
                        <span class="text-gray-700 font-medium">Quantity:</span>
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <button type="button" class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition-colors" onclick="changeQty(-1)">−</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1"
                                   class="h-10 w-16 border-transparent text-center focus:outline-none">
                            <button type="button" class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition-colors" onclick="changeQty(1)">+</button>
                        </div>
                    </div>
                    
                    <button type="submit" id="addToCartBtn"
                        class="w-full bg-indigo-600 text-white px-8 py-4 rounded-lg hover:bg-indigo-700 transition-colors shadow-md flex items-center justify-center font-medium disabled:bg-gray-400 disabled:cursor-not-allowed"
                        disabled>
                        <i class="fas fa-cart-plus mr-3"></i> Add to Cart
                    </button>

                    <!-- WhatsApp Contact Button -->
                    <a id="whatsappBtn" target="_blank"
                    class="mt-4 w-full bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition-colors shadow-md flex items-center justify-center font-medium cursor-pointer">
                        <i class="fab fa-whatsapp mr-3"></i> Contact us on WhatsApp
                    </a>
                </form>

                <!-- Product Info -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Product Details</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex"><span class="font-medium text-gray-800 w-32">Category:</span> <?php echo e($product->category->name ?? 'N/A'); ?></li>
                        <li class="flex"><span class="font-medium text-gray-800 w-32">SKU:</span> PRD-<?php echo e($product->id); ?></li>
                        <li class="flex"><span class="font-medium text-gray-800 w-32">Available Images:</span> <?php echo e(count($images)); ?></li>
                    </ul>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                    <?php echo e($product->description); ?>

                </p>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if(isset($relatedProducts) && $relatedProducts->count() > 0): ?>
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-heart mr-3 text-red-500"></i> You May Also Like
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $relatedFirstImage = $related->getFirstImageAttribute();
                    ?>
                <a href="<?php echo e(route('products.show', $related->id)); ?>" 
                   class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all transform hover:-translate-y-1 group border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="<?php echo e($relatedFirstImage ? asset('storage/' . $relatedFirstImage) : asset('images/default-product.jpg')); ?>" 
                             alt="<?php echo e($related->name); ?>" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        <?php if($related->created_at->gt(now()->subDays(10))): ?>
                        <div class="absolute top-3 left-3">
                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">New</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-900 mb-1 line-clamp-1"><?php echo e($related->name); ?></h3>
                        <p class="text-gray-500 text-sm mb-3 line-clamp-2"><?php echo e(Str::limit($related->description, 50)); ?></p>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold"><?php echo e(number_format($related->price, 2)); ?> MAD</span>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .thumbnail-item {
        transition: all 0.3s ease;
    }

    .thumbnail-item:hover {
        transform: scale(1.05);
    }

    .thumbnail-item.active {
        border-color: #4f46e5;
        transform: scale(1.05);
    }

    #selectedSizeContainer {
        transition: all 0.3s ease;
    }

    .line-clamp-1 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }

    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
</style>

<script>
function changeQty(val) {
    const qtyInput = document.getElementById('quantity');
    let value = parseInt(qtyInput.value);
    if(val === -1 && value > 1) {
        qtyInput.value = value - 1;
    }
    if(val === 1) {
        qtyInput.value = value + 1;
    }
}

function changeMainImage(imageUrl, element) {
    document.getElementById('mainImage').src = imageUrl;
    document.querySelectorAll('.thumbnail-item').forEach(item => {
        item.classList.remove('border-indigo-500', 'active');
        item.classList.add('border-transparent');
    });
    element.classList.add('border-indigo-500', 'active');
    element.classList.remove('border-transparent');
}

function updateSelectedSize(select) {
    const selectedOption = select.options[select.selectedIndex];
    if (!selectedOption.value) return;

    const size = selectedOption.value;
    const price = selectedOption.getAttribute('data-price');

    document.getElementById('selectedSizeText').innerText = size;
    document.getElementById('selectedPriceText').innerText = parseFloat(price).toFixed(2) + " MAD";

    document.getElementById('selectedSizeContainer').classList.remove('hidden');
    document.getElementById('selectedSizeInput').value = size;
    document.getElementById('selectedPriceInputHidden').value = price;
    document.getElementById('addToCartBtn').disabled = false;
}

const whatsappNumber = "212620959332";

document.getElementById('whatsappBtn').addEventListener('click', function (e) {
    e.preventDefault();

    const productName = "<?php echo e($product->name); ?>";
    const size = document.getElementById('selectedSizeInput').value || "Not selected";
    const price = document.getElementById('selectedPriceInputHidden').value || "0";
    const qty = document.getElementById('quantity').value;

    const message = `Hello, I am interested in this product:
- *Product:* ${productName}
- *Size:* ${size}
- *Price:* ${price} MAD
- *Quantity:* ${qty}

Can you give me more details?`;

    const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');
});

document.addEventListener('DOMContentLoaded', function() {
    const addToCartForm = document.getElementById('addToCartForm'); 

    addToCartForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const selectedSize = document.getElementById('selectedSizeInput').value;
        if (!selectedSize) {
            alert('Please select a size first');
            return;
        }

        const formData = {
            size: document.getElementById('selectedSizeInput').value,
            price: document.getElementById('selectedPriceInputHidden').value,
            quantity: document.getElementById('quantity').value,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        fetch("<?php echo e(route('cart.add', $product->id)); ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Full response:', data);

            if (data.success) {
                const newCount = data.count || data.cart_count;
                const cartCountElement = document.getElementById('cart-count');
                
                if (cartCountElement && newCount !== undefined) {
                    cartCountElement.innerText = newCount;
                }

                const cartIcon = document.querySelector('a[href="<?php echo e(route('cart.index')); ?>"]');
                if (cartIcon) {
                    cartIcon.style.transition = 'opacity 0.3s';
                    cartIcon.style.opacity = '0.7';
                    setTimeout(() => {
                        cartIcon.style.opacity = '1';
                    }, 300);
                }
            } else {
                console.error('Server responded with an error:', data.message);
                alert('Failed to add item to cart: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('A network error occurred. Please check your connection.');
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\shop\product-details.blade.php ENDPATH**/ ?>
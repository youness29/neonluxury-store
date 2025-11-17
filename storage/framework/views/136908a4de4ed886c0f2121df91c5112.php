<style>
    :root {
        --primary-color: #3b82f6;
        --secondary-color: #1e40af;
        --accent-color: #60a5fa;
    }
    
    /* Custom Animations */
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes pulseGlow {
        0% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
        50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.8); }
        100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
    }
    
    @keyframes slideInFromRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes scaleIn {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    
    /* Navbar animations */
    .nav-animate {
        animation: slideDown 0.5s ease-out;
    }
    
    .logo-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .logo-hover:hover {
        transform: scale(1.05) rotate(-2deg);
        animation: pulseGlow 2s infinite;
    }
    
    /* Remove rotation on hover */
    #mobileMenuButton:hover {
        transform: none !important;
    }

    .nav-link {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #0213b1, #24acfb);
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::before {
        width: 100%;
        right: auto;
        left: 0;
    }
    
    .nav-link:hover {
        transform: translateY(-2px);
        color: #245dfb !important;
    }
    
    .cart-pulse {
        animation: pulseGlow 2s infinite;
    }
    
    .dropdown-menu {
        animation: scaleIn 0.2s ease-out;
        transform-origin: top right;
    }
    
    .mobile-menu {
        animation: slideInFromRight 0.3s ease-out;
    }
    
    .search-overlay {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Mobile Menu */
    #mobileMenu {
        transform: translateX(100%);
        opacity: 0;
        transition: all 0.3s ease-in-out;
        position: fixed;
        top: 0;
        right: 0;
        width: 70%;
        height: 100vh;
        background: #111827;
        z-index: 9999;
        overflow-y: auto;
        box-shadow: -4px 0 10px rgba(0,0,0,0.5);
    }

    #mobileMenu.active {
        transform: translateX(0);
        opacity: 1;
    }

    /* Overlay */
    #menuOverlay {
        transition: opacity 0.3s ease-in-out;
        background: rgba(0,0,0,0.5);
        z-index: 9998;
    }

    #menuOverlay.hidden {
        opacity: 0;
        pointer-events: none;
    }
    
    /* Mobile improvements */
    @media (max-width: 768px) {
        .nav-link::before {
            display: none;
        }
        
        .nav-link:hover {
            transform: none;
        }
        
    /* Hide right elements on mobile */
        .right-elements {
            display: none !important;
        }
    }
    
    /* Scroll effects */
    .navbar-scrolled {
        background: rgba(31, 41, 55, 0.95) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        padding: 5px 0;
        transition: all 0.3s ease;
    }
</style>

<nav class="bg-gradient-to-r from-gray-900 to-gray-800 shadow-md fixed w-full z-40 nav-animate" id="navbar">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">

        <!-- Logo -->
        <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0 logo-hover">
            <img src="<?php echo e(asset('images/476949643_615319264477454_6401096641405009685_n.jpg')); ?>" 
                 alt="Logo" class="h-12 w-auto rounded-lg shadow-md transition-all duration-300">
        </a>

        <!-- Center Links (hidden on mobile) -->
        <div class="hidden md:flex flex-1 justify-center space-x-12 text-lg font-semibold">
            <a href="<?php echo e(route('home')); ?>" class="text-white nav-link px-3 py-2">
                <i class="fas fa-home mr-2"></i>Home
            </a>
            <a href="<?php echo e(route('products.index')); ?>" class="text-white nav-link px-3 py-2">
                <i class="fas fa-box mr-2"></i>Products
            </a>
            <a href="<?php echo e(route('services.index')); ?>" class="text-white nav-link px-3 py-2">
                <i class="fas fa-concierge-bell mr-2"></i>Services
            </a>
            <a href="<?php echo e(route("contact.show")); ?>" class="text-white nav-link px-3 py-2">
                <i class="fas fa-envelope mr-2"></i>Contact
            </a>
        </div>

        <!-- Right: Cart + Search + Auth (hidden on mobile) -->
        <div class="hidden md:flex items-center space-x-5 right-elements">
            <!-- Cart -->
            <a href="<?php echo e(route('cart.index')); ?>" class="relative text-white hover:text-blue-500 transition-all duration-300 transform hover:scale-110">
                <i class="fas fa-shopping-cart text-xl"></i>
                <span id="cart-count" 
                      class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-1.5 py-0.5 cart-pulse">
                    <?php echo e(session('cart') ? count(session('cart')) : 0); ?>

                </span>
            </a>

            <!-- Search -->
            

            <!-- Auth -->
           <?php if(auth()->guard()->check()): ?>
    <!-- User dropdown for authenticated users -->
    <div class="relative">
        <button id="profileDropdownBtn" class="flex items-center text-white space-x-2">
            <span><?php echo e(Auth::user()->name); ?></span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="profileDropdownMenu" class="absolute hidden bg-white rounded-md shadow-lg py-2 mt-2">
            <li><a href="<?php echo e(route('user.profile.edit')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a></li>
            <li>
                <form method="POST" action="<?php echo e(route('user.logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </li>
        </ul>
    </div>
<?php else: ?>
    <!-- Login and Register links for guests -->
    <div class="flex items-center space-x-4">
        <a href="<?php echo e(route('user.login')); ?>" class="text-white hover:text-yellow-500 transition-all duration-300">
            <i class="fas fa-sign-in-alt mr-1"></i>Login
        </a>
        <a href="<?php echo e(route('user.register')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300">
            <i class="fas fa-user-plus mr-1"></i>Register
        </a>
    </div>
<?php endif; ?>
        </div>

    <!-- Mobile Menu Button -->
        <button 
            class="md:hidden flex items-center justify-center focus:outline-none cursor-pointer text-white text-2xl transition-transform duration-300" 
            onclick="toggleMobileMenu()" 
            id="mobileMenuButton"
        >
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Overlay -->
<div id="menuOverlay" class="fixed inset-0 hidden"></div>

<!-- Mobile Menu -->
<div id="mobileMenu" class="md:hidden">
    <a href="<?php echo e(route('home')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
        <i class="fas fa-home mr-3"></i>Home
    </a>
    <a href="<?php echo e(route('products.index')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
        <i class="fas fa-box mr-3"></i>Products
    </a>
    <a href="<?php echo e(route('services.index')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
        <i class="fas fa-concierge-bell mr-3"></i>Services
    </a>
    <a href="<?php echo e(route("contact.show")); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
        <i class="fas fa-envelope mr-3"></i>Contact
    </a>
    <a href="<?php echo e(route('cart.index')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
        <i class="fas fa-shopping-cart mr-3"></i>Cart
        <span id="cart-count-mobile" class="ml-auto bg-red-500 text-white text-xs font-bold rounded-full px-2 py-1">
            <?php echo e(session('cart') ? count(session('cart')) : 0); ?>

        </span>
    </a>
    
    
    <!-- Auth in mobile -->
    <?php if(auth()->guard()->check()): ?>
       
            <a href="<?php echo e(route('user.profile.edit')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
                <i class="fas fa-user-circle mr-3"></i>Profile
            </a>
            <form method="POST" action="<?php echo e(route('user.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="block w-full text-left px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                </button>
            </form>
       
    <?php else: ?>
        <a href="<?php echo e(route('user.login')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
            <i class="fas fa-sign-in-alt mr-3"></i>Login
        </a>
        <a href="<?php echo e(route('register')); ?>" class="block px-6 py-4 text-white hover:bg-gray-800 border-b border-gray-700 transition-all duration-200 flex items-center">
            <i class="fas fa-user-plus mr-3"></i>Register
        </a>
    <?php endif; ?>
</div>

<!-- Search Overlay -->
<div id="searchOverlay" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50 search-overlay">
    <div class="bg-white rounded-xl shadow-2xl w-11/12 md:w-1/3 p-6 flex items-center transform transition-all duration-300 scale-95 hover:scale-100">
        <input type="text" name="search" placeholder="Search products..."
               class="flex-1 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-gray-800">
        <button onclick="toggleSearch()" class="ml-3 text-gray-600 hover:text-red-500 text-2xl transition-all duration-300 transform hover:scale-110">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<script>
    // toggleSearch function with Animation
    function toggleSearch() {
        const overlay = document.getElementById('searchOverlay');
        if (overlay.classList.contains('hidden')) {
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.add('flex');
            }, 10);
            // Close mobile menu if open
            closeMobileMenu();
        } else {
            overlay.classList.add('hidden');
            overlay.classList.remove('flex');
        }
    }

    // toggleSearch function for mobile
    function toggleSearchMobile() {
        toggleSearch();
        closeMobileMenu();
    }

    // toggleMobileMenu function with Animation
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuButton = document.getElementById('mobileMenuButton');
        const overlay = document.getElementById('menuOverlay');

        if (mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        } else {
            mobileMenu.classList.add('active');
            overlay.classList.remove('hidden');
            menuButton.innerHTML = '<i class="fas fa-times"></i>';
        }
    }

    // closeMobileMenu function
    function closeMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuButton = document.getElementById('mobileMenuButton');
        const overlay = document.getElementById('menuOverlay');
        
        mobileMenu.classList.remove('active');
        overlay.classList.add('hidden');
        menuButton.innerHTML = '<i class="fas fa-bars"></i>';
    }

    // Close menu when clicking on overlay
    document.getElementById('menuOverlay').addEventListener('click', () => {
        closeMobileMenu();
    });

    // Scroll effect on Navbar
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    // Add effects on load
    document.addEventListener('DOMContentLoaded', function() {
    // Effects for elements after load
        setTimeout(() => {
            const links = document.querySelectorAll('.nav-link');
            links.forEach((link, index) => {
                link.style.animationDelay = `${index * 0.1}s`;
            });
        }, 500);

    // Update cart
        const forms = document.querySelectorAll(".add-to-cart-form");
        forms.forEach(form => {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                fetch(form.action, {
                    method: "POST",
                    body: new FormData(form),
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update counter in both versions
                    document.getElementById("cart-count").innerText = data.count;
                    document.getElementById("cart-count-mobile").innerText = data.count;
                    
                    // Add animation to cart
                    const cart = document.querySelector('a[href="<?php echo e(route("cart.index")); ?>"]');
                    cart.classList.add('animate__animated', 'animate__pulse');
                    setTimeout(() => {
                        cart.classList.remove('animate__animated', 'animate__pulse');
                    }, 1000);
                })
                .catch(error => console.error("Error:", error));
            });
        });

        // Dropdown profile menu
        const profileBtn = document.getElementById('profileDropdownBtn');
        const profileMenu = document.getElementById('profileDropdownMenu');
        if(profileBtn && profileMenu) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', function(e) {
                if (!profileMenu.classList.contains('hidden')) {
                    profileMenu.classList.add('hidden');
                }
            });
            profileMenu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const searchOverlay = document.getElementById('searchOverlay');
        if (!searchOverlay.classList.contains('hidden') && event.target === searchOverlay) {
            toggleSearch();
        }
    });
</script><?php /**PATH C:\Users\zizo\led-decor\resources\views\layouts\partials\user-navbar.blade.php ENDPATH**/ ?>
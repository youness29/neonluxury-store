

<?php $__env->startSection('content'); ?>
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full py-20">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:shadow-3xl">
            
            <!-- Decorative Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-700 p-6 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-x-16 -translate-y-16"></div>
                <div class="absolute bottom-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full translate-x-16 translate-y-16"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-lock text-white text-3xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                    <p class="text-blue-100">Sign in to your account</p>
                </div>
            </div>

            <!-- Login Form -->
            <div class="p-8">
                <form method="POST" action="<?php echo e(route('user.login')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <!-- Email Field -->
                    <div class="group">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>Email Address
                        </label>
                        <div class="relative">
                            <input 
                                id="email" 
                                type="email" 
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 outline-none group-hover:border-blue-300 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter your email"
                                required 
                                autocomplete="email" 
                                autofocus
                            >
                            <i class="fas fa-user text-gray-400 absolute right-3 top-3.5"></i>
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="flex items-center mt-2 text-red-600 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span class="font-medium"><?php echo e($message); ?></span>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password Field -->
                    <div class="group">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock text-blue-500 mr-2"></i>Password
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                type="password" 
                                name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 outline-none group-hover:border-blue-300 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter your password"
                                required 
                                autocomplete="current-password"
                            >
                            <i class="fas fa-key text-gray-400 absolute right-3 top-3.5"></i>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="flex items-center mt-2 text-red-600 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span class="font-medium"><?php echo e($message); ?></span>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember" 
                                name="remember" 
                                type="checkbox"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>

                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                            >
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors duration-300">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-700 text-white py-3 px-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transform transition-all duration-300 hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </button>

                    <!-- Divider -->
                    <div class="relative flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink mx-4 text-gray-500 text-sm">Or continue with</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center px-4 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            <i class="fab fa-google text-red-500 mr-2"></i>
                            <span class="text-sm font-medium">Google</span>
                        </button>
                        <button type="button" class="flex items-center justify-center px-4 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            <i class="fab fa-facebook text-blue-600 mr-2"></i>
                            <span class="text-sm font-medium">Facebook</span>
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="<?php echo e(route('user.register')); ?>" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-300 ml-1">
                                Sign up now
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">
                <i class="fas fa-shield-alt mr-1"></i>
                Your data is securely encrypted
            </p>
        </div>
    </div>
</div>

<style>
    .group:hover .group-hover\:border-blue-300 {
        border-color: #93c5fd;
    }
    input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .shadow-3xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    * {
        transition-property: color, background-color, border-color, transform, box-shadow;
        transition-duration: 300ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\auth\user-login.blade.php ENDPATH**/ ?>
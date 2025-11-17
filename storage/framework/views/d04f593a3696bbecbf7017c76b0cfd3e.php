
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
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Create Community Post</h1>
                    <p class="text-gray-600 mt-2">Add a new post to showcase on your community section</p>
                </div>
                <a href="<?php echo e(route('admin.community.index')); ?>" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors duration-200 shadow-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back to List
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-purple-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Post Information</h2>
                            <p class="text-sm text-gray-600">Fill in the details for your new community post</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-6">
                    <form action="<?php echo e(route('admin.community.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <?php echo csrf_field(); ?>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Left Column - Form Fields -->
                            <div class="lg:col-span-2 space-y-6">
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                        Title <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="title" 
                                           name="title" 
                                           value="<?php echo e(old('title')); ?>"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Enter post title...">
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Caption -->
                                <div>
                                    <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">
                                        Caption
                                    </label>
                                    <textarea id="caption" 
                                              name="caption" 
                                              rows="4"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              placeholder="Write a captivating caption for your post..."><?php echo e(old('caption')); ?></textarea>
                                    <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Instagram Link -->
                                <div>
                                    <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                                        Instagram Link
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fab fa-instagram text-gray-400"></i>
                                        </div>
                                        <input type="url" 
                                               id="link" 
                                               name="link" 
                                               value="<?php echo e(old('link')); ?>"
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="https://instagram.com/p/...">
                                    </div>
                                    <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Active Status -->
                                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1" 
                                               <?php echo e(old('is_active', true) ? 'checked' : ''); ?>

                                               class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="is_active" class="text-sm font-medium text-gray-700">
                                            Active Post
                                        </label>
                                        <p class="text-sm text-gray-500">This post will be visible on the website</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Image Upload -->
                            <div class="space-y-6">
                                <!-- Image Upload -->
                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                        Post Image <span class="text-red-500">*</span>
                                    </label>
                                    <div class="space-y-4">
                                        <!-- Upload Area -->
                                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center hover:border-purple-400 transition-colors duration-200 bg-gray-50">
                                            <input type="file" 
                                                   id="image" 
                                                   name="image" 
                                                   accept="image/*" 
                                                   required
                                                   class="hidden"
                                                   onchange="previewImage(this)">
                                            <label for="image" class="cursor-pointer">
                                                <div class="flex flex-col items-center justify-center gap-3">
                                                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center">
                                                        <i class="fas fa-cloud-upload-alt text-purple-600 text-2xl"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-900">Click to upload</p>
                                                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <!-- Image Preview -->
                                        <div id="imagePreviewContainer" class="hidden">
                                            <p class="text-sm font-medium text-gray-700 mb-3">Preview</p>
                                            <div class="relative rounded-2xl overflow-hidden border-2 border-gray-200">
                                                <img id="imagePreview" 
                                                     src="#" 
                                                     alt="Image preview" 
                                                     class="w-full h-64 object-cover">
                                                <button type="button" 
                                                        onclick="removeImage()"
                                                        class="absolute top-3 right-3 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                                                    <i class="fas fa-times text-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Guidelines -->
                                <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4">
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                                        <div class="text-sm text-blue-700">
                                            <p class="font-medium mb-1">Image Guidelines</p>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Use high-quality images</li>
                                                <li>Recommended: Square or 4:3 ratio</li>
                                                <li>Max file size: 2MB</li>
                                                <li>Formats: JPG, PNG, GIF</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                            <a href="<?php echo e(route('admin.community.index')); ?>" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="reset" 
                                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors duration-200">
                                Reset
                            </button>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-blue-100 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2">
                                <i class="fas fa-save"></i>
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const container = document.getElementById('imagePreviewContainer');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                container.classList.add('hidden');
            }
        }

        function removeImage() {
            const input = document.getElementById('image');
            const container = document.getElementById('imagePreviewContainer');
            
            input.value = '';
            container.classList.add('hidden');
        }

        // Drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.querySelector('label[for="image"]').parentElement;
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.classList.add('border-purple-500', 'bg-purple-50');
            }
            
            function unhighlight() {
                dropArea.classList.remove('border-purple-500', 'bg-purple-50');
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                const input = document.getElementById('image');
                
                if (files.length > 0) {
                    input.files = files;
                    previewImage(input);
                }
            }
        });
    </script>

    <style>
        input:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }
        
        .border-dashed:hover {
            border-color: #8b5cf6;
            background-color: #faf5ff;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\community\create.blade.php ENDPATH**/ ?>
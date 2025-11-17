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
    <title>Ajouter un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
       body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 40px rgba(50, 50, 93, 0.15), 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .form-input {
            transition: all 0.3s;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
        }
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s;
            border-radius: 12px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(135deg, #868686 0%, #5a5a5a 100%);
            transition: all 0.3s;
            border-radius: 12px;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(90, 90, 90, 0.4);
        }
        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            transition: all 0.3s;
            border-radius: 8px;
        }
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 107, 107, 0.4);
        }
        .error-box {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            border-radius: 12px;
            color: white;
        }
        .file-upload {
            position: relative;
            overflow: hidden;
            border: 2px dashed #c3cfe2;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
        }
        .file-upload:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        .file-input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            height: 100%;
            width: 100%;
        }
        .size-item {
            background: rgba(102, 126, 234, 0.05);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        .size-item:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        .add-size-btn {
            background: linear-gradient(135deg, #4ecdc4 0%, #42b883 100%);
            transition: all 0.3s;
            border-radius: 12px;
        }
        .add-size-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(78, 205, 196, 0.4);
        }
    </style>
</head>
<body class="py-8 px-4">
    <div class="container mx-auto max-w-4xl">
        <div class="card p-6 md:p-8">
            <h1 class="text-3xl font-bold mb-2 text-gray-800 flex items-center">
                <i class="fas fa-plus-circle mr-3 text-purple-500"></i> Ajouter un Produit
            </h1>
            
            <?php if($errors->any()): ?>
                <div class="error-box p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-white text-xl mr-2"></i>
                        <h2 class="font-bold text-white">Veuillez corriger les erreurs suivantes :</h2>
                    </div>
                    <ul class="mt-2 ml-2 list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-white"> <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-tag text-purple-500 mr-2"></i>Nom du produit
                    </label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" 
                           class="w-full px-4 py-3 form-input focus:outline-none" 
                           placeholder="Entrez le nom du produit" required>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-purple-500 mr-2"></i>Description
                    </label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 form-input focus:outline-none" 
                              placeholder="Décrivez le produit"><?php echo e(old('description')); ?></textarea>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-purple-500 mr-2"></i>Short Description
                    </label>
                    <input type="text" name="short_description" value="<?php echo e(old('short_description')); ?>" 
                           class="w-full px-4 py-3 form-input focus:outline-none" 
                           placeholder="A short sentence shown under the title (max 255 chars)">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-layer-group text-purple-500 mr-2"></i>Catégorie
                    </label>
                    <select name="category_id" class="w-full px-4 py-3 form-input focus:outline-none" required>
                        <option value="">-- Choisir une catégorie --</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id')==$category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

            

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-image text-purple-500 mr-2"></i>Images du produit
                    </label>
                    <div class="file-upload" id="fileUploadArea">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-purple-500 mb-2"></i>
                            <p class="text-gray-600" id="uploadText">Glissez-déposez vos images ou</p>
                            <span class="btn-primary text-white px-4 py-2 mt-3 inline-block cursor-pointer">Parcourir</span>
                            <p class="text-xs text-gray-500 mt-2">Formats supportés: JPG, PNG, GIF. Vous pouvez sélectionner plusieurs images.</p>
                        </div>
                        <input type="file" name="images[]" id="fileInput" class="file-input" accept=".jpg,.jpeg,.png,.gif" multiple>
                        <div id="imagePreview" class="flex flex-wrap gap-2 mt-3"></div>
                    </div>
                    <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        <i class="fas fa-expand-arrows-alt text-purple-500 mr-2"></i>Tailles et Prix
                    </label>
                    <div id="sizes-wrapper" class="space-y-3">
                        <div class="size-item">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                                <div class="md:col-span-5">
                                    <input type="text" name="sizes[0][size]" class="w-full px-4 py-2 form-input focus:outline-none" 
                                           placeholder="Taille (petit, moyen, grand)" required>
                                </div>
                                <div class="md:col-span-5">
                                    <div class="relative">
                                        <span class="absolute left-3 top-2 text-gray-500">€</span>
                                        <input type="number" name="sizes[0][price]" class="w-full pl-8 pr-4 py-2 form-input focus:outline-none" 
                                               placeholder="Prix" step="0.01" required>
                                    </div>
                                </div>
                                <div class="md:col-span-2 flex justify-center md:justify-end">
                                    <button type="button" class="btn-danger text-white px-3 py-2 remove-size">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" id="add-size" class="add-size-btn text-white px-4 py-2 mt-3 flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Ajouter une taille
                    </button>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="btn-primary text-white px-6 py-3 flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Enregistrer
                    </button>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn-secondary text-white px-6 py-3 flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Main fix here - handle files correctly
        const fileInput = document.getElementById('fileInput');
        const uploadText = document.getElementById('uploadText');
        const imagePreview = document.getElementById('imagePreview');
        const fileUploadArea = document.getElementById('fileUploadArea');

    // Store selected files
        let selectedFiles = [];

    // On file change
        fileInput.addEventListener('change', function(e) {
            const newFiles = Array.from(e.target.files);
            
            // Add new files to the list
            selectedFiles = selectedFiles.concat(newFiles);
            
            // Prevent duplicates by name and size
            selectedFiles = selectedFiles.filter((file, index, self) =>
                index === self.findIndex(f => 
                    f.name === file.name && 
                    f.size === file.size &&
                    f.lastModified === file.lastModified
                )
            );
            
            updateFileDisplay();
        });

    // Update the view
        function updateFileDisplay() {
            imagePreview.innerHTML = '';
            
            if (selectedFiles.length > 0) {
                uploadText.textContent = `${selectedFiles.length} fichier(s) sélectionné(s)`;
                
                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'relative';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" class="w-20 h-20 object-cover rounded border">
                            <button type="button" onclick="removeFile(${index})" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                ×
                            </button>
                        `;
                        imagePreview.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                uploadText.textContent = 'Glissez-déposez vos images ou cliquez ici';
            }
            
            // Update file input
            updateFileInput();
        }

    // Remove file
        window.removeFile = function(index) {
            selectedFiles.splice(index, 1);
            updateFileDisplay();
        }

    // Update file input
        function updateFileInput() {
            // Create new DataTransfer
            const dataTransfer = new DataTransfer();
            
            // Add selected files
            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            
            // Update file input
            fileInput.files = dataTransfer.files;
        }

        // Drag and drop functionality
        fileUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileUploadArea.classList.add('border-purple-500', 'bg-purple-50');
        });

        fileUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            fileUploadArea.classList.remove('border-purple-500', 'bg-purple-50');
        });

        fileUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            fileUploadArea.classList.remove('border-purple-500', 'bg-purple-50');
            
            const droppedFiles = Array.from(e.dataTransfer.files);
            const imageFiles = droppedFiles.filter(file => 
                file.type.startsWith('image/')
            );
            
            selectedFiles = selectedFiles.concat(imageFiles);
            selectedFiles = selectedFiles.filter((file, index, self) =>
                index === self.findIndex(f => 
                    f.name === file.name && 
                    f.size === file.size
                )
            );
            
            updateFileDisplay();
        });

    // Handle dynamic sizes
        let sizeIndex = 1;
        document.getElementById('add-size').addEventListener('click', function() {
            const wrapper = document.getElementById('sizes-wrapper');
            const newSize = document.createElement('div');
            newSize.classList.add('size-item');
            newSize.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-5">
                        <input type="text" name="sizes[${sizeIndex}][size]" class="w-full px-4 py-2 form-input focus:outline-none" placeholder="Taille (petit, moyen, grand)" required>
                    </div>
                    <div class="md:col-span-5">
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">DH</span>
                            <input type="number" name="sizes[${sizeIndex}][price]" class="w-full pl-8 pr-4 py-2 form-input focus:outline-none" placeholder="Prix" step="0.01" required>
                        </div>
                    </div>
                    <div class="md:col-span-2 flex justify-center md:justify-end">
                        <button type="button" class="btn-danger text-white px-3 py-2 remove-size">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;
            wrapper.appendChild(newSize);
            sizeIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-size') || e.target.closest('.remove-size')) {
                const sizeItem = e.target.closest('.size-item');
                sizeItem.style.opacity = '0';
                sizeItem.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    sizeItem.remove();
                }, 300);
            }
        });
    </script>
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
<?php endif; ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\products\create.blade.php ENDPATH**/ ?>
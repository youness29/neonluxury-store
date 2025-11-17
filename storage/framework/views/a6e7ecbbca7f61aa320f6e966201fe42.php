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
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>Modifier le Produit</title>

<style>
  :root{
    --bg1:#f3ecff; --bg2:#eaf7ff;
    --card:#ffffff; --text:#1f2937; --muted:#6b7280;
    --primary:#6d5dfc; --primary2:#8a5cf6;
    --accent:#22c55e; --danger:#ef4444; --border:#e5e7eb;
    --shadow:0 12px 30px rgba(0,0,0,.08);
  }

  /* layout */
  body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,"Helvetica Neue",Arial,sans-serif;
       background:linear-gradient(135deg,var(--bg1),var(--bg2)) fixed;}
  .wrap{max-width:1040px;margin:48px auto;padding:0 16px;}
  .card{background:var(--card); border-radius:18px; box-shadow:var(--shadow);
        padding:28px 22px;}
  @media(min-width:768px){ .card{padding:40px;} }

  /* headings */
  .title{font-size:28px; font-weight:800; color:var(--text); margin:0 0 6px;}
  .subtitle{color:var(--muted); margin:0 0 22px; font-size:15px}

  /* alerts */
  .alert{background:#fee2e2; border-left:6px solid var(--danger); color:#991b1b;
         padding:14px 16px; border-radius:12px; margin-bottom:20px}
  .alert h4{margin:0 0 8px; font-size:15px}
  .alert ul{margin:0; padding-left:18px}

  /* form */
  .grid{display:grid; gap:16px}
  @media(min-width:768px){ .grid-2{grid-template-columns:1fr 1fr} }

  label{display:block; font-size:14px; font-weight:700; color:var(--text); margin:4px 0 8px}
  .input,.select,.textarea,.file{
    width:100%; box-sizing:border-box; border:2px solid var(--border); border-radius:12px;
    padding:12px 14px; font-size:15px; outline:none; background:#fff; transition:.2s border,.2s box-shadow;
  }
  .textarea{min-height:110px; resize:vertical}
  .input:focus,.select:focus,.textarea:focus,.file:focus{
    border-color:var(--primary);
    box-shadow:0 0 0 3px rgba(109,93,252,.18);
  }

  /* file upload block */
  .upload{border:2px dashed #dbeafe; border-radius:14px; padding:22px; text-align:center;
          background:#f8fbff; transition:.2s}
  .upload:hover{border-color:var(--primary); background:#f3f7ff}
  .preview{margin-top:10px}
  .preview img{width:140px; height:auto; border-radius:12px; border:1px solid var(--border); box-shadow:var(--shadow)}

  /* sizes list */
  .sizes-head{font-weight:800; color:var(--text); margin:10px 0}
  .size-row{display:grid; gap:10px; grid-template-columns:1fr 1fr auto;
            background:#fafaff; border:1px solid #ecebff; border-radius:12px;
            padding:12px; align-items:center; transition:.2s}
  .size-row:hover{background:#f5f4ff}
  .btn{cursor:pointer; border:none; border-radius:12px; padding:12px 16px; font-weight:700; font-size:15px}
  .btn-primary{background:linear-gradient(135deg,var(--primary),var(--primary2)); color:#fff}
  .btn-primary:hover{filter:brightness(1.05)}
  .btn-ghost{background:#f3f4f6; color:#111827}
  .btn-ghost:hover{background:#e5e7eb}
  .btn-danger{background:var(--danger); color:#fff; border-radius:10px; padding:10px 14px}
  .btn-danger:hover{filter:brightness(1.05)}
  .btn-accent{background:linear-gradient(135deg,#16a34a,var(--accent)); color:#fff}
  .actions{display:flex; gap:12px; flex-wrap:wrap; justify-content:space-between; margin-top:8px}

  /* helpers */
  .mt-8{margin-top:28px} .mb-0{margin-bottom:0}
</style>
</head>

<body>
  <div class="wrap">
    <div class="card">
      <h1 class="title">✏️ Modifier le Produit</h1>
      <p class="subtitle">Mettez à jour les informations de votre produit avec un style propre et moderne.</p>

      
      <?php if($errors->any()): ?>
        <div class="alert">
          <h4>Erreurs détectées :</h4>
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>⚠️ <?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data" class="grid">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Name -->
        <div>
          <label>Nom du produit</label>
          <input class="input" type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
        </div>

        <!-- Description -->
        <div>
          <label>Description</label>
          <textarea class="textarea" name="description"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>

        <!-- Category -->
        <div>
          <label>Catégorie</label>
          <select class="select" name="category_id" required>
            <option value="">-- Choisir une catégorie --</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $product->category_id)==$category->id ? 'selected' : ''); ?>>
                <?php echo e($category->name); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <!-- Current Image -->
        <div>
          <label>Image actuelle</label>
          <?php if($product->image): ?>
            <div class="preview"><img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="current"></div>
          <?php else: ?>
            <p class="subtitle mb-0">Aucune image enregistrée.</p>
          <?php endif; ?>
        </div>

        <!-- New Image -->
        <div class="grid">
          <label>Changer l'image</label>
          <div class="upload">
            <p class="subtitle" id="uploadText">Glissez-déposez une image ou choisissez un fichier…</p>
            <input class="file" type="file" name="image" accept="image/*">
            <div id="image-preview" class="preview"></div>
          </div>
        </div>

        <!-- Sizes -->
        <div class="mt-8">
          <h3 class="sizes-head">📏 Tailles & Prix</h3>

          <div id="sizes-wrapper" class="grid" style="gap:12px;">
            <?php $__currentLoopData = $product->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="size-row size-item">
                <input class="input" type="text" name="sizes[<?php echo e($index); ?>][size]" value="<?php echo e(old("sizes.$index.size", $size->size)); ?>" placeholder="Taille (S, M, L…)" required>
                <input class="input" type="number" step="0.01" name="sizes[<?php echo e($index); ?>][price]" value="<?php echo e(old("sizes.$index.price", $size->price)); ?>" placeholder="Prix" required>
                <button type="button" class="btn btn-danger remove-size">Supprimer</button>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div style="margin-top:10px">
            <button type="button" id="add-size" class="btn btn-primary">➕ Ajouter une taille</button>
          </div>
        </div>

        <!-- Actions -->
        <div class="actions mt-8">
          <button type="submit" class="btn btn-accent">💾 Enregistrer</button>
          <a href="<?php echo e(route('products.index')); ?>" class="btn btn-ghost">⬅️ Retour</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    // show selected filename + preview
    const fileInput = document.querySelector('input[type="file"][name="image"]');
    const uploadText = document.getElementById('uploadText');
    const preview = document.getElementById('image-preview');

    if (fileInput){
      fileInput.addEventListener('change', function(e){
        preview.innerHTML = '';
        const f = e.target.files[0];
        if (f){
          uploadText.textContent = 'Fichier sélectionné : ' + f.name;
          const img = document.createElement('img');
          img.src = URL.createObjectURL(f);
          img.onload = () => URL.revokeObjectURL(img.src);
          preview.appendChild(img);
        } else {
          uploadText.textContent = 'Glissez-déposez une image ou choisissez un fichier…';
        }
      });
    }

    // dynamic sizes
    let sizeIndex = <?php echo e($product->sizes->count()); ?>;
    document.getElementById('add-size').addEventListener('click', function(){
      const wrapper = document.getElementById('sizes-wrapper');
      const row = document.createElement('div');
      row.className = 'size-row size-item';
      row.innerHTML = `
        <input class="input" type="text" name="sizes[${sizeIndex}][size]" placeholder="Taille (S, M, L…)" required>
        <input class="input" type="number" step="0.01" name="sizes[${sizeIndex}][price]" placeholder="Prix" required>
        <button type="button" class="btn btn-danger remove-size">Supprimer</button>
      `;
      row.style.opacity = 0; row.style.transform = 'translateY(6px)';
      row.style.transition = 'opacity .25s, transform .25s';
      wrapper.appendChild(row);
      requestAnimationFrame(()=>{ row.style.opacity = 1; row.style.transform='translateY(0)'; });
      sizeIndex++;
    });

    document.addEventListener('click', function(e){
      if (e.target.closest('.remove-size')){
        const item = e.target.closest('.size-item');
        item.style.opacity = 0; item.style.transform='translateY(-6px)';
        item.style.transition='opacity .22s, transform .22s';
        setTimeout(()=> item.remove(), 200);
      }
    });
  </script>
</body>
</html>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\products\edit.blade.php ENDPATH**/ ?>
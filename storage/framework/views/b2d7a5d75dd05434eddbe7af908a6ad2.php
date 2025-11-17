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
<title>Admin Dashboard</title>

<style>
  :root{
    --bg1:#f3ecff; --bg2:#eaf7ff;
    --card:#fff; --text:#1f2937; --muted:#6b7280;
    --primary:#6366f1; --success:#22c55e; --warning:#f59e0b; --danger:#ef4444;
    --shadow:0 8px 25px rgba(0,0,0,.08);
  }
  body{margin:0;font-family:system-ui,"Segoe UI",Roboto,Arial,sans-serif;
       background:linear-gradient(135deg,var(--bg1),var(--bg2));}
  .wrap{max-width:1200px;margin:40px auto;padding:0 16px;}
  h1{font-size:28px;font-weight:800;color:var(--text);margin-bottom:28px;text-align:center;}
  .grid{display:grid;gap:20px;}
  @media(min-width:768px){ .grid{grid-template-columns:repeat(4,1fr);} }

  .card{padding:26px 20px;border-radius:18px;color:#000000;box-shadow:var(--shadow);text-align:center;transition:.25s}
  .card:hover{transform:translateY(-6px); box-shadow:0 12px 30px rgba(0,0,0,.12)}
  .card h5{margin:0 0 10px;font-size:16px;font-weight:600;opacity:.9}
  .card h2{margin:0;font-size:30px;font-weight:900}

  .bg-primary{background:linear-gradient(135deg,#d8d8d8,#d8d8d8)}
  .bg-success{background:linear-gradient(135deg,#d8d8d8,#d8d8d8)}
  .bg-warning{background:linear-gradient(135deg,#d8d8d8,#d8d8d8)}
  .bg-danger{background:linear-gradient(135deg,#d8d8d8,#d8d8d8)}

  /* table */
  h3{margin-top:40px;margin-bottom:14px;color:var(--text);font-weight:800}
  table{width:100%;border-collapse:collapse;background:#fff;border-radius:14px;overflow:hidden;
        box-shadow:var(--shadow);}
  th,td{padding:14px 16px;text-align:center}
  th{background:#f9fafb;font-weight:700;font-size:15px;color:var(--muted)}
  tr:nth-child(even){background:#fafafa}
  tr:hover td{background:#f1f5f9;transition:.25s}
</style>
</head>

<body>
  <div class="wrap">
    <h1>👨‍💻 Admin Dashboard</h1>

    <div class="grid">
      <div class="card bg-primary">
        <h5>Products</h5>
        <h2><?php echo e(\App\Models\Product::count()); ?></h2>
      </div>
      <div class="card bg-success">
        <h5>Categories</h5>
        <h2><?php echo e(\App\Models\Category::count()); ?></h2>
      </div>
      <div class="card bg-warning">
        <h5>Services</h5>
        <h2><?php echo e(\App\Models\Service::count()); ?></h2>
      </div>
      <div class="card bg-danger">
        <h5>Orders</h5>
        <h2><?php echo e(\App\Models\Order::count()); ?></h2>
      </div>
    </div>

    <h3>📝 Latest Orders</h3>
    <table>
      <tr>
        <th>Customer</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
      <?php $__currentLoopData = \App\Models\Order::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($order->customer_name); ?></td>
        <td><?php echo e($order->total); ?> DH</td>
        <td><?php echo e(ucfirst($order->status)); ?></td>
        <td><?php echo e($order->created_at->format('d/m/Y')); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>

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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>
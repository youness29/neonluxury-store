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
    <title>Order Details #<?php echo e($order->id); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }
        .card {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .header-card {
            background: linear-gradient(135deg, #667eea 0%, #42b883 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: center;
        }
        th {
            background: rgba(102, 126, 234, 0.15);
            font-weight: 700;
            color: #374151;
        }
        tr:hover {
            background: rgba(102, 126, 234, 0.05);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #42b883 100%);
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(135deg, #868686 0%, #5a5a5a 100%);
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(90, 90, 90, 0.4);
        }
        select {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s;
            font-family: 'Tajawal', sans-serif;
        }
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .order-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .info-item {
            background: rgba(255, 255, 255, 0.7);
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .info-item strong {
            color: #4f46e5;
            display: block;
            margin-bottom: 0.5rem;
        }
        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
        }
        .status-pending { background-color: #fef3c7; color: #92400e; }
        .status-processing { background-color: #dbeafe; color: #1e40af; }
        .status-completed { background-color: #d1fae5; color: #065f46; }
        .status-canceled { background-color: #fee2e2; color: #b91c1c; }
        .total-row {
            font-weight: 700;
            background: rgba(102, 126, 234, 0.1);
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }
        @media (max-width: 768px) {
            .order-info {
                grid-template-columns: 1fr;
            }
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
        <div class="container mx-auto px-4 py-8 max-w-6xl">
            <div class="header-card">
                <h1 class="text-2xl md:text-3xl font-bold text-center">Order Details #<?php echo e($order->id); ?></h1>
                <p class="text-center mt-2 opacity-90">Order created on <?php echo e($order->created_at->format('Y/m/d')); ?></p>
            </div>

            <div class="card">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Customer Information</h2>
                <div class="order-info">
                    <div class="info-item">
                        <strong>Customer Name:</strong>
                        <span><?php echo e($order->customer_name); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Email:</strong>
                        <span><?php echo e($order->customer_email); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Phone Number:</strong>
                        <span><?php echo e($order->customer_phone); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Address:</strong>
                        <span><?php echo e($order->customer_address); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Order Status:</strong>
                        <form action="<?php echo e(route('orders.updateStatus', $order)); ?>" method="POST" class="mt-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <select name="status" onchange="this.form.submit()" class="w-full">
                                <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                                <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                <option value="canceled" <?php echo e($order->status == 'canceled' ? 'selected' : ''); ?>>Canceled</option>
                            </select>
                        </form>
                        <div class="mt-2">
                            <?php if($order->status == 'pending'): ?>
                                <span class="status-badge status-pending">Pending</span>
                            <?php elseif($order->status == 'processing'): ?>
                                <span class="status-badge status-processing">Processing</span>
                            <?php elseif($order->status == 'completed'): ?>
                                <span class="status-badge status-completed">Completed</span>
                            <?php elseif($order->status == 'canceled'): ?>
                                <span class="status-badge status-canceled">Canceled</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Order Items</h2>
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                            ?>
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $itemTotal = $item->price * $item->quantity;
                                    $total += $itemTotal;
                                ?>
                                <tr>
                                    <td><?php echo e($item->product->name); ?></td>
                                    <td><?php echo e($item->size); ?></td>
                                    <td><?php echo e(number_format($item->price, 2)); ?> SAR</td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e(number_format($itemTotal, 2)); ?> SAR</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="total-row">
                                <td colspan="4" class="text-left">Grand Total</td>
                                <td><?php echo e(number_format($total, 2)); ?> SAR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="action-buttons">
                <a href="#" class="btn-secondary text-center">Back to List</a>
                <a href="#" class="btn-primary text-center">Print Invoice</a>
            </div>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\orders\show.blade.php ENDPATH**/ ?>
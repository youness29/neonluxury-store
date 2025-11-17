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
    <title>Orders List</title>
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
        .order-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            overflow: hidden;
        }
        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .order-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        .order-table th {
            background: linear-gradient(135deg, #4a86e8 0%, #3b78e7 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
        }
        .order-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .order-table tr:hover {
            background-color: #e9f0ff;
        }
        .order-table td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        .btn-primary {
            background: linear-gradient(135deg, #4ecdc4 0%, #42b883 100%);
            transition: all 0.3s;
            border-radius: 8px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(78, 205, 196, 0.4);
        }
        .success-alert {
            background: linear-gradient(135deg, #4ecdc4 0%, #42b883 100%);
            border-radius: 12px;
            color: white;
        }
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #718096;
        }
        .search-box {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            transition: all 0.3s;
        }
        .search-box:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .filter-badge {
            background: rgba(102, 126, 234, 0.1);
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.85rem;
            margin-right: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .filter-badge.active {
            background: linear-gradient(135deg, #4a86e8 0%, #3b78e7 100%);
            color: white;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .status-pending {
            background-color: #fff8e1;
            color: #f57c00;
        }
        .status-processing {
            background-color: #e3f2fd;
            color: #1565c0;
        }
        .status-completed {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .status-cancelled {
            background-color: #ffebee;
            color: #c62828;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .pagination-item {
            margin: 0 5px;
            padding: 8px 15px;
            border-radius: 8px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .pagination-item.active {
            background: linear-gradient(135deg, #4a86e8 0%, #3b78e7 100%);
            color: white;
        }
        .pagination-item:hover:not(.active) {
            background: #f1f1f1;
        }
        .stats-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 20px;
            transition: all 0.3s;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        @media (max-width: 768px) {
            .order-table {
                font-size: 14px;
            }
            .order-table th, 
            .order-table td {
                padding: 10px;
            }
        }
    </style>
</head>
<body class="py-8 px-4">
    <div class="container mx-auto max-w-7xl">
        <div class="card p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-shopping-cart mr-3 text-blue-500"></i> Orders
                    </h1>
                    <p class="text-gray-600 mt-2">Manage all customer orders</p>
                </div>
                <div class="flex items-center mt-4 md:mt-0">
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                        <?php echo e($orders->total()); ?> orders
                    </span>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="stats-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Total Orders</p>
                            <h3 class="text-2xl font-bold"><?php echo e($orders->total()); ?></h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Pending</p>
                            <h3 class="text-2xl font-bold"><?php echo e($orders->where('status', 'pending')->count()); ?></h3>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-clock text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Processing</p>
                            <h3 class="text-2xl font-bold"><?php echo e($orders->where('status', 'processing')->count()); ?></h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-cog text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Completed</p>
                            <h3 class="text-2xl font-bold"><?php echo e($orders->where('status', 'completed')->count()); ?></h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6 flex flex-col md:flex-row gap-4 items-start md:items-center">
                <div class="relative flex-grow">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Search orders..." class="w-full pl-10 pr-4 py-2 search-box focus:outline-none">
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="filter-badge active">All</span>
                    <span class="filter-badge">Pending</span>
                    <span class="filter-badge">Processing</span>
                    <span class="filter-badge">Completed</span>
                </div>
            </div>

            <?php if($orders->count() > 0): ?>
                <div class="overflow-x-auto">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="order-card">
                                <td class="font-mono"><?php echo e($order->id); ?></td>
                                <td class="font-medium"><?php echo e($order->customer_name); ?></td>
                                <td>
                                    <?php
                                        $statusClass = 'status-pending';
                                        if ($order->status == 'processing') {
                                            $statusClass = 'status-processing';
                                        } elseif ($order->status == 'completed') {
                                            $statusClass = 'status-completed';
                                        } elseif ($order->status == 'cancelled') {
                                            $statusClass = 'status-cancelled';
                                        }
                                    ?>
                                    <span class="status-badge <?php echo e($statusClass); ?>">
                                        <i class="fas 
                                            <?php if($order->status == 'pending'): ?> fa-clock 
                                            <?php elseif($order->status == 'processing'): ?> fa-cog 
                                            <?php elseif($order->status == 'completed'): ?> fa-check-circle 
                                            <?php elseif($order->status == 'cancelled'): ?> fa-times-circle 
                                            <?php endif; ?> mr-1"></i>
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar text-gray-400 mr-2"></i>
                                        <?php echo e($order->created_at->format('d/m/Y H:i')); ?>

                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn-primary text-white px-3 py-2 flex items-center">
                                        <i class="fas fa-eye mr-2"></i> View
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-600 mb-4 md:mb-0">
                        Showing <?php echo e($orders->firstItem()); ?> - <?php echo e($orders->lastItem()); ?> of <?php echo e($orders->total()); ?> orders
                    </div>
                    <div class="pagination">
                        <?php echo e($orders->links()); ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-shopping-cart text-5xl mb-4"></i>
                    <h3 class="text-xl font-semibold">No orders yet</h3>
                    <p class="mt-2">No orders have been placed yet</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Search functionality
        document.querySelector('input[type="text"]').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.order-card').forEach(card => {
                const id = card.querySelector('td:nth-child(1)').textContent.toLowerCase();
                const customer = card.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const status = card.querySelector('td:nth-child(3)').textContent.toLowerCase();
                
                if (id.includes(searchTerm) || customer.includes(searchTerm) || status.includes(searchTerm)) {
                    card.style.display = 'table-row';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter functionality
        document.querySelectorAll('.filter-badge').forEach(badge => {
            badge.addEventListener('click', function() {
                document.querySelectorAll('.filter-badge').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filterType = this.textContent.toLowerCase();
                document.querySelectorAll('.order-card').forEach(card => {
                    if (filterType === 'all') {
                        card.style.display = 'table-row';
                    } else {
                        const status = card.querySelector('td:nth-child(3)').textContent.toLowerCase();
                        card.style.display = status.includes(filterType) ? 'table-row' : 'none';
                    }
                });
            });
        });

        // Animation for order cards
        document.querySelectorAll('.order-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Enhance pagination styling
        document.querySelectorAll('.pagination a').forEach(link => {
            link.classList.add('pagination-item');
            if (link.classList.contains('active')) {
                link.classList.add('active');
            }
        });
    </script>
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
<?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\orders\index.blade.php ENDPATH**/ ?>
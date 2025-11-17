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
    <title>Message #<?php echo e($message->id); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
            min-height: 100vh;
        }
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .info-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            overflow: hidden;
        }
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background: linear-gradient(135deg, #4ecdc4 0%, #42b883 100%);
            transition: all 0.3s;
            border-radius: 12px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(78, 205, 196, 0.4);
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
        .form-input {
            transition: all 0.3s;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
        }
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .status-read {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .status-unread {
            background-color: #fff8e1;
            color: #f57c00;
        }
        .status-archived {
            background-color: #e3f2fd;
            color: #1565c0;
        }
        .message-content {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            line-height: 1.6;
        }
        .info-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        @media (max-width: 768px) {
            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .info-icon {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body class="py-8 px-4">
    <div class="container mx-auto max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <a href="<?php echo e(route('messages.index')); ?>" class="btn-secondary text-white px-4 py-2 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Messages
            </a>
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full mr-3">
                    Message #<?php echo e($message->id); ?>

                </span>
                <?php
                    $statusClass = 'status-read';
                    if ($message->status == 'unread') {
                        $statusClass = 'status-unread';
                    } elseif ($message->status == 'archived') {
                        $statusClass = 'status-archived';
                    }
                ?>
                <span class="status-badge <?php echo e($statusClass); ?>">
                    <i class="fas 
                        <?php if($message->status == 'read'): ?> fa-check-circle 
                        <?php elseif($message->status == 'unread'): ?> fa-envelope 
                        <?php elseif($message->status == 'archived'): ?> fa-archive 
                        <?php endif; ?> mr-1"></i>
                    <?php echo e(ucfirst($message->status)); ?>

                </span>
            </div>
        </div>

        <div class="card p-6 md:p-8 mb-8">
            <h1 class="text-3xl font-bold mb-2 text-gray-800 flex items-center">
                <i class="fas fa-envelope-open-text mr-3 text-blue-500"></i> Message Details
            </h1>
            <p class="text-gray-600 mb-6">View and respond to this message</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="info-card p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
                        <i class="fas fa-user-circle mr-2 text-blue-500"></i> Sender Information
                    </h2>
                    
                    <div class="info-item">
                        <div class="info-icon bg-blue-100 text-blue-500">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Name</p>
                            <p class="font-medium"><?php echo e($message->name); ?></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon bg-green-100 text-green-500">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium"><?php echo e($message->email); ?></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon bg-purple-100 text-purple-500">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="font-medium"><?php echo e($message->phone ?? 'Not provided'); ?></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon bg-yellow-100 text-yellow-500">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Subject</p>
                            <p class="font-medium"><?php echo e($message->subject); ?></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon bg-gray-100 text-gray-500">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Received</p>
                            <p class="font-medium"><?php echo e($message->created_at->format('F j, Y \a\t g:i A')); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="info-card p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
                        <i class="fas fa-comment-dots mr-2 text-blue-500"></i> Message Content
                    </h2>
                    
                    <div class="message-content">
                        <p class="whitespace-pre-line"><?php echo e($message->message); ?></p>
                    </div>
                </div>
            </div>

            <div class="info-card p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
                    <i class="fas fa-reply mr-2 text-blue-500"></i> Reply to Message
                </h2>
                
                <form action="<?php echo e(route('messages.reply', $message)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2 font-medium">Your Reply</label>
                        <textarea name="reply_message" class="w-full px-4 py-3 form-input focus:outline-none" rows="5" placeholder="Write your response here..."></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary text-white px-6 py-3 flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i> Send Reply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Previous Replies Section -->
        <div class="card p-6 md:p-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center">
                <i class="fas fa-history mr-3 text-blue-500"></i> Reply History
            </h2>
            
            <div class="space-y-4">
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <p class="font-medium">System Administrator</p>
                        <p class="text-sm text-gray-500">Today at 10:30 AM</p>
                    </div>
                    <p class="text-gray-700">Thank you for your message. We will get back to you shortly.</p>
                </div>
                
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <p class="text-gray-500">No previous replies found</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation for cards
        document.querySelectorAll('.info-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Auto-resize textarea
        const textarea = document.querySelector('textarea');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Form submission animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';
            button.disabled = true;
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
<?php endif; ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\admin\messages\show.blade.php ENDPATH**/ ?>
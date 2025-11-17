
    <style>
       
        
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
        }
        
        .footer {
            background: linear-gradient(to right, #1a202c, #2d3748);
            color: white;
            padding: 3rem 1rem;
            margin-top: 2rem;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-section {
            padding: 0 1rem;
        }
        
        .footer-heading {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background: #f59e0b;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #cbd5e0;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        
       
        
        
        
        .newsletter-input {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .newsletter-input::placeholder {
            color: #cbd5e0;
        }
        
        
        
        .footer-bottom {
            max-width: 1200px;
            margin: 2rem auto 0;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: #cbd5e0;
            font-size: 0.9rem;
        }
        
        .payment-methods {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .payment-icon {
            width: 40px;
            height: 25px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }
        
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-heading::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .newsletter-form {
                flex-direction: column;
            }
        }
        .footer {
    background: linear-gradient(135deg, #0a0a0a, #1a1a40);
    color: var(--light-text);
    padding: 3rem 1rem;
    margin-top: 2rem;
    position: relative;
    overflow: hidden;
}

.footer-heading {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: var(--primary-color);
    text-shadow: 0 0 10px var(--primary-color), 0 0 20px var(--accent-color);
    position: relative;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;
    width: 50px;
    height: 3px;
    background: var(--accent-color);
    box-shadow: 0 0 10px var(--accent-color);
}

.footer-links a {
    color: #cbd5e0;
    transition: all 0.3s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: var(--primary-color);
    text-shadow: 0 0 8px var(--primary-color), 0 0 15px var(--accent-color);
    transform: translateX(6px);
}

.social-icons a {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
    color: var(--light-text);
    transition: all 0.3s ease;
    box-shadow: 0 0 5px rgba(255,255,255,0.1);
}

.social-icons a:hover {
    background: var(--accent-color);
    color: #fff;
    transform: translateY(-6px) scale(1.1);
    box-shadow: 0 0 15px var(--accent-color), 0 0 30px var(--primary-color);
}

.newsletter-input {
    flex: 1;
    padding: 0.75rem;
    border: none;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.05);
    color: white;
    outline: none;
}

.newsletter-input::placeholder {
    color: #cbd5e0;
}

.newsletter-btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 30px;
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.newsletter-btn:hover {
    background: var(--accent-color);
    border-color: var(--accent-color);
    color: #fff;
    box-shadow: 0 0 15px var(--accent-color), 0 0 30px var(--primary-color);
}

.footer-bottom {
    max-width: 1200px;
    margin: 2rem auto 0;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(255,255,255,0.15);
    text-align: center;
    color: #aaa;
    font-size: 0.9rem;
}

.footer-section .footer-links li,
.footer-section .footer-links li i {
    color: white !important;
}
    </style>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-heading">About Us</h3>
                <p class="text-gray-300">We provide high-quality products and services with a focus on customer satisfaction. Our mission is to deliver excellence in every aspect of our business.</p>
                <div class="social-icons">
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo e(route('home')); ?>"><i class="fas fa-chevron-right mr-2"></i> Home</a></li>
                    <li><a href="<?php echo e(route('products.index')); ?>"><i class="fas fa-chevron-right mr-2"></i> Products</a></li>
                    <li><a href="<?php echo e(route('services.index')); ?>"><i class="fas fa-chevron-right mr-2"></i> Services</a></li>
                    
                    <li><a href="<?php echo e(route('contact.show')); ?>"><i class="fas fa-chevron-right mr-2"></i> Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Contact Info</h3>
                <ul class="footer-links">
                    
                    <li><i class="fas fa-phone mr-2"></i>+212 693-308096</li>
                    <li><i class="fas fa-envelope mr-2"></i>thesuccessdeal@gmail.com</li>
                    <li><i class="fas fa-clock mr-2"></i> Mon-Fri: 9AM - 5PM</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-heading">Newsletter</h3>
                <p class="text-gray-300">Subscribe to our newsletter for updates, offers, and more.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" class="newsletter-input">
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; 2023 My Website. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr" class="hover:text-yellow-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr" class="hover:text-yellow-500"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.instagram.com/succeedeal_deco_art?igsh=MW9tYmV4dnpheWQycQ%3D%3D&utm_source=qr" class="hover:text-yellow-500"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="payment-methods mt-4">
                
            </div>
        </div>
    </footer>
<?php /**PATH C:\Users\zizo\led-decor\resources\views\layouts\partials\user-footer.blade.php ENDPATH**/ ?>
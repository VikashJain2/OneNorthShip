<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderPro | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 420px;
            width: 100%;
        }

        .auth-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .auth-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .auth-header::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .auth-header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -30px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
            z-index: 2;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            backdrop-filter: blur(5px);
        }

        .brand-text {
            font-weight: 700;
            font-size: 28px;
            letter-spacing: -0.5px;
        }

        .brand-highlight {
            color: #f8f9fa;
        }

        .slogan {
            font-size: 16px;
            z-index: 2;
        }

        .auth-body {
            padding: 30px;
        }

        .title {
            font-size: 22px;
            color: var(--dark);
            margin-bottom: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 14px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 18px;
        }

        .form-control {
            width: 100%;
            height: 52px;
            padding: 0 20px 0 50px;
            border: 2px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .btn {
            width: 100%;
            height: 52px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--gray);
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--light-gray);
        }

        .divider-text {
            padding: 0 15px;
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            font-size: 14px;
        }

        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .copyright {
            text-align: center;
            margin-top: 20px;
            color: var(--gray);
            font-size: 13px;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background: #fee2e2;
            color: #b91c1c;
            border-left: 4px solid #b91c1c;
        }

        .alert-success {
            background: #dcfce7;
            color: #15803d;
            border-left: 4px solid #15803d;
        }

        .switch-text {
            text-align: center;
            margin-top: 24px;
            color: var(--gray);
        }

        .switch-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            cursor: pointer;
            font-size: 18px;
        }

        @media (max-width: 480px) {
            .auth-body {
                padding: 20px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="brand">
                    <div class="brand-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="brand-text">Order<span class="brand-highlight">Pro</span></div>
                </div>
                <p class="slogan">Inventory Management System</p>
            </div>
            
            <div class="auth-body">
                <h2 class="title">Sign in to your account</h2>
                
                <!-- PHP error handling -->
                <?php if(isset($validation_errors) && !empty($validation_errors)): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div><?php echo $validation_errors; ?></div>
                    </div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div><?php echo $this->session->flashdata('error'); ?></div>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="<?php echo site_url('auth/login'); ?>">
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </button>
                    
                    <div class="divider">
                        <span>OR</span>
                    </div>
                    
                    <div class="switch-text">
                        Don't have an account? 
                        <a href="<?php echo site_url('auth/register'); ?>" class="fw-bold">Register now</a>
                    </div>
                </form>
                
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Help Center</a>
                </div>
                
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> OrderPro. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.toggle-password i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const username = form.elements.username.value.trim();
            const password = form.elements.password.value.trim();
            
            if (!username || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });
    </script>
</body>
</html>
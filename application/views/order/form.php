<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderPro | Create Order</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
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
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
        }
        
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .logo-text {
            font-weight: 700;
            font-size: 32px;
            letter-spacing: -0.5px;
            color: var(--dark);
        }
        
        .logo-highlight {
            color: var(--primary);
        }
        
        .title {
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: var(--gray);
            font-size: 16px;
            margin-bottom: 30px;
        }
        
        .alert {
            padding: 16px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
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
        
        .alert i {
            font-size: 20px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-label i {
            color: var(--primary);
            font-size: 18px;
        }
        
        .form-control {
            width: 100%;
            height: 52px;
            padding: 0 20px 0 48px;
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
        
        .input-icon {
            position: absolute;
            left: 16px;
            top: 38px;
            color: var(--gray);
            font-size: 18px;
        }
        
        select.form-control {
            padding-left: 20px;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
        
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: var(--light);
            border: 2px dashed var(--light-gray);
            border-radius: var(--border-radius);
            text-align: center;
            transition: var(--transition);
            height: 52px;
            cursor: pointer;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-label i {
            font-size: 20px;
            color: var(--primary);
        }
        
        .btn {
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
            padding: 16px 30px;
            width: 100%;
        }
        
        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn i {
            font-size: 18px;
        }
        
        .footer-links {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--light-gray);
        }
        
        .logout-link {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        
        .logout-link:hover {
            color: var(--primary);
        }
        
        .copyright {
            color: var(--gray);
            font-size: 14px;
        }
        
        @media (max-width: 768px) {
            .card {
                padding: 30px 20px;
            }
            
            .title {
                font-size: 24px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="logo-text">Order<span class="logo-highlight">Pro</span></div>
                </div>
                <h1 class="title">Create New Order</h1>
                <p class="subtitle">Fill in the details below to create your order</p>
            </div>
            
            <!-- PHP error handling - preserved from original -->
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?php echo validation_errors(); ?></div>
                </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?php echo $this->session->flashdata('error'); ?></div>
                </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div><?php echo $this->session->flashdata('message'); ?></div>
                </div>
            <?php endif; ?>
            
            <form id="orderForm" method="post" enctype="multipart/form-data">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-user"></i>Customer Name</label>
                        <div class="input-icon"><i class="fas fa-user"></i></div>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" 
                               placeholder="Enter customer name" value="<?php echo set_value('customer_name'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-envelope"></i>Email ID</label>
                        <div class="input-icon"><i class="fas fa-envelope"></i></div>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Enter email address" value="<?php echo set_value('email'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-barcode"></i>Order ID</label>
                        <div class="input-icon"><i class="fas fa-barcode"></i></div>
                        <input type="text" name="order_id" id="order_id" class="form-control" 
                               placeholder="Enter order ID" value="<?php echo set_value('order_id'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-calendar"></i>Order Date</label>
                        <div class="input-icon"><i class="fas fa-calendar"></i></div>
                        <input type="date" name="order_date" id="order_date" class="form-control" 
                               value="<?php echo set_value('order_date'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-credit-card"></i>Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="credit_card" <?php echo set_select('payment_method', 'credit_card'); ?>>Credit Card</option>
                            <option value="paypal" <?php echo set_select('payment_method', 'paypal'); ?>>PayPal</option>
                            <option value="bank_transfer" <?php echo set_select('payment_method', 'bank_transfer'); ?>>Bank Transfer</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-file-upload"></i>Upload Order Item Sheet</label>
                        <div class="file-upload">
                            <input type="file" name="order_items" id="order_items">
                            <label for="order_items" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choose a file or drag it here</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn">
                    <i class="fas fa-eye"></i>
                    Preview Order
                </button>
            </form>
            
            <div class="footer-links">
                <a href="<?php echo site_url('auth/logout'); ?>" class="logout-link">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> OrderPro. All rights reserved.
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            // File upload label update
            $('#order_items').on('change', function() {
                const fileName = $(this).val().split('\\').pop();
                if (fileName) {
                    $(this).siblings('.file-upload-label').find('span').text(fileName);
                } else {
                    $(this).siblings('.file-upload-label').find('span').text('Choose a file or drag it here');
                }
            });
            
            // Preserve the original form submission functionality
            $('#orderForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '<?php echo site_url('order/upload'); ?>',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('body').html(response);
                    },
                    error: function() {
                        alert('Error uploading file.');
                    }
                });
            });
        });
    </script>
</body>
</html>
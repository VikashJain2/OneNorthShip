<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Products | OrderPro</title>
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
        
        .import-container {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }
        
        .import-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .import-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .import-title {
            font-size: 22px;
            color: var(--dark);
        }
        
        .file-upload {
            position: relative;
            margin-bottom: 30px;
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
            gap: 15px;
            padding: 25px;
            background: white;
            border: 2px dashed var(--light-gray);
            border-radius: var(--border-radius);
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-label i {
            font-size: 36px;
            color: var(--primary);
        }
        
        .file-upload-text {
            display: flex;
            flex-direction: column;
        }
        
        .file-upload-text h3 {
            font-size: 18px;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .file-upload-text p {
            font-size: 14px;
            color: var(--gray);
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
            padding: 16px 35px;
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
        
        .errors-container {
            background: #ffebee;
            border: 1px solid #ffcdd2;
            border-left: 4px solid #b71c1c;
            padding: 25px;
            border-radius: var(--border-radius);
            margin: 30px 0;
        }
        
        .errors-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .errors-header i {
            font-size: 24px;
            color: #b71c1c;
        }
        
        .errors-header h3 {
            color: #b71c1c;
            font-size: 20px;
        }
        
        .errors-list {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        .errors-list li {
            margin-bottom: 12px;
            padding-left: 10px;
            border-left: 2px solid #ffcdd2;
            padding: 8px 0 8px 15px;
            color: #b71c1c;
        }
        
        .debug-links {
            margin-top: 30px;
            border-top: 1px solid var(--light-gray);
            padding-top: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .debug-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        
        .debug-links a:hover {
            color: var(--secondary);
        }
        
        .alert {
            padding: 16px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .alert-error {
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
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--light-gray);
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
            
            .import-header {
                flex-direction: column;
                text-align: center;
            }
            
            .debug-links {
                flex-direction: column;
                gap: 10px;
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
                <h1 class="title">Import Products</h1>
                <p class="subtitle">Upload your product sheet to import into the system</p>
            </div>
            
            <!-- Flash messages -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?php echo $this->session->flashdata('error'); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div><?php echo $this->session->flashdata('success'); ?></div>
                </div>
            <?php endif; ?>
            
            <div class="import-container">
                <div class="import-header">
                    <div class="import-icon">
                        <i class="fas fa-file-import"></i>
                    </div>
                    <div>
                        <h2 class="import-title">Upload Product Sheet</h2>
                        <p>Supported formats: CSV, Excel, or Sheets</p>
                    </div>
                </div>
                
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('import/products'); ?>">
                    <div class="file-upload">
                        <input type="file" name="product_file" id="product_file" required>
                        <label for="product_file" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div class="file-upload-text">
                                <h3>Choose a file or drag it here</h3>
                                <p>Max file size: 10MB</p>
                            </div>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn">
                        <i class="fas fa-file-import"></i>
                        Import Products
                    </button>
                </form>
            </div>
            
            <!-- Errors container -->
            <?php if (!empty($errors)): ?>
                <div class="errors-container">
                    <div class="errors-header">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h3>Import Errors</h3>
                    </div>
                    <ul class="errors-list">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="debug-links">
                <a href="<?php echo site_url('dashboard'); ?>">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <a href="<?php echo site_url('products'); ?>">
                    <i class="fas fa-boxes"></i>
                    View Products
                </a>
                <a href="<?php echo site_url('import/template'); ?>">
                    <i class="fas fa-file-download"></i>
                    Download Template
                </a>
                <a href="<?php echo site_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
            
            <div class="footer">
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> OrderPro. All rights reserved.
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // File upload interaction
        document.getElementById('product_file').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            const label = document.querySelector('.file-upload-text h3');
            label.textContent = fileName;
            label.parentElement.querySelector('p').textContent = 'Click to change file';
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Import Products</title>
    <style>
        .debug-links { margin-top: 20px; border-top: 1px solid #ccc; padding-top: 10px; }
        .debug-links a { margin-right: 15px; }
        .errors-container { 
            background-color: #ffebee; 
            border: 1px solid #ffcdd2; 
            padding: 15px; 
            margin: 20px 0; 
            border-radius: 4px; 
        }
        .errors-container h3 { color: #b71c1c; margin-top: 0; }
        .errors-list { margin: 10px 0; padding-left: 20px; }
        .errors-list li { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Import Products</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="errors-container">
            <h3>Import Errors:</h3>
            <ul class="errors-list">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('import/products'); ?>">
        <label>Upload Product Sheet:</label>
        <input type="file" name="product_file" required><br><br>
        <input type="submit" value="Import">
    </form>
</body>
</html>
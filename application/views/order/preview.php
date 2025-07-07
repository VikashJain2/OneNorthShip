<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderPro | Order Preview</title>
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
            max-width: 1000px;
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
        
        .preview-section {
            margin-bottom: 35px;
            padding: 25px;
            background: var(--light);
            border-radius: var(--border-radius);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }
        
        .section-title {
            font-size: 22px;
            color: var(--primary);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light-gray);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .section-title i {
            font-size: 24px;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 10px;
        }
        
        .detail-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-label i {
            color: var(--primary);
            font-size: 16px;
        }
        
        .detail-value {
            font-size: 18px;
            font-weight: 500;
            color: var(--dark);
            padding-left: 28px;
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--light-gray);
            margin-top: 20px;
        }
        
        .order-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        
        .order-table th {
            background: var(--primary);
            color: white;
            font-weight: 600;
            text-align: left;
            padding: 18px 20px;
            position: sticky;
            top: 0;
        }
        
        .order-table tr:nth-child(even) {
            background: var(--light);
        }
        
        .order-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .order-table tr:last-child td {
            border-bottom: none;
        }
        
        .order-table tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 25px;
            gap: 10px;
        }
        
        .pagination button {
            background: var(--light-gray);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
        }
        
        .pagination button:hover:not(:disabled) {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .pagination button.active {
            background: var(--primary);
            color: white;
        }
        
        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .actions {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            justify-content: center;
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
        }
        
        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn i {
            font-size: 18px;
        }
        
        .back-btn {
            background: var(--light-gray);
            color: var(--dark);
            text-decoration: none;
            padding: 16px 35px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .back-btn:hover {
            background: #d1d5db;
            transform: translateY(-3px);
        }
        
        .loading {
            display: none;
            text-align: center;
            margin: 20px 0;
        }
        
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-left-color: var(--primary);
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .footer-links {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
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
            
            .actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn, .back-btn {
                width: 100%;
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
                <h1 class="title">Order Preview</h1>
                <p class="subtitle">Review your order details before confirmation</p>
            </div>
            
            <div class="preview-section">
                <h2 class="section-title"><i class="fas fa-file-invoice"></i>Order Details</h2>
                <div class="details-grid">
                    <div class="detail-card">
                        <div class="detail-label"><i class="fas fa-user"></i>Customer Name</div>
                        <div class="detail-value"><?php echo $form_data['customer_name']; ?></div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-label"><i class="fas fa-envelope"></i>Email</div>
                        <div class="detail-value"><?php echo $form_data['email']; ?></div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-label"><i class="fas fa-barcode"></i>Order ID</div>
                        <div class="detail-value"><?php echo $form_data['order_id']; ?></div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-label"><i class="fas fa-calendar"></i>Order Date</div>
                        <div class="detail-value"><?php echo $form_data['order_date']; ?></div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-label"><i class="fas fa-credit-card"></i>Payment Method</div>
                        <div class="detail-value"><?php echo ucwords(str_replace('_', ' ', $form_data['payment_method'])); ?></div>
                    </div>
                </div>
            </div>
            
            <div class="preview-section">
                <h2 class="section-title"><i class="fas fa-list"></i>Order Items</h2>
                <div class="table-container">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Item No</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="items-container">
                            <!-- Items will be rendered here by JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination" id="pagination-controls">
                    <!-- Pagination controls will be generated here -->
                </div>
            </div>
            
            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Saving your order...</p>
            </div>
            
            <form id="saveForm" method="post">
                <input type="hidden" name="customer_name" value="<?php echo $form_data['customer_name']; ?>">
                <input type="hidden" name="email" value="<?php echo $form_data['email']; ?>">
                <input type="hidden" name="order_id" value="<?php echo $form_data['order_id']; ?>">
                <input type="hidden" name="order_date" value="<?php echo $form_data['order_date']; ?>">
                <input type="hidden" name="payment_method" value="<?php echo $form_data['payment_method']; ?>">
                
                <div class="actions">
                    <button type="submit" class="btn">
                        <i class="fas fa-save"></i>
                        Confirm and Save
                    </button>
                    <a href="<?php echo site_url('order'); ?>" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Back to Form
                    </a>
                </div>
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
            // Order items data from PHP
            const orderItems = <?php echo json_encode($order_items); ?>;
            const itemsPerPage = 10;
            let currentPage = 1;
            
            // Function to render items for the current page
            function renderItems(page) {
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, orderItems.length);
                const pageItems = orderItems.slice(startIndex, endIndex);
                
                let itemsHtml = '';
                
                pageItems.forEach(item => {
                    itemsHtml += `
                        <tr>
                            <td>${item.item_no}</td>
                            <td>${item.description}</td>
                            <td>${item.unit}</td>
                            <td>${item.quantity}</td>
                            <td>${item.unit_price}</td>
                            <td>${parseFloat(item.total_price).toFixed(2)}</td>
                        </tr>
                    `;
                });
                
                $('#items-container').html(itemsHtml);
                updatePaginationControls();
            }
            
            // Function to update pagination controls
            function updatePaginationControls() {
                const totalPages = Math.ceil(orderItems.length / itemsPerPage);
                let paginationHtml = '';
                
                // Previous button
                paginationHtml += `
                    <button class="prev-btn" ${currentPage === 1 ? 'disabled' : ''}>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                `;
                
                // Page numbers
                const maxVisiblePages = 5;
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
                
                // Adjust if we're at the end
                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }
                
                for (let i = startPage; i <= endPage; i++) {
                    paginationHtml += `
                        <button class="page-btn ${i === currentPage ? 'active' : ''}">
                            ${i}
                        </button>
                    `;
                }
                
                // Next button
                paginationHtml += `
                    <button class="next-btn" ${currentPage === totalPages ? 'disabled' : ''}>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                `;
                
                $('#pagination-controls').html(paginationHtml);
                
                // Add event listeners
                $('.prev-btn').on('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        renderItems(currentPage);
                    }
                });
                
                $('.next-btn').on('click', function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderItems(currentPage);
                    }
                });
                
                $('.page-btn').on('click', function() {
                    const page = parseInt($(this).text());
                    if (page !== currentPage) {
                        currentPage = page;
                        renderItems(currentPage);
                    }
                });
            }
            
            // Initial render
            renderItems(currentPage);
            
            // Form submission handling
            $('#saveForm').on('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                $('#loading').show();
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Saving...');
                submitBtn.prop('disabled', true);
                
                var formData = new FormData(this);
                formData.append('order_items', JSON.stringify(orderItems));
                
                $.ajax({
                    url: '<?php echo site_url('order/save'); ?>',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.location = '<?php echo site_url('order'); ?>';
                    },
                    error: function() {
                        alert('Error saving order. Please try again.');
                        $('#loading').hide();
                        submitBtn.html('<i class="fas fa-save"></i> Confirm and Save');
                        submitBtn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>
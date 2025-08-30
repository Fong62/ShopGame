<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'AUTO BANK | '.$CMSNT->site('tenweb');
    require_once(__DIR__ . "/Header.php");
    require_once(__DIR__ . "/Nav.php");
    
    // Lấy ID người dùng hiện tại
    $user_id = $getUser['id'];
?>

<style>
    .bank-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .bank-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .bank-header h1 {
        font-size: 32px;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .bank-header p {
        color: #7f8c8d;
        font-size: 18px;
    }

    .payment-methods {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .payment-method {
        flex: 1;
        min-width: 450px;
        max-width: 550px;
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .payment-method:hover {
        transform: translateY(-5px);
    }

    .method-content {
        flex: 1;
    }

    .method-header {
        margin-bottom: 1.5rem;
    }
    
    .method-header h3 {
        font-size: 24px;
        color: #2c3e50;
        margin-bottom: 5px;
    }
    
    .method-header small {
        font-size: 16px;
        color: #7f8c8d;
    }

    .account-info {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        position: relative;
    }
    
    .account-text {
        flex: 1;
        font-size: 18px;
        color: #34495e;
        font-weight: 500;
        margin: 0;
        padding-right: 30px;
    }
    
    .copy-icon {
        position: absolute;
        right: 15px;
        cursor: pointer;
        color: #3498db;
        font-size: 16px;
        transition: all 0.3s;
    }
    
    .copy-icon:hover {
        color: #2980b9;
        transform: scale(1.1);
    }

    .qr-code {
        flex-shrink: 0;
        width: 220px;
        text-align: center;
    }
    
    .qr-code img {
        width: 100%;
        max-width: 220px;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .bank-guide {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        margin-top: 2rem;
    }
    
    .bank-guide h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-size: 24px;
    }
    
    .bank-guide p {
        font-size: 16px;
        color: #7f8c8d;
        margin-bottom: 1rem;
        line-height: 1.5;
    }
    
    .bank-guide a {
        color: #3498db;
        font-weight: bold;
        text-decoration: none;
    }
    
    .bank-guide a:hover {
        text-decoration: underline;
    }

    .online-payment-methods {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        width: 100%;
        justify-content: center;
    }

    .online-payment-methods .payment-method {
        flex: 1;
        min-width: 450px;
        max-width: 550px;
    }

    /* PayPal custom styles */
    .paypal-container {
        background: #f0f8ff;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }
    
    .paypal-amount-input {
        margin-bottom: 15px;
    }
    
    .paypal-amount-input label {
        display: block;
        margin-bottom: 5px;
        color: #2c3e50;
        font-weight: 500;
    }
    
    .paypal-amount-input input {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }
    
    .paypal-note {
        font-size: 14px;
        color: #7f8c8d;
        margin-top: 10px;
        text-align: center;
    }

    .vnpay-method {
        flex: 1;
        background: #f8f9fa;
        border: 1px solid #e0f0e0;
    }

    .vnpay-method .method-header h3 {
        color: #2c3e50; /* Màu xanh đặc trưng của VNPay */
    }

    /* .bank-selection select {
        width: 100%;
        padding: 8px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
    } */
</style>

<div class="bank-container">
    <div class="bank-header">
        <h1>THÔNG TIN NGÂN HÀNG - MOMO</h1>
    </div>

    <div class="payment-methods">
        <!-- TECHCOMBANK -->
        <div class="payment-method">
            <div class="method-content">
                <div class="method-header">
                    <h3>Techcombank</h3>
                    <small>NGUYEN HOANG PHONG</small>
                </div>
                
                <div class="account-info">
                    <p class="account-text">19050294898016</p>
                    <span class="copy-icon" data-copy="19050294898016">
                        <i class="fas fa-copy"></i>
                    </span>
                </div>
            </div>
            
            <div class="qr-code">
                <img src="/assets/img/bank.jpg" alt="QR Techcombank">
            </div>
        </div>

        <!-- MOMO -->
        <div class="payment-method">
            <div class="method-content">
                <div class="method-header">
                    <h3>MoMo</h3>
                    <small>Nguyen Tran Gia Huy</small>
                </div>
                
                <div class="account-info">
                    <p class="account-text">0858823948</p>
                    <span class="copy-icon" data-copy="0858823948">
                        <i class="fas fa-copy"></i>
                    </span>
                </div>
            </div>
            
            <div class="qr-code">
                <img src="/assets/img/momo.jpg" alt="QR MoMo">
            </div>
        </div>

        <!-- Nội dung chuyển khoản -->
        <div class="payment-method">
            <div class="method-content">
                <div class="method-header">
                    <h3>Nội dung chuyển khoản</h3>
                </div>
                
                <div class="account-info">
                    <p class="account-text">ck id<?php echo $user_id; ?></p>
                    <span class="copy-icon" data-copy="ck id<?php echo $user_id; ?>">
                        <i class="fas fa-copy"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- PayPal Section -->
    <div class="online-payment-methods">
        <div class="payment-method paypal-method">
            <div class="method-content">
                <div class="method-header">
                    <h3>PayPal</h3>
                    <small>Thanh toán quốc tế</small>
                </div>
                
                <div class="paypal-input-group" style="margin-bottom: 15px;">
                    <label for="paypal-amount" style="display: block; margin-bottom: 5px;">Số tiền (USD)</label>
                    <input type="number" id="paypal-amount" value="5.00" min="1" step="0.01" 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                
                <!-- Container cho nút PayPal -->
                <div id="paypal-button-container" style="min-height: 45px;"></div>
                
                <p style="text-align: center; margin-top: 10px; color: #666; font-size: 14px;">
                    <!-- <i class="fas fa-info-circle"></i> Tỷ giá: 1 USD = <?=number_format($CMSNT->site('usd_rate'))?> VND -->
                    <i class="fas fa-info-circle"></i> Tỷ giá: 1 USD = 26.000 VND
                </p>
            </div>
        </div>

        <div class="payment-method vnpay-method">
            <div class="method-content">
                <div class="method-header">
                    <h3>VNPay</h3>
                    <small>Thanh toán qua cổng VNPay</small>
                </div>
                
                <form id="vnpay-form" action="../../assets/ajaxs/vnpay.php" method="POST">
                    <div class="paypal-amount-input">
                        <label for="vnpay-amount">Số tiền (VND)</label>
                        <input type="number" id="vnpay-amount" name="total_vnpay" value="50000" min="10000" step="10000" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block" style="padding: 10px; border-radius: 5px; min-height: 45px;">
                        <i class="fas fa-money-bill-wave"></i> Thanh toán qua VNPay
                    </button>
                    
                    <p class="paypal-note">
                        <i class="fas fa-info-circle"></i> Hỗ trợ nhiều ngân hàng trong nước
                    </p>
                </form>
            </div>
        </div>
    </div>


    <!-- Hướng dẫn -->
    <div class="bank-guide">
        <h2>THÔNG TIN QUAN TRỌNG</h2>
        
        <p>Nếu chuyển sai, vui lòng liên hệ ADMIN hoặc số điện thoại 0858823948 (8h-24h) để được hỗ trợ.</p>
        <p>Có thể nhờ chuyển hộ xong nhắn <a href="<?=$CMSNT->site('facebook_url')?>" target="_blank"><b>page shop</b></a> sẽ cộng tiền cho bạn.</p>
        <p>Nếu chuyển sai, vui lòng liên hệ ADMIN hoặc <a href="https://zalo.me/<?=$CMSNT->site('hotline_zalo')?>" target="_blank"><b>Zalo</b></a> (8h-24h) để được hỗ trợ.</p>
    </div>
</div>


<!-- Script xử lý  -->
<script src="https://www.paypal.com/sdk/js?client-id=AbSfMuKK5xjIy5doAJ84SPEmFXCLF72Avoxg5xCjFdpXFfg0mOnf7Ncu89otqWU0f8OOuYjuhb0C-NlB&currency=USD"></script>
<script>
    if(typeof paypal !== 'undefined') {
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                color: 'blue',
                shape: 'rect',
                label: 'paypal'
            },
            createOrder: function(data, actions) {
                const amount = document.getElementById('paypal-amount').value;
                if(amount < 1) {
                    alert('Vui lòng nhập số tiền tối thiểu 1 USD');
                    return;
                }
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    const amount = document.getElementById('paypal-amount').value;
                    const payerEmail = details.payer.email_address;
                    Swal.fire({
                        title: 'Đang xử lý...',
                        html: 'Vui lòng chờ trong giây lát',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch('../../assets/ajaxs/paypal.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            user_id: <?php echo $user_id; ?>,
                            amount: amount,
                            payer: details.payer
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if(data.status === 'success') {
                            Swal.fire({
                                title: 'Thành công!',
                                html: `Nạp thành công! `+ payerEmail,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); 
                                }
                            });
                        } else {
                            Swal.fire('Lỗi', data.message || 'Có lỗi xảy ra khi xử lý thanh toán', 'error');
                        }
                    })
                    .catch(error => {
                        Swal.close();
                        Swal.fire('Lỗi', 'Lỗi kết nối: ' + error.message, 'error');
                        console.error('Error:', error);
                    });
                });
            },
            onError: function(err) {
                Swal.fire('Lỗi', 'Đã xảy ra lỗi trong quá trình thanh toán: ' + err, 'error');
                console.error('PayPal error:', err);
            }
        }).render('#paypal-button-container');
    } else {
        console.error('Không thể tải PayPal SDK');
        document.getElementById('paypal-button-container').innerHTML = 
            '<div class="alert alert-danger">Lỗi: Không thể tải cổng thanh toán PayPal. Vui lòng thử lại sau.</div>';
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyIcons = document.querySelectorAll('.copy-icon');
        
        copyIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const textToCopy = this.getAttribute('data-copy');
                navigator.clipboard.writeText(textToCopy);
                
                const iconElement = this.querySelector('i');
                iconElement.className = 'fas fa-check';
                
                setTimeout(() => {
                    iconElement.className = 'fas fa-copy';
                }, 1500);
            });
        });
    });
</script>

<?php require_once(__DIR__ . "/Footer.php"); ?>
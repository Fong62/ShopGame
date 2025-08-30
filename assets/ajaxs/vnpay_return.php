<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");

// Kiểm tra xem có dữ liệu trả về từ VNPay không
if(!isset($_GET['vnp_ResponseCode'])) {
    die('<script>
        Swal.fire({
            title: "Lỗi",
            text: "Thiếu dữ liệu phản hồi từ VNPay",
            icon: "error",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/";
            }
        });
    </script>');
}

$vnp_HashSecret = "Y83R5Z4CCIEL2L8W1EALJ0VZKJ3KVOV8";

// Lấy và lọc dữ liệu
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

// Kiểm tra chữ ký
$vnp_SecureHash = isset($inputData['vnp_SecureHash']) ? $inputData['vnp_SecureHash'] : '';
unset($inputData['vnp_SecureHash']);
ksort($inputData);

$hashData = "";
$i = 0;
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash != $vnp_SecureHash) {
    die('<script>
        Swal.fire({
            title: "Lỗi",
            text: "Chữ ký không hợp lệ",
            icon: "error",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/bank";
            }
        });
    </script>');
}

// Xử lý kết quả
if ($_GET['vnp_ResponseCode'] == '00') {
    // THÀNH CÔNG
    $user_id = $getUser['id'];
    $amount = $_GET['vnp_Amount'] / 100;
    $txnRef = $_GET['vnp_TxnRef'];
    
    $user = $CMSNT->get_row("SELECT * FROM `users` WHERE `id` = '$user_id'");
    
    // Kiểm tra xem giao dịch đã xử lý chưa
    $checkTxn = $CMSNT->get_row("SELECT * FROM `dongtien` WHERE `noidung` LIKE '%$txnRef%'");
    if($checkTxn) {
        die('<script>
            Swal.fire({
                title: "Thông báo",
                text: "Giao dịch đã được xử lý trước đó!",
                icon: "info",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/bank";
                }
            });
        </script>');
    }
    
    // Cập nhật số dư
    $CMSNT->cong("users", "money", $amount, " `id` = '$user_id' ");
    $CMSNT->cong("users", "total_money", $amount, " `id` = '$user_id' ");
    
    // Lưu lịch sử
    $CMSNT->insert("dongtien", [
        'sotientruoc' => $user['money'],
        'sotienthaydoi' => $amount,
        'sotiensau' => $user['money'] + $amount,
        'thoigian' => gettime(),
        'noidung' => 'Nạp tiền VNPay - Mã GD: ' . $txnRef . ' - Số tiền: ' . number_format($amount) . ' VND',
        'username' => $user['username']
    ]);
    
    // Hiển thị thông báo thành công
    echo '<script>
        Swal.fire({
            title: "Thành công",
            html: "Nạp tiền thành công: ' . number_format($amount) . ' VND<br>Mã giao dịch: ' . $txnRef . '",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/bank";
            }
        });
    </script>';
} else {
    // THẤT BẠI
    echo '<script>
        Swal.fire({
            title: "Thất bại",
            text: "Thanh toán thất bại. Mã lỗi: ' . $_GET['vnp_ResponseCode'] . '",
            icon: "error",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/bank";
            }
        });
    </script>';
}

?>
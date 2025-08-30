<?php
require_once("../../config/config.php");
require_once("../../config/function.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}


$data = json_decode(file_get_contents('php://input'), true);

// Xử lý dữ liệu đầu vào
$orderID = isset($data['orderID']) ? check_string($data['orderID']) : '';
$user_id = isset($data['user_id']) ? check_string($data['user_id']) : '';
$amount = isset($data['amount']) ? check_string($data['amount']) : 0;
$payer = isset($data['payer']) ? $data['payer'] : [];

// Validate dữ liệu
if(empty($orderID)) {
    die(json_encode(['status' => 'error', 'message' => 'Thiếu mã giao dịch PayPal']));
}

if(empty($user_id)) {
    die(json_encode(['status' => 'error', 'message' => 'Thiếu ID người dùng']));
}

if(empty($amount) || $amount < 1) {
    die(json_encode(['status' => 'error', 'message' => 'Số tiền không hợp lệ']));
}

// Kiểm tra user có tồn tại không
$user = $CMSNT->get_row("SELECT * FROM `users` WHERE `id` = '$user_id'");
if(!$user) {
    die(json_encode(['status' => 'error', 'message' => 'Người dùng không tồn tại']));
}

// Kiểm tra user có bị banned không
if($user['banned'] == 1) {
    die(json_encode(['status' => 'error', 'message' => 'Tài khoản đã bị khóa']));
}

// Kiểm tra giao dịch đã tồn tại chưa
if($CMSNT->get_row("SELECT * FROM `paypal` WHERE `order_id` = '$orderID'")) {
    die(json_encode(['status' => 'error', 'message' => 'Giao dịch đã được xử lý trước đó']));
}

try {
    // Lưu giao dịch vào database
    $insert = $CMSNT->insert("paypal", [
        'user_id' => $user_id,
        'order_id' => $orderID,
        'amount' => $amount,
       
        'status' => 'completed',
        'created_at' => gettime(),
        'updated_at' => gettime()
    ]);

    if (!$insert) {
        throw new Exception('Không thể lưu giao dịch');
    }

    // Cộng tiền vào tài khoản (tỷ giá 1 USD = 26,000 VND)
    $vnd_amount = $amount * 26000;
    $CMSNT->cong("users", "money", $vnd_amount, " `id` = '$user_id' ");
    
    // Cập nhật tổng tiền đã nạp
    $CMSNT->cong("users", "total_money", $vnd_amount, " `id` = '$user_id' ");

  
    $CMSNT->insert("dongtien", [
        'sotientruoc' => $user['money'],
        'sotienthaydoi' => $vnd_amount,
        'sotiensau' => $user['money'] + $vnd_amount,
        'thoigian' => gettime(),
        'noidung' => 'Nạp tiền PayPal: $' . $amount . ' USD',
        'username' => $user['username']
    ]);

    die(json_encode([
        'status' => 'success',
        'message' => 'Thanh toán thành công',
        'transaction_id' => $orderID,
        'amount_usd' => $amount,
        'amount_vnd' => $vnd_amount
    ]));

} catch (Exception $e) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Lỗi hệ thống: ' . $e->getMessage()
    ]));
}
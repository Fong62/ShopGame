<?php
require_once("../../config/config.php");
require_once("../../config/function.php");

$vnp_TmnCode = "SYWCUSST"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "Y83R5Z4CCIEL2L8W1EALJ0VZKJ3KVOV8"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://shopgametheboys.infinityfreeapp.com/assets/ajaxs/vnpay_return.php";

if(!isset($_POST['total_vnpay']) || empty($_POST['total_vnpay'])) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Vui lòng nhập số tiền thanh toán'
    ]));
}


$vnp_TxnRef = rand(1,10000); //Mã giao dịch thanh toán tham chiếu của merchant
$vnp_Amount = $_POST['total_vnpay']; // Số tiền thanh toán
$vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
// $vnp_BankCode = isset($_POST['bankCode']) ? $_POST['bankCode'] : '';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ Việt Nam
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes'));

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount* 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
    "vnp_OrderType" => "other",
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate"=>$expire
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}


$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

// $user_id = $getUser['id']; // Lấy ID người dùng từ session
// $CMSNT->insert("vnpay_transactions", [
//     'user_id' => $user_id,
//     'transaction_ref' => $vnp_TxnRef,
//     'amount' => $vnp_Amount,
//     'bank_code' => $vnp_BankCode,
//     'status' => 'pending',
//     'created_at' => gettime()
// ]);

header('Location: ' . $vnp_Url);
exit();

?>

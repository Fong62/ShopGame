<?php
$CMSNT = new CMSNT;

$config = [
    'project'   => 'SHOPGAME',
    'version'   => '1.0.0'
];
function BASE_URL($url)
{
    $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    if($a == 'http://localhost'){
        $a = '';
    }
    return $a.'/'.$url;
}
function remove_unicode($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    return $str;
}

function create_anchor_id($text) {
   $text = remove_unicode($text);
   $text = strtolower($text);
   $text = preg_replace('/[^a-z0-9]+/', '-', $text);
   $text = trim($text, '-');
    return $text;
}

function toSlug(string $title): string {
    if (trim($title) === '') {
        return '';
    }

   
    $title = mb_strtolower($title, 'UTF-8');

    // Xử lý các ký tự đặc biệt tiếng Việt
    $unicodeMap = [
        'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
        'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
        'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
        'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
        'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
        'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
        'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
        'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
        'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
        'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
        'đ' => 'd',
        'ä' => 'a', 'ë' => 'e', 'ï' => 'i', 'ö' => 'o', 'ü' => 'u', 'ÿ' => 'y',
        'æ' => 'ae', 'œ' => 'oe',
        'ß' => 'ss',
        
    ];

   
    $title = strtr($title, $unicodeMap);

    
    if (class_exists('Normalizer')) {
        $title = Normalizer::normalize($title, Normalizer::FORM_D);
        $title = preg_replace('/\p{M}/u', '', $title);
    } else {
        
        $title = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title);
    }

    
    $title = preg_replace('/[^a-z0-9\s-]/u', '', $title);
    
    
    $title = preg_replace('/[\s-]+/', '-', trim($title));
    
    
    $title = trim($title, '-');

    
    if ($title === '') {
        return 'untitled';
    }

    return $title;
}


function getUser($username, $row)
{
    global $CMSNT;
    return $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '$username' ")[$row];
}

function insert_options($name, $value)
{
    global $CMSNT;
    if(!$CMSNT->get_row("SELECT * FROM `options` WHERE `name` = '$name' "))
    {
        $CMSNT->insert("options", [
            'name'  => $name,
            'value' => $value
        ]);
    }
}
function format_date($time){
    return date("H:i:s d/m/Y", $time);
}

function gettime()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}

function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}

function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function msg_success2($text, $url)
{
    return die('<script type="text/javascript">
        Swal.fire({
            title: "Thành Công",
            text: "'.$text.'",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "'.$url.'";
            }
        });
    </script>');
}
function msg_error2($text, $url = null, $time = 5000)
{
    return die('<script type="text/javascript">
        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "error",
            title: "'.$text.'",
            showConfirmButton: false,
            timer: '.$time.'
        });
        '.($url ? 'setTimeout(function(){ location.href = "'.$url.'" }, '.$time.');' : '').'
    </script>');
}
function msg_warning2($text)
{
    return die('<script type="text/javascript">cuteToast({ type: "warning", message: "'.$text.'", timer: 5000 });</script>');
}
function msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">
        Swal.fire({
            title: "Thành Công",
            text: "'.$text.'",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "'.$url.'";
            }
        });
    </script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">
        Swal.fire({
            title: "Thất bại",
            text: "'.$text.'",
            icon: "error",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "'.$url.'";
            }
        });
    </script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}

function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge badge-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}

function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="badge badge-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'hoanthanh'){
        $show = '<span class="badge badge-success">Thành công</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function TypePassword($string)
{
    return $string;
}
function AboutMe($username = null)
{
    global $CMSNT;
    
  
    if($username === null && isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    
    
    if(empty($username)) {
        return false;
    }
    
    $user = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '".check_string($username)."' ");
    
    if($user) {
        return [
            'id' => $user['id'],
            'username' => $user['username'],
            'money' => $user['money'],
            'level' => $user['level'],
            'banned' => $user['banned'],
            'createdate' => $user['createdate'],
            'email' => $user['email']
        ];
    }
    
    return false;
}
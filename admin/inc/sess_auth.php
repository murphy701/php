<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];

if(isset($_SESSION['userdata']) && strpos($link, 'signup.php')){
    echo "<script>alert('이미 가입을 하신 상태입니다.');</script>";
    redirect('admin/index.php');
}//로그인 한 상태로 회원가입 시 block


if(!isset($_SESSION['userdata']) && !strpos($link, 'login.php') && !strpos($link, 'signup.php')){
	redirect('admin/login.php');
}
//로그인 안되어있고 url안에 login.php가 없는지 확인

if(isset($_SESSION['userdata']) && strpos($link, 'login.php')){
	redirect('admin/index.php');
}//로그인 되어 있고 url안에 login.php가 포함되어 있는지 확인

$module = array('','admin','faculty','student');

if(isset($_SESSION['userdata']) && (strpos($link, 'index.php') || strpos($link, 'admin/')) && $_SESSION['userdata']['login_type'] !=  1){
	echo "<script>alert('Access Denied!');location.replace('".base_url.$module[$_SESSION['userdata']['login_type']]."');</script>";
    exit;
}//어드민만 사용 가능하게 된 기능일 수도 있으므로 추후에 삭제 할 수도 있음
?>
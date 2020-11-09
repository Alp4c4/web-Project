<?php session_start();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,$params["path"], 
    $params["domain"],
    $params["secure"], 
    $params["httponly"]);
session_destroy(); // ทําลาย session
?>
ออกจากระบบสำเร็จแล้ว<br>
<a href='login.html'>เข้าสู่ระบบ</a>
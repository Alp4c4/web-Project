<?php
include "connect.php";
session_start();

$stmt = $pdo->prepare("SELECT * FROM login JOIN student WHERE student.std_id = ? AND login.password = ?");
$stmt->bindParam(1,$_POST["username"]);
$stmt->bindParam(2,$_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();

if(!empty($row)){
    session_regenerate_id();
    $_SESSION["std_id"] = $row["std_id"];
    $_SESSION["std_name"] = $row["std_name"];

    echo "เข้าสู่ระบบสําเร็จ<br>";
    echo "<a href='index.html'>test</a>";

    // header("location:index.html");
}else{
    echo "ไม่สำเร็จ";
    echo "<a href='login.html'>เข้าสู่ระบบอีกครั้ง</a>";
}

?>
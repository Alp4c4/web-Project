<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}

$stmt = $pdo->prepare("SELECT * FROM login WHERE std_id = ? AND password = ?");
$stmt->bindParam(1,$_SESSION["std_id"]);
$stmt->bindParam(2,$_GET["password"]);
$stmt->execute();
$row = $stmt->fetch();

if(!empty($row)){
    echo "รหัสซ้ำกับรหัสเดิม";
}else{
    echo "สามารถใช้รหัสนี้ได้";
}

?>
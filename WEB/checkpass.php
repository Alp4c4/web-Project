<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .false{
            color:red;
        }
    </style>
</head>
<body>
    
</body>
</html>


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
    echo "<dev class='false'>รหัสซ้ำกับรหัสเดิม</div>";
}else{
    echo "<dev class='false'>สามารถใช้รหัสนี้ได้</div>";
}

?>
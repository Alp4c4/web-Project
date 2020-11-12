<?php
include "connect.php";
session_start();

$stmt = $pdo->prepare("SELECT * FROM login JOIN student WHERE student.std_id = ? AND login.std_id = ? AND login.password = ?");
$stmt->bindParam(1,$_POST["username"]);
$stmt->bindParam(2,$_POST["username"]);
$stmt->bindParam(3,$_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();
    
if(!empty($row)){
    session_regenerate_id();
    $_SESSION["std_id"] = $_POST["username"];
    $_SESSION["std_name"] = $row["std_name"];
    if(empty($_COOKIE["visit"])){
        setcookie("visit",0,time()+3600*24);
    }
    if(!isset($_COOKIE["visit"])){

    }else{
        $visit = $_COOKIE["visit"] + 1;
        setcookie("visit",$visit,time() + 3600 * 24);
    }

    echo "<script>
            var ans = confirm('เข้าสู่ระบบสําเร็จ มีผู้เข้าชมทั้งหมด ".$_COOKIE["visit"]." คน')
            if(ans==true)document.location = 'index2.php'
        </script>";

}else{

    echo "<script>
            var ans = confirm('เข้าสู่ระบบไม่สําเร็จ')
            if(ans==true)document.location = 'login.html'
        </script>";
}
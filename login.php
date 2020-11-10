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

    echo "<script>
            var ans = confirm('เข้าสู่ระบบสําเร็จ')
            if(ans==true)document.location = 'index.html'
        </script>";

}else{

    echo "<script>
            var ans = confirm('เข้าสู่ระบบไม่สําเร็จ')
            if(ans==true)document.location = 'login.html'
        </script>";
}




?>

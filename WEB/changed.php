  
<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}

$stmt = $pdo->prepare("UPDATE login SET password = ? WHERE std_id = ?");
$stmt->bindParam(1,$_POST["password"]);
$stmt->bindParam(2,$_SESSION["std_id"]);

if($stmt->execute()){
    echo "<script>
            var ans = confirm('แก้ไขรหัสผ่านสำเร็จ')
            if(ans==true)document.location = 'checkindex.php'
        </script>";
    
}

?>
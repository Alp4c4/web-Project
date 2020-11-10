<?php
include "connect.php";
$stmt = $pdo->prepare('SELECT * FROM `student` WHERE std_id = ?');
$stmt->bindParam(1,$_GET["std_id"]);
$stmt->execute();
$row = $stmt->fetch();
if(empty($row)){
    // echo "<script>alert('ไม่พบรหัสนี้'); </script>";
}else{
    $name = $row["std_name"];
    $id = $row["std_id"];
    $prov = $row["province"];

    echo $name." ".$id." ".$prov;
}

?>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<?php
include "connect.php";
$stmt = $pdo->prepare('SELECT * FROM `student` WHERE std_id = ?');
$stmt->bindParam(1,$_GET["std_id"]);
$stmt->execute();
$row = $stmt->fetch();
if(empty($row)){
     echo "<script>alert('ไม่พบรหัสนี้'); </script>";
}else{
    echo"<table><tr><th>ชื่อ-นามสกุล</th><th>เลขที่ประจำตัว</th><th>จังหวัดภูมิลำเนา</th></tr>";
    $name = $row["std_name"];
    $id = $row["std_id"];
    $prov = $row["province"];

    echo "<tr><td>".$name."</td><td>" .$id."</td><td>".$prov."</td></tr>";
    echo"</table>";
    
}

?>
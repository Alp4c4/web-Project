<?php
include "connect.php";
$stmt = $pdo->prepare('SELECT * FROM `student` WHERE province = ?');
$stmt->bindParam(1,$_GET["prov"]);
$stmt->execute();

while($row = $stmt->fetch()){
    $name = $row["std_name"];
    $id = $row["std_id"];
    $prov = $row["province"];

    echo $name." ".$id." ".$prov."<br>";

}


// $row = $stmt->fetch();
// if(empty($row)){
//     // echo "<script>alert('ไม่พบรหัสนี้'); </script>";
// }else{
//     $name = $row["std_name"];
//     $id = $row["std_id"];
//     $prov = $row["province"];

//     echo $name." ".$id." ".$prov;
// }

?>
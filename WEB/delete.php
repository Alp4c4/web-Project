<?php
include "connect.php";
session_start();

$stmt = $pdo->prepare("DELETE FROM register WHERE course_id = ? AND std_id = ?");
$stmt->bindParam(1, $_GET["course_id"]);
$stmt->bindParam(2, $_SESSION["std_id"]);
// echo "<script>alert('ถอนวิชานี้แล้ว'); </script>";

if($stmt->execute())
    
    header("location:deleteregis.php");

?>
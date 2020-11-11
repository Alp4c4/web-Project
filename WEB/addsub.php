<?php
include "connect.php";
session_start();

$stmt = $pdo->prepare("INSERT INTO register VALUE(?,?)");
$stmt->bindParam(1,$_SESSION["std_id"]);
$stmt->bindParam(2,$_GET["course_id"]);
$stmt->execute();
// echo "<script>alert('ลงทะเบียนสำเร็จ'); </script>";

header("location:addregistration.php");

?>
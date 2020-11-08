<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO course VALUE(?,?,?)");
$stmt->bindParam(1,$_POST["course_id"]);
$stmt->bindParam(2,$_POST["title"]);
$stmt->bindParam(3,$_POST["credit"]);
$stmt->execute();

header("location:addcourse.html");

?>
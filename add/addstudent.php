<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO student VALUE(?,?,?)");
$stmt->bindParam(1,$_POST["std_id"]);
$stmt->bindParam(2,$_POST["std_name"]);
$stmt->bindParam(3,$_POST["province"]);
$stmt->execute();
$stmt2 = $pdo->prepare("INSERT INTO login VALUE(?,?)");
$stmt2->bindParam(1,$_POST["std_id"]);
$stmt2->bindParam(2,$_POST["std_id"]);
$stmt2->execute();

header("location:addstudent.html");

?>
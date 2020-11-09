<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO login VALUE(?,?)");
$stmt->bindParam(1,$_POST["username"]);
$stmt->bindParam(2,$_POST["password"]);
$stmt->execute();

header("location:add.html");

?>
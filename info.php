<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการลงทะเบียน</title>
</head>
<body>
    <div>
    <?php
    $stmt = $pdo->prepare("SELECT register.course_id,course.title FROM register JOIN course ON register.course_id = course.course_id WHERE std_id = ? ");
    $stmt->bindParam(1,$_SESSION["std_id"]);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo "<br>";
        echo "วิชา: ".$row["title"]."<br>รหัสวิชา: ".$row["course_id"]."<br><hr>\n";
    
    }

    ?>
    </div>
    
</body>
</html>
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
    <title>ถอนวิชาเรียน</title>

    <script>
        function confirmDelete(course_id){
            var ans = confirm("ต้องการถอนรหัสวิชา "+course_id);
            if(ans==true)document.location = "delete.php?course_id="+course_id;
        }
    </script>
</head>
<body>
<?php
$stmt = $pdo->prepare("SELECT register.course_id,course.title FROM register JOIN course ON register.course_id = course.course_id WHERE std_id = ? ");
$stmt->bindParam(1,$_SESSION["std_id"]);
$stmt->execute();

while($row = $stmt->fetch()){
    echo "<br>";
    echo "วิชา: ".$row["title"]."<br>รหัสวิชา: ".$row["course_id"]."<br>";
    echo "<a href='#' onclick='confirmDelete(".$row["course_id"].")'>ถอน</a><hr>\n";
    // echo "<a href='#' onclick='confirmDelete(".$row["title"].")'>ถอน</a><hr>\n";
}

?>
    
</body>
</html>
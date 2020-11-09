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
    <title>เพิ่มวิชาเรียน</title>
</head>
<body>
    <section>
        <h2>เพิ่มวิชาเรียน</h2>
        <form method="POST" action="confirm_add.php">
            <div>
                <input type="text" name="course_id"> รหัสวิชา
                <input type="text" name="credit" size="5"> หน่วยกิต
            </div><br>
            <input type="button" value="ตรวจสอบ">

        </form>
    </section>
    
</body>
</html>
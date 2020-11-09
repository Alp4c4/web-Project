<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}

$stmt = $pdo->prepare("SELECT * FROM register WHERE std_id = ?");
$stmt->bindParam(1,$_SESSION["std_id"]);
$stmt->execute();
$row = $stmt->fetch();

if(!empty($row)){
    echo "<br>มีการลงทะเบียนไปแล้ว<br><a href='addregistration.php'>ลงทะเบียนเพิ่มวิชาเรียน</a>";

}else{
    echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registration</title>
    
</head>
<body>

    <section>
        <br>
        <h2>การลงทะเบียนเรียนใหม่</h2>
        <form method='POST' action='confirm_regis.php'>
            <div>
                <input type='text' name='course_id1'> รหัสวิชา
                <input type='text' name='credit1' size='5'> หน่วยกิต
            </div><br>
            <div>
                <input type='text' name='course_id12'> รหัสวิชา
                <input type='text' name='credit2' size='5'> หน่วยกิต
            </div><br>
            <div>
                <input type='text' name='course_id3'> รหัสวิชา
                <input type='text' name='credit3' size='5'> หน่วยกิต
            </div><br>
            <div>
                <input type='text' name='course_id4'> รหัสวิชา
                <input type='text' name='credit4' size='5'> หน่วยกิต
            </div><br>
            <div>
                <input type='text' name='course_id5'> รหัสวิชา
                <input type='text' name='credit5' size='5'> หน่วยกิต
            </div><br>
            <input type='button' value='ตรวจสอบ'>

        </form>
    </section>
    
</body>
</html>

    ";
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
</head>
<body>

    <section>
        <h2>การลงทะเบียนเรียนใหม่</h2>
        <form method="POST" action="confirm_regis.php">
            <div>
                <input type="text" name="course_id1"> รหัสวิชา
                <input type="text" name="credit1" size="5"> หน่วยกิต
            </div><br>
            <div>
                <input type="text" name="course_id12"> รหัสวิชา
                <input type="text" name="credit2" size="5"> หน่วยกิต
            </div><br>
            <div>
                <input type="text" name="course_id3"> รหัสวิชา
                <input type="text" name="credit3" size="5"> หน่วยกิต
            </div><br>
            <div>
                <input type="text" name="course_id4"> รหัสวิชา
                <input type="text" name="credit4" size="5"> หน่วยกิต
            </div><br>
            <div>
                <input type="text" name="course_id5"> รหัสวิชา
                <input type="text" name="credit5" size="5"> หน่วยกิต
            </div><br>
            <input type="button" value="ตรวจสอบ">

        </form>
    </section>
    
</body>
</html> -->
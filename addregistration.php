<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}
$stmt = $pdo->prepare("SELECT register.course_id,course.title FROM register JOIN course ON register.course_id = course.course_id WHERE std_id = ? AND course.course_id = ?");
$stmt->bindParam(1,$_SESSION["std_id"]);
$stmt->bindParam(2,$_POST["course_id"]);
$stmt->execute();
$row = $stmt->fetch();
if(empty($row)){
    $stm = $pdo->prepare("SELECT * FROM course WHERE course_id = ?");
    $stm->bindParam(1,$_POST["course_id"]);
    $stm->execute();
    $ro = $stm->fetch();
    if(!empty($ro)){
        echo "<script>
                var ans = confirm('ต้องการลงทะเบียนวิชา ".$ro["title"]."');
                if(ans==true)document.location = 'addsub.php?course_id=".$_POST["course_id"]."';
            </script>";
            
    }else{
    }

}else{
    echo "<script>alert('เคยลงทะเบียนวิชานี้แล้ว'); </script>";
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มวิชาเรียน</title>
</head>
<body>
    <section>
        <h2>เพิ่มวิชาเรียน</h2>
        <form method="POST" action="#">
            <div>
                <input type="text" name="course_id" require> รหัสวิชา
                <!-- <input type="text" name="credit" size="5"> ตอน -->
            </div><br>
            <button>ตรวจสอบ</button>
            <!-- <input type="button"  value="ตรวจสอบ"> -->

        </form>
    </section>
    
</body>
</html>
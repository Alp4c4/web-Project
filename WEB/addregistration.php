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
    <link rel="stylesheet" href="style.css">
    <title>เพิ่มวิชาเรียน</title>
</head>
<body>
<div class="header">
    <img src="pic1.jpg" width="auto">
    <div class="text">
      
      <section class="jumbotron">
      <a href="logout.php" class="button">LOGOUT</a>
      </section>
    </div>
</div>  
<div class="navbar">
    <a href="checkindex.php">หน้าแรก</a>
    <div class="dropdown">
    <button class="dropbtn">ลงทะเบียน
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addregistration.php">การเพิ่มวิชา</a>
      <a href="deleteregis.php">การถอนวิชา</a>
    </div>
  </div> 
  <a href="info.php">ตรวจสอบการลงทะเบียน</a>
  <div class="dropdown">
    <button class="dropbtn">ค้นหาข้อมูลนักศึกษา
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="checkcity.php">ค้นหาข้อมูลจังหวัดของนักศึกษา</a>
      <a href="checkstd_id.php">ค้นหาข้อมูลนักศึกษาด้วยเลขรหัสประจำตัว</a>
    </div>
  </div>
  <a href="changepass.php">แก้ไขรหัสผ่าน</a>
</div>
<h1 class="textsub">ยินดีต้อนรับคุณ<?php echo $_SESSION["std_name"];?></h1><br>
<div class="addsub">
    <h2>เพิ่มวิชาเรียน</h2>
    <form method="POST" action="#">
            <p>รหัสวิชา   :   
            <input type="text" name="course_id" require></p><br>
        <button>ตรวจสอบ</button>
    </form>
</div>  
</body>
</html>
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
    <link rel="stylesheet" href="style.css">
    <title>ตรวจสอบการลงทะเบียน</title>

    <script>
        function confirmDelete(course_id){
            var ans = confirm("ต้องการถอนรหัสวิชา "+course_id);
            if(ans==true)document.location = "delete.php?course_id="+course_id;
        }
    </script>
</head>
<body>
<div class="header">
    <img src="pic1.jpg" width="auto">
    <div class="text">
      <a href ="login.html">
      <img src="usericon.png" width="40%"></a>
      <section class="jumbotron">
        <a href="logout.php" class="button" font aria-setsize="10px">LOGOUT</a>
      </section>
    </div>
</div>  
<div class="navbar">
    <a href="index.html">หน้าแรก</a>
    <div class="dropdown">
    <button class="dropbtn">ลงทะเบียน
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addregistration.php">การเพิ่มวิชา</a>
      <a href="#">การถอนวิชา</a>
    </div>
  </div> 
  <a href="checkinfo.php">ตรวจสอบการลงทะเบียน</a>
  <div class="dropdown">
    <button class="dropbtn">ค้นหาข้อมูลนักศึกษา
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">ค้นหาข้อมูลจังหวัดของนักศึกษา</a>
      <a href="#">ค้นหาข้อมูลนักศึกษาด้วยเลขรหัสประจำตัว</a>
    </div>
  </div> 
</div>
<div class="menuofcheckinfo">
    <ul>
        <img src="usericon.png" width="60%"></a>
        <li><a href="info.php">ผลการลงทะเบียน</a></li>
        <li><a href="#">แก้ไขรหัสผ่าน</a></li>
    </ul>
    </div>
</body>
</html>
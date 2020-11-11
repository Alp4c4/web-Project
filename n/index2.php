<?php
include "connect.php";
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>dwqwqdwqdqwdqwdqd</title>
</head>
<body>
<div class="header">
    <img src="pic1.jpg" width="auto">
    <div class="text">
        <h3 class="textname">ยินดีต้อนรับคุณ<?php echo $_SESSION["std_name"];?></h3><br>
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
      <a href="#">ค้นหาข้อมูลจังหวัดของนักศึกษา</a>
      <a href="checkstd_id.php">ค้นหาข้อมูลนักศึกษาด้วยเลขรหัสประจำตัว</a> 
    </div>
  </div>
  <a href="changepass.php">แก้ไขรหัสผ่าน</a>
</div>
</body>
</html>
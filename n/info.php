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
    <title>ผลการลงทะเบียน</title>
</head>
<body>
<div class="header">
    <img src="pic1.jpg" width="auto">
    <div class="text">
      <h3 class="textname">ยินดีต้อนรับคุณ <?php echo $_SESSION["std_name"];?></h3><br>
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
<h1 class="textsub">ยินดีต้อนรับคุณ<?php echo $_SESSION["std_name"];?></h1><br>
<div class="menuofcheckinfo">
  <div class="info">
    <?php
    $stmt = $pdo->prepare("SELECT register.course_id,course.title FROM register JOIN course ON register.course_id = course.course_id WHERE std_id = ? ");
    $stmt->bindParam(1,$_SESSION["std_id"]);
    $stmt->execute();
    /*while($row = $stmt->fetch()){
        echo "<br>";
        echo "วิชา: ".$row["title"]."<br>รหัสวิชา: ".$row["course_id"]."<br><hr>\n";
    }*/
    echo "<table border = '1'>"; 
    echo "<tr>";
    echo "<th>วิชา</th>";
    echo "<th>รหัสวิชา</th>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<th>" . $row["title"] . "</th>";
        echo "<th>" . $row["course_id"] . "</th>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    </div>
</div>
</body>
</html>
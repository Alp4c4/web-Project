<?php
include "connect.php";
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ค้นหาข้อมูลนักศึกษาด้วยเลขรหัสประจำตัว</title>
    <script>
        var httpRequest;
        function send(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;

            var std_id = document.getElementById("std_id").value;
            var url = "std_id.php?std_id="+std_id;

            httpRequest.open("GET",url);
            httpRequest.send();

        }

        function showResult(){
            if(httpRequest.readyState == 4 && httpRequest.status == 200){
                document.getElementById("result").innerHTML = httpRequest.responseText;
            }
        }
    </script>
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
    <h1 class="textsub">กรุณากรอกรหัสนักศึกษาเพื่อที่ค้นหาข้อมูลของนักศึกษา</h1>
    <fieldset class="stdid">
    <div class="std_user">
            <input type="text" name="std_id" id="std_id" onkeyup="send()"><br>     
    </div>
    <div id="result">

    </div>
    </fieldset>
</body>
</html>
<!DOCTYPE html>
<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:login.html");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เปลี่ยนรหัสผ่าน</title>

    <script>
        var httpRequest;
        var httpRequest2;
        function check(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = show;

            var password = document.getElementById("password").value;
            var url = "checkpass.php?password="+password;

            httpRequest.open("GET",url);
            httpRequest.send();
        }
        function confirm(){
            httpRequest2 = new XMLHttpRequest();
            httpRequest2.onreadystatechange = show2;

            var password = document.getElementById("password").value;
            var cfpass = document.getElementById("cfpass").value;
            var url = "checkcf.php?password="+password+"&cfpass="+cfpass;

            httpRequest2.open("GET",url);
            httpRequest2.send();
        }

        function show(){
            if(httpRequest.readyState == 4 && httpRequest.status == 200){
                document.getElementById("showc").innerHTML = httpRequest.responseText;
            }
        }
        function show2(){
            if(httpRequest2.readyState == 4 && httpRequest2.status == 200){
                document.getElementById("showcf").innerHTML = httpRequest2.responseText;
            }
        }
    </script>
</head>
<body>
    <div>
        <form method="POST" action="changed.php">
            <label for="prov">รหัสผ่านใหม่</label>
            <input type="text" name="password" id="password" onkeyup="check()">
            <label id="showc"></label><br>
            <label for="prov">ยืนยันรหัสผ่าน</label>
            <input type="password" id="cfpass" onkeyup="confirm()">
            <label id="showcf"></label><br>
            <button>เปลี่ยนรหัสผ่าน</button>
        </form>
        
    </div>
</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <h1>สวัสดี <?=$_SESSION["std_name"]?></h1>
    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
<?php
include "connect.php";
session_start();
$stmt = $pdo->prepare('SELECT * FROM `student` WHERE std_id = ?');
$stmt->bindParam(1,$_GET["std_id"]);
$stmt->execute();
$row = $stmt->fetch();
if(empty($row)){
    echo "<script>alert('ไม่พบรหัสนี้'); </script>";
}else{
    $name = $row["std_name"];
    $id = $row["std_id"];
    $prov = $row["province"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหานักศึกษา</title>

    <script>
        function show(){
            var result = document.getElementById("result");
            var name = "<?=$name?>"
            var id = "<?=$id?>"
            var prov = "<?=$prov?>"
            var content = name +" "+ id +" "+prov

            // ตัวแปร name,id,prov เอาไปแยกใช้ได้เลยในภาษา js (แก้เสร็จลบข้อความนี้)
            result.innerHTML = content
            

        }
    </script>
</head>
<body>
    <div>
        <form action="#" method="GET">
            <label for="prov">กรอกรหัสนักศึกษา</label>
            <input type="text" name="std_id">
            <button onclick="show()">ค้นหา</button>
        </form>
    </div>
    <div id="result">

    </div>
</body>
</html>
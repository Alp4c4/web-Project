<?php
include "connect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function confirmDelete(course_id){
            var ans = confirm("ต้องการถอนรหัสวิชา "+course_id);
            if(ans==true)document.location = "delete.php?course_id="+course_id;
        }
    </script>
</head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM login JOIN student WHERE student.std_id = ? AND login.std_id = ? AND login.password = ?");
    $stmt->bindParam(1,$_POST["username"]);
    $stmt->bindParam(2,$_POST["username"]);
    $stmt->bindParam(3,$_POST["password"]);
    $stmt->execute();
    $row = $stmt->fetch();
    
    if(!empty($row)){
        session_regenerate_id();
        $_SESSION["std_id"] = $_POST["username"];
        $_SESSION["std_name"] = $row["std_name"];
    
        // echo "เข้าสู่ระบบสําเร็จ<br>";
        // echo "<a href='index.html'>test</a>";

        echo "<script>
                var ans = confirm('เข้าสู่ระบบสําเร็จ')
                if(ans==true)document.location = 'index.html'
            </script>";

    
        // header("location:index.html");
    }else{
        // echo "ไม่สำเร็จ";
        // echo "<a href='login.html'>เข้าสู่ระบบอีกครั้ง</a>";

        echo "<script>
                var ans = confirm('เข้าสู่ระบบไม่สําเร็จ')
                if(ans==true)document.location = 'login.html'
            </script>";
    }


    ?>
    
</body>
</html>
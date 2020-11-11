<?php 
include "connect.php";
session_start();
// $course_id = $_POST["course_id"];
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
        header("location:addregistration.php");
            
    }else{
    }

}else{
    echo "<script>alert('เคยลงทะเบียนวิชานี้แล้ว'); </script>";
    header("location:addregistration.php");
}
?>
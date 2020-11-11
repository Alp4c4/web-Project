<?php
if($_GET["password"] == $_GET["cfpass"]){
    echo "รหัสผ่านตรงกัน";
}else{
    echo "รหัสผ่านไม่ตรงกัน";
}
?>
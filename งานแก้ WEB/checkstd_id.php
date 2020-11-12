<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:std_id.html");
}
else{
    header("location:std_idlogin.php");
}
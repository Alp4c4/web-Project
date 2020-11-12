<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:test.php");
}
else{
    header("location:testlogin.php");
}
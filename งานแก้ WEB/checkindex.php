<?php
include "connect.php";
session_start();

if(empty($_SESSION["std_id"])){
    header("location:index.html");
}
else{
    header("location:index2.php");
}
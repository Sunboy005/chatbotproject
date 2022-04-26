<?php 
if (isset($_SESSION['user'])){
include_once "userinfo.php";
}else{
    $myfname="";
    $mylname="";
    $myphone="";
    $myoccupation="";
    $mystate="";
    $myindustry="";
    $mydesignation="";
    $mydesignationcode="";
    $myemail="";

    }
?>
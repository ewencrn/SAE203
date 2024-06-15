<?php
include_once('header.php');
include_once('db.php');

if(isset($_SESSION["role"])){
    if($_SESSION["role"]!="gerant"){
        header("location:".SITEROOT."index.php");
    }
}
else{
    header("location:".SITEROOT."index.php");
}

?>


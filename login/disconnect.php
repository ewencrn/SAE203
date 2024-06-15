<?php
include_once('../const.php');
session_start();
session_destroy();
header("location:".SITEROOT."index.php");
exit;



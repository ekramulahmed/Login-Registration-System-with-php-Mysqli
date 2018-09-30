<?php

session_start();
session_destroy();

setcookie("email", '', time()-3600);        //-----middle is blank & current time minus 3600s

header("location: login.php");

?>
<?php

$con = mysqli_connect("localhost","root","","registration");


if (!$con){
    die("Connection failed: " . mysqli_connect_error());
}

//if(mysqli_connect_errno()){
    
  //  echo "Error occured while connecting with database ".mysqli_connect_errno();
//}

session_start();

?>
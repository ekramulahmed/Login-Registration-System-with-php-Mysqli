<?php

include("connect.php");                                     //------------include db connection
include("functions.php");

   if(logged_in())
   {
       echo "You are logged in";

   ?>
       <a href="changepassword.php">Change Password</a>
       <a href="logout.php" style="float:right; padding:10px; margin-right:40px; background-color:#eee; color:#333; text-decoration:none">Logout</a>

   <?php
    
   }

   else
   {
       //echo "You are not logged in";
       
       //------------------------------------when user are not logged in,than he cannot able to go profile.php 
       header("location: login.php");
       exit();
   }

?>
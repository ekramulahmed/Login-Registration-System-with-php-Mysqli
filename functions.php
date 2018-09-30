<?php

function email_exists($email, $con){
    
    $result = mysqli_query($con, "SELECT id FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($result) == 1){  //--------------means user exist
        return true;
    }
    
    else{
        return false;
    }
    
    
}



//--------------------------user logged in or not

function logged_in(){
    
    if(isset($_SESSION['email']) || isset($_COOKIE['email']))          //---this cookie is basically check logins cookie value (this is supper                                                                                                                           global   cookie)    
    {          
        return true;
    }
    else
    {
        return false;
    }
}


?>
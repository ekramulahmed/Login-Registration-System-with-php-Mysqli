<?php

include("connect.php");                                     //------------include db connection
include("functions.php");


//----------when user logged in,than he cannot go login.php or registration.php without logout

if(logged_in())
{
    header("location: profile.php"); 
    exit();
}

$error = "";                                               //---------------this is global variable

if(isset($_POST['btn_submit'])){
	
    //-------------------------escape variables for security
	
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    //--------------------keep me loggin(checkbox || cookie)
    $checkBox = isset($_POST['keep']);
    
    if(email_exists($email,$con)){
        
        //$error = "Email Exists";
        
        $result = mysqli_query($con, "SELECT password FROM users WHERE email='$email'");
        $retrievepassword = mysqli_fetch_assoc($result);
        
        if(md5($password) !== $retrievepassword['password']){
            
            $error = "Password is incorrect";
        }
        
        else{
            
            $_SESSION['email'] = $email;
            
            
            //-----------------------checkbox(cookie)
            if($checkBox == "on")
            {
                setcookie("email", $email, time()+3600);   //---when user login, after one hour cookie will expire
            }
            
            header("location: profile.php");
            
        }
        
        
    }
    else{
        $error = "Email does not exists";
    }
}


?>




<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    
    <body>
        
        <div id="error" style=" <?php if($error !="") { ?> display:block; <?php } ?> "><?php echo $error;?></div>
        
        <div id="wrapper">
            
            <div id="menu">
                <a href="index.php">Sign Up</a>
                <a href="login.php">Login</a>
            </div>
            
            <div id="formDiv">
                <form method="POST" action="login.php">
                    
                    
                    
                    <label>Email:</label><br/>
                    <input type="text" name="email" class="inputFields" placeholder=" write mail address" required/><br/><br/>
                    
                    <label>Password:</label><br/>
                    <input type="password" name="password" class="inputFields" placeholder=" write password" required/><br/><br/>
                    
                    <input type="checkbox" name="keep"/>
                    <label>keep me logged in</label><br/><br/>
					
                    <input type="submit" name="btn_submit" class="theButtons" value="Login">
                    
                </form>
            </div>
        </div>
        
    </body>  
</html>
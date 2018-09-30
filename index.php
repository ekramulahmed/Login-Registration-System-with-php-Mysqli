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
    $firstName = mysqli_real_escape_string($con, $_POST['fname']);     //----------use it for protect sql injection(technique to hack database)
    $lastName = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    
    $image = $_FILES['image']['name'];                //--------------------fileName=image, ImageName=name------//
    $tmp_image = $_FILES['image']['tmp_name'];        //----------------essential for upload image
    $imageSize = $_FILES['image']['size'];            //---------------count image size in bytes
    
    $conditions = isset($_POST['conditions']);
	
	$date = date("F d, Y");
    
    
    //--------------------------------------validation
    if(strlen($firstName) < 3){
        $error = "First name is too short";
    }
    
    else if(strlen($lastName) < 3){
        $error = "Last name is too short";
    }
    
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Please enter valid email address";
    }
    
    //----The user who will register with an email, we dont want he will register with same email
    else if(email_exists($email, $con)){
        $error = "Someone is already registered with this email !";
    }
    
    else if(strlen($password) < 8){
        $error = "Password must be greater than 8 characters";
    }
    
    else if($password !== $passwordConfirm){                          //------------- === used for case sensative
        $error = "Password does not match";
    }
    
    else if($image == ""){
        $error = "Please upload your image";
    }
    
    else if($imageSize > 1048576){
        $error = "Image size must be less than 1mb";
    }
    
    else if(!$conditions){
        $error = "You must be agree with the terms and conditions !";
    }
    
    
    
    else
    {
        
        $error = "You are successfully registered here";
        
        $password = md5($password);                                             //-------use for encrypt our password 
        
        $imageExt = explode(".", $image);                      // ------for image extension as like jpg,png
        $imageExtension = $imageExt[1];                       //----it is add the one index of $imageExt variable
        
        
        if($imageExtension == 'PNG' || $imageExtension == 'png' || $imageExtension == 'JPG' || $imageExtension == 'jpg')
        {
            
            
        
            $image = rand(0, 100000).rand(0, 100000).rand(0, 100000).time().".".$imageExtension;   
        
            //----use for protect image replace when user upload same name of image {rand==random number & time() is always unique, "." ext er ager dot}
        
        
        
            $insertQuery = "INSERT INTO users(firstName, lastName, email, password, image, date) VALUES('$firstName','$lastName','$email','$password','$image','$date')";
            
        
            if(mysqli_query($con, $insertQuery))
            {        //-----means if this query runs
                
                if(move_uploaded_file($tmp_image,"images/$image"))
                {  
                    $error = "You are successfully registered here";
                }
                else
                {
                    $error = "Image is not uploaded";
                }
            }
        }
        else{
            $error = "File must be an image !";
        }
        
        
        
    }
    
    
    
   // echo $firstName."<br/>".$lastName."<br/>".$email."<br/>".$password."<br/>".$passwordConfirm."<br/>".$image."<br>".$imageSize;
    
}


?>




<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
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
                <form method="POST" action="index.php" enctype="multipart/form-data">
                    
                    <label>First Name:</label><br/>
                    <input type="text" name="fname" class="inputFields" placeholder="At least 3 word" required/><br/><br/>
                    
                    <label>Last Name:</label><br/>
                    <input type="text" name="lname" class="inputFields" placeholder="At least 3 word" required/><br/><br/>
                    
                    <label>Email:</label><br/>
                    <input type="text" name="email" class="inputFields" placeholder="Enter valid email" required/><br/><br/>
                    
                    <label>Password:</label><br/>
                    <input type="password" name="password" class="inputFields" placeholder="At least 8 characters" required/><br/><br/>
                    
                    <label>Re-enter Password:</label><br/>
                    <input type="password" name="passwordConfirm" class="inputFields" placeholder="Confirm password" required/><br/><br/>
                    
                    <label>Upload Image:</label><br/>
                    <input type="file" name="image" id="imageupload"/><br/><br/>
                    
                    <input type="checkbox" name="conditions"/>
                    <label>I am agree with terms and conditions</label><br/><br/>
                    
                    <input type="submit" name="btn_submit" class="theButtons" value="Register">
                    
                </form>
            </div>
        </div>
        
    </body>  
</html>
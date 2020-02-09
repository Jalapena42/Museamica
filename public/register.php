<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';


?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MyWebsite</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/register-style.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Create an account. Join Museamica!</h1>
                            <div class="description">
                                <p>Sign up and start sharing your music with your friends.
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter Email and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="register.php" method="POST" class="login-form">
                                       <!-- Email Addresss -->
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email Address</label>
                                            <input type="text" name="log_email" placeholder="Email Address" class="form-email form-control" value="<?php if(isset($SESSION['log_email'])) {
                                                echo $_SESSION['log_email'];
                                            } ?>" required>
                                        </div>
                                    
                                        <!-- Password -->
                                        <div class="form-group">
				                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="log_password" placeholder="Password" class="form-password form-control" required>
                                        </div>
                                        <?php if(in_array("Email or Password was incorrect", $error_array)) echo "Email or Password was incorrect"; ?>
                                        <button class="btn" type="submit" name="login_button">Sign in!</button>
                                    </form>     
			                    </div>
		                      </div>
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fas fa-pencil-alt"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="register.php" method="POST" class="registration-form">
                                         <!-- First Name -->
                                         <div class="form-group">
				                    		<label class="sr-only">First name</label>
                                            <input class="form-first-name form-control" type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) {
                                                echo $_SESSION['reg_fname'];
                                            } ?>" required>
                                            <?php if (in_array("Your first name must be between 2 and 25 characters" , $error_array)) echo "Your first name must be between 2 and 25 characters";           
                                            ?>
				                        </div>
				                        
				                        <!-- Last Name -->
				                        <div class="form-group">
				                        	<label class="sr-only">Last name</label>
                                            <input class="form-last-name form-control" type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) {
                                                echo $_SESSION['reg_lname'];
                                            } ?>" required>
                                            <?php if (in_array("Your last name must be between 2 and 25 characters" , $error_array)) echo "Your last name must be between 2 and 25 characters";           
                                            ?>
				                        </div>
				                    
                                        <!-- Username -->
				                        <div class="form-group">
				                        	<label class="sr-only">Username</label>
                                            <input class="form-username form-control" type="text" name="username" placeholder="Username" value="<?php if (isset($_SESSION['username'])) {
                                                echo $_SESSION['username'];
                                            } ?>" required>
                                            <?php
                                                if(in_array("Username already exists", $error_array)) echo "Username already exists";
                                                else if(in_array("Username must be between 2 and 20", $error_array)) echo "Username must be between 2 and 20";
                                                else if(in_array("You username can only contain english characters or numbers", $error_array)) echo "You username can only contain english characters or numbers";
                                            ?>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label class="sr-only">Email</label>
                                            <input class="form-email form-control" type="text" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])) {
                                                echo $_SESSION['reg_email'];
                                            } ?>" required>
                                        </div>

                                        <!-- Confirm Email -->
                                        <div class="form-group">
                                            <label class="sr-only">Confirm Email</label>
                                            <input class="form-confirm-email form-control" type="text" name="reg_email2" placeholder="Confirm Email" value="<?php if (isset($_SESSION['reg_email2'])) {
                                                echo $_SESSION['reg_email2'];
                                            } ?>" required>
                                            <?php
                                            if (in_array("Email already in use", $error_array)) echo "Email already in use";
                                            else if (in_array("Email is invalid format", $error_array)) echo "Email is invalid format";
                                            else if (in_array("Email doesn't match", $error_array)) echo "Email doesn't match";
                                            ?>
                                        </div>
                                        
                                        <!-- Password -->
                                        <div class="form-group">
                                            <label class="sr-only">Password</label>
                                            <input class="form-password form-control" type="password" name="reg_password" placeholder="Password" required>
                                        </div>                 
                                           
                                        <!-- Confirm Password -->
                                        <div class="form-group">
                                            <input class="form-confirm-password form-control" type="password" name="reg_password2" placeholder="Confirm Password" required>
                                            <?php if(in_array("Your passwords doesn't match", $error_array)) echo "You passwords doesn't match";
                                            else if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "Your password can only contain english characters or numbers";
                                            else if(in_array("Your password must be between 5 and 30 characters or numbers", $error_array)) echo "Your password must be between 5 and 30 characters or numbers";
                                            
                                            ?>
                                        </div>
                                        
                                        <!-- Gender -->
                                        <div class="form-group" style="float:left; color:#DCDCDC">
                                            <label class="sr-only">Gender</label>
                                            <tr>
                                                <td>Gender &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male"){
                                                ?> checked <?php
                                                } ?> required> Male &nbsp;
                                                <input type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female"){
                                                ?> checked <?php
                                                } ?> required> Female
                                                </td>
                                            </tr>
                                        </div>  
                    
                                        
                                        
                                        <br>
                           
                                        <!-- Submit Button -->
                                        <button type="submit" name="reg_user" class="btn">Sign me up!</button>         
				            
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

</html>



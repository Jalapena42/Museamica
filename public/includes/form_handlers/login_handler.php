<?php

if(isset($_POST['login_button'])){
    $em = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $em;
    
    $pw = $_POST['log_password'];
    $check_database_query = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
    $check_database_query2 = mysqli_query($con, "SELECT password FROM users WHERE password='$pw'");
    $check_login_query = mysqli_num_rows($check_database_query);
    $check_login_query2 = mysqli_num_rows($check_database_query2);

    if($check_login_query == 1 && $check_login_query2 != 0){
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;
        header("Location: user.html");
        exit();
    }
    else{
        array_push($error_array, "Email or Password was incorrect");
    }
}
?>
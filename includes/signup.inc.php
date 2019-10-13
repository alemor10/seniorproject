<?php


if(isset($_POST['signup-submit'])) {
    require 'database.inc.php';

    $username = $_POST['uid'];
    
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($username)|| empty($email)||  empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$studentID."&mail=".$email);
        exit();

    }
/*
    commented out until verfied to work 
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match*("/^[a-zA-Z0-9]*$/").$username)
    {
        header("Location: ../signup.php?error=invalidemail&uid");
        exit();
    
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidemail&uid=".$username);
        exit();
    }
    else if(!preg_match*("/^[a-zA-Z0-9]*$/").$username)
    {
        header("Location: ../signup.php?error=invaliduid=".$email);
        exit();
    }

*/

    else if ($password != $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$studentID."&mail=".$email);
        exit();

    }
    else {
        $sql = "SELECT idUsers FROM users where idUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql  = "INSERT INTO users (usernameUsers, emailUsers, passwordUsers) VALUES (?,?,?) ";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../signup.php?error=sqlerror4");
                    exit();
                }
                else
                {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss",$username,$email, $hashedPass);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../signup.php");
    exit();
}
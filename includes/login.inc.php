<?php

if(isset($_POST['login-submit'])){
    require 'database.inc.php';


    $email = $_POST['username'];
    $password = $_POST['password'];
    
    if (empty($email) || empty($password))
    {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else 
    {
        $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) 
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$email,$email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($password,$row['passwordUsers']);
                if ($pwdcheck == false)
                {
                    header("Location:../index.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdcheck == true)
                {
                    session_start();
                    $_SESSION['userID'] = $row['idUsers'];
                    $_SESSION['uidUsers'] = $row['usernameUsers'];
                    header("Location: ../dashboard.php?login=success");
                    echo session_id();
                    exit();

                }
            }
            else
            {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}


else {
    header("Location: ../index.php");
    exit();
}
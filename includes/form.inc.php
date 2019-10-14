<?php

if(isset($_POST['form-submit'])){
    require 'database.inc.php';
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastnamename'];
    $studentID = $_POST['studentID'];
    $phoneNumber = $_POST['phonenumber'];

    if(empty($firstName) || empty($lastname) || empty($studentID) || empty($phoneNumber))
    {
        header("Location: ../form.php?error=emptyfields");
        exit();
    }

    else
    {
        $sql = "SELECT idUsers FROM users where idUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

    }

}


else
{
    
}
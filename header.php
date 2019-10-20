<?php
    session_start();

?>


<!DOCTYPE html> 
<html>

    <head>
        <meta charset="utf-8">
        <meta name="descriptiom" content= "hi ur fat">
        <meta name = viewport content="width=device-width, inital-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title> hello</title>
    </head>

    <style>
        /* overflow: scroll , hidden 

        Value	Description

        visible: overflow is not clipped. It renders outside the element's box. 
        hidden:	overflow is clipped, and the rest of the content will be invisible	
        scroll:	overflow is clipped, but a scroll-bar is added to see the rest of the content	
        auto:If overflow is clipped, a scroll-bar should be added to see the rest of the content	
        initial:Sets this property to its default value. 
        inherit:Inherits this property from its parent element. 
        */

        /* For the top menu */

/* For the top menu */

ul.menutop {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
}

li.menutop {
    float: left;
}

li.menutop a.menutop {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li.menutop a.menutop:hover:not(.active) {
    background-color: #111;
}

.menutopactive {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    background-color: #4CAF50;
}


/* For the menu of the bottom */

ul.menubottom {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    bottom: 0; /* For the bottom now */
    width: 100%;
	
	border: 2px solid #e7e7e7;
    background-color: #f3f3f3;
	
}

li.menubottom {
    float: left;
}

li.menubottom a.menubottom {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li.menubottom a.menubottom:hover:not(.active) {
    background-color: #222;
}

.thinsection {
width: 20px;
}

</style>

<body>
    <header>
        <nav>
                 <ul class="menutop">
                        <li class="menutop"><a class="menutopactive" href="index.php">Home</a></li>
                        <li class="menutop"><a class="menutop" href="#news">News</a></li>
                        <li class="menutop"><a class="menutop" href="#contact">Contact</a></li>
                        <li class="menutop"><a class="menutop" href="#about">About</a></li>
                 </ul>
   
        </nav> 
    <div class="header-login">
        <?php

            if (isset($_SESSION['userID']))
            {
                echo '
                    <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit"> Logout Button</button>
                    </form>
                    <a href="includes/logout.inc.php" class="header-signup"> Logout </a>
                    ';
            }
            else 
            {
                echo '
                    <form action="includes/logout.inc.php" method="post">
                    <input type="text" name="email" placeholder="E-mail / Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type=submit name=login-submit"> Login </button>
                    </form>
                    <a href="login.php" class="header-signup"> Sign In</a>
                    ';

            }           

            ?> 
    </div>

    </header>
</body>
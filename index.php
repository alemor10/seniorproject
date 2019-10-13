<html>
<head>
<title>Home page</title>
</head>
<body>


<?php
    require "header.php";
?>



<main> 
                 
                     
        <form action="includes/login.inc.php" method ="post">
            <input type="text" name="studentID" placeholder="student ID">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit"> Login </button>
        </form>
        <a href="signup.php"> sign up </a>
        <form action="includes/logout.inc.php" method ="post">
            <button type="submit" name="logout-submit"> Logout </button>
        </form>

</main> 


</body>
</html>
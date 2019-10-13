<!DOCTYPE html>
<html>
<body>

<head>
<title>Login Up Page</title>
</head>



<body>
<?php
    require "header.php";
?>


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="includes/login.inc.php" method="post">
                    <h3 class="text-center"> Login </h3>
                    <div class="form-group">
                        <label for="username"> Username </label> 
                        <input type="text" name="username" class="form-control form-control-lg">
                    </div> 
                    <div class="form-group">
                        <label for="password"> Password </label> 
                        <input type="text" name="password" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login-submit" class="btn btn-primary btn-block btn-lg"> Login </button>
                    </div>
                    <p class="text-center"> Not registered yet? <a href="signup.php"> Sign Up </a> </p>

                </form>

            </div>
        </div>
    </div>




</body>
</html>

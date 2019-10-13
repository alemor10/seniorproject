<html>
<head>
<title>Sign Up Page</title>
</head>
<body>



<?php
 require "header.php"

?>


    <main> 
        <div class="wrapper-main">
            <section class="section-default">
                <h1> Sign Up </h1> 
                <form class="form-signup" action="includes/signup.inc.php" method="post">
                    <input type ="text" name="uid" placeholder="Username">
                    <input type ="text" name="mail" placeholder="Email">
                    <input type ="password" name="pwd" placeholder="Password">
                    <input type ="password" name="pwd-repeat" placeholder="Confirm Password">
                    <button type="submit" name="signup-submit"> Sign Up </button>
                </form>
            </section>
        </div>
    </main>

</body>
</html>

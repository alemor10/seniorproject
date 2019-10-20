<html>
<head>
<title>Form1</title>
</head>
<body>

<?php
    require "../header.php";
?>

<h2>First Form </h2>

<form action="includes/form.inc.php" method="post">
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname">
  <br>
  studentID:<br>
  <input type="text" name="studentID">
  <br>
  Phone Number:<br>
  <input type="text" name="phoneNumber">
  <div class="form-group">

  <button type="submit" name="form-submit" class="btn btn-primary btn-block btn-lg"> submit </button>
  </div>
</form>

<p>Note that the form itself is not visible.</p>

<p>Also note that the default width of a text input field is 20 characters.</p>

</body>
</html>

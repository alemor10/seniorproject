

<?php
session_start();
require '../includes/database.inc.php';
require_once '../formr/class.formr.php';
// create our form object and use Bootstrap as our form wrapper
$form = new Formr('bootstrap');


// make all fields required
$form->required = '*';

$hold =$_SESSION['userID'];
// check if the form has been submitted
if($form->submit())
{    
    
    // make sure our Message field has at least 10 characters
    $form->validate('Telephone(min_length[10])');
    $fname = $form->post('_first_name');
    $lname = $form->post('_last_name');
    $studentID = $form->post('_studentID');
    $phoneNumber = $form->post('_telephone');
    $sql = "SELECT idUsers FROM users where idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: accountinfoform.php?error=sqlerror");
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "i",$hold);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 1)
      {
        header("Location: accountinfoform.php?error=toomany");
        exit();
      }
      else
      {
        $sql  = "INSERT INTO users ($hold) VALUES (?,?,?,?) ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: accountinfoform.php?error=sqlerror4");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ssii",$fname,$lname, $studentID,$phoneNumber);
            mysqli_stmt_execute($stmt);
            header("Location: accountinfoform.php?signup=success");
            exit();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $form->success_message('Thank you for filling out our form!');  
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Account Information</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Account form</h2>
        <p class="lead">Filling out the information below will reduce the time required for your future forms </p>
      </div>

        <?php
      // print messages, formatted using Bootstrap alerts
      echo $form->messages();
      echo $form->form_open();
      echo $form->create('First name, Last name, student ID, Telephone');
      echo $form->input_submit();
      echo $form->form_close();
      echo("{$_SESSION['userID']}");
      ?>

        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>

  </body>
</html>

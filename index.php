<?php
session_start();
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["name"])&&isset($_POST["password"]) ) {

    // GATHER THE POSTED DATA INTO LOCAL VARIABLES
      $n = $_POST["name"];
      $p = $_POST["password"];


      if($n == "admin" && $p == "admin1234" && $_SESSION["cap"]==$_POST["captcha"]) {
        header("location: index.php?st=done");
      }else{
      	header("location: index.php?st=nope");
      }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="author" content="Shivam Thakur">
       <link rel="icon" href="img/favicon.ico">

    <title>Mini Project | Security of Webforms and Advanced CAPTCHA concept</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="def.css" rel="stylesheet">

  </head>

  <body style="padding-top: 20px;">


    <div class="container">
      <?php
      if (isset($_GET['st'])) {
        $st=$_GET['st'];
        if($st=='done'){
          echo "<div class='alert alert-success' role='alert'><strong>GREAT!</strong> You have logged in successully as 'admin'.</div>";
        }else{
        	echo "<div class='alert alert-danger' role='alert'><strong>OOPS!</strong> You are not an authorised user. Sorry!</div>";
        }
      }
      ?>

      <div class="row-fluid">

        <div class="col-md-6 col-md-offset-3 mybox"><h3>Login</h3>
          <h1 class="page-header"><strong><u>Mini Project</u></strong><br>Security of Webforms and Advanced CAPTCHA concept</h1>
          <script type="text/javascript">
             <!--
                // Form validation code will come here.
                function validate2()
                {
                
                   if( document.contact.name.value == "" ){
                      alert( "Please enter a user name!");
                      document.contact.name.focus() ;
                      return false;
                   }
                   if( document.contact.password.value == ""){
                      alert( "Please enter your password!");
                      document.contact.subject.focus() ;
                      return false;
                   }
                   //if( document.contact.captcha.value == ""){
                     // alert( "Please enter the captcha!");
                      //document.contact.subject.focus() ;
                      //return false;
                   //}

                 return(true);
                	
                }
             //-->
          </script>
          <form method="post" action="index.php"  onsubmit="return(validate2());" name="contact" id="contact">
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="email">Password</label>
              <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="subject">Captcha
              	<img src="img.php" />

              </label>
              <input type="text" class="form-control" id="captcha" name="captcha" autocomplete="off">
            </div>
            <input type="submit" class="btn btn-primary btn-lg" value="Login">
          </form>
        </div>

      </div>

    </div> <!-- /container -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
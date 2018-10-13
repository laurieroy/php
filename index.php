<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>
    <?php
    	$error = $successMessage="";

      if ($_POST){

          // define variables and set to empty values
          $email = $subject = $comment = "";

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
              $error .= "An email address is required.<br> ";
            } else {
              $email = test_input($_POST["email"]);
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                  $error .= "Invalid email format";
                }
            }

            if (empty($_POST["subject"])) {
              $subject = "";
              $error .= "The subject is required.<br>";
            } else {
              $subject = test_input($_POST["subject"]);
            }

            if (empty($_POST["comment"])) {
              $comment = "";
              $error .= "The comment field is required.<br>";
            } else {
              $comment = test_input($_POST["comment"]);
            }

            if ($error != "") {
              $error ='<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form: </strong></p>'. $error .'</div>';
            } else {
             	$emailTo = "laurieroy.dev@gmail.com";
                $subject = $_POST['subject'];
                $content = $_POST['comment'];
                $headers = "From: ".$_POST['email'];
              if (mail($emailTo, $subject, $content, $headers)) {
              	$successMessage = '<div class="alert alert-success" role="alert">Your message was sent, I\'ll be back to you shortly!</div>';
              } else {
              	$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent. Please try again later.</div>';
              }
            }
		}

       }
    ?>

	<div class="container">
  <!-- Content here -->
  		<div>
          <h1>Get in touch!</h1>
          <div id="error"><? echo $error.$successMessage; ?></div>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <div class="form-group">
              <label for="inputEmail">Email address</label>
                <input class="form-control" type="email" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email address" value="<?php echo $email;?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="inputSubject">Subject</label>
                <input class="form-control" type="text" name="subject" id="inputSubject" value="<?php echo $subject;?>">
            </div>
            <div class="form-group">
              <label for="comment">What would you like to ask us?</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"><?php echo $comment;?></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-primary" id="submit" >Submit</button>
         </form>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script type="text/javascript">

      $("form").submit(function( e ) {
      //prevent default form submit
          //validation
          var error = "";
          if ($("#email").val() == ""){
              error += "The email field is required.<br>";
          }
          if ($("#subject").val() == ""){
              error += "The subject field is required.<br>";
          }
          if ($("#comment").val() == ""){
              error += "The comment field is required.<br>";
          }
          if (error != ""){
              $("error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in the form:</strong></p>' + error +
              '</div>');
              return false;
          } else {
               return true;
          }
        });
    </script>
  </body>
</html>

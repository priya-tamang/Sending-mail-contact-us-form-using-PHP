<?php 
$NameError="";
$EmailError="";
$SubjectError="";
if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
    $NameError = "Name is required";
    }
    else{
      $name = test_User_input($_POST['name']);
      if(!preg_match("/^[A-Za-z . ]*$/",$name)){
        $NameError ="Only letter are allowed.";
      }
    }
    if(empty($_POST['email'])){
      $EmailError = "Email is required.";
      }
      else{
        $email = test_User_input($_POST['email']);
        if(!preg_match("/[a-zA-z0-9]{3,}@{1}[a-zA-z0-9]{3,}.{1}[a-zA-z0-9]{3,}/",$email)){
          $EmailError ="Only valid email are allowed";
        }
      }
      if(empty($_POST['subject'])){
        $SubjectError = "Subject is required";
        }
        else{
          $subject = test_User_input($_POST['subject']);
        }
  if(!empty($_POST['name']) &&(!empty($_POST['email']) &&(!empty($_POST['subject']) &&(!empty($_POST['message']))))){
     if((preg_match("/^[A-Za-z . ]*$/",$name))==true && (preg_match("/^[A-Za-z . ]*$/",$name))==true) {
        echo "<span class='msg'>Thank Your $name. </span>";
        $to_email = $_POST['email'];
        $subject = "Contact Form";
        $body = "Name : ".$_POST['name']."\nEmail : ".$_POST['email']."\nMessage : ".$_POST['message'];
        $headers = "From : priyatamang565@gmail.com";
        
        if (mail($to_email, $subject, $body, $headers)) {
            
        } }
  }
}
 function test_User_input($Data){
   return $Data;
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      .Error{
        color: red;
      }
      .msg{
        color: red;
        padding-left: 700px;
        margin-top: 30px; 
      }
    </style>

    <title>Contact Form</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          

          <div class="row justify-content-center">
            <div class="col-md-6">
              
              <h3 class="heading mb-4">Let's talk about everything!</h3>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?</p> -->

              <p><img src="images/undraw-contact.svg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6">
              
              <form class="mb-5" action="index.php" method="post" id="contactForm" name="contactForm">
                <div class="row">
                  <div class="col-md-12 form-group"> 
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" >
                    <span class="Error"><?php echo "  $NameError"; ?></span></div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    <span class="Error"><?php echo "  $EmailError"; ?></span></div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                    <span class="Error"><?php echo "  $SubjectError"; ?></span></div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-12">
                    <input type="submit" name="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                  </div>
                </div>
              </form>
              <div id="form-message-warning mt-4"></div> 
              <div id="form-message-success">
                Your message was sent, thank you!
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </body>
</html>
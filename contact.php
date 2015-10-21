<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Wanderdot'; 
        $to = 'clare.haley@cantab.net'; 
        $subject = 'Wanderdot Request';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }

 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank you for reaching out. I will be in touch as soon as possible.</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
    }
}
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wanderdot - The Art of Clare Haley</title>

    <link rel="stylesheet" href="style.css">

<!-- Instead of downloading Bootstrap, jQuery and Javascript, we will use MaxCDN -->    

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="container">
  <!-- Fixed Navigation Bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Wanderdot - The Art of Clare Haley</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="city.html">City</a></li>
              <li><a href="sea.html">Sea</a></li>
            </ul>
          </li>
          <li><a href="about.html">About</a></li>
          <li><a href="http://wanderdot.tumblr.com/">Blog</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Body of home page -->

  
<div class="container">
  <div class="row">
<a name="contact"></a>
    <h2 class="page-header">Contact Wanderdot with Inquiries &amp; Commissions</h2>
<br>
   <form class="form-horizontal" role="form" method="post" action="contact.php">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <?php echo "<p class='text-danger'>$errName</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-4">
            <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
            <?php echo "<p class='text-danger'>$errMessage</p>";?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>    
        </div>
    </div>
</form> 
   </div>

   <div class="row">
    <div class ="col-sm-6">
      <img id="contact-pic" src="smiley.gif" alt="Smiley face" class="img-responsive img-rounded">
 </div>
<hr>

  <!-- Footer Section -->
  <div class="container">
    <footer>
      <div class="row">
        <div class="col-lg-9">
          <p>Copyright &copy; Clare Haley 2015. All Rights Reserved.</p>
      </div>
      <div class="col-lg-3">
          <p>Created by Patrick Kennedy</p>
        </div>
      </div>
  </div>
    </footer>

  </div>
</div>
  </body>
</html>
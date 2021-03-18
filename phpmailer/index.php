<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'beatriceblidariu0@gmail.com';
      // Gmail Password
      $mail->Password = 'Butibevuli75';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom($email,$name);
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('beatriceblidariu0@gmail.com
');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>
<!DOCTYPE html>

  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>Secțiune de întrebări</title>
    <link rel="stylesheet" href="../css/contact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
    <!-- CSS only -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

  <!------NavigationBar--->
  <section id ="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand"><img src="../img/logo3.png" ></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../index.html">ACASĂ</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="../despre.html">DESPRE</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALGORITMI CU PIERDERI DE DATE</a>
          
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">MPEG-1/2</a>
                <a class="dropdown-item" href="#">Dolby AC-3</a>
                 <a class="dropdown-item" href="#">AAC</a>
            </div>
        </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             ALGORITMI FĂRĂ PIERDERI DE DATE</a>
        
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Wave Format</a>
                <a class="dropdown-item" href="#">FLAC</a>
               
                <a class="dropdown-item" href="#">Monkey`s Audio</a>
            </div>
            </li>
          <li class="nav-item">
             <a class="nav-link " href="index.php">ÎNTREBĂRI</a>
          </li>
        </ul>
     </div>
    </nav>
  </section>





<div class="contact-section">

  <h1>Adresează-ne orice întrebare</h1>
  <div class="border"></div>
  <form class="contact-form" action="#" method="POST">
    <div class="form-group">
                <?= $output; ?>
   <div class="form-group">
                
                <input type="text" name="name" id="name" class="form-control" placeholder="Nume și prenume" required>
              </div>
              <div class="form-group">
               
                <input type="email" name="email" id="email" class="form-control" placeholder="Scrie-ți adresa ta de email" required>
              </div>
              <div class="form-group">
        
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Introdu subiect" required>
              </div>
              <div class="form-group">
             
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Scrie mesajul "
                  required></textarea>
              </div>
              <br>
              <div class="form-group">
                <input type="submit" name="submit" value="Trimite" class="form-btn" id="sendBtn">
              </div>
  </form>
</div>
<br><br>
</body>

</html>
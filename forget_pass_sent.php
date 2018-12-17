

<?php 
    
    
$con = mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));
        

    session_start();


    $email_id = $_SESSION['email_id'];

    $enroll_no= $_SESSION['enroll_no'];

    $name= $_SESSION['name'];

    $password= $_SESSION['password'];

    echo "<br> <br> <br> <br> <br>";
    

///////////////////////////


	
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '24yadav09sumit96@gmail.com';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('24yadav09sumit96@gmail.com', 'Sumit');
    $mail->addAddress($email_id, $enroll_no);     // Add a recipient

    $body= "<p> <h2> <strong> Hi! $name <br> Enrollment No:- $enroll_no  </strong><br> Your Password is: $password <br> All The Best! </h2> </p>
         

       <h3> From:- <br> Sumit Yadav<br>Developer<br>JUET Quiz & Assignment Portal <h3>";

     //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'JUET Quiz & Assignment Portal! FORGET PASSWORD';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

    echo '<h1><center>Password has been sent to your email id. Check mail!</center<h1>';
} catch (Exception $e) {
    echo '<h1><center>Password could not be sent. Mailer Error: </center<h1> ', $mail->ErrorInfo;
}



/////////////////////


?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Password Sent</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>



<body>
    <br>
<br>
    <center>
    <div id="adminpage" class="row">
                <a href="index.php">
                  <span>HOME</span>  
                </a>
        </center>
</body>
</html>
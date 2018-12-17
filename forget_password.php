
 <?php

session_start();

$con = mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));
        
        $error=" ";

   if(isset($_POST['send'])){

          $enroll_no = $_POST['enroll_no'];
       
          $email_id = $_POST['email_id'];

          $forget_query = "select enroll_no, email_id, name, password from register where enroll_no= '$enroll_no' and email_id= '$email_id'";
          $forget_query_check = mysqli_query($con, $forget_query) or die(mysqli_error($con));
          $row = mysqli_fetch_array($forget_query_check);

          if ($row['enroll_no']== $enroll_no && $row['email_id']== $email_id) {
                        $error=" ";

                        $password= $row['password'];
                        $name=$row['name'];

                        session_start();
                        $_SESSION['enroll_no']= $enroll_no;
                        $_SESSION['email_id']= $email_id;
                        $_SESSION['password']= $password;
                        $_SESSION['name']= $name;

                        

                        header("location: forget_pass_sent.php");
                      }

          else{
                  $error ="Invalid Enroll no. or Email ID! Try again!";

                      }

}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Forget Password</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
  

<br>
<br>
<br>
<br>
<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Forget Password!</h1> </div>
	<div class="jumbotron" style="height:auto; box-shadow: 0 0 150px #000000; ">
  
  <form method="post">
    
          <div id="row1" class="row">
            <div class="col-45">
              <label >Enrollment No.</label>
            </div>
            <div class="col-55">
              <input type="text" id="enroll_no" name="enroll_no"  required="true">
            </div>
          </div>

          <div class="row">
            <div class="col-45">
              <label>Email ID</label>
            </div>
            <div class="col-55">
              <input style="width: 40%" type="email" id="email" name="email_id" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9-.-]+\.[a-z]{2,3}$">

               

            </div>
          </div>

          <!-- error show if incorrect fields entered--> 
           <center>
            
           <b><h3 class="error_login"><?php echo $error; ?></h3></b>
         </center>

          <br>
          
          
    <center>
          <h5 style="padding-left: 70px;">|| Password will be sent to your registered Email ID ||</h5>
        </center>   
            
            <div class="row">
              <input type="submit" name="send" value="SEND">
            </div>



      
            
	  
  </form>
 </div> 
</div>


 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
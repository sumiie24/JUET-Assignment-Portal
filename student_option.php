<?php

session_start();





$con2 = mysqli_connect("localhost","root","","assignment") or die(mysqli_error($con2));
        
        $error=" ";

           if(isset($_POST['submit'])){

        $enroll_no = $_SESSION['enroll_no'];

        $enroll_query = "select enroll_no from solution where enroll_no= '$enroll_no'";
          $enroll_query_check = mysqli_query($con2, $enroll_query) or die(mysqli_error($con2));
          $row2 = mysqli_fetch_array($enroll_query_check);

          if($row2['enroll_no']==$enroll_no){
              $error= "You had already submitted the Assignment!";
          }
          else
          {
            header("location: student_upload_assignment.php");
          }
}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Student Assignment Option</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>

  <div class="login_welcome">
        
        <center>
        <b><h3 style="font-weight: bold;"> Welcome! <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
     

        <h3 style="font-weight: bold; color: green;" class="logged"> Logged in Successfully!</h3>
    </center>

</div>  
 
<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">What you want to do?</h1> </div>

     <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>
  <div class="jumbotron" style="height:auto;">

      <div class="row">
          <div class="button_1 col-md-6" style="padding-left: 150px;">
            <button style="background-color: black;">
            <a href="student_view_assignment.php">View Assignment</a>
            </button>
          </div>

<form method="post">
   
  <div class="button_1 col-md-6" style="padding-left: 110px;">
            <button  style="background-color: black;" name="submit">
            Submit Assignment </a>
            </button>    
            </div>
          </div>
  </form>

   <!-- error show if incorrect fields entered--> 
           <center>
             <b><h3 class="error_login"><?php echo $error; ?></h3></b>
           </center>


 </div> 
</div>


 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
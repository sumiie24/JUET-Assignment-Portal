<?php


session_start();

?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Admin Assignment Option</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>


  <div class="login_welcome">
        
        <center>
        <b><h3 style="font-weight: bold;"> Welcome! <?php echo $_SESSION['admin_id'] ?>   </h3></b>
     

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
              <a href="admin_create_assignment.php">Upload Assignment </a>
            </button>
          </div>

          <div class="button_1 col-md-6" style="padding-left: 110px;">
            <button  style="background-color: black;">
              <a href="admin_view_assignment_sol.php">View Submitted Assignment </a>
            </button>    
            </div>
          </div>

 </div> 
</div>


 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
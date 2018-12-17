
<?php

//Backend Validations

$con = mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));
        
        $error_admin=" ";

        if(isset($_POST['submit'])){

          $admin_id = $_POST['admin_id'];
       
          $admin_pass = $_POST['admin_pass'];

          $login_query = "select * from admin where admin_id='$admin_id' and admin_pass= '$admin_pass'";

          $login_query_check = mysqli_query($con, $login_query) or die(mysqli_error($con));
           
          $row = mysqli_fetch_array($login_query_check);


                      if ($row['admin_id']== $admin_id && $row['admin_pass']== $admin_pass) {
                        $error_admin="";



                        session_start();
                        $_SESSION['admin_id']=$admin_id;

                        header("location: admin_option.php");
                      }

                      else{
                        $error_admin ="Invalid ID or Password! Try again!";
                        
                      }
        }

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Admin Login</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
         <div class="navbar-header">
          <a href="index.php" class="pull-left visible-lg visible-md">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="index.php"><h1>JAYPEE UNIVERSITY OF ENGINEERING &amp; TECHNOLOGY </h1></a>
            <p>
              <span>A-B ROAD RAGHOGARH, GUNA</span>
            </p>
          </div>
         </div>
</div>
    </nav>
</header>


<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Assignment Portal</h1> </div>
	<div class="jumbotron" style="height:auto; ">

  <form method="post">
   
           <div id="adminheader">ADMIN LOGIN</div>
            <div id="row1" class="row">
              <div class="col-45">
                <label>Admin ID</label>
              </div>

              <div class="col-55">
                <input type="text" id="ernumber" name="admin_id" required="true">
              </div>
            </div>

            <div class="row">
              <div class="col-45" style="margin-top:-5px">
                <label>Admin Password</label>
              </div>

              <div class="col-55">
                <input style="width: 40%;" type="password" id="password" name="admin_pass" required="true">
              </div>
            </div>


    <!-- error show if incorrect fields entered--> 
           <center>
           <b><h3 class="error_login"><?php echo $error_admin; ?></h3></b>
         </center>
    
    <div class="row">
      <input type="submit" value="LOGIN" name="submit">
    </div>
    
    
  </form>

 </div> 
</div>

<footer class="panel-footer">
    <div class="container-fluid">
      <div class="text-center"><b>Developer: Sumit Yadav, Pankaj Bansal &amp; Nameh Dhiman</b> </div>
      <div class="text-center">&copy; Copyright Jaypee University of Engineering &amp; Technology </div>
    </div>
</footer>
 

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

 <?php

session_start();  
 session_unset();
 session_destroy();

//Backend Validations

$con = mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));
        
        $error=" ";

        if(isset($_POST['submit'])){

          $enroll_no = $_POST['enroll_no'];
       
          $password = $_POST['password'];

          $login_query = "select * from register where enroll_no= '$enroll_no' and password= '$password'";
          $login_query_check = mysqli_query($con, $login_query) or die(mysqli_error($con));
          $row = mysqli_fetch_array($login_query_check);


         


                      if ($row['enroll_no']== $enroll_no && $row['password']== $password) {
                        $error="";

                        session_start();
                        $_SESSION['enroll_no']= $enroll_no;

                        header("location: student_option.php");
                      }

                      else{
                        $error ="Invalid Enroll no. or Password! Try again!";

                      }
        }

?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>JUET Assignment Portal</title>
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
	<div class="jumbotron" style="height:380px">
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
              <label>Password</label>
            </div>
            <div class="col-55">
              <input style="width: 40%" type="password" id="password" name="password" required="true">

               <a href="forget_password.php">
                <span style="font-size: 15px;"><b>Forget Password?</b></span>  
              </a>
            </div>
          </div>

           <!-- error show if incorrect fields entered--> 
           <center>
           <b><h3 class="error_login"><?php echo $error; ?></h3></b>
         </center>

            <div class="row">
              <input type="submit" name="submit" value="LOGIN">
            </div>

      
            <div id="adminpage" class="row">
            <a href="register.php">
              <span><b>Register( New User )</b></span>  
            </a>
            </div>  

          	<div id="adminpage" class="row">
          		<a href="admin_login.php">
          		  <span><b>Admin Login</b></span>	
          		</a>
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
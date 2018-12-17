<?php
    
    session_start();

?>

            <!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">

<style >
    .thanku{
    color: black;
    text-align: center;
    font-size: 20px;

}
</style>

</head>
<body>

     <center>
        <b><h3 style="font-weight: bold;"> Enrollment No:- <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
    </center>

    
    <div class="thanku">
        <h1 style="color: green;">Your are successfully registered. Now <b> Login </b>to submit the Assignment! </h1>

        <br> 
        <h1 style="color: black;">All the Best! </h1>
     
        <div id="adminpage" class="row">
            <a href="./index.php">
              <span>Student Login</span>  
            </a>
            </div>
</div>    
    
   

</body>
</html>
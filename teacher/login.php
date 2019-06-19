<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../styles/style.css" media="screen">
<link rel="stylesheet" href="../styles/media-queries.css">
<link rel="stylesheet" href="../flex-slider/flexslider.css" type="text/css" media="screen">
<link href="../styles/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen">
<link href="../styles/tipsy.css" rel="stylesheet" type="text/css" media="screen">
<script src="../scripts/jquery-1.7.1.min.js"></script>
<script src="../flex-slider/jquery.flexslider-min.js"></script>
<script src="../scripts/jquery.prettyPhoto.js"></script>
<script src="../scripts/jquery.tipsy.js"></script>
<script src="../scripts/jquery.knob.js"></script>
<script src="../scripts/jquery.isotope.min.js"></script>
<script src="../scripts/jquery.smooth-scroll.min.js"></script>
<script src="../scripts/waypoints.min.js"></script>
<script src="../scripts/setup.js"></script>
</head>
<body>
<div id="wrap">
  <!-- wrapper -->
  
  <div id="sidebar" style="background-color: transparent;">
    <!-- the  sidebar -->
    <!-- logo -->
   <h2><a href="login.php" id="logo"> MIT Attendance Management System</a></h2> 
    <!-- navigation menu -->
 
  </div>
  <div id="container" style=" border-radius: 0 0 10px 0; box-shadow: 5px 5px 25px black">
 
    <div class="page" id="contact">
      <!-- page contact -->
      <h3 class="page_title">Instructor Login</h3>
      <div class="page_content">
        <fieldset id="contact_form">
          <div id="msgs"> </div>
          <form id="cform" name="cform" method="post" action="login.php">
            <input type="text"  name="uname" placeholder ="User Name/ ID" style="width: 35%; margin-left: 30%;" required>
            <input type="password" name="pwd" placeholder="Password" style="width: 35%; margin-left: 30%;" required>
            <input type="submit" id="submit" class="button" value="Login" name="login" style=" text-align:center; width: 60px; float: left; margin-left: 45%;">
          </form>
        </fieldset>
        <div class="clear"> 
            <?php

if (isset($_POST['login'])) {
  include '../includes/connect.php';

    $username = $_POST["uname"];
    $password = $_POST["pwd"];

    $sql = "SELECT * FROM INSTRUCTOR WHERE ID ='$username' AND PASSWORD = '$password'";

    $run_query = oci_parse($conn, $sql);
    oci_execute($run_query);

    if ($rows = oci_fetch_array($run_query)) {
     
        $dept = $rows['DEPARTMENT'];
        $fname = $rows['FIRST_NAME'];
        $lname = $rows['LAST_NAME'];
        $uname = $rows['ID'];
      
      session_start();
      $_SESSION['dept'] = $dept;
      $_SESSION['uname'] = $uname;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      echo "<script>window.open('index.php','_self')</script>";
    } 
    else{
      echo "<h3 style=\"color : red; margin-left: 30%;\">Incorrect Username or Password!</h3>";
    }
 }

?>
        </div>
        
      </div>
    </div>
    <div class="footer">
      <p>Attendance Management System</p>
      <p>Copyright &copy; <a href="http://www.mitethiopia.edu.et" target="_blank">Mekelle Institute of Technology</a> | All Rights Reserved.</p>
      
    </div>
  </div>
</div>
<!-- <a class="gotop" href="#top">Top</a> -->
 
</body>
</html>

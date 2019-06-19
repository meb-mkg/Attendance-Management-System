<?php
  session_start();
  if (!isset($_SESSION['uname'])) {
    
    header("location: ../index.php");
  }

else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../styles/style.css" media="screen">
<link rel="stylesheet" href="../styles/media-queries.css">
<link rel="stylesheet" href="flex-slider/flexslider.css" type="text/css" media="screen">
<link href="../styles/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen">
<link href="../styles/tipsy.css" rel="stylesheet" type="text/css" media="screen">
<script src="../scripts/jquery-1.7.1.min.js"></script>
<script src="flex-slider/jquery.flexslider-min.js"></script>
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
  
  <div id="sidebar" ">
    <!-- the  sidebar -->
    <!-- logo -->
   <h2><a href="index.php" id="logo"> MIT Attendance Management System</a></h2> 
    <!-- navigation menu -->
    <ul id="navigation">
      <li ><a href="#" style="color: yellow;">Welcome! <?php echo $_SESSION['uname'];?></a></li>
      <li><a href="logout.php">Log out</a></li>
      <li><a href="courses.php">Courses</a></li>
      <li><a href="instructors.php">Instructors</a></li>
      <li><a href="students.php">Students</a></li>
      
    </ul>
  </div>
  <div id="container">
 
    <div class="page" id="contact">
      <!-- page contact -->
      <h3 class="page_title" align="center">Students</h3>
       
      <div class="page_content">
        <?php
          if ($_SESSION['dept'] == 'FRESH' or $_SESSION['dept'] == 'fresh') {
            # code...
            echo "<script>window.open('list_students.php?year=1','_self')</script>";
          }
            if ($_SESSION['dept'] == 'CBEN' or $_SESSION['dept'] == 'cben') {
          ?>
             <ul id="navigation" style="border: 1px solid black; border-radius: 5px 5px;">
              <li><a href="list_students.php?year=1">1st Year</a></li>
              <li><a href="list_students.php?year=2">2nd Year</a></li>
              <li><a href="list_students.php?year=3">3rd Year</a></li>
              <li><a href="list_students.php?year=4">4th Year</a></li>
              <li><a href="list_students.php?year=5">5th Year</a></li>
            </ul>
            
            <?php 
            }
            else {
            ?>
            <ul id="navigation" style="border: 1px solid black; border-radius: 5px 5px;">
              <li><a href="list_students.php?year=2">2nd Year</a></li>
              <li><a href="list_students.php?year=3">3rd Year</a></li>
              <li><a href="list_students.php?year=4">4th Year</a></li>
              <li><a href="list_students.php?year=5">5th Year</a></li>
            </ul>
              <?php
          }
         
        ?>
        <div class="clear"> 

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

 <?php
  } 
?>
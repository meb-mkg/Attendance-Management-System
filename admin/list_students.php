<?php
  session_start();
  if (!isset($_SESSION['uname'])) {
    
    header("location: ../index.php");
  }

else{
  if (isset($_GET['year'])) { 
  $yr = $_GET['year'];
  $dept = $_SESSION['dept'];
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
      <h3 class="page_title" align="center">  List of Students class Year: <?php echo $yr;?></h3>
       
      <div class="page_content">
      
      <table width="100%">
            <tr align="left">
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Section</th>
              
            </tr>
        <?php

        include "includes/connect.php"; 
          $sql = "SELECT * FROM STUDENT where department = '$dept' and class_year = '$yr' ";
          $run_query = oci_parse($conn, $sql);
          oci_execute($run_query);
          while ($rows = oci_fetch_array($run_query)) {
            # code...
            $fname = $rows['FIRST_NAME'];
            $lname = $rows['LAST_NAME'];
            $section = $rows['SECTION'];
            $id = $rows['ID'];

            echo "<tr>";
              echo "<td>$id</td>";
              echo "<td>$fname</td>";
              echo "<td>$lname</td>";
              echo "<td>$section</td>";
            echo "</tr>";
          }
         
        ?>
        </table>
        <div class="clear"> 

        </div>
        <ul id="navigation">
          <li><a href="add_student.php?year=<?php echo $yr ?>">New Student</a></li>
        </ul>
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
} 
?>
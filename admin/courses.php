<?php
session_start();
if (!isset($_SESSION['uname'])) {
  
  header("location: ../index.php");
}

else{
  
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
          <h3 class="page_title" align="center">List of Courses</h3>
          
          <div class="page_content">
            
            <table width="100%">
              <tr align="left">
                
                <th>Course Code</th>
                <th>Course Name</th>
                
                
              </tr>
              <?php

              include "includes/connect.php"; 
              $sql = "SELECT * FROM COURSE where department = '$dept' ";
              $run_query = oci_parse($conn, $sql);
              oci_execute($run_query);
              while ($rows = oci_fetch_array($run_query)) {
            # code...
                
                $ccode = $rows['COURSE_CODE'];
                $cname = $rows['COURSE_NAME'];
                
                

                echo "<tr>";
                echo "<td>$ccode</td>";
                echo "<td>$cname</td>";
                echo "</tr>";
              }
              
              ?>
            </table>
            <div class="clear"> 

            </div>
            <ul id="navigation">
              <li><a href="add_course.php?dept=<?php echo $dept ?>">New Course</a></li>
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
?>
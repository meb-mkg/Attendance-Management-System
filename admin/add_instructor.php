<?php
session_start();
if (!isset($_SESSION['uname'])) {

  header("location: ../index.php");
}

else{
  if (isset($_GET['dept'])) { 
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
            <li><a href="#" style="color: yellow;">Welcome! <?php echo $_SESSION['uname'];?></a></li>
            <li><a href="logout.php">Log out</a></li>
            <li><a href="courses.php?dept=<?php echo $_SESSION['dept'];?>">Courses</a></li>
            <li><a href="instructors.php?dept=<?php echo $_SESSION['dept'];?>">Instructors</a></li>
            <li><a href="students.php">Students</a></li>

          </ul>
        </div>
        <div id="container">

          <div class="page" id="contact">
            <!-- page contact -->
            <h3 class="page_title" align="center"> Department of <?php echo $_SESSION['dept'];?><br> Add New Instructor</h3>

            <div class="page_content">

              <fieldset id="contact_form">
                <div id="msgs"> </div>
                <form id="cform" name="cform" method="post" action="">
                  <p>Instructor ID:<input type="text"  name="in_id" placeholder ="Instructor ID" style="width: 35%; margin-left: 30%;" required></p>
                  <br>
                  <p>First Name:<input type="text" name="fname" placeholder="First Name" style="width: 35%; margin-left: 30%;" required></p><br>
                  <p> Last Name:<input type="text"  name="lname" placeholder ="Last Name" style="width: 35%; margin-left: 30%;" required></p><br>
                  <p>Department:<input type="text"  name="dept" placeholder ="Department" style="width: 35%; margin-left: 30%;" value="<?php echo $dept; ?>" disabled></p> <br>
                  <p>Password:<input type="password" name="pwd" placeholder="Password" style="width: 35%; margin-left: 30%;" value="mit" disabled></p><h5 style="color: lightgray;" >Default: mit</h5><br>
                  <p><select style="width: 38%; margin-left: 30%; background-color: #195f88; height: 40px; color: white;" name="course" required>
                    <option value="" >Please Select Course...</option>
                    <?php

                    include "includes/connect.php"; 
                    $sql = "SELECT * FROM COURSE where department = '$dept' ";
                    $run_query = oci_parse($conn, $sql);
                    oci_execute($run_query);
                    while ($rows = oci_fetch_array($run_query)) {
                  # code...

                      $ccode = $rows['COURSE_CODE'];
                      $cname = $rows['COURSE_NAME'];



                      echo "<option value=\"$ccode\">";
                      echo "$ccode  -";
                      echo "-  $cname";
                      echo "</option>";
                    }

                    ?>

                  </select>Course:</p>

                  <input type="submit" id="submit" class="button" value="Add" name="add" style=" text-align:center; width: 60px; float: left; margin-left: 45%;">
                </form>
              </fieldset>
              <div class="clear"> 

              </div>
              <?php 
              if (isset($_POST['add'])) {
           # code...
                include 'includes/connect.php';

                $in_id = $_POST['in_id'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $course = $_POST['course'];
                $pwd = "mit";

                $sql = 'INSERT INTO INSTRUCTOR(ID, First_Name, Last_Name, Department, Password, Course) '.
                'VALUES(:id, :fname, :lname, :dept, :pwd, :course)';

                $compiled = oci_parse($conn, $sql);

                oci_bind_by_name($compiled, ':id', $in_id);
                oci_bind_by_name($compiled, ':fname', $fname);
                oci_bind_by_name($compiled, ':lname', $lname);
                oci_bind_by_name($compiled, ':dept', $dept);
                oci_bind_by_name($compiled, ':pwd', $pwd);
                oci_bind_by_name($compiled, ':course', $course);

                if(oci_execute($compiled) == TRUE){
                  echo "<script>window.alert(\"Instructor Information Added Successfully!\")</script>";
                  echo "<script>window.open('add_instructor.php?dept=$dept','_self')</script>";
                }
                else{
                  echo "<script>window.alert(\"Failed to add Instructor Information! Try Again\")</script>";
                }
              }
              ?>
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
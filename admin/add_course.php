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

      <!--css -->
      <link rel="stylesheet" href="../styles/style.css" media="screen">
      <link rel="stylesheet" href="../styles/media-queries.css">
      <link rel="stylesheet" href="flex-slider/flexslider.css" type="text/css" media="screen">
      <link href="../styles/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen">
      <link href="../styles/tipsy.css" rel="stylesheet" type="text/css" media="screen">

      <!-- JS -->

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
            <h3 class="page_title" align="center"> Department of <?php echo $_SESSION['dept'];?><br> Add New Course</h3>

            <div class="page_content">

              <fieldset id="contact_form">
                <div id="msgs"> </div>
                <form id="cform" name="cform" method="post" action="">
                  <p>Course Code:<input type="text"  name="ccode" placeholder ="Course Code" style="width: 35%; margin-left: 30%;" required></p>
                  <br>
                  <p>Course Name:<input type="text" name="cname" placeholder="Course Name" style="width: 35%; margin-left: 30%;" required></p><br>

                  <input type="submit" id="submit" class="button" value="Add" name="add" style=" text-align:center; width: 60px; float: left; margin-left: 45%;">
                </form>
              </fieldset>
              <div class="clear"> 

              </div>
              <?php 
              if (isset($_POST['add'])) {
           # code...
                include 'includes/connect.php';

                $ccode = $_POST['ccode'];
                $cname = $_POST['cname'];


                $sql = 'INSERT INTO COURSE(COURSE_CODE, COURSE_Name, Department) '.
                'VALUES(:ccode, :cname, :dept)';

                $compiled = oci_parse($conn, $sql);


                oci_bind_by_name($compiled, ':ccode', $ccode);
                oci_bind_by_name($compiled, ':cname', $cname);
                oci_bind_by_name($compiled, ':dept', $dept);



                if(oci_execute($compiled) == TRUE){
                  echo "<script>window.alert(\"Course Information Added Successfully!\")</script>";
                  echo "<script>window.open('add_course.php?dept=$dept','_self')</script>";
                }
                else{
                  echo "<script>window.alert(\"Failed to add Course Information! Try Again\")</script>";
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

    </body>
    </html>

    <?php
  } 
}
?>
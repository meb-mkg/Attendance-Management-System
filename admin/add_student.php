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
            <h3 class="page_title" align="center"> Department of <?php echo $_SESSION['dept'];?><br> Add New Student</h3>

            <div class="page_content">
              
              <fieldset id="contact_form">
                <div id="msgs"> </div>
                <form id="cform" name="cform" method="post" action="">
                  <p>Student ID:<input type="text"  name="st_id" placeholder ="Student ID" style="width: 35%; margin-left: 30%;" required></p>
                  <br>
                  <p>First Name:<input type="text" name="fname" placeholder="First Name" style="width: 35%; margin-left: 30%;" required></p><br>
                  <p> Last Name:<input type="text"  name="lname" placeholder ="Last Name" style="width: 35%; margin-left: 30%;" required></p><br>
                  <p> Class Year:<input type="number" name="year" placeholder="Class Year" value="<?php echo $yr ?>" style="width: 35%; margin-left: 30%;" disabled></p><br>
                  <p>Department:<input type="text"  name="dept" placeholder ="Department" style="width: 35%; margin-left: 30%;" value="<?php echo $dept; ?>" disabled></p> <br>
                  <p>Section:<input type="text" name="section" placeholder="Section" style="width: 35%; margin-left: 30%;" required></p><br>
                  <input type="submit" id="submit" class="button" value="Add" name="add" style=" text-align:center; width: 60px; float: left; margin-left: 45%;">
                </form>
              </fieldset>
              <div class="clear"> 

              </div>
              <?php 
              if (isset($_POST['add'])) {
           # code...
                include 'includes/connect.php';
                $st_id = $_POST['st_id'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $year = $yr;
                $section = $_POST['section'];

                $sql = 'INSERT INTO STUDENT(ID, First_Name, Last_Name, Class_Year, Department, section) '.
                'VALUES(:id, :fname, :lname, :year, :dept, :section)';

                $compiled = oci_parse($conn, $sql);

                oci_bind_by_name($compiled, ':id', $st_id);
                oci_bind_by_name($compiled, ':fname', $fname);
                oci_bind_by_name($compiled, ':lname', $lname);
                oci_bind_by_name($compiled, ':year', $year);
                oci_bind_by_name($compiled, ':dept', $dept);
                oci_bind_by_name($compiled, ':section', $section);

                
                if(oci_execute($compiled) == TRUE){
                  echo "<script>window.alert(\"Student Information Added Successfully!\")</script>";
                  echo "<script>window.open('add_student.php?year=$yr','_self')</script>";
                }
                else{
                  echo "<script>window.alert(\"Failed to add Student Information! Try Again\")</script>";
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
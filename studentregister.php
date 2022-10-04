<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include("include/navbar.php");?>
  <!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-6">
            <h1>Students Register Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Students Register Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Students Register Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Father Name</label>
                    <input type="text" class="form-control" id="fathername"  name="fathername" placeholder="Father Name" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Mother Name</label>
                    <input type="text" class="form-control" id="mothername" name="mothername" placeholder="Mother Name" required>
                </div> <!-- /.form-group -->
              </div><!--col-->

               <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div> <!-- /.form-group -->
              </div><!--col-->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Mobile number</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile number" required>
                </div><!-- /.form-group -->
              </div><!--col-->
             
              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Mobile Number 2</label>
                    <input type="number" class="form-control" id="mobile1" name="mobile1" placeholder="Mobile number">
                  </div><!-- /.form-group -->
              </div><!-- /.col -->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" required>
                </div><!-- /.form-group -->
              </div><!-- /.col -->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Adhar Number</label>
                    <input type="number" class="form-control" id="adharno" name="adharno" placeholder="Adhar Number" required>
                </div><!-- /.form-group -->
              </div><!-- /.col -->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Student Id</label>
                    <input type="number" class="form-control" id="studentid" name="studentid" placeholder="Student Id" required>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
                 
              <div class="col-12 col-md-3">
              <div class="form-group">
                 <div class="custom-file">
              <label for="exampleInputimage">Student image</label>
              <input type="file" class="form-control" id="stuimage" name="stuimage" placeholder="Upload image " required>
            </div>
              </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification">
                </div><!-- /.form-group -->
              </div><!-- /.col -->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInputnumber">Course selcted</label>
                    <select class="form-control form-select" id="coursename" name="coursename" placeholder="Course selcted " onchange="getdivi()">
                      <option value="">Select Course</option>
              <?php
                
              $sql = mysqli_query($db,"SELECT course.id,course.coursename,sub_course.id as subid,sub_course.subcourse,sub_course.fees,sub_course.duration FROM `course` LEFT JOIN sub_course ON course.id= sub_course.courseid group by course.id");
                
                while ($row = mysqli_fetch_array($sql)){
            ?>                
              <option value="<?php echo $row['id']; ?>"><?php echo $row['coursename']; ?></option>

              <?php
                }
              ?>

                </select> 
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              </div><!-- row-->

              <div class="row ml-auto"> 
              <div class="col-12 col-md-3">
                <div class="form-group ">                             
                  <label for="exampleInput">Sub course</label>
                  <select type="text"  class="form-control" id="subcourse" name="subcourse" placeholder="Sub Course" >
                    <option>Select Sub Course</option>
                   </select>
              </div><!-- /.form-group -->
              </div><!-- /.col -->  
              <div class="col-12 col-md-3">
                <div class="form-group ">                             
                  <label for="exampleInput">Time duration</label>
                  <input type="text" class="form-control" id="duration" name="duration" placeholder="Time duration">
                      

              </div><!-- /.form-group -->
              </div><!-- /.col -->

              <div class="col-12 col-md-3">
                <div class="form-group">
                  <label for="exampleInput">Fees structure</label>
                    <input type="number" class="form-control" id="fees" name="fees" placeholder="Fees structure">
                     
              </div><!-- /.form-group -->      
            </div> <!-- /.col -->
             
            <div class="col-12 col-md-3">
              <div class="form-group ">
                  <label for="exampleInput number of stock">Book</label>
                    <input type="text" class="form-control" id="book" name="book" placeholder="Book">
              </div><!-- /.form-group -->
            </div><!-- /.col -->
              
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="exampleInput">Estimated ending time</label>
                  <input type="date" class="form-control" id="endingtime" name="endingtime" placeholder="Estimated ending time">
              </div><!-- /.form-group -->
            </div><!-- /.col -->
          </div> <!-- /.row -->

           
            <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
            </div><!-- row--> 
           <?php
   if(isset($_POST['insert']))
     { 


      $date =  date("y-m-d H:i:s");
      $name = mysqli_real_escape_string($db,trim($_POST['name'])); 
      $fathername= mysqli_real_escape_string($db,trim($_POST['fathername']));
      $mothername = mysqli_real_escape_string($db,trim($_POST['mothername'])); 
      $fathername= mysqli_real_escape_string($db,trim($_POST['fathername']));
      $address = mysqli_real_escape_string($db,trim($_POST['address'])); 
      $mobile= mysqli_real_escape_string($db,trim($_POST['mobile']));
      $mobile1 = mysqli_real_escape_string($db,trim($_POST['mobile1'])); 
      $dob= mysqli_real_escape_string($db,trim($_POST['dob']));
      $adharno = mysqli_real_escape_string($db,trim($_POST['adharno'])); 
      $studentid= mysqli_real_escape_string($db,trim($_POST['studentid']));
      $filename = $_FILES['stuimage']['name'];
       $i=0;       
              // Select file type
              $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
              
              // valid file extensions
              $extensions_arr = array("jpg","jpeg","png","gif");
             
              // Check extension
              if( in_array($imageFileType,$extensions_arr) ){ 
             
              // Upload files and store in database
              if(move_uploaded_file($_FILES["stuimage"]["tmp_name"],'filename/'.$filename)){
                // Image db insert sql
                
               $i=1;

              }else{
                echo "<script> alert('Error in uploading file - '".$_FILES['stuimage']['name']."');</script>";
              }
              }
      $qualification = mysqli_real_escape_string($db,trim($_POST['qualification'])); 
      $coursename= mysqli_real_escape_string($db,trim($_POST['coursename']));
      $subcourse = mysqli_real_escape_string($db,trim($_POST['subcourse'])); 
      $duration= mysqli_real_escape_string($db,trim($_POST['duration']));
      $fees = mysqli_real_escape_string($db,trim($_POST['fees'])); 
      $book= mysqli_real_escape_string($db,trim($_POST['book']));
      $endingtime = mysqli_real_escape_string($db,trim($_POST['endingtime']));
      
              if($i==1){


              $sql = "INSERT INTO  `student_register` (name,fathername,mothername,address,mobile,mobile1,dob,adharno,studentid,stu_image,qualification,coursename,subcourse,duration,fees,book,endingtime)
              VALUES ('$name','$fathername','$mothername','$address','$mobile','$mobile1','$dob','$adharno','$studentid','$filename','$qualification','$coursename','$subcourse','$duration','$fees','$book','$endingtime')";
              if (mysqli_query($db, $sql)) {
                echo '<meta http-equiv="refresh" content="0; url=./studentregister.php">';
                echo '<script>alert("New record has been added successfully !")</script>';
             } else {

                echo "Error: " . $sql . ":-" . mysqli_error($db);
             }
           }else{
             echo '<script>alert("Record added successfully !")</script>';
           }

             mysqli_close($db);
            }
          ?>

           </div><!-- /.card -->                  
          </div> 
        </div><!-- /.row -->
      </div> <!-- /.container-fluid -->     
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>
   <script>
                    
      function  getdivi(){
      var coursename= document.getElementById('coursename').value;
           //alert('coursename');
          jQuery.ajax({
          type: "POST",
          url: "selectsubcourse.php",
          cache: false,
          data: {coursename:coursename},
          dataType: "json",
          async: false,
          success: function(result)
          {
           
            if(result.status=='success'){
              $("#subcourse").empty().append(result.options);

            } 
            else{
            alert(result.status);
            $("#subcourse").empty();
            }
          
          },
          error: function(r)
          {
            
            
            alert("subcourse is not geting ");
           
          }
        });
      }

 /*function  getDurationFees(){
      var subcourse= document.getElementById('subcourse').value;
           //alert('subcourse');
          jQuery.ajax({
          type: "POST",
          url: "getdurationfees.php",
          cache: false,
          data: {subcourse:subcourse},
          dataType: "json",
          async: false,
          success: function(result)
          {
           
            if(result.status=='success'){
              $("#duration").empty().append(result.options);
        
              $("#fees").empty().append(result.options);
               
            } 
            else{
            alert(result.status);
            $("#duration").empty();
            $("#fees").empty();
            }
          
          },
          error: function(r)
          {
            
            
            alert("Time Duration and fees  is not geting ");
           
          }
        });
      }
*/

    </script>
  </body>
</html>


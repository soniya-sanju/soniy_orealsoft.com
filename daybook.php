<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
?>
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
            <h1>Day Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Day Book</li>
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
            <h3 class="card-title">Day Book</h3>

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
        <form action="daybook.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Register No</label>
                    <input type="text" class="form-control" id="registerno"  name="registerno" placeholder="Register Number" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
                  <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" placeholder="Student Name" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Mobile</label>
                    <input type="text" class="form-control" id="mobile"  name="mobile" placeholder="Mobile No" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
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
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Sub Course Name</label>
                    <select class="form-control" id="subcourse"  name="subcourse" placeholder="Sub Course Name" required>
                      <option>Select Subcourse</option>
                    </select>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->

              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Total fee</label>
                    <input type="text" class="form-control" id="fees"  name="fees" placeholder="Total fees" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Paid Amount</label>
                    <input type="text" class="form-control" id="paidamount" name="paidamount" placeholder="Paid Amount" required>
                </div> <!-- /.form-group -->
              </div><!--col-->

               <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Paid method</label>
                    <input type="text" class="form-control" id="paidmethod" name="paidmethod" placeholder="Paid Method" required>
                </div> <!-- /.form-group -->
              </div><!--col-->

             
              </div><!-- row-->
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
                    
           </div><!-- /.card --> 
   <?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s");
      $registerno=mysqli_real_escape_string($db,trim($_POST['registerno']));
      $name=mysqli_real_escape_string($db,trim($_POST['name']));
      $mobile=mysqli_real_escape_string($db,trim($_POST['mobile']));
      $coursename = mysqli_real_escape_string($db,trim($_POST['coursename'])); 
      $subcourse = mysqli_real_escape_string($db,trim($_POST['subcourse']));
      $fees = mysqli_real_escape_string($db,trim($_POST['fees']));
      $paidamount = mysqli_real_escape_string($db,trim($_POST['paidamount']));
      $paidmethod = mysqli_real_escape_string($db,trim($_POST['paidmethod']));
      $sql = "INSERT INTO daybook (registerno,name,mobile,coursename,subcourse,fees,paidamount,paidmethod,entrytime,updatetime)
            VALUES ('$registerno','$name','$mobile','$coursename','$subcourse','$fees','$paidamount','$paidmethod','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./daybook.php">';
              echo "New record has been added successfully !";
           } else {
              echo "Error: " . $sql . ":-" . mysqli_error($db);
           }
           mysqli_close($db);
          }
      ?>                 
          </div> 
        </div><!-- /.row -->
      </div> 
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
 
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
</script>

 <?php  include ("include/footer.php") ?>
  </body>
</html>

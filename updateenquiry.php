<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");

$id="";
if(isset($_GET['id'])){
    
        $id = $_GET['id'];
      }
$opr="";
    if(isset($_GET['opr'])){
    
        $opr = $_GET['opr'];
      }
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
            <h1>Enquiry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php      
  if($opr=='upd'){  
  $sqlq="SELECT * FROM enquiry WHERE id='".$id."' ";

  $result = mysqli_query($db,$sqlq);
  if(mysqli_num_rows($result) >0)
  {        
  $row = mysqli_fetch_array($result);    
?> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Enquiry</h3>

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
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
               
                  <label for="exampleInputname">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="<?php echo $row['name']; ?>">
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputcontact">contact</label>
                    <input type="number" class="form-control" id="contact"  name="contact" placeholder="Contact Number" required value="<?php echo $row['contact']; ?>">
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Address " required value="<?php echo $row['Address']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->

               <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Qualification</label>
                    <input type="text" class="form-control" id="Qualification" name="Qualification" placeholder="Qualification" required value="<?php echo $row['Qualification']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Department</label>
                    <input type="text" class="form-control" id="Department" name="Department" placeholder="Department" required value="<?php echo $row['Department']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Status of studying</label>
                    <input type="text" class="form-control" id="Statusofstudying" name="Statusofstudying" placeholder="Status of studying" required value="<?php echo $row['Statusofstudying']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Year of studying</label>
                    <input type="year" class="form-control" id="Yearofstudying" name="Yearofstudying" placeholder="Year of studying" required value="<?php echo $row['Yearofstudying']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">collegename</label>
                    <input type="text" class="form-control" id="collegename" name="collegename" placeholder="Qualification" required value="<?php echo $row['collegename']; ?>">
                </div> <!-- /.form-group -->
              </div><!--col-->
              </div><!-- row-->
               
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="update" id="update" value="Submit" class="btn btn-primary btn-block active">Update</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
                    
           </div><!-- /.card --> 
   <?php
   if(isset($_POST['update']))
     { 
      $date =  date("y-m-d H:i:s");
      $name = mysqli_real_escape_string($db,trim($_POST['name'])); 
      $contact = mysqli_real_escape_string($db,trim($_POST['contact']));
      $Address = mysqli_real_escape_string($db,trim($_POST['Address']));
      $Qualification = mysqli_real_escape_string($db,trim($_POST['Qualification']));
      $Department = mysqli_real_escape_string($db,trim($_POST['Department']));
      $Statusofstudying = mysqli_real_escape_string($db,trim($_POST['Statusofstudying']));
      $Yearofstudying = mysqli_real_escape_string($db,trim($_POST['Yearofstudying']));
      $collegename = mysqli_real_escape_string($db,trim($_POST['collegename']));
      $sql=mysqli_query($db,"UPDATE enquiry SET name='".$name."',contact='".$contact."',Address='".$Address."',Qualification='".$Qualification."',Department='".$Department."',Statusofstudying='".$Statusofstudying."',Yearofstudying='".$Yearofstudying."',collegename='".$collegename."' WHERE id='".$id."' ");
          if ($sql==true) { 
           //echo "Error: " . $sql . ":-" . mysqli_error($db);
            echo "<script>alert('Data Updated ');</script>";
          } 
          
        }
      }
      else{
        echo "<h1>error in while uploading file</h1>";
        
      }
    }
        
    mysqli_close($db);
  ?>        
          </div> 
        </div><!-- /.row -->
      </div> 
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>
  </body>
</html>

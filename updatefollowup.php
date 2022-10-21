<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
if(isset($_GET['id'])){

$id = $_GET['id'];
}
$opr="";
if(isset($_GET['opr'])){

$opr = $_GET['opr'];
}
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
            <h1>Follow Up Update Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Follow Up Updat Form</li>
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
            <h3 class="card-title">Follow Up Update Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
<!-- Content Wrapper. Contains page content -->
  <?php 
if($opr=='upd'){  

$sqlq=mysqli_query($db,"SELECT * FROM feedback WHERE id='".$id."'");

if(mysqli_num_rows($sqlq) >0)
{        
$row = mysqli_fetch_array($sqlq); 
?>


 <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Enquiry id</label>
                    <input type="number" class="form-control" id="enqid" name="enqid" placeholder="Enquiry id" required  value="<?php echo $row['enqid']; ?>">
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Name(Who?)</label>
                    <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder=" Staff Name" required  value="<?php echo $row['staff_name']; ?>">
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Replay</label>
                    <input type="text" class="form-control" id="Replay" name="Replay" placeholder="Replay" required value="<?php echo $row['Replay']; ?>" >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Description</label>
                    <input type="text" class="form-control" id="Description" name="Description" placeholder="Description" required value="<?php echo $row['Description']; ?>" >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Admission status</label>
                    <input type="text" class="form-control" id="Admission_status" name="Admission_status" placeholder="Admission status" required value="<?php echo $row['Admission_status']; ?>" >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Date ways updations</label>
                    <input type="date" class="form-control" id="updation" name="updation" placeholder="Date ways updations" required value="<?php echo $row['updation']; ?>">
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              </div><!-- row-->
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="update" id="update" value="Submit" class="btn btn-primary btn-block active">Update</button>
                 </div><!--col-->  
                </div><!-- /.col -->
              </div><!--card-body-->
            </form>           

  <?php
        if(isset($_POST['update']))
        {    
        $date =  date("y-m-d H:i:s");
        $enqid=mysqli_real_escape_string($db,trim($_POST['enqid']));
        $staff_name = mysqli_real_escape_string($db,trim($_POST['staff_name'])); 
        $Replay = mysqli_real_escape_string($db,trim($_POST['Replay']));
        $Description = mysqli_real_escape_string($db,trim($_POST['Description']));
        $Admission_status = mysqli_real_escape_string($db,trim($_POST['Admission_status']));
        $updation = mysqli_real_escape_string($db,trim($_POST['updation']));
        $sql=mysqli_query($db,"UPDATE feedback SET  enqid='".$enqid."',staff_name='".$staff_name."',Replay='".$Replay."',Description='".$Description."',Admission_status='".$Admission_status."',updation='".$updation."' WHERE id='".$id."'");
       if ($sql==true){ 
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


          </div><!-- /.card card-default-->                  
          </div> 
        </div><!-- /.row -->
      </div> <!-- /.container-fluid -->     
    </section>    
  </div><!-- /.content wrapper-->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>

</body>
</html>





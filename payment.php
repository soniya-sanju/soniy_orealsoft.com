<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
if(isset($_GET['studentid'])){$studentid = $_GET['studentid'];}
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
            <h1>Payment Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Payment Form</li>
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
            <h3 class="card-title">Payment Form</h3>

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
              <?php 
               if($opr=='upd'){  
                  $sqlq=mysqli_query($db,"SELECT * FROM student_register WHERE studentid='".$studentid."' ");
           
                  if(mysqli_num_rows($sqlq) >0)
                  {        
                  $row = mysqli_fetch_array($sqlq);
                  $sql=mysqli_query($db,"SELECT * FROM payment WHERE studentid='".$studentid."' ");
           
                  if(mysqli_num_rows($sql) >0)
                  {        
                  $row1 = mysqli_fetch_array($sql);  
              ?>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Student id</label>
                    <input type="input" class="form-control" id="studentid" name="studentid" required value="<?php echo $row['studentid']; ?>" readonly>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Fees structure</label>
                    <input class="form-control" id="fees" name="fees" placeholder="Fees structure" value="<?php echo $row['fees']; ?>" readonly>  
              </div><!-- /.form-group -->      
            </div> <!-- /.col -->
            <div class="col-12 col-md-6">
              <div class="form-group">
                  <label for="exampleInput">Advance Amount</label>
                 <input type="number" class="form-control" id="advance_fees" name="advance_fees" placeholder="Paid Amount" value="<?php echo $row1['advance_fees']; ?>" readonly>
              </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="exampleInput">Now Paying Amount</label>
                <input type="number" class="form-control" id="advance_fees" name="advance_fees" placeholder="Payment Amount">
                  
              </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="exampleInput">Balance Amount</label>
                  <input type="number" class="form-control" id="bal_amount" name="bal_amount" placeholder="Balance Amount" value="<?php echo ($row1['fees'] - $row1['advance_fees']); ?>" readonly>
              </div><!-- /.form-group -->
            </div><!-- /.col -->
               </div> <!-- /.row -->
             
               <?php 
              }
              }
             ?>
           
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
      //$t2 = $row['bal_amount'];
           // $t3=$t2-$advance_fees;
            //$sql="UPDATE  `bank`.`tablename` SET `new_amount' = '$t3'";
      //$balance= $bal_amount - $payamount;

      $date =  date("y-m-d H:i:s");
      $studentid = mysqli_real_escape_string($db,trim($_POST['studentid']));  
      $fees = mysqli_real_escape_string($db,trim($_POST['fees']));
      $advance_fees=mysqli_real_escape_string($db,trim($_POST['advance_fees'])); 
      //$payamount= mysqli_real_escape_string($db,trim($_POST['payamount']));
      $bal_amount =$bal_amount - $advance_fees; //mysqli_real_escape_string($db,trim($_POST['bal_amount']));
    $sql = "INSERT INTO  `payment` (studentid,fees,advance_fees,bal_amount,entrytime,updatetime)
              VALUES ('$studentid','$fees','$advance_fees','$bal_amount','$date','$date')";
              if (mysqli_query($db, $sql)) {
                echo '<meta http-equiv="refresh" content="0; url=./feesview.php">';
                echo '<script>alert("New record has been added successfully !")</script>';
             } else {

                echo "Error: " . $sql . ":-" . mysqli_error($db);
             }
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
   
  </body>
</html>


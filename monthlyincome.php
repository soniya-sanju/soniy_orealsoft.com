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
            <h1>ADD MONTHLY INCOME</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ADD MONTHLY INCOME</li>
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
            <h3 class="card-title">ADD MONTHLY INCOME</h3>

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
        <form action="monthlyincome.php" method="post">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <label for="exampleInputname">DESCRIPTION</label>
                    <input type="text" class="form-control" id="description"  name="description" placeholder="Description" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->

               <div class="col-12 col-md-12">
                <div class="form-group">
                  <label for="exampleInputemail">AMOUNT</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="AMOUNT" required>
                </div> <!-- /.form-group -->
              </div><!--col-->
              </div><!-- row-->
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-success btn-block active">ADD</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
                    
           </div><!-- /.card card-default--> 
   <?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s"); 
      $description = mysqli_real_escape_string($db,trim($_POST['description']));
      $amount = mysqli_real_escape_string($db,trim($_POST['amount']));
     
      $sql = "INSERT INTO monthlyincome (description,amount,entrytime,updatetime)
            VALUES ('$description','$amount','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./monthlyincome.php">';
              echo "New record has been added successfully !";
           } else {
              echo "Error: " . $sql . ":-" . mysqli_error($db);
           }
           mysqli_close($db);
          }
      ?>                 
      </div><!--container-fluid --> 
    
      <br>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daily Income </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="example">
                <table id="example1" class="table table-bordered table-striped">
                  <thead >
                  <tr>
                    <th>Sl No</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Delete</th>                    
                  </tr>
                   </thead>
                  <?php
                
                $result=mysqli_query($db,"SELECT * FROM monthlyincome");
                $counter = 0;
                if(mysqli_num_rows($result) > 0) {
              ?>
              <?php
                $i=0;
                while($row = mysqli_fetch_array($result))
                 {
              ?>
                 
             <tr>
            <td><?php echo ++$counter; ?></td> 
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["amount"]; ?></td>
            <td><a href="monthlyincome.php?id=<?php echo $row['id'];?>&opr=del ">
             <i class="fa fa-trash" aria-hidden="true"></i>
            </a></td>
            </tr>
            <?php
              $i++;
              }
            ?>
            <?php
        
              }else{
                echo "No result found";
              }  
            ?>
                </table>
              </div><!-- /.card-body -->              
            </div> <!-- /.card -->           
          </div><!-- /.col -->         
        </div> <!-- /.row -->       
      </div>  <!-- /.container-fluid -->
    </section>
    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>
  <?php

if($opr=='del'){  
$sql= mysqli_query($db,"DELETE FROM monthlyincome WHERE id='" . $_GET["id"] . "'");
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
}  
if(mysqli_affected_rows($db)){
echo "<script>
alert('Data Deleted');
window.location.href = 'monthlyincome.php';
</script>";
exit;
}
else{
echo "Opps something wrong!"; 
}
}

  ?>
  </body>
</html>

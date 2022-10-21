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
            <h1>Daily Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daily Expense</li>
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
            <h3 class="card-title">Daily Expense</h3>

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
        <form action="dailyexpense.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="col-12">
            <div class="row ml-auto">
              
              <div class="col-6 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Reason</label>
                    <input type="text" class="form-control" id="reason"  name="reason" placeholder="Reason" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
                <div class="col-6 col-md-6">
                <div class="form-group">
                  <label for="exampleInputusername">Amount</label>
                    <input type="text" class="form-control" id="amounts"  name="amounts" placeholder="Amount " required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
              
               <div class="col-6 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Paid method</label>
                    <input type="text" class="form-control" id="paidmethod" name="paidmethod" placeholder="Paid Method" required>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-6 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Staff Name</label>
                    <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Paid Staff Name" required>
                </div> <!-- /.form-group -->
              </div><!--col-->
             
             
              <div class="col-6 col-md-12">                                                
             <div class="col-6 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
                 </div><!-- row-->
                  </div><!-- /.card -->
            </form>            
            </div><!--card-default-->        
          
   <?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s");
      $reason=mysqli_real_escape_string($db,trim($_POST['reason']));
      $amounts=mysqli_real_escape_string($db,trim($_POST['amounts']));
      $paidmethod = mysqli_real_escape_string($db,trim($_POST['paidmethod']));
      $staff_name=mysqli_real_escape_string($db,trim($_POST['staff_name']));
      
      $sql = "INSERT INTO expense (reason,amounts,paidmethod,staff_name,entrytime,updatetime)
            VALUES ('$reason','$amounts','$paidmethod','$staff_name','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./dailyexpense.php">';
              echo "New record has been added successfully !";
           } else {
              echo "Error: " . $sql . ":-" . mysqli_error($db);
           }
           mysqli_close($db);
          }
      ?>                 
       </div><!--container-flude--> <br> 
      
         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daily expense View Table</h3>
              </div> <!-- /.card-header -->
             
              <div class="card-body">
                <div id="example1_wrapper" class="datatable_wrapper dt-bootstrap4">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Reason</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>By Whom?</th>
                    <!--<th>Update</th>-->
                    <th>Delete</th>
                  </tr>
                  </thead>
                  
              <?php
    
          
              
                $result = $db->query("SELECT * FROM expense ");
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
            <td><?php echo $row['reason']; ?></td>
            <td><?php echo $row['amounts']; ?> </td>
            <td><?php echo $row["paidmethod"]; ?></td>
            <td><?php echo $row["staff_name"]; ?></td>
           
            <!--<td><a href="updatefollowup.php?id=<?php echo $row['id'];?>&opr=upd ">
              <i style="font-size:18px" class="fa">&#xf044;</i>
            </a></td>-->
            <td><a href="dailyexpense.php?id=<?php echo $row['id'];?>&opr=del">

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
              </div><!--./datatable_wrapper dt-bootstrap4-->
              </div><!--./card-body-->
            </div><!--/.card-->
          </div><!--/.col-->
        </div><!--/.row-->
     </div>
     
    </section>    
  

     

   
  </div><!-- ./content wrapper -->
 

   


 <?php  include ("include/footer.php") ?>
 <?php

if($opr=='del'){  
$sql= mysqli_query($db,"DELETE FROM expense WHERE id='" . $_GET["id"] . "'");
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
}  
if(mysqli_affected_rows($db)){
echo "<script>
alert('Data Deleted');
window.location.href = 'dailyexpense.php';
</script>";
exit;
}
else{
echo "Opps something wrong!"; 
}
}

  ?>

</div>

  </body>
</html>

<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
if(isset($_GET['id'])){ $id = $_GET['id'];}


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
            <h1>Total Collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Total Collection</li>
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
            <h3 class="card-title">Total Collection</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
<section class="content"><!-- Main content -->  
<div class="container">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">               
<form method="post" enctype="multipart-form-data">
<div>
<div class="row ml-auto">
<div class="col-12 col-md-4">
<div class="form-group">
<label for="categorie name">From Date</label>
<input type="date" class="form-control" id="fromdate" name="fromdate" style="border: 1px solid #d2d6da;border-radius: 0.1rem;">
</div> <!-- /.form-group -->               
</div> <!-- /.col -->

<div class="col-12 col-md-4">
<div class="form-group">
<label for="exampleInputimage">To Date</label>
<input type="date" class="form-control" id="todate" name="todate" style="border: 1px solid #d2d6da; border-radius: 0.1rem;"  onclick ="function()" >
</div> <!-- /.form-group -->               
</div> <!-- /.col -->

                                               
<div class="col-12 col-md-4" style=" float: right;">   
<label for="examplesubmitbutton"></label>
<button type="submit" name="search" id="search" value="submit" class="btn btn-primary btn-block active">Search</button>
  
</div><!-- /.col -->
</div><!-- row-->
</form>
</div> <!-- /.date --><br>
<h3 class="card-title"> TOTAL COLLECTION</h3><br></div>
             
              <div class="card-body">

                
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Total Income</th>
                    <th>Total Expense</th>
                  </tr>
                  </thead>
                    <?php
                    
                     if(isset($_POST['search']))
                     {
                      
                        $fromdate=date("Y-m-d", strtotime($_POST['fromdate']));
                        $todate=date("Y-m-d", strtotime($_POST['todate']));

                      $result=mysqli_query($db,"SELECT income.*,expense.amounts,expense.id FROM income join expense ON expense.id = income.id WHERE DATE(income.entrytime)between '".$fromdate."' AND '".$todate."' ORDER BY income.id Desc");
                      
                    }else{
                      $result=mysqli_query($db,"SELECT income.*,expense.amounts,expense.id FROM income join expense ON expense.id = income.id ORDER BY income.id Desc");

                    }
                    $counter = 0;
                    if(mysqli_num_rows($result) > 0) {
                    ?>
                    <?php
                      $i=0;
                      $amount=0;
                      $amounts=0;
                      while($row = mysqli_fetch_array($result))
                      {
                    ?>
                      <tr>
                        
                        <td><?php echo ++$counter; ?></td>    
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["amounts"]; ?></td>
                        
                       

                        
                      </tr>
                    <?php
                      $i++;
                      $amount= $amount+$row["amount"];
                      $amounts= $amounts+$row["amounts"];
                      }
                    
                    ?>
  
                  <?php
        
                      }else{
                        echo "No result found";
                      }
           
                    ?>

                </table>
                <div style="float: right;">
                     <h2> <span>Total Income : </span>
                      <span><?php echo $amount; ?></span></h2>
                     <h2> <span>Total Expense : </span>
                      <span><?php echo $amounts; ?></span></h2>                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>   
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>

  </body>
</html>

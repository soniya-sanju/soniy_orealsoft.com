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
          <?php      
  if($opr=='upd'){  
  $sqlq="SELECT * FROM enquiry WHERE id='".$id."' ";

  $result = mysqli_query($db,$sqlq);
  if(mysqli_num_rows($result) >0)
  {        
  $row = mysqli_fetch_array($result);    
?> 

        <form action="enquiry.php" method="post"> 
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
               
                  <label for="exampleInputname">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="<?php echo $row['name']; ?>"  readonly>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputcontact">contact</label>
                    <input type="number" class="form-control" id="contact"  name="contact" placeholder="Contact Number" required value="<?php echo $row['contact']; ?>"  readonly>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Address</label>
                    <input class="form-control" id="Address" name="Address" placeholder="Address " required value="<?php echo $row['Address']; ?>"  readonly >
                </div> <!-- /.form-group -->
              </div><!--col-->

               <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Qualification</label>
                    <input class="form-control" id="Qualification" name="Qualification" placeholder="Qualification" required value="<?php echo $row['Qualification']; ?>"  readonly>
                      
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Department</label>
                    <input type="text" class="form-control" id="Department" name="Department" placeholder="Department" required value="<?php echo $row['Department']; ?>"  readonly>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Status of studying</label>
                    <input type="text" class="form-control" id="Statusofstudying" name="Statusofstudying" placeholder="Status of studying" required value="<?php echo $row['Statusofstudying']; ?>"  readonly>
                      
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Year of studying</label>
                    <input class="form-control" id="Yearofstudying" name="Yearofstudying" placeholder="Year of studying" required value="<?php echo $row['Yearofstudying']; ?>"  readonly>
                      <option value="">Choose option</option>
            
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">collegename</label>
                    <input type="text" class="form-control" id="collegename" name="collegename" placeholder="Qualification" required value="<?php echo $row['collegename']; ?>" readonly>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                 
                  <label for="exampleInputemail">Enquiry menthod</label>
                   <input class="form-control" id="enquirymethod" name="enquirymethod"  required value="<?php echo $row['enquirymethod']; ?>" readonly>
                   
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">How did know about campus?</label>
                    <input class="form-control" id="about_campus" name="about_campus" required value="<?php echo $row['about_campus']; ?>" readonly>
                     
                </div> <!-- /.form-group -->
              </div><!--col-->
              </div><!-- row-->
         <div class="card-header">
            <h3 class="card-title">Feedback</h3>
             <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
           </div>
           <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
               
                  <label for="exampleInputname">Status</label>
                  <input class="form-control" id="status" name="status" placeholder="Status" required  value="<?php echo $row['status']; ?>" readonly>
                    
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6" id="showson">
                <div class="form-group">
                  <label for="exampleInputcontact">Reason</label>
                    <input type="text" class="form-control" id="reason"  name="reason" placeholder="Reason" required value="<?php echo $row['reason']; ?>"  readonly>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6" id="readon">
                <div class="form-group">
                  <label for="exampleInput">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description " required value="<?php echo $row['description']; ?>" readonly>
                </div> <!-- /.form-group -->
              </div><!--col-->     
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <a href="enquiryview.php?>&opr=upd"class="btn btn-sm btn-info" style="width: 120px;">Enquiry View</a>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>
                       
                    
           </div><!-- /.card --> 
           <?php 
         }
       }

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

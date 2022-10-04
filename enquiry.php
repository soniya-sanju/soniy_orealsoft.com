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


  $sqlq=mysqli_query($db,"SELECT enquirymethod,about_campus FROM enquiry");
  
  if(mysqli_num_rows($sqlq) >0)
  {        
  $row = mysqli_fetch_array($sqlq);    

?> 

        <form action="enquiry.php" method="post"> 
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
               
                  <label for="exampleInputname">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputcontact">contact</label>
                    <input type="number" class="form-control" id="contact"  name="contact" placeholder="Contact Number" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Address</label>
                    <textarea class="form-control" id="Address" name="Address" placeholder="Address " required></textarea>
                </div> <!-- /.form-group -->
              </div><!--col-->

               <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Qualification</label>
                    <select class="form-control" id="Qualification" name="Qualification" placeholder="Qualification" required>
                      <option value="">Choose Option</option>
                      <option value="Plus Two">Plus Two</option>
                      <option value="Graduation">Graduation</option>
                      <option value="Post Graduation">Post Graduation</option>
                      <option value="Doctor of Philosophy(PhD)">Doctor of Philosophy(PhD)</option>
                    </select>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Department</label>
                    <input type="text" class="form-control" id="Department" name="Department" placeholder="Department" required>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Status of studying</label>
                    <select type="text" class="form-control" id="Statusofstudying" name="Statusofstudying" placeholder="Status of studying" required>
                      <option value="">Choose Option</option>
                      <option value="studying">Studying</option>
                      <option value="Complected">Complected</option>
                      <option value="Waiting for Result">Waiting for Result</option>
                      <option value="Failed">Failed</option>
                    </select>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">Year of studying</label>
                    <select class="form-control" id="Yearofstudying" name="Yearofstudying" placeholder="Year of studying" required>
                      <option value="">Choose option</option>
                      
                         <!-- <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                    </select>-->
                    <?php 
                      $year_start  = 1997;
                      $year_end = date('Y'); // current Year
                      $user_selected_year = 2022; // user date of birth year

                      //echo '<select id="Yearofstudying" name="Yearofstudying">'."\n";
                      for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                          $selected = ($user_selected_year == $i_year ? ' selected' : '');
                          echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                      }
                      //echo '</select>'."\n";
                    ?>
                  </select>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">collegename</label>
                    <input type="text" class="form-control" id="collegename" name="collegename" placeholder="Qualification" required>
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                 
                  <label for="exampleInputemail">Enquiry menthod</label>
                   <select class="form-control" id="enquirymethod" name="enquirymethod"  required>
                      <option value=""> Choose Enquiry menthod</option>

                      <!-- <option>Social media</option>
                      <option>Talecaller</option>
                      <option>Whatsapp</option>
                      <option>Website</option>
                      <option>Walking</option>
                      <option>On office (direct)</option>
                      <option>Reference</option>
                      <option>Notice and brosures</option>-->

<option value="Social media" <?php if($row['enquirymethod']=='Social media'){echo "selected";} ?>> Social media</option>
<option value="Talecaller" <?php if($row['enquirymethod']=='Talecaller'){echo "selected";} ?>>Talecaller</option>
<option value="Whatsapp" <?php if($row['enquirymethod']=='Whatsapp'){echo "selected";} ?>>Whatsapp</option>
<option value="Website" <?php if($row['enquirymethod']=='Website'){echo "selected";} ?>> Website</option>
<option value="Walking" <?php if($row['enquirymethod']=='Walking'){echo "selected";} ?>>Walking</option>
<option value="On office (direct)" <?php if($row['enquirymethod']=='On office (direct)'){echo "selected";} ?>>On office (direct)</option>
<option value="Reference" <?php if($row['enquirymethod']=='Reference'){echo "selected";} ?>>Reference</option>
<option value="Notice and brosures" <?php if($row['enquirymethod']=='Notice and brosures'){echo "selected";} ?>>Notice and brosures</option>

                  </select>
                   
                </div> <!-- /.form-group -->
              </div><!--col-->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputemail">How did know about campus?</label>
                    <select class="form-control" id="about_campus" name="about_campus" required>
                      <option value="">How did know about campus?</option>
                      <!--<option>News paper</option>
                      <option>CADD centre staff</option>
                      <option>Theatre ad/ TV ad</option>
                      <option>Demo classes</option>
                      <option>others</option>
                      <option>co-operative office</option>
                      <option>Friends / relatives</option>
                      <option>Campus programs</option>
                      <option>Banner/notices/brochures</option>
                      <option>Data base</option>-->
<option value="News paper" <?php if($row['about_campus']=='News paper'){echo "selected";} ?>>News paper</option>
<option value="CADD centre staff" <?php if($row['about_campus']=='CADD centre staff'){echo "selected";} ?>>CADD centre staff</option>
<option value="Theatre ad/ TV ad" <?php if($row['about_campus']=='Theatre ad/ TV ad'){echo "selected";} ?>>Theatre ad/ TV ad</option>
<option value="Demo classes" <?php if($row['about_campus']=='Demo classes'){echo "selected";} ?>> Demo classes</option>
<option value="co-operative office" <?php if($row['about_campus']=='co-operative office'){echo "selected";} ?>>co-operative office</option>
<option value="Friends / relatives" <?php if($row['about_campus']=='Friends / relatives'){echo "selected";} ?>>Friends / relatives</option>
<option value="Campus programs" <?php if($row['about_campus']=='Campus programs'){echo "selected";} ?>>Campus programs</option>
<option value="Banner/notices/brochures" <?php if($row['about_campus']=='Banner/notices/brochures'){echo "selected";} ?>>Banner/notices/brochures</option>
<option value="Data base" <?php if($row['about_campus']=='Data base'){echo "selected";} ?>>Data base</option>
<option value="others" <?php if($row['about_campus']=='others'){echo "selected";} ?>>others</option>
                    </select>
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
                  <select class="form-control" id="status" name="status" placeholder="Status" required onchange="showHide();">
                    <option value="">Choose option</option>
                    <!--<option value="Rejected"> Rejected</option>-->
                    <option value="Canceled">Canceled</option>
                    <option value="Success">Success</option>
                  </select>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6" id="showson">
                <div class="form-group">
                  <label for="exampleInputcontact">Reason</label>
                    <input type="text" class="form-control" id="reason"  name="reason" placeholder="Reason" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->
             
              <div class="col-12 col-md-6" id="readon">
                <div class="form-group">
                  <label for="exampleInput">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description " required>
                </div> <!-- /.form-group -->
              </div><!--col-->     
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>
            <?php
            }
            ?>            
                    
           </div><!-- /.card --> 
          


   <?php
   if(isset($_POST['insert']))
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
      $enquirymethod= mysqli_real_escape_string($db,trim($_POST['enquirymethod']));
      $about_campus= mysqli_real_escape_string($db,trim($_POST['about_campus']));
      $status = mysqli_real_escape_string($db,trim($_POST['status']));
      $reason= mysqli_real_escape_string($db,trim($_POST['reason']));
      $description = mysqli_real_escape_string($db,trim($_POST['description']));
      $sql = "INSERT INTO enquiry (name,contact,Address,Qualification,Department,Statusofstudying,Yearofstudying,collegename,enquirymethod,about_campus,status,reason,description,entrytime,updatetime)
            VALUES ('$name','$contact','$Address','$Qualification','$Department','$Statusofstudying','$Yearofstudying','$collegename','$enquirymethod','$about_campus','$status','$reason','$description','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./enquiry.php">';
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
  <?php  include ("include/footer.php") ?>
   <script>
      function  showHide(){
      var status= $('#status').val();
      
        if(status=="Canceled"){
          $('#showson').show();
          $('#reason').prop('required',true);
          $('#readon').hide();
          $('#description').prop('required',false);
 
      } 
    else if(status=="Success"){
      $('#readon').show();
      $('#description').prop('required',true);
      $('#showson').hide();
      $('#reason').prop('required',false);

    }
    }

   </script>  
  </body>
</html>

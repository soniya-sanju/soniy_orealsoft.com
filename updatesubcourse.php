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


<!-- Navbar -->
<?php include("include/navbar.php");?>
<!-- /.navbar -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-3">
<div class="col-sm-6">
<h1>Advanced Form</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Students Course Form</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- Content Wrapper. Contains page content -->
<?php      
if($opr=='upd'){  
$sqlq="SELECT * FROM sub_course WHERE sub_course.id='".$id."' ";

$result = mysqli_query($db,$sqlq);
if(mysqli_num_rows($result) >0)
{        
$row = mysqli_fetch_array($result);    
?> 
<section class="content">
<div class="container-fluid">
<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
<div class="card-header">
<h3 class="card-title">Student Course and Fee Structure</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>    

<form action="#" method="post" enctype="multipart/form-data">
<div class="card-body">
<div class="row ml-auto">
<div class="col-12 col-md-6">
<label for="exampleInputname">Course Name</label>
<select class="form-control form-select" id="courseid" name="courseid" placeholder="Select Course Name" required value="<?php echo $row['courseid']; ?>"> 
<option value="">Choose option</option>

<?php       
$sql = mysqli_query($db,"SELECT * From course group by coursename order by id asc");

while ($row1 = mysqli_fetch_array($sql)){
?>                
<option value="<?php echo $row1['id']; ?>" <?php if($row['courseid']==$row1["id"]){ echo "selected"; }?> ><?php echo $row1['coursename']; ?></option>
<!--geting dropdown selected item name in dropdown list -->


<?php
}
?>
</select>  

</div> <!-- /.col -->
<div class="col-12 col-md-6">
<div class="form-group">
<label for="exampleInputsub">Sub Course Name</label>
<input type="text" class="form-control" id="subcourse"  name="subcourse" placeholder="Sub Course Name" required value="<?php echo $row['subcourse']; ?>">
</div> <!-- /.form-group -->  
</div> <!-- /.col -->
</div><!-- /. row-->
<div class="row ml-auto">
<div class="col-12 col-md-6">
<div class="form-group">
<label for="exampleInputfees">Course Fees</label>
<input type="number" class="form-control" id="fees" name="fees" placeholder="Course Fees " required value="<?php echo $row['fees']; ?>">
</div> <!-- /.form-group -->
</div><!--col-->

<div class="col-12 col-md-6">
<div class="form-group">
<label for="exampleInputduration">Time Duration</label>
<input type="text" class="form-control" id="duration" name="duration" placeholder="Time Duration" required value="<?php echo $row['duration']; ?>"> 
</div> <!-- /.form-group -->
</div><!--col-->
<!-- / row -->

<div class="col-12 col-md-12">                                                
<div class="col-12 col-md-3" style=" float: right;">   
<label for="examplesubmitbutton"></label>
<button type="submit" name="update" id="update" value="submit" class="btn btn-primary btn-block active">Update</button>
</div><!--col-->  
</div><!-- /.col -->
</div><!-- row-->
</div> <!-- /.card body -->
</form>

  <?php
        if(isset($_POST['update']))
        {    
        $courseid = mysqli_real_escape_string($db,trim($_POST['courseid'])); 
        $subcourse = mysqli_real_escape_string($db,trim($_POST['subcourse'])); 
        $fees = mysqli_real_escape_string($db,trim($_POST['fees'])); 
        $duration = mysqli_real_escape_string($db,trim($_POST['duration'])); 
        
           $sql=mysqli_query($db,"UPDATE `sub_course` SET courseid='".$courseid."',subcourse='".$subcourse."',fees='".$fees."',duration='".$duration."' WHERE sub_course.id='".$id."' ");
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
</div>
</section>
</div>
</div>
</body>
</html>




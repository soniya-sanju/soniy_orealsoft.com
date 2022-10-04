<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");


?>
<body class="g-sidenav-show  bg-gray-200">
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php
      include("include/navbar.php");
      ?>
   
    <!-- End Navbar -->

<div class="container">
<form action="stude.php" method="post"  enctype="multipart/form-data">
<div class="card-body">
<div class="row ml-auto">


<div class="col-12 col-md-6">
<div class="form-group">
<label for="exampleInputimage">Category image</label>
<input type="file" class="form-control" id="stu_image" name="stu_image" placeholder="Upload image " required style="border: 1px solid #d2d6da; border-radius: 0.1rem;"  onclick ="function()" >
</div> <!-- /.form-group -->               
</div> <!-- /.col -->
</div> <!-- /.row -->

<script>  
document.querySelector('button').onclick = function() {
    var image = document.getElementById('container');
    image.style.width = '156px';
    image.style.height = 'auto';
  }
</script> 

 
<div class="col-12 col-md-12">                                                
<div class="col-12 col-md-3" style=" float: right;">   
<label for="examplesubmitbutton"></label>
<button type="submit" name="insert" id="insert" value="submit" class="btn btn-primary btn-block active">Submit</button>
</div><!--col-->  
</div><!-- /.col -->
</div><!-- row-->
</div> <!-- /.card body -->
  
</form>
</div>
<?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s");
    
      //$filename = $_FILES['stu_image']['name'];
       $i=0;       
              // Select file type
              $imageFileType = strtolower(pathinfo( $_FILES['stu_image']['name'],PATHINFO_EXTENSION));
              
              // valid file extensions
              $extensions_arr = array("jpg","jpeg","png","gif");
             
              // Check extension
              if( in_array($imageFileType,$extensions_arr) ){ 
             
              // Upload files and store in database
              if(move_uploaded_file($_FILES["stu_image"]["tmp_name"],'filename/'. $_FILES['stu_image']['name'])){
                // Image db insert sql
                
               $i=1;

              }else{
                echo "<script> alert('Error in uploading file - '".$_FILES['stu_image']['name']."');</script>";
              }
              }
              if($i==1){
              $sql = "INSERT INTO student (cat_image)
              VALUES ('$filename')";
              if (mysqli_query($db, $sql)) {
                echo '<meta http-equiv="refresh" content="0; url=./stude.php">';
                echo '<script>alert("New record has been added successfully !")</script>';
             } else {
                echo "Error: " . $sql . ":-" . mysqli_error($db);
             }
           }else{
             echo '<script>alert("Record added successfully !")</script>';
           }

             mysqli_close($db);
            }
          ?>
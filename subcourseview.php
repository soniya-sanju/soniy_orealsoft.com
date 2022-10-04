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
            <h2>Course view</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Course view</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Course view Table</h3>
              </div> <!-- /.card-header -->
             
              <div class="card-body">
                <div id="example1_wrapper" class="datatable_wrapper dt-bootstrap4">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Course Name</th>
                    <th>Sub Course Name</th>
                    <th>Course Fees</th>
                    <th>Time Duration</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  
              <?php
                $result = $db->query("SELECT * FROM sub_course");
                $counter = 0;
                if(mysqli_num_rows($result) > 0) {
              ?>
              <?php
                $i=0;
                while($row = mysqli_fetch_array($result))
                 {
              ?>
            <tr>
            <td><?php echo ++$counter; ?> 
            <td><?php echo $row["courseid"]; ?></td>
            <td><?php echo $row["subcourse"]; ?></td>
            <td><?php echo $row["fees"]; ?></td>
            <td><?php echo $row["duration"]; ?></td>
            <td><a href="updatesubcourse.php?id=<?php echo $row['id'];?>&opr=upd ">
              <i style="font-size:18px" class="fa">&#xf044;</i>
            </a></td>
            <td><a href="subcourseview.php?id=<?php echo $row['id'];?>&opr=del ">

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
              </div><!--./card-body-->
              </div>
            </div><!--/.card-->
          </div><!--/.col-->
        </div><!--/.row-->
      </div><!--/.container-fluid-->
    </section>
  </div> 

    
    <?php include 'include/footer.php';?>

</div><!-- ./wrapper -->
  <?php
 

        
        
          if($opr=='del'){  
            $sql= mysqli_query($db,"DELETE FROM sub_course WHERE id='" . $_GET["id"] . "'");
            if (mysqli_query($db, $sql)) {
                echo "Record deleted successfully";
            }  
    if(mysqli_affected_rows($db)){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'subcourseview.php';
        </script>";
        exit;
      }
    else{
       echo "Opps something wrong!"; 
      }
    }
   else{    
    echo "<h1>error</h1>";
    }
  ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

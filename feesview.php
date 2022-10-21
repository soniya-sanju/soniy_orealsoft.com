<?php
include("include/db.php");
include("include/logincheck.php");
if(isset($_GET['id'])){    
            $id = $_GET['id'];
        }
          $opr="";
          if(isset($_GET['opr'])){
          
              $opr = $_GET['opr'];
            }
            
include("include/tableheader.php");
?>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
       <?php include("include/navbar.php");?>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Register View Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="example">
                <table id="example1" class="table table-bordered table-striped">
                  <thead >
                  <tr>
                    <th>Sl No</th>
                    <th>Student Id</th>
                    <!--<th>Name</th>
                    <th>Mobile number</th>
                    <th>Course selcted</th>
                    <th>Sub course</th>-->
                    <th>Fees</th>
                    <th>Advance Amount</th>
                    <!--<th>Paying Amount</th>-->
                    <th>Balance Amount</th>
                   <!--<th>Update</th>-->
                    <th>Delete</th>
                   
                  </tr>
                  <tfoot>
                    <tr>
                    <th>Sl No</th>
                    <th>Student Id</th>
                   <!--<th>Name</th>
                    <th>Mobile number</th>
                    <th>Course selcted</th>
                    <th>Sub course</th>-->
                    <th>Fees</th>
                    <th>Advance Amount</th>
                    <!--<th>Paying Amount</th>-->
                    <th>Balance Amount</th>
                    <!--<th>Update</th>-->
                    <th>Delete</th>
                    
                  </tr>
                  </tfoot>
                   </thead>
                  <?php
                $result = $db->query("SELECT * FROM payment");
                $counter = 0;
                if(mysqli_num_rows($result) > 0) {
              ?>
              <?php
                $i=0;
                while($row = mysqli_fetch_array($result))
                 {
              ?>
                 
             <tr>
            <td><?php echo ++$counter; ?> </td>
            <td><?php echo $row["studentid"]; ?></td>
            <!--<td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["mobile"]; ?></td>
            <td><?php echo $row["coursename"]; ?></td>
            <td><?php echo $row["subcourse"]; ?></td>-->
            <td><?php echo $row["fees"]; ?></td>
            <td><?php echo $row["advance_fees"]; ?></td>
            <!--<td><?php echo $row["payamount"]; ?></td>-->
            <td><?php echo ($row['fees'] - $row['advance_fees']);?></td>
            <!--<td><a href="updatepayment.php?id=<?php echo $row['id'];?>&opr=upd ">
              <i style="font-size:18px" class="fa">&#xf044;</i>
            </a></td>-->
            <td><a href="feesview.php?id=<?php echo $row['id'];?>&opr=del ">

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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include("include/tablefooter.php");

?>
<?php
 

          if($opr=='del'){  
            $sql= mysqli_query($db,"DELETE FROM payment WHERE id='" . $_GET["id"] . "'");
            if (mysqli_query($db, $sql)) {
                echo "Record deleted successfully";
            }  
    if(mysqli_affected_rows($db)){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'feesview.php';
        </script>";
        exit;
      }
    else{
       echo "Opps something wrong!"; 
      }
    }
  ?>

<script>
   $(document).ready(function () {
    $('#example').DataTable({
         scrollX: true,
    });
});
</script>
</body>
</html>

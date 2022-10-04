<?php
include("include/db.php");
include("include/header.php");
session_start();
?>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form method="post">
            <h3 class="mb-5">Login</h3>
            <div class="form-outline mb-3">
              

            <div class="form-outline mb-3">
              <input type="username" id="username" name="username" class="form-control form-control-lg" placeholder="User Name" /></div>

            <div class="form-outline mb-3">
              <input type="password" id="Password" name="password" class="form-control form-control-lg" placeholder="Password" />  
            </div>
            
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="checkbox" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="subname">Login</button>
           

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
     
        if(isset($_POST["subname"])){ 

        $date =  date("y-m-d H:i:s");
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        //$type = mysqli_real_escape_string($db, $_POST['type']);
        $result = mysqli_query($db,"SELECT * FROM admin  WHERE username='".$username."' AND password='".$password."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
         
        if($count == 1) {

                $_SESSION['name'] = $row['name'];

                $_SESSION['type'] = $row['type'];

                $_SESSION['id'] = $row['id'];

                header("Location: dashboard.php");

              
              }
          }
    ?>

<?php
  include("include/db.php");
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM student_register WHERE name LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo $res['name']. "<br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Result not found
      </div>
      ";
    }
  }
?>
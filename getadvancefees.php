<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include 'include/db.php'; 
$myObj=(object)[];
$divs="";
date_default_timezone_set('Asia/Kolkata');
if($_POST['fees'] && $_POST['fees']!="")
{
   $fees=mysqli_real_escape_string($db,trim( $_POST['fees']));
  
   $sel=mysqli_query($db,"SELECT fees,advance_fees FROM payment WHERE FIND_IN_SET(payment.fees,'".$fees."')");
                        
   if(mysqli_num_rows($sel) >0)
   {
      $divs='<option value="">Select Sub Course</option>';
      $myObj->status= "success";
      while( $res = mysqli_fetch_array($sel)){
         
         $divs=$divs. '<option value="'.$res['advance_fees'].'">'.$res['advance_fees'].'</option>';
      }

      $myObj->options= $divs;
   }
   else
   {
      $myObj->status= "Advance Fees not found , Please select a valid fees";
   }
   mysqli_close($db); 
}
else
{  
   $myObj->status= "Please Select A fees";
}
echo  json_encode($myObj);

//echo " data is not ";
?>





<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include 'include/db.php'; 
$myObj=(object)[];
$divs="";
date_default_timezone_set('Asia/Kolkata');
if($_POST['subcourse'] && $_POST['subcourse']!="")
{
   $subcourse=mysqli_real_escape_string($db,trim( $_POST['subcourse']));
  
   $sel=mysqli_query($db,"SELECT subcourse,fees,duration FROM sub_course WHERE FIND_IN_SET(sub_course.subcourse,'".$subcourse."')");
                        
   if(mysqli_num_rows($sel) >0)
   {
      $divs='<option value="">Select Sub Course</option>';
      $myObj->status= "success";
      while( $res = mysqli_fetch_array($sel)){
         
         $divs=$divs. '<option value="'.$res['fees'].'">'.$res['fees'].'</option>';
      }

      $myObj->options= $divs;
   }
   else
   {
      $myObj->status= "duration & Fees not found , Please select a valid Sub Course";
   }
   mysqli_close($db); 
}
else
{  
   $myObj->status= "Please Select A Time duration";
}
echo  json_encode($myObj);

//echo " data is not ";
?>





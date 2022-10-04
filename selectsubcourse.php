<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include 'include/db.php'; 
$myObj=(object)[];
$divs="";
date_default_timezone_set('Asia/Kolkata');
if($_POST['coursename'] && $_POST['coursename']!="")
{
   $coursename=mysqli_real_escape_string($db,trim( $_POST['coursename']));

   $sel=mysqli_query($db,"SELECT sub_course.*,course.id as courseid,course.coursename FROM sub_course JOIN course ON course.id = sub_course.courseid WHERE FIND_IN_SET(sub_course.courseid,'".$coursename."')");
   
   if(mysqli_num_rows($sel) >0)
   {
      $divs='<option value="">Select Sub Course</option>';
      $myObj->status= "success";
      while( $res = mysqli_fetch_array($sel)){
         $divs=$divs. '<option value="'.$res['subcourse'].'">'.$res['subcourse'].'</option>';
      }
      $myObj->options= $divs;
   }
   else
   {
      $myObj->status= "Sub Course not found , Please select a valid Course ";
   }
   mysqli_close($db); 
}
else
{  
   $myObj->status= "Please Select A Sub course";
}
echo  json_encode($myObj);

//echo " data is not ";
?>


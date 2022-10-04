 
 <?php SELECT course.id,course.coursename,sub_course.id as subid,sub_course.subcourse,sub_course.fees,sub_course.duration FROM `course` LEFT JOIN sub_course ON course.id= sub_course.courseid ?>
 SELECT sub_course.id,sub_course.subcourse,sub_course.fees,sub_course.duration,course.id as courseid,course.coursename, FROM sub_course LEFT JOIN course ON sub_course.courseid = course.id
 SELECT * From course group by coursename order by id asc



 SELECT * FROM sub_course WHERE coursename='".$coursename."'  order by id asc 



 api
 SELECT sub_course.*,course.id as cid,course.coursename FROM sub_course JOIN course ON course.id = sub_course.courseid WHERE  FIND_IN_SET(sub_course.courseid,'".$coursename."')



 SELECT sub_course.*,course.id as courseid,course.coursename FROM sub_course JOIN course ON course.id = sub_course.courseid WHERE FIND_IN_SET(sub_course.courseid,'".$subcourse."')
<?php 
require("connection.inc.php");
require("functions.inc.php");

$arr=array();
// $single_data=arary();
// if(isset($_POST) && isset($_POST['submit'])){

    $job_title = get_safe_value($conn, $_POST['job_title']);
    $skills = get_safe_value($conn, $_POST['skills']);
    $salary = get_safe_value($conn, $_POST['salary']);
  
    
    $add_job_sql = "INSERT INTO jobs(j_title, skills, salary) VALUES('%s', '%s', '%s');";
    $add_job_sql = sprintf($add_job_sql,  $job_title, $skills, $salary);
    $res = mysqli_query($conn, $add_job_sql);
    echo $res;


//  }
  

?>
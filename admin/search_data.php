<?php 
require("connection.inc.php");
require("functions.inc.php");

$arr=array();
if(isset($_POST)){
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    $val = get_safe_value($conn, $user["data"]);
    // echo $val;
    // print_r($user["data"]);


    $query = "SELECT title FROM videos Where title LIKE '%{$val}%' ";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($res);

    // $title = get_safe_value($conn, $row['title']);

    // array_push($arr, $title);

    print_r($row);

 }
  
    // print_r($_POST)




// $term = get_safe_value($conn, $_POST['data']);

// // $arr=array();
// // $arr["val"]="";

// $query = "SELECT title FROM videos Where title LIKE '%{$term}%' ";
// $res = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($res);

// $val = get_safe_value($conn, $row['title'] );

// // $arr["val"]= $val;

// // echo json_encode($arr);
// echo $val;
?>
<?php 
require("connection.inc.php");
require("functions.inc.php");

$arr=array();
// $single_data=arary();
if(isset($_POST)){
    
    if(isset($_POST['search'])){
        $val = get_safe_value($conn, $_POST['search']);
        
    }else{
        
        $data = file_get_contents("php://input");
        $user = json_decode($data, true);
        $val = get_safe_value($conn, $user["data"]);
    }
    
    $query = "SELECT * FROM videos Where title LIKE '%{$val}%' ";
    $res = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach ($rows as $row) {
            // echo $row['title'];
        array_push($arr, array( "id"=> $row['id'], "title"=> $row['title'], "description"=> $row['description'], "thumb_image"=> $row['thumb_image'], "video_id"=> $row['video_id'], "video_url"=> $row['video_url'], "video_order"=> $row['video_order'] ));
        // array_push($arr, $single_data);
    }

    echo json_encode(array_reverse($arr));


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
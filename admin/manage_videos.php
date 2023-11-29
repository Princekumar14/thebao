<?php
require("top.inc.php");         
$title="";
$video_url="";
$video_order="";
$description="";
$created_at="";
$updated_at="";

$msg ="";

   

if(isset($_GET['type']) && $_GET['type'] !=''){
    $type = get_safe_value($conn, $_GET['type']);

    if($type == 'edit'){
        $id = get_safe_value($conn, $_GET['id']);
        $vid = get_safe_value($conn, $_GET['vid']);

        // $get_edit_video_sql = "SELECT * FROM videos WHERE id='%s';";
        $get_edit_video_sql = "SELECT *,(SELECT COUNT(video_id) from videos where video_order<>0)as total_videos FROM videos WHERE id='%s'; ";
       $get_edit_video_sql = sprintf($get_edit_video_sql, $id);

        $res = mysqli_query($conn, $get_edit_video_sql);
        $check = mysqli_num_rows($res);
        if($check > 0){
            $row = mysqli_fetch_assoc($res);
            $editable_title = $row['title'];
            $editable_video_url = $row['video_url'];
            $editable_video_order = $row['video_order'];
            $editable_video_id = $row['video_id'];
            $editable_thumb_image = $row['thumb_image'];
            
            // $thumb_image = get_safe_value($conn, $_POST['thumb_image']);
            $editable_description = $row['description'];
            $editable_updated_at = date('Y-m-d h:i:s');
            $total_videos = $row['total_videos'];


        }else{
            header('loctaion:thebao_videos.php');
        }

    }
}

if(isset($_POST['submit'])){


    $title = get_safe_value($conn, $_POST['title']);
    $video_url = get_safe_value($conn, $_POST['video_url']);
    $video_order = get_safe_value($conn, $_POST['video_order']);
    $video_id = get_youtube_video_id($video_url);
    // $thumb_image = get_safe_value($conn, $_POST['thumb_image']);
    $description = get_safe_value($conn, $_POST['description']);
    $created_at = date('Y-m-d h:i:s');
    $updated_at = date('Y-m-d h:i:s');

    $already_selected_video_order_sql = "SELECT id from videos where video_order = '%s'";
    $already_selected_video_order_sql = sprintf($already_selected_video_order_sql,  $video_order);
    $already_selected_vid_ord_res = mysqli_query($conn, $already_selected_video_order_sql);
 



    if($_FILES['thumb_image']['type'] != '' && $_FILES['thumb_image']['type'] != 'image/png' && $_FILES['thumb_image']['type'] != 'image/jpg' && $_FILES['thumb_image']['type'] != 'image/jpeg'){
        $msg = "Please Select only png, jpg and jpeg format.";
    }

    if($msg == ''){
        if(isset($_GET['id']) && $_GET['id'] != '')
        {
            if(isset($_POST['URL-image'])){
                
                $answer = $_POST['URL-image'];  
                if ($answer == "get-youtube-thumbnail-image-checkbox") {          
                    // echo "hi";
                    if ( strpos($video_url, 'http://www.youtube.com/shorts/') === 0  || strpos($video_url, 'https://www.youtube.com/shorts/') === 0  )
                        {
                            
                            $shorts_url = explode('/', $video_url);
                            $video_id = end($shorts_url);
                            
                        }
                        $thumb_image = upload_youtube_thumbnail("thumb_image", $video_id, THUBNAIL_IMAGE_SERVER_PATH);  
                        
                        $edit_video_sql = "UPDATE videos SET title='%s', description='%s', thumb_image='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $thumb_image, $video_id, $video_url, $video_order, $updated_at, $id);
                        // die;
                }
                          
            }
            else
            {

                
                if($_FILES['thumb_image']['name'] != '')
                {
                    
                    $thumb_image =  upload_image("thumb_image",THUBNAIL_IMAGE_SERVER_PATH);
                    if( $video_url != $editable_video_url)
                    {
                        $edit_video_sql = "UPDATE videos SET title='%s', description='%s', thumb_image='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $thumb_image, $video_id, $video_url, $video_order, $updated_at, $id);
                        
                        
                        
                    }
                    else
                    {
                        $edit_video_sql = "UPDATE videos SET title='%s', description='%s', thumb_image='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $thumb_image, $video_id, $video_url, $video_order, $updated_at, $id);
                        
                    }
                    
                }
                else
                {
                    
                    if( strpos($editable_thumb_image, 'https://img.youtube.com/vi/') === 0){
                        
                        if( $video_url != $editable_video_url)
                        {
                            if ( strpos($video_url, 'http://www.youtube.com/shorts/') === 0  || strpos($video_url, 'https://www.youtube.com/shorts/') === 0  )
                                {
                                    
                                    $shorts_url = explode('/', $video_url);
                                    $video_id = end($shorts_url);
                                    
                                }
                                $thumb_image = upload_youtube_thumbnail("thumb_image", $video_id, THUBNAIL_IMAGE_SERVER_PATH);

                                $edit_video_sql = "UPDATE videos SET title='%s', description='%s', thumb_image='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                                $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $thumb_image, $video_id, $video_url, $video_order, $updated_at, $id);
                                
                        }
                        else
                        {
                            $edit_video_sql = "UPDATE videos SET title='%s', description='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                            $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $video_id, $video_url, $video_order, $updated_at, $id);
                                
                        }
                            
                            
                    }else
                    {
                        $edit_video_sql = "UPDATE videos SET title='%s', description='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $video_id, $video_url, $video_order, $updated_at, $id);
                        
                    }
                    
                        
                }
            }
            
            if(mysqli_num_rows($already_selected_vid_ord_res) > 0){
                $rows1 = mysqli_fetch_assoc($already_selected_vid_ord_res);
                echo $already_selected_vid_ord_id = get_safe_value($conn, $rows1['id']);
                $zero = 0;
                $edit_video_sql  .= "UPDATE videos SET video_order='%s' WHERE id='%s'";
                echo $edit_video_sql = sprintf($edit_video_sql,  $zero, $already_selected_vid_ord_id);
    
            
                
            }
            die;
            mysqli_query($conn, $edit_video_sql);
            
        }
        else
        {
            if($_FILES['thumb_image']['name'] != '' )
            {
                echo $thumb_image =  upload_image("thumb_image",THUBNAIL_IMAGE_SERVER_PATH);

            }else
            {
                if ( strpos($video_url, 'http://www.youtube.com/shorts/') === 0  || strpos($video_url, 'https://www.youtube.com/shorts/') === 0  )
                {
                    
                    $shorts_url = explode('/', $video_url);
                    $video_id = end($shorts_url);

                }

                $thumb_image = upload_youtube_thumbnail("thumb_image", $video_id, THUBNAIL_IMAGE_SERVER_PATH);

            }


            $add_video_sql = "INSERT INTO videos(title, description, thumb_image, video_id, video_url, video_order, created_at, updated_at) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";
            $add_video_sql = sprintf($add_video_sql,  $title, $description, $thumb_image, $video_id, $video_url, $video_order, $created_at, $updated_at);
            
            
            
            if(mysqli_num_rows($already_selected_vid_ord_res) > 0){
                $rows1 = mysqli_fetch_assoc($already_selected_vid_ord_res);
                $already_selected_vid_ord_id = get_safe_value($conn, $rows1['id']);
                // echo $rows1['id'];
                // echo "present";
                $zero = 0;
                $add_video_sql .= "UPDATE videos SET video_order='%s' WHERE id='%s'";
                $add_video_sql = sprintf($add_video_sql,  $zero, $already_selected_vid_ord_id);
    
                // echo $add_video_sql;
                // die;
            
                
            }
            mysqli_multi_query($conn, $add_video_sql);
        }
        
        header('location:thebao_videos.php');
        die();
    }
}
?>

<div class="content pb-0">
    <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Video</strong><small> Form</small></div>
                        <div class="container">
                            <form method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="card-body card-block">
                            
                                    <div class="form-group"><label for="title" class=" form-control-label">Video Title</label><input type="text" name="title" placeholder="Enter Video Title" class="form-control" required value="<?php  if(isset($_GET['type']) && $_GET['type'] =='edit'){ echo $editable_title; } ?>"></div>
                                    <div class="form-group"><label for="video_url" class=" form-control-label">Enter You Tube Video Link Here</label><input type="text" name="video_url" placeholder="Paste Link Here" class="form-control" required value="<?php  if(isset($_GET['type']) && $_GET['type'] =='edit'){ echo $editable_video_url; } ?>"></div>
                                    <div class="form-group">
                                    <label for="categories" class=" form-control-label">Video Order</label>
                                    <select class="form-control" name="video_order" id="">
                                    <!-- <option >Select Video Order</option> -->
                                        <?php  
                                            $selected = "";
                                            if(isset($_GET['type']) && $_GET['type'] !='')
                                            {
                                                
                                                if($vid == 0){
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }

                                            }
                                            else
                                            {
                                                // $sql = "SELECT COUNT(*) as total_videos FROM videos WHERE video_order <> 0 ";
                                                $sql = "SELECT * FROM videos WHERE video_order <> 0 ";
                                                $res = mysqli_query($conn, $sql);
                                                $total_videos = mysqli_num_rows($res);
                                            }
                                            echo "<option {$selected} >Select Video Order</option>";
                                        
                                            if(isset($_GET['type']) && $_GET['type'] !='')
                                            {
                                                for($i=1; $i<=$total_videos+1; $i++)
                                                {
                                                    if($i == $vid )
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    else
                                                    {
                                                        $selected = "";
                                                        
                                                    }
                                                    echo "<option {$selected}   >".$i."</option>";
                                                }
                                            }else
                                            {
                                                for($i=1; $i<=$total_videos+1; $i++)
                                                {
                                                    echo "<option>".$i."</option>";
                                                }
                                            }
                                        
                                     
                                        ?>
                                    </select>
                                </div>
                                    <div class="form-group">
                                        <?php  if(isset($_GET['type']) && $_GET['type'] =='edit'){ ?>
                                        <?php
                                        if (strpos($editable_thumb_image, 'http://') === 0 || strpos($editable_thumb_image, 'https://') === 0){
                                            $image_source_name = "Youtube's Thumbnail Image";
                                            $uploaded_image = $editable_thumb_image;
                                            $checkbox ='';
                                        }else{
                                            $image_source_name = "Uploaded Thumbnail Image";
                                            $uploaded_image = THUBNAIL_IMAGE_SITE_PATH.$editable_thumb_image;

                                            $checkbox =   "<div class='form-check'>        
                                            <input class='form-check-input' type='checkbox' name='URL-image' value='get-youtube-thumbnail-image-checkbox' id='URL-image'>
                                            <label class='form-check-label' for='URL-image'>
                                                Click here to get Youtube's Thubnail image
                                            </label>
                                        </div>";

                                        }
                                        ?>
                                        <label for="thumb_image" class=" form-control-label"><?php echo $image_source_name; ?></label>
                                        </br>
                                        <!-- <input type="radio" name="ans" value="ans1" />Select Youtube's Thubnail as Your Thubnail iamge -->
                                        <img class="mb-3 w-25" src="<?php echo $uploaded_image; ?>" alt="">
                                        <?php echo $checkbox; ?>
                                        
                                    <?php } ?>
                                    </br>
                                    
                                    <label for="thumb_image" class=" form-control-label">Upload Thumbnail Image</label>
                                    <input type="file" name="thumb_image" placeholder="Select thumbnail image" class="form-control" >
                                </div>
                                    <div class="form-group"><label for="description" class=" form-control-label">Description</label><textarea name="description" placeholder="Enter Video description" class="form-control" required ><?php  if(isset($_GET['type']) && $_GET['type'] =='edit'){ echo $editable_description; } ?></textarea></div>
                                
    
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                    <div class="field_error"><?php echo $msg; ?></div>
                                </div>
                            </form>

                        </div>
                     </div>
                  </div>
               </div>
    </div>
</div>

<?php
require("footer.inc.php");
?>
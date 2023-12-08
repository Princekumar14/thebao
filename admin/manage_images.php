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
    if ( strpos($video_url, 'http://www.youtube.com/shorts/') === 0  || strpos($video_url, 'https://www.youtube.com/shorts/') === 0  )
    {
            
        $shorts_url = explode('/', $video_url);
        $video_id = end($shorts_url);
            
    }else{

        $video_id = get_youtube_video_id($video_url);
    }
    // $thumb_image = get_safe_value($conn, $_POST['thumb_image']);
    $description = get_safe_value($conn, $_POST['description']);
    $created_at = date('Y-m-d h:i:s');
    $updated_at = date('Y-m-d h:i:s');

    $already_selected_video_order_sql = "SELECT id from videos where video_order = '%s'";
    $already_selected_video_order_sql = sprintf($already_selected_video_order_sql,  $video_order);
    $already_selected_vid_ord_res = mysqli_query($conn, $already_selected_video_order_sql);
    // echo mysqli_num_rows($already_selected_vid_ord_res);
 



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
                            $edit_video_sql = "UPDATE videos SET title='%s', description='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                            $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $video_order, $updated_at, $id);
                            
                                
                        }
                            
                            
                    }else
                    {
                        
                        $edit_video_sql = "UPDATE videos SET title='%s', description='%s', video_id='%s', video_url='%s', video_order='%s', updated_at='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $title, $description, $video_id, $video_url, $video_order, $updated_at, $id);
                        
                    }
                    
                        
                }
            }
            
                if($editable_video_order != $video_order){
                // if($vid != $video_order){
                    if(mysqli_num_rows($already_selected_vid_ord_res) > 0){
                        // echo "hi";
                        $rows1 = mysqli_fetch_assoc($already_selected_vid_ord_res);
                        $already_selected_vid_ord_id = get_safe_value($conn, $rows1['id']);
                        $zero = 0;
                        $edit_video_sql  .= "UPDATE videos SET video_order='%s' WHERE id='%s';";
                        $edit_video_sql = sprintf($edit_video_sql,  $zero, $already_selected_vid_ord_id);  
                        
                        // echo "<br>".$edit_video_sql;
                        // die;
                        
                        
                    }
                }
            // echo $edit_video_sql;
            // die;
            mysqli_multi_query($conn, $edit_video_sql);
            
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

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
 <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
 <link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload.css" />
<link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload-ui.css" />



<script src="./assets/js/progress_bar_JS/vendor/jquery.ui.widget.js"></script>

<!-- <script src="js/jquery.iframe-transport.js"></script> -->
<script src="./assets/js/progress_bar_JS/jquery.iframe-transport.js"></script>

<!-- The basic File Upload plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload.js"></script>

<!-- The File Upload processing plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-process.js"></script>

<!-- The File Upload image preview & resize plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-image.js"></script>

<!-- The File Upload audio preview plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-audio.js"></script>

<!-- The File Upload video preview plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-video.js"></script>

<!-- The File Upload validation plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-validate.js"></script>

<!-- The File Upload user interface plugin -->
<script src="./assets/js/progress_bar_JS/jquery.fileupload-ui.js"></script>


<div class="content pb-0">
    <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Video</strong><small> Form</small></div>
                        <div class="container">
                            <form method="post" enctype="multipart/form-data" autocomplete="off" id="fileupload">
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
                                    <div id="previewImageBox" style="display:none;">
                                        <div style="max-width: fit-content;max-height: fit-content;position:relative;">
                                            <img id="previewImage" alt="Preview" style="max-width: 200px; max-height: 200px;">
                                            <button type="button" id="close" class="close btn btn-danger" aria-label="Close" style="position: absolute;border-radius: 50%;color: black;font-weight: bold;top: -1em;right: -1em;">X</button>
                                        </div>
                                        <!-- <button class="btn btn-danger text-dark" type="button"><i class="bi bi-x"></i></button> -->
                                    </div>
                                    </br>
                                    <label for="thumb_image" class=" form-control-label">Upload Thumbnail Image</label>
                                    <input type="file" name="thumb_image" id="thumb_image" placeholder="Select thumbnail image" class="form-control">
                                    <!-- <input type="file" name="thumb_image" id="thumb_image" placeholder="Select thumbnail image" class="form-control" multiple> -->



                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                        <noscript
                                        ><input
                                            type="hidden"
                                            name="redirect"
                                            value="https://blueimp.github.io/jQuery-File-Upload/"
                                        /></noscript>
                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                        <div class="row fileupload-buttonbar">
                                        <div class="col-lg-12" style="text-align:center;">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple />
                                            </span>
                                            <!-- <button type="submit" class="btn btn-primary start">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                            </button> -->
                                            <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                            </button>
                                            <button type="button" class="btn btn-danger delete">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>Delete selected</span>
                                            </button>
                                            <input type="checkbox" class="toggle" />
                                            <!-- The global file processing state -->
                                            <span class="fileupload-process"></span>
                                        </div>
                                        <!-- The global progress state -->
                                        <div class="col-lg-5 fileupload-progress fade">
                                            <!-- The global progress bar -->
                                            <div
                                            class="progress progress-striped active"
                                            role="progressbar"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            >
                                            <div
                                                class="progress-bar progress-bar-success"
                                                style="width:0%;"
                                            ></div>
                                            </div>
                                            <!-- The extended global progress state -->
                                            <div class="progress-extended">&nbsp;</div>
                                        </div>
                                        </div>
                                        <!-- The table listing the files available for upload/download -->
                                        <table role="presentation" class="table table-striped">
                                        <tbody class="files"></tbody>
                                        </table>







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



<!-- <script id="template-upload" type="text/x-template">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
</script> -->
<script id="template-download" type="text/x-template"></script>


    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-template">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
                      <p class="name">
                          {% if (file.url) { %}
                              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                          {% } else { %}
                              <span>{%=file.name%}</span>
                          {% } %}
                      </p>
                  {% } %}
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
   
<?php
require("footer.inc.php");
?>

<!-- <script>
    

    var thumb_image = document.getElementById('thumb_image')
    thumb_image.onchange = function() {
        thumb_image.appendAFTER("<button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    };
</script> -->
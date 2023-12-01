<?php
require("top.inc.php");


if(isset($_GET['type']) && $_GET['type'] != ''){
   $type = get_safe_value($conn, $_GET['type']);

   if($type == 'delete'){
      $id = get_safe_value($conn, $_GET['id']);
      $delete_video_sql = " DELETE FROM videos WHERE id='%s';";
      $delete_video_sql = sprintf($delete_video_sql, $id);
      mysqli_query($conn, $delete_video_sql);
   }

}

$sql = "SELECT * FROM videos ORDER BY video_order desc";
$res = mysqli_query($conn, $sql);
   
?>


<section id="gallery">
   <!-- <div class="d-flex justify-content-center pt-5 pr-5 w-100"> -->
   <div class="row justify-content-center pt-5">
      <div class="jsAuto mr-2 col-sm-5 col-11">
         <form action="" class="form-group" style="position: relative;">
            <input class="form-control" type="search" placeholder="javascript autocomplete" id="autocompleteJS" autocomplete="" oninput="jsAutocomplete()">
            <!-- <button class="btn btn-outline-info ml-2 my-sm-0" type="submit">Search</button> -->
            <div class="result-box-js" style="display: none; position: absolute; z-index: 1; width:100%;" id="result-box-js">
               <ul class="list-group ul-js">
                  
               </ul>
            </div> 
            
         </form>
      </div>

      <div class="jqAuto col-sm-5 col-11">
         <form action="" class="form-group" style="position: relative;">
            <input class="form-control" type="search" placeholder="jquery autocomplete" id="autocompleteJQ" autocomplete="" oninput="jqAutocomplete()">
            <!-- <button class="btn btn-outline-success ml-2 my-sm-0" type="submit">Search</button> -->
            <div class="result-box-jq" id="result-box-jq" style="display: none; position: absolute; z-index: 1; width:100%;">
               <ul class="list-group ul-jq"   >
                  
               </ul>
            </div> 
         </form>
      </div>
   </div>
   <div class="container-fluid p-sm-5 mt-5" >
      <a href="manage_videos.php" class="btn btn-outline-primary btn-sm mb-5">Add More +</a>
      <div class="row" id="all_vid">
         <?php 
         while($row = mysqli_fetch_assoc($res)){ ?>
         <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="card">
               <a href="<?php echo $row['video_url']; ?>" target="_blank"><img style="height: 273px; object-fit: contain; object-position: center;" src="<?php
               if (strpos($row['thumb_image'], 'http://') === 0 || strpos($row['thumb_image'], 'https://') === 0){
                  echo $row['thumb_image']; 

               }else{
                  echo THUBNAIL_IMAGE_SITE_PATH.$row['thumb_image']; 

               }
                ?>" alt="" class="card-img-top"></a>
               <!-- <a href="#" target="_blank"><img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top"></a> -->
               <div class="card-body m-2" style="height:260px">
                  <div class="video-id-box1 d-inline">
                     <h5 class="card-title video-id-title ">Video id : <a href="<?php echo $row['video_url']; ?>" class="card-text video-id-text" target="_blank"><?php echo $row['video_id']; ?></a> </h5>
                  </div>
                  <div class="video-order-box">
                     <h5 class="card-title video-order-title ">Video Order : <span class="card-text video-order-text "><?php echo $row['video_order']; ?></span> </h5>
                  </div>
                  <div class="video-title-box">
                     <h5 class="card-title video-title ">Title : <span class="card-text video-title-text "><?php echo $row['title']; ?></span> </h5>
                  </div>
                  <div class="video-description-box">
                     <h5 class="card-title video-description-title ">Description : <span class="card-text video-description-text "><?php
                     if( strlen($row['description']) > 100){
                        echo substr($row['description'], 1, 30)."...";
                     }else{
                        echo $row['description'];
                     }
                     ?></span> </h5>
                  </div>
                  <div class="btns" style="position: absolute;bottom: 1rem;">

                     <a href="<?php echo "manage_videos.php?type=edit&id=". $row['id']."&vid=".$row['video_order'] ?>" class="btn btn-primary btn-sm">Edit</a>
                     <a href="<?php echo "?type=delete&id=". $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>

      </div>
   </div>
</section>



<?php
require("footer.inc.php");
?>

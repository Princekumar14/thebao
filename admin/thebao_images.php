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

   <div class="container-fluid p-sm-5 mt-5" >
      <a href="manage_images.php" class="btn btn-outline-primary btn-sm mb-5">Add More +</a>
      <div class="row" id="all_vid">
         <?php 
         while($row = mysqli_fetch_assoc($res)){ ?>
         <!-- <div class="col-xl-3 col-lg-4 col-sm-6 mb-4 shadow"> -->
            <!-- <div class="card"> -->
               <a href="<?php 
               echo $row['video_url']
                // if (strpos($row['thumb_image'], 'http://') === 0 || strpos($row['thumb_image'], 'https://') === 0){
                //     echo $row['thumb_image']; 

                // }else{
                //     echo THUBNAIL_IMAGE_SITE_PATH.$row['thumb_image']; 

                // }
               ?>" data-toggle="lightbox" data-src="https://www.youtube.com/embed/<?php echo $row['video_id'];?>" data-gallery="mixedgallery" class="col-xl-3 col-lg-4 col-sm-6 mb-4 shadow">
                    <img style="height: 273px; object-fit: contain; object-position: center;" src="<?php
                    if (strpos($row['thumb_image'], 'http://') === 0 || strpos($row['thumb_image'], 'https://') === 0){
                        echo $row['thumb_image']; 

                    }else{
                        echo THUBNAIL_IMAGE_SITE_PATH.$row['thumb_image']; 

                    }
                        ?>" alt="" class="card-img-top">
                </a>


            <!-- </div> -->
         <!-- </div> -->
         <?php } ?>

      </div>
   </div>
</section>



<?php
require("footer.inc.php");
?>

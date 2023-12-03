<?php
require("top.inc.php");


if(isset($_GET['type']) && $_GET['type'] != ''){
   $type = get_safe_value($conn, $_GET['type']);

   if($type == 'delete'){
      $id = get_safe_value($conn, $_GET['id']);
      $delete_video_sql = " DELETE FROM jobs WHERE j_id='%s';";
      $delete_video_sql = sprintf($delete_video_sql, $id);
      mysqli_query($conn, $delete_video_sql);
   }

}

$sql = "SELECT * FROM jobs ORDER BY j_id desc";
$res = mysqli_query($conn, $sql);
   
?>


<section id="gallery">
   <div class="container-fluid p-sm-5 mt-5" >
      <a href="manage_jobs.php" class="btn btn-outline-primary btn-sm mb-5">Add jobs +</a>
      <div class="row" id="all_vid">
         <?php 
         while($row = mysqli_fetch_assoc($res)){ ?>
         <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="card">

               <!-- <a href="" target="_blank"><img style="height: 273px; object-fit: contain; object-position: center;" src="" alt="" class="card-img-top"></a> -->
                
                <div class="card-body m-2" style="height:260px">
                  <div class="video-id-box1 d-inline">
                     <h5 class="card-title video-id-title ">Job Title : <?php echo $row['j_title']; ?></h5>
                  </div>
                  <div class="video-order-box">
                     <h5 class="card-title video-order-title ">Skills : <span class="card-text video-order-text "><?php echo $row['skills']; ?></span> </h5>
                  </div>
                  <div class="video-title-box">
                     <h5 class="card-title video-title ">Salary : <span class="card-text video-title-text "><?php echo $row['salary']; ?></span> </h5>
                  </div>
                  <div class="btns" style="position: absolute;bottom: 1rem;">

                     <!-- <a href="<?php /* echo "manage_videos.php?type=edit&id=". $row['id']."&vid=".$row['video_order'] */ ?>" class="btn btn-primary btn-sm">Edit</a> -->
                     <a href="<?php echo "?type=delete&id=". $row['j_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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

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

$sql = "SELECT * FROM images ORDER BY id desc";
$res = mysqli_query($conn, $sql);
   
?>


<section id="gallery">

   <div class="container-fluid p-sm-5 mt-5" >
      <a href="manage_Img_prog.php" class="btn btn-outline-primary btn-sm mb-5">Add Images +</a>
      <div class="row" id="all_vid">
         <?php 
         while($row = mysqli_fetch_assoc($res)){ ?>
         <!-- <div class="col-xl-3 col-lg-4 col-sm-6 mb-4 shadow"> -->
            <!-- <div class="card"> -->
               <a href="#" class="col-xl-3 col-lg-4 col-sm-6 mb-4 shadow">
                    <img style="height: 273px; object-fit: contain; object-position: center;" src="https://img.youtube.com/vi/DbL-mBV1mtA/hqdefault.jpg" alt="" class="card-img-top">
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

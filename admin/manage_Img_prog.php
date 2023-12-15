<?php
require("top.inc.php");   
$msg='';      

?>


<link rel="stylesheet" href="./assets/imageUpload/fileUpload/fileUpload.css">

<div class="content pb-0">
    <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Video</strong><small> Form</small></div>
                        <div class="container">
                            <form method="post" enctype="multipart/form-data" autocomplete="off" id="fileupload">
                                <div class="card-body card-block">

                                </div>
                                    <div class="form-group mb-3">
                                            <label for="thumb_image" class=" form-control-label">Upload Thumbnail Image</label>
                                            <!-- <input type="file" name="thumb_image" id="thumb_image" placeholder="Select thumbnail image" class="form-control"> -->
                                            <!-- <input type="file" name="thumb_image" id="thumb_image" placeholder="Select thumbnail image" class="form-control" multiple> -->
                                            <div id="imgs"></div>




                                    </div>
                                    
                                    <button id="img_submit_btn" name="img_submit" type="submit" class="btn btn-lg btn-info btn-block">
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


<script src="./assets/imageUpload/fileUpload/fileUpload.js"></script>
<script>
    $(function(){ 
  $("#imgs").fileUpload();
});
</script>


<?php
require("footer.inc.php");
?>

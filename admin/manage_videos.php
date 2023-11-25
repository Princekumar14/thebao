<?php
require("top.inc.php");         
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
                            
                                    <div class="form-group"><label for="title" class=" form-control-label">Video Title</label><input type="text" name="title" placeholder="Enter product name" class="form-control" required value=""></div>
                                    <div class="form-group"><label for="vide_link" class=" form-control-label">Enter You Tube Video Link Here</label><input type="text" name="vide_link" placeholder="Paste Link Here" class="form-control" required value=""></div>
                                    <div class="form-group">
                                    <label for="categories" class=" form-control-label">Categories</label>
                                    <select class="form-control" name="categories_id" id="">
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                        <option >5</option>
                                        <option >6</option>
                                        <option >7</option>
                                    </select>
                                </div>
                                    <div class="form-group"><label for="thumbnail_image" class=" form-control-label">Thumbnail Image</label><input type="file" name="thumbnail_image" placeholder="Select thumbnail image" class="form-control" ></div>
                                    <div class="form-group"><label for="description" class=" form-control-label">Description</label><textarea name="description" placeholder="Enter product description" class="form-control" required ></textarea></div>
                                
    
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                    <div class="field_error"></div>
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
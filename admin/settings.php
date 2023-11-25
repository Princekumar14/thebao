<?php
require("top.inc.php");
?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title">Update Record</h3>
                        <div class="card-body card-block">
                            <form action="" method="post">
                                <div class="container">
                                    <div class="row form-group border p-4 w-50 ">
                                        <div class="col-md-4 mb-3">
                                            <label for="email" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <input type="text" name="email" id="email" placeholder="Enter Email Address" class="form-control" value="admin@thebao.com" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="oldPassword" class=" form-control-label">Old Password</label>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <input type="password" name="oldPassword" id="oldPassword" placeholder="Enter Old Password" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="newPassword" class=" form-control-label">New Password</label>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <input type="password" name="NewPassword" id="newPassword" placeholder="Enter New Password" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="confirmPassword" class=" form-control-label">Confirm</label>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter Confirm Password" class="form-control" required="">
                                        </div>
                                        <div class="text-danger"></div>
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <input class="btn btn-primary " name="submit" type="submit" value="Update">
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                    <div class="card-body--">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require("footer.inc.php");
?>
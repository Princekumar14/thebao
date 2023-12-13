<?php
require("top.inc.php");         


if(isset($_POST['submit'])){


    $job_title = get_safe_value($conn, $_POST['job_title']);
    $skills = get_safe_value($conn, $_POST['skills']);
    $salary = get_safe_value($conn, $_POST['salary']);

    $add_job_sql = "INSERT INTO jobs(j_title, skills, salary) VALUES('%s', '%s', '%s');";
    $add_job_sql = sprintf($add_job_sql,  $job_title, $skills, $salary);
    mysqli_multi_query($conn, $add_job_sql);
    
}    
?>

<link rel="stylesheet" href="assets/css/jobs_form.css">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3 mb-3 p-2">
                <form id="fileupload" method="post" enctype="multipart/form-data" autocomplete="off">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="job_title"><strong>Title</strong></li>
                        <li id="skills"><strong>Skills</strong></li>
                        <li id="poster"><strong>Poster</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card p-2">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">JOB TITLE:</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Job Title: *</label> 
                            <input type="text" id="job_title_input" name="job_title" placeholder="Job Title" required  />
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Skills Required:</h2>
                                </div>
                            </div> <label class="fieldlabels">Required Skills: *</label> <input type="text" id="skills_input" name="skills" placeholder="Skills" required  /> 
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset class="">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                            </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*" value="l" placeholder="photo"> 
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                    <div class="form-card p-2">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Salary :</h2>
                                </div>
                            </div> <label class="fieldlabels">Salary: *</label> <input type="text" id="salary" name="salary" placeholder="salary" required /> 
                        </div> 
                        <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->


                        <!-- <input type="submit" name="submit" class="next action-button" value="Submit" />  -->
                        <input type="button" name="submit" class="next action-button" value="Submit" onclick="save_job()"/> 
                        

                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />

                        <!-- <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">New Job Added</h5>
                                </div>
                            </div>
                        </div> -->
                    </fieldset>
                    <fieldset id="form_finish" class="d-none">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">New Job Added</h5>
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/job_form.js"></script>



<?php
require("footer.inc.php");
?>
<?php 
    $job_id = $_GET['jobid'] ?? null;
    $job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $job_id]);
?>

<?php include_once("public/_template/Header.php") ?>

<div class="container">
    <div clas="row">
        <div class="col-md-12">
            <div style="padding: 10rem 0;">
        
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card__round card__border--hover">
                            <div class="card-header bg-primary text-white text-center py-4">
                                <h2 class="fw-bold">HR ADMISSION</h2>
                            </div>
                            <div class="card-body py-4">
                                <h3 class="fw-bolder text-center"><?=$job['title']?></h3>
                                
                                <div class="row mt-4">
                                    
                                    <div class="col-md-8">
                                        <div class="card card-body card__round shadow">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-2">Lastname <?=Required()?></label>
                                                        <input type="text" name="lastname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-2">Lastname <?=Required()?></label>
                                                        <input type="text" name="lastname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-2">Lastname <?=Required()?></label>
                                                        <input type="text" name="lastname" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card-body card__round shadow">
                                            asdsad
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once("public/_template/Footer.php") ?>


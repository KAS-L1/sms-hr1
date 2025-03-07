<?php 
    $job_id = $_GET['jobid'] ?? null;
    $job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $job_id]);
?>

<?php include_once("public/_template/Header.php") ?>

<div class="container">
    <div clas="row">
        <div class="col-md-12">
            <div style="padding: 10rem 0;">
                <div class="text-white text-center">
                    <h1 class="text__shadow fw-bolder"><?=$job['title']?></h1>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="card">
                            <div class="card-body">
                                aasdas
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once("public/_template/Footer.php") ?>


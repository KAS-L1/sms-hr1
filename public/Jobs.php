<?php 
    $jobs = $DB->SELECT("jobs", "*");
?>

<?php include_once("public/_template/Header.php") ?>

<div class="container">
    <div clas="row">
        <div class="col-md-12">
            <div style="padding: 10rem 0;">
                <div class="text-white text-center">
                    <h1 class="text__shadow fw-bolder">Apply Job</h1>
                    <p class="text__shadow mb-5">Select jobs available and listed below.</p>
                </div>

                <div class="row">

                    <?php foreach($jobs as $job){ ?>
                        <div class="col-md-4 mb-4">
                            <div class="card touchable card__border--hover">
                                <img src="<?=DOMAIN?>/upload/job/<?=$job['image']?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$job['title']?></h5>
                                    <h6>School Name: <?=$job['school']?></h6>
                                    <h6>Location: <?=$job['location']?></h6>
                                    <h6 class="mt-4">Job Description:</h6>
                                    <p class="card-text"><?=$job['description']?></p>
                                    <a href="<?=ROUTE('apply?jobid'.$job['job_id'])?>" class="btn btn-danger btn__round fw-bold w-100">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once("public/_template/Footer.php") ?>


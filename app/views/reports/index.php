<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<main class="admin dataInput">
            <section class="pageSpecificHeader"></section>
            <section class="mainContent adminForm questionnaire reportView">
                <form action="<?php echo URLROOT?>/generate_report/print" method="POST">
                    <div class="form" id="answer-form">
                        <h2>
                            Generate Report
                        </h2>

                        <div class="col-md-12" >
                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label for="adsType" class="form-label"
                                        >Type of Report</label>
                                        <select name="typeOfReport" id="typeOfReport" class="form-control" style="font-size: 16px">
                                            <option value="">Please Choose</option>
                                            <option value="college">College</option>
                                            <option value="batch">Batch</option>
                                            <option value="course">Course</option>
                                            <!-- <option value="alumni">Per Alumni</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label for="adsType" class="form-label"
                                        >Year</label>
                                        <select name="year" id="year" class="form-control" style="font-size: 16px">
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="renderSelection" class="my-5">
                                </div>
                               
                               
                            </div>
   
                            <button id="btn-generate"  class=" btn btn-primary" type="button" style="font-size: 16px">Generate Report</button>
                        </div>

                    </div>

                    <div class="">
                       
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
<script src="<?= URLROOT?>/js/GenerateReport/index.js"></script>

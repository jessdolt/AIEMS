<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<main class="admin dataInput">
            <section class="pageSpecificHeader"></section>
            <section class="mainContent adminForm questionnaire reportView">
                <form action="<?php echo URLROOT?>/generate_report/print" method="POST">
                    <div class="form" id="answer-form">
                    <input type="hidden" value="<?php echo URLROOT;?>" id="url-web">
                    <input type="hidden" value="<?php echo $data['survey']->id?>" id="survey-id">
                        <h2>
                            Generate Report
                            
                            <div class="btnGroupContainer">
                                <a href="#" class="print">
                                    <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 13.125V14.0625C13.5 14.5101 13.3222 14.9393 13.0057 15.2557C12.6893 15.5722 12.2601 15.75 11.8125 15.75H6.1875C5.73995 15.75 5.31072 15.5722 4.99426 15.2557C4.67779 14.9393 4.5 14.5101 4.5 14.0625V13.1243L3.1875 13.125C2.73995 13.125 2.31072 12.9472 1.99426 12.6307C1.67779 12.3143 1.5 11.8851 1.5 11.4375V6.9405C1.5 6.29403 1.75681 5.67405 2.21393 5.21693C2.67105 4.75981 3.29103 4.503 3.9375 4.503L4.49925 4.50225L4.5 3.9375C4.5 3.48995 4.67779 3.06072 4.99426 2.74426C5.31072 2.42779 5.73995 2.25 6.1875 2.25H11.814C12.2616 2.25 12.6908 2.42779 13.0072 2.74426C13.3237 3.06072 13.5015 3.48995 13.5015 3.9375V4.50225H14.064C14.7105 4.50265 15.3304 4.75953 15.7877 5.21652C16.2449 5.67352 16.5022 6.29327 16.503 6.93975L16.5052 11.4375C16.5053 11.659 16.4618 11.8784 16.3771 12.083C16.2925 12.2877 16.1683 12.4737 16.0117 12.6304C15.8552 12.7871 15.6693 12.9115 15.4647 12.9963C15.2601 13.0812 15.0408 13.1249 14.8192 13.125H13.5ZM11.8125 10.125H6.1875C6.03832 10.125 5.89524 10.1843 5.78975 10.2898C5.68426 10.3952 5.625 10.5383 5.625 10.6875V14.0625C5.625 14.373 5.877 14.625 6.1875 14.625H11.8125C11.9617 14.625 12.1048 14.5657 12.2102 14.4602C12.3157 14.3548 12.375 14.2117 12.375 14.0625V10.6875C12.375 10.5383 12.3157 10.3952 12.2102 10.2898C12.1048 10.1843 11.9617 10.125 11.8125 10.125ZM11.814 3.375H6.1875C6.03832 3.375 5.89524 3.43426 5.78975 3.53975C5.68426 3.64524 5.625 3.78832 5.625 3.9375L5.62425 4.50225H12.3765V3.9375C12.3765 3.78832 12.3172 3.64524 12.2117 3.53975C12.1063 3.43426 11.9632 3.375 11.814 3.375Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    Print
                                </a>
                              
                            </div>
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

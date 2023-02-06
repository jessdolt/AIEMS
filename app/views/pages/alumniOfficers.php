<?php require APPROOT . '/views/inc/header_new.php'; ?>
<style>
      .form-group input,
      .form-group textarea,
      .form-group select {
        padding: 10px;
        font-size: 14px;
      }

      #btn-add-ref {
        padding: 5px;
        margin-left: 10px;
        cursor: pointer;
        border-radius: 50%;
        transition: all 0.5s ease;
        box-shadow: 0 0 1px 1px grey;
      }
      #btn-add-ref:hover i {
        transform: scale(1.3);
      }

      .btn {
        font-size: 14px;
        padding: 10px;
        color: white;
        background-color: black !important;
        outline:none;
        border:none;
      }

      .btn:hover{
        color:white;
        outline:none;
        border:none;
      }

      .imageContainerr{
        border: 1px solid rgba(0,0,0,0.1);
      }

      .divider{
        height: 1px;
        width: 100%;
        background-color: rgba(0,0,0,0.1);
        margin-top: 5px;
      }

      .p-label{
        font-size: 20px;
      }

      .test{
        display: 'flex';
        align-items: 'center';
        gap: 10px;
      }


    </style>
   <main class="alumni forum" id="promos-ads">
      <div class="container" style="display: flex; justify-content: center">
        <div class="row">
          <div class="col-md-12 mt-5 mb-5">
            <div class="card p-5">
              <div class="d-flex justify-content-between align-items-center">
                <h3>Alumni Officers</h3>
              </div>
              <hr />

              <!-- start of for each -->
              <?php foreach($data as $alumniOfficer): ?>
              <div class="row">
                <div class="card" style="max-width: 900px">
                    <div class="card-body">
                        <div class="d-flex flex-row w-100" >
                            <div class="flex-grow-1" style='max-width: 150px'>
                                <div class="w-100 imageContainerr">
                                    <img
                                        class="rounded w-100"
                                        src="<?php echo (!empty($alumniOfficer->image)) ? URLROOT."/uploads/".$alumniOfficer->image : URLROOT."/images/default-user.jpg"?>"
                                        alt=""
                                        style="max-width: 100%; height: 150px; object-fit:cover"
                                    />   
                                </div>
                            </div>
                            <div class="flex-grow-1 " style="padding-left: 20px">
                                <h3 style="font-weight: bold"><?= $alumniOfficer->department_name ?></h3>
                                <div class="divider"></div>
                                <div style="margin-top: 5px; display: flex; flex-direction: column; padding-top: 5px">
                                    <div class="test">
                                        <span class="p-label"><?= $alumniOfficer->name ?></span>
                                    </div>
                                    <div class="test">
                                        <span class="p-label"><?= $alumniOfficer->contact_no ?></span>
                                    </div>
                                    <div class="test">
                                        <a href="<?= $alumniOfficer->facebook ?>" target="_blank" style="display:block; max-width: 50px;"> <i class="fa-brands fa-square-facebook" style="font-size: 50px; color:black"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
              </div>
              <?php endforeach; ?>
              <!-- end of for each -->


                    </div>
                  </div>

              
                 
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </main>

    <script src="<?= URLROOT?>/js/PromosAdvertisement/redeemPromosAdvertisement.js"></script>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


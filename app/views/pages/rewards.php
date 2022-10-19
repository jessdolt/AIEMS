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
    </style>
   <main class="alumni forum" id="promos-ads">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5 mb-5">
            <div class="card p-5">
              <div class="d-flex justify-content-between align-items-center">
                <h3>Available Rewards</h3>
              </div>
              <hr />
              
              <div class="row d-flex flex-wrap justify-content-around align-items-center">
                <!-- Start of card voucher -->
                    <!-- DITO START NG FOREACH -->
                    <?php 
                    if (!empty($data)) {
                    foreach ($data as $allAvailablePromos): 
                    ?>
                  <div class="col-md-4 mt-2 mb-2">
                    <div class="card rounded shadow-lg"  style="background-color: grey; padding: 0; border:none;">
                      <img
                        class="rounded"
                        src="<?php echo URLROOT?>/uploads/<?php echo($allAvailablePromos->image); ?>"
                        alt=""
                        style="max-width: 100%; height: 150px"
                      />
                      <div class="p-2">
                        <h2 class="mt-2 text-white"><?php echo($allAvailablePromos->title); ?></h2>
                        <div class="d-flex justify-content-end align-items-center">
                            <p style="margin: 0; margin-right: 10px" class="text-white"><?php echo number_format((float)$allAvailablePromos->ac_amount, 2, '.', '') ?> AC</p>
                            <button id="btnRedeem" class="btn rounded-pill text-white" data-ac="<?= $allAvailablePromos->ac_amount?>" data-id="<?php echo $allAvailablePromos->promoid ?>">Redeem</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; } ?>
                    <!-- END NG FOREACH -->
                <!-- end of card voucher -->
              </div>





            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?= URLROOT?>/js/PromosAdvertisement/redeemPromosAdvertisement.js"></script>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


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
   <main class="alumni forum">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mt-5 mb-5">
            <div class="card p-5">
              <div class="d-flex justify-content-between align-items-center">
                <h3>Alumni Events</h3>
                <a class="btn btn-secondary" href="<?= URLROOT?>/event_management/add">Create Event</a>
              </div>
              <hr />

              <div class="row">
                <h2 class="mb-5 mt-5">Your Events</h2>

                <div
                  class="row d-flex justify-content-around align-items-center"
                >

                <!-- Start ng Foreach -->
                  <div class="col-md-6 mt-2 mb-2">
                    <div
                      class="card rounded"
                      style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                    >
                      <img
                        class="rounded"
                        src="./images/voucher.jpg"
                        alt=""
                        style="max-width: 100%; height: 150px"
                      />
                      <div class="p-2">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2">First Event in PUP</h2>
                          <button class="btn rounded-pill">Edit</button>
                        </div>
                        <div
                          class="d-flex justify-content-center align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong
                              >Date of Event:
                              <span class="remaining-rewards">October 30,2022 12:30PM</span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- end ng foreach -->
                  
                  
                </div>
              </div>

              <div class="row">
                <h2 class="mb-5 mt-5">Participated Events</h2>
                <div
                  class="row d-flex justify-content-around align-items-center"
                >

                <!-- Start ng Foreach -->
                  <div class="col-md-6 mt-2 mb-2">
                    <div
                      class="card rounded"
                      style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                    >
                      <img
                        class="rounded"
                        src="./images/voucher.jpg"
                        alt=""
                        style="max-width: 100%; height: 150px"
                      />
                      <div class="p-2">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2">Participated Event</h2>
                          <button class="btn rounded-pill">View</button>
                          <!-- etong view na to ay redirect lang sa malaking clendar na gagawin ko wag mo na intindihin muna to -->
                        </div>
                        <div
                          class="d-flex justify-content-center align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong
                              >Date of Event:
                              <span class="remaining-rewards">October 30,2022 12:30PM</span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- End ng Foreach -->
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-5 mb-5">
            <div class="card p-5">
              <h3>Upcoming Events</h3>
              <hr />

              <div class="row d-flex" style="gap: 20px">

              <!-- start ng foreach -->
                <div
                  class="card rounded"
                  style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                >
                  <img
                    class="rounded"
                    src="./images/voucher.jpg"
                    alt=""
                    style="max-width: 100%; height: 150px"
                  />
                  <div class="p-2">
                  <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2">New Event</h2>
                          <button class="btn rounded-pill">Participate</button>
                        
                        </div>
                    <div
                          class="d-flex justify-content-center align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong
                              >Date of Event:
                              <span class="remaining-rewards">October 30,2022 12:30PM</span></strong
                            >
                          </p>
                        </div>
                  </div>
                </div>
              <!-- start ng foreach -->

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="<?= URLROOT?>/js/PromosAdvertisement/redeemPromosAdvertisement.js"></script>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>

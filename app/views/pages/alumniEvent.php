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
                <?php 
                if (!empty($data['yourEvents'])) {
                  foreach ($data['yourEvents'] as $yourEvents) :
                ?>
                  <div class="col-md-6 mt-2 mb-2">
                    <div
                      class="card rounded"
                      style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                    >
                      <img
                        class="rounded"
                        src="<?php echo URLROOT?>/uploads/<?php echo($yourEvents->image); ?>"
                        alt=""
                        style="max-width: 100%; height: 150px"
                      />
                      <div class="p-2">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2"><?= $yourEvents->title?></h2>
                          <a href="<?php echo URLROOT?>/event_management/viewEvent/<?= $yourEvents->id?>">
                          <button class="btn rounded-pill">View</button>
                          </a>
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
                              <span class="remaining-rewards"><?= date("F d, Y h:i A", strtotime($yourEvents->start)); ?>
                              </span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- end ng foreach -->
                  <?php endforeach; } ?>
                  
                </div>
              </div>

              <div class="row">
                <h2 class="mb-5 mt-5">Participated Events</h2>
                <div
                  class="row d-flex justify-content-around align-items-center"
                >

                <!-- Start ng Foreach -->
                <?php 
                if (!empty($data['participatedEvents'])) {
                  foreach ($data['participatedEvents'] as $participatedEvents) :
                ?>
                  <div class="col-md-6 mt-2 mb-2">
                    <div
                      class="card rounded"
                      style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                    >
                      <img
                        class="rounded"
                        src="<?php echo URLROOT?>/uploads/<?php echo($participatedEvents->image); ?>"
                        alt=""
                        style="max-width: 100%; height: 150px"
                      />
                      <div class="p-2">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2"><?= $participatedEvents->title?></h2>
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
                              <span class="remaining-rewards"><?= date("F d, Y h:i A", strtotime($participatedEvents->start)); ?></span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; } ?>
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
              <?php 
                if (!empty($data['upcomingEvents'])) {
                  foreach ($data['upcomingEvents'] as $upcomingEvents) :
                ?>
                <div
                  class="card rounded"
                  style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
                >
                  <img
                    class="rounded"
                    src="<?php echo URLROOT?>/uploads/<?php echo($upcomingEvents->image); ?>"
                    alt=""
                    style="max-width: 100%; height: 150px"
                  />
                  <div class="p-2">
                  <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h2 class="mt-2"><?= $upcomingEvents->title?></h2>
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
                              <span class="remaining-rewards"><?= date("F d, Y h:i A", strtotime($upcomingEvents->start)); ?></span></strong
                            >
                          </p>
                        </div>
                  </div>
                </div>
                <?php endforeach; } ?>
              <!-- start ng foreach -->

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


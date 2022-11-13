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

      .descriptions{
        font-size: 16px;
      }
    </style>
   <main class="alumni forum">
      <div class="container bg-light p-5">
        <div id="calendar"></div>
      </div>

  
    </main>
  
    <div class="modal fade" id="structureModal" tabindex="-1" role="dialog" aria-labelledby="structureModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-frame" role="document" style="width: 600px; overflow-y: auto">
        <form action="" class="form-new">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="baseUrl" value="<?php echo URLROOT?>">
                    <input type="hidden" id="user_id" value="<?php echo $_SESSION['id']?>">
                    <input type="hidden" id="event_id" value="">


                    <h3 class="modal-title" id="structureModalTitle">Event</h3>
                    <button type="button" class="btn-close" data-dismiss="modal" id="btn-close-modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row ">
                        <div class="col-md-12">
                          <img src="" alt="" id="event-image" style=" max-width: 100%">
                        </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-md-12 d-flex align-items-center" style="font-size: 14px; color: rgba(0,0,0,0.3)">
                        <p style="margin:0; font-size:inherit">Posted By:</p>
                        <span id="name" style="font-size:inherit; margin-left: 5px;">Test Title</span>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-md-12 d-flex align-items-center">
                        <h4 style=" font-size: 16px; margin:0">Title:</h4>
                        <span id="title" class="descriptions" style="margin-left: 5px;">Test Title</span>
                      </div>
                    </div>
                
                    <div class="row mt-3">
                      <div class="col-md-12 d-flex align-items-center">
                        <h4 style="width: 100px; font-size: 16px; margin:0">Start Date:</h4>
                        <span id="start-date" class="descriptions">Test Title</span>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-md-12 d-flex align-items-center">
                        <h4 style="width: 100px; font-size: 16px; margin:0">End Date:</h4>
                        <span id="end-date" class="descriptions">Test Title</span>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-md-12 d-flex align-items-center">
                        <h4 style="width: 60px; font-size: 16px; margin:0; align-self: start">Description:</h4>
                      
                      </div>
                    </div>

                    <div class="row mt-1">
                    <span id="description" class="descriptions" style="  text-indent: 75px; text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto numquam minima porro maxime sequi facere, incidunt nostrum, consequatur ratione harum atque explicabo non, assumenda accusamus dolorum ipsa rerum mollitia distinctio quibusdam est sed possimus. Facere odit nam, modi labore odio tenetur eos maxime! Ex nesciunt, fuga, officiis obcaecati rerum sunt voluptatum amet recusandae, ut voluptates ducimus eligendi hic tempora accusantium repellat libero voluptas aperiam quis temporibus dignissimos doloremque numquam quaerat inventore eum. Mollitia repellat dolores pariatur deleniti sit. Illum esse eligendi quaerat non voluptas quod soluta accusamus saepe tenetur pariatur magni eos natus deleniti dolore magnam quae, earum dolorem architecto.</span>
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date" class="form-label">Date</label>
                                <span id="title">Test Title</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount" class="form-label">Amount</label>
                                <input name="number" id="amount" class="form-control" required>
                            </div>
                        </div>

                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn-participate" id="btn-participate" class="btn btn-primary">Participate</button>&nbsp;
                </div>
            </div>
        </form>
    </div>
</div>

    <script
      src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"
      integrity="sha256-7PzqE1MyWa/IV5vZumk1CVO6OQbaJE4ns7vmxuUP/7g="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css"
      integrity="sha256-jLWPhwkAHq1rpueZOKALBno3eKP3m4IMB131kGhAlRQ="
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"
      integrity="sha256-h/8r72lsgOmbQuoZKT6x3MwmqPIBN9rgiD23Bzgd2n4="
      crossorigin="anonymous"
    ></script>
    <script>
      
    </script>

    <script src="<?= URLROOT?>/js/EventManagement/index.js"></script>

    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


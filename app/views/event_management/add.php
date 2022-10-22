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
        <div class="col-md-12 pb-5 pt-5">
          <form class="form" id="events-form">
            <div class="card p-5">
              <h2>Create your Event</h2>
              <hr />
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="eventType" class="form-label"
                        >Type of Event</label
                      >
                      <select type="input" class="form-control" id="eventType">
                        <option value=""></option>
                        <option value="1">Community</option>
                        <option value="2">Homecoming</option>
                        <option value="3">Custom</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="title" />
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description" class="form-label"
                        >Description</label
                      >
                      <input class="form-control" id="description" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dateOfEvent" class="form-label"
                        >Date and Time of Event</label
                      >
                      <input
                        type="text"
                        id="dateOfEvent"
                        name="datetimes"
                        class="form-control"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mt-5">
                    <div class="form-group d-flex justify-content-center">
                      <!-- <img src="..." alt="Responsive image" /> -->

                      <div class="col-md-8">
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                Upload Image <input type="file" id="imgInp" />
                              </span>
                            </span>
                            <!-- <input type="text" class="form-control" readonly /> -->
                          </div>
                          <img id="img-upload" class="img-fluid" style="max-height: 350px" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mt-5">
                    <div class="btn-con d-flex justify-content-center">
                      <button class="btn btn-secondary">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
    <script>
        $(function () {
        function formatDate(d) {
            //get the month
            var month = d.getMonth();
            //get the day
            //convert day to string
            var day = d.getDate().toString().padStart(2, "0");
            //get the year
            var year = d.getFullYear();

            //pull the last two digits of the year
            year = year.toString().substr(-2);

            //increment month by 1 since it is 0 indexed
            //converts month to a string
            month = (month + 1).toString().padStart(2, "0");

            //return the string "MMddyy"
            return `${month}/${day}/${year}`;
        }

        var d = new Date();
        const currentDate = formatDate(d);
        var date = new Date();
        date.setDate(date.getDate() + 7);
        var newStartDate = new Date();
        newStartDate.setDate(newStartDate.getDate() + 8);

        const startDate = newStartDate.toLocaleDateString("en-US", {
            year: "numeric",
            month: "numeric",
            day: "numeric",
        });


   
        const next7Days = date.toLocaleDateString("en-US", {
            year: "numeric",
            month: "numeric",
            day: "numeric",
        });

        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            startDate: startDate,
            endDate: startDate,
            locale: {
            format: "MM/DD/YY hh:mm A",
            },
            isInvalidDate: function (date) {
            if (
                date.format("MM/DD/YY") < currentDate ||
                (date.format("MM/DD/YY") > currentDate &&
                date.format("MM/DD/YY") <= next7Days) || date.format("MM/DD/YY") === currentDate
            ) {
                return true;
            }
            },
        });
        });

    </script>
    <script src="<?= URLROOT?>/js/EventManagement/addEvent.js"></script>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


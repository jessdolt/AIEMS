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
              <h2>Your Event</h2>
              <hr />
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="eventType" class="form-label"
                        >Type of Event</label
                      >
                      <select type="input" class="form-control" id="eventType" disabled>
                        <option value=""></option>
                        <option value="1" <?= ($data->type == 1) ? "selected" : ''?>>Community</option>
                        <option value="2" <?= ($data->type == 2) ? "selected" : ''?>>Homecoming</option>
                        <option value="3" <?= ($data->type == 3) ? "selected" : ''?>>Custom</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="title" value="<?= $data->title?>" disabled/>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description" class="form-label"
                        >Description</label
                      >
                      <input class="form-control" id="description" value="<?= $data->description?>" disabled/>
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
                        value="<?= $data->start.' - '.$data->end?>"
                        disabled
                      />

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="location" class="form-label">Location / Venue</label>
                      <input type="text" class="form-control" id="location" value="<?= $data->location?>" disabled/>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12 mt-5">
                    <div class="form-group d-flex justify-content-center">
                      <!-- <img src="..." alt="Responsive image" /> -->

                      <div class="col-md-8">
                        <div class="form-group">
                          <img id="img-upload" style = "max-height: 350px" src="<?= URLROOT?>/uploads/<?= ($data->image); ?>" class="img-fluid" />

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mt-5">
                    <div class="btn-con d-flex justify-content-center">
                      <button type="button" id="btnDelete" class="btn btn-secondary" data-id="<?php echo $data->id ?>">Delete</button>
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
  window.onload = () => {
  btnDeleteHandler();
};
// <button class="btn rounded-pill text-white" data-id="" id="btnDelete">D</button>
const btnDeleteHandler = () => {
  const btnDelete = document.querySelectorAll("#btnDelete");

  btnDelete.forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.getAttribute("data-id");

      swal({
        title: "Delete",
        text: "Do you want to delete this event?",
        icon: "warning",
        buttons: ["Cancel", "Confirm"],
        dangerMode: true,
      }).then((isConfirm) => {
        isConfirm && deleteData(id);
      });
    });
  });
};

const deleteData = (id) => {
  $.ajax({
    type: "POST",
    url: `/aiems/event_management/userDeleteEvent/${id}`,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Deleted Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/pages/alumniEvent`);
          }
        );
      } else {
        swal("Error", `${response.message}`, "error");
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

</script>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


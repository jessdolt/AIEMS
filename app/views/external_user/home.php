<?php require APPROOT . '/views/external_user/inc/header.php';?>

<main
      class="container container-fluid py-5"
      style="height: 80vh !important"
    >
      <div class="col-md-12 h-100">
        <!-- IF ELSE FOR RENDERING HOME -->
        <?php if(empty($data)) {?>
        <div
          class="h-100 d-flex flex-column justify-content-center align-items-center"
        >
          <h1
            style="
              font-size: 100px;
              text-align: center;
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial,
                sans-serif;
            "
          >
            Start your Promos and Advertisement now!
          </h1>
          <a class="btn btn-secondary btn-lg mt-5" href="<?= URLROOT.'/advertiser/create'?>">Add Promos</a>
        </div>

        <?php 
        } 
          if (!empty($data)) :
        ?>

          <h3>Your Promos and Advertisement</h3>
        <hr />
        
        <div
          class="d-flex flex-column justify-content-between"
          style="height: 100%"
          >
          <!-- START NG FOREACH -->
          <?php foreach($data as $yourAdvertisement) : ?>
          <div class="row">
            
            <div class="col-md-4 mt-2 mb-2">
              <div
                class="card rounded"
                style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
              >
                <img
                  class="rounded"
                  src="<?php echo URLROOT?>/uploads/<?php echo($yourAdvertisement->image); ?>"
                  alt=""
                  style="max-width: 100%; height: 150px"
                />
                <div class="p-2">
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <h5 class="mt-2"><?php echo($yourAdvertisement->title); ?></h5>
                    <button class="btn rounded-pill btn-secondary">Delete</button>
                  </div>
                  <div class="d-flex justify-content-center align-items-center">
                    <p
                      class="m-0 mt-2 text-sm"
                      style="font-size: 16px; font-weight: 350"
                    >
                      <?php if($yourAdvertisement->is_approved == 1 && $yourAdvertisement->expiry_time >= date("Y/m/d")): ?>
                      Remaining Time Left: <?= $yourAdvertisement->remainingTime?>
                      <?php elseif($yourAdvertisement->is_approved == 2): ?>
                      Your promo has been rejected by the Admin.
                      <?php elseif($yourAdvertisement->is_approved == 0): ?>
                      Your promo is not yet approved by the Admin.
                      <?php elseif ($yourAdvertisement->expiry_time <= date("Y/m/d")) : ?>
                      Your promo has passed its duration.
                      <?php endif;?>
                    </p>
                    

                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
          </div>
          <?php endforeach; ?>
          <div class="row">
            <nav
              aria-label="Page navigation example"
              class="d-flex justify-content-center"
            >
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <?php endif; ?>
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
        text: "Do you want to delete this promo?",
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
    url: `/aiems/promos_advertisement/userDeletePromo/${id}`,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Deleted Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/pages/promos`);
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
<?php require APPROOT . '/views/external_user/inc/footer.php';?>

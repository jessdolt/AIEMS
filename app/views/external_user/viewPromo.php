<?php require APPROOT . '/views/external_user/inc/header.php';?>
<?php 

$codes = $data['codes'];
$data = $data['promo'];

?>
<main
      class="container container-fluid py-5"
      style="height: 80vh !important"
    >
      <div class="col-md-12 pb-5">
        <form class="form" id="promos-form">
          <div class="card p-5">
            <h2>Your Advertisement</h2>
            <hr />
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <input id="promoId" type="hidden" value="<?php echo $data->promoid?>"/>
                        <label for="adsType" class="form-label"
                          >Type of Advertisement</label
                        >
                        <select type="input" class="form-control" id="adsType" disabled>
                          <option value=""></option>
                          <option value="1" <?php echo ($data->type == 1) ? 'selected' : ''; ?>>Promos</option>
                          <option value="2" <?php echo ($data->type == 2) ? 'selected' : ''; ?>>Discount/Voucher</option>
                          <option value="3" <?php echo ($data->type == 3) ? 'selected' : ''; ?>>Gift Certificates</option>
                          <option value="4" <?php echo ($data->type == 4) ? 'selected' : ''; ?>>Plain Advertisement</option>
                        </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" value="<?php echo $data->title; ?>" readonly/>
                  </div>
                </div>
              </div>

              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description" class="form-label"
                          >Description</label
                        >
                        <textarea class="form-control" rows="3" id="description" readonly><?php echo $data->title; ?></textarea>
                      </div>
                    </div>
                  </div>

              <div class="row">
                    <div class="col-md-12 mt-5">
                      <div class="form-group d-flex justify-content-center">
                        <div
                          class="imageInputContainer_site"
                          style="max-width: 100rem !important"
                        >
                          <img id="myImg" src="<?php echo URLROOT?>/uploads/<?php echo $data->image?>"/>
                        </div>
                      </div>
                    </div>
                  </div>

              <div class="row mt-5">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dateOfAds" class="form-label"
                          >Date of Advertisement</label
                        >
                        <input
                          type="date"
                          class="form-control"
                          id="dateOfAds" value="<?php echo $data->date; ?>" readonly
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="quantity" class="form-label"
                          >Reedemable Quantity</label
                        >
                        <input type="text" class="form-control" id="quantity" value="<?php echo $data->quantity; ?>" readonly/>
                      </div>
                    </div>
                  </div>

              <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="referenceCode" class="form-label"
                          >Reference Code
                         </label>
                         <?php foreach($codes as $code) :  ?>
                          <?php 
                            $isRedeemed = $code->quantity === $code->used_quantity;
                           ?> 

                        <input
                          type="input"
                          class="form-control references <?php echo $isRedeemed ? 'border-success' : ''?> "
                          id="referenceCode" required
                          value="<?= $code->code?>"
                          style="margin-bottom: 10px"
                         <?php 
                          echo $isRedeemed ? "disabled = true" : 'readonly'
                         ?>

                        />

                        <?php endforeach;?>
                      </div>
                    </div>
                  </div>

              <div id="reference-add"></div>

              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="duration" class="form-label"
                      >Duration of Advertisement
                    </label>
                    <select type="input" class="form-control" id="duration" disabled>
                      <option value=""></option>
                      <option value="1 Day" <?php echo ($data->duration == "1 Day") ? 'selected' : ''; ?>>1 Day</option>
                      <option value="2 Days" <?php echo ($data->duration == "2 Days") ? 'selected' : ''; ?>>2 Days</option>
                      <option value="3 Days" <?php echo ($data->duration == "3 Days") ? 'selected' : ''; ?>>3 Days</option>
                      <option value="5 Days" <?php echo ($data->duration == "5 Days") ? 'selected' : ''; ?>>5 Days</option>
                      <option value="1 Week" <?php echo ($data->duration == "1 Week") ? 'selected' : ''; ?>>1 Week</option>
                      <option value="2 Weeks" <?php echo ($data->duration == "2 Weeks") ? 'selected' : ''; ?>>2 Weeks</option>
                      <option value="1 Month" <?php echo ($data->duration == "1 Month") ? 'selected' : ''; ?>>1 Month</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="payment" class="form-label"
                      >Payment of Advertisement
                    </label>
                    <input
                      type="input"
                      class="form-control"
                      id="payment"
                      value="₱ <?php echo $data->payment ?>"
                      disabled
                    />
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gCashRefNumber" class="form-label"
                      >G-Cash Reference Number: (payment to
                      <span id="gcashNumber">09794823420</span>)
                    </label>
                    <input type="input" class="form-control" id="gCashRefNumber" value="<?php echo $data->gCashRefNumber ?>" readonly/>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 mt-5">
                  <div class="btn-con d-flex justify-content-center">
                    <button
                      class="btn"
                      id="btnDelete"
                      style="background-color: salmon"
                      type="button"
                      data-id="<?php echo $data->promoid ?>"
                    >
                      Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
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
            window.location.replace(`/aiems/advertiser`);
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


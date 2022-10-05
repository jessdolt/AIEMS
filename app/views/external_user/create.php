<?php require APPROOT . '/views/external_user/inc/header.php';?>

<main
      class="container container-fluid py-5"
      style="height: 80vh !important"
    >
      <div class="col-md-12 pb-5">
        <form class="form" id="promos-form">
          <div class="card p-5">
            <h2>Create your Advertisement</h2>
            <hr />
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="adsType" class="form-label"
                      >Type of Advertisement</label
                    >
                    <select type="input" class="form-control" id="adsType">
                      <option value=""></option>
                      <option value="1">Promos</option>
                      <option value="2">Discount/Voucher</option>
                      <option value="3">Gift Certificates</option>
                      <option value="4">Plain Advertisement</option>
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

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" rows="3" id="description"></textarea>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="form-group">
                      <img
                        src=" "
                        class="img-thumbnail rounded"
                        style="width: 800px; height: 300px"
                        id="myImg"
                      />
                      <input type="file" class="d-none" id="voucher-image" />
                    </div>
                    <button type="button" class="btn btn-secondary">
                        <label for="voucher-image" class="form-label m-0"
                          >Upload Logo</label
                        >
                      </button>
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
                    <input type="date" class="form-control" id="dateOfAds" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="quantity" class="form-label"
                      >Reedemable Quantity</label
                    >
                    <input type="text" class="form-control" id="quantity" />
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="referenceCode" class="form-label"
                      >Reference Code
                      <span id="btn-add-ref"
                        ><i class="fa-solid fa-plus"></i></span
                    ></label>
                    <input type="input" class="form-control references" id="referenceCode" />
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
                    <select type="input" class="form-control" id="duration">
                      <option value=""></option>
                      <option value="1 Day">1 Day</option>
                      <option value="2 Days">2 Days</option>
                      <option value="3 Days">3 Days</option>
                      <option value="5 Days">5 Days</option>
                      <option value="1 Week">1 Week</option>
                      <option value="2 Weeks">2 Weeks</option>
                      <option value="1 Month">1 Month</option>
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
                    <input type="input" class="form-control" id="gCashRefNumber" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mt-5">
                  <div class="btn-con d-flex justify-content-center">
                    <button
                      class="btn btn-primary"
              
                    >
                      Save Changes
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <script src="<?= URLROOT?>/js/Advertiser/Create.js"></script>

<?php require APPROOT . '/views/external_user/inc/footer.php';?>


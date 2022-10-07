<?php require APPROOT . '/views/external_user/inc/header.php';?>

<main
      class="container container-fluid py-5"
      style="height: 80vh !important; font-size: 90%"
    >
      <div class="col-md-12 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-8">
            <div class="card p-3 shadow">
              <div class="card-body">
                <div class="d-flex align-items-center" style="gap: 20px">
                  <h3>Account Settings</h3>
                </div>
                <hr />

                <form action="" id="account-form">
                  <!-- ID PAL DITO  -->
                  <input type="hidden" id="id" value="<?= $_SESSION['id']?>">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="name" class="form-label"
                          >Name of Advertiser</label
                        >
                        <input type="text" class="form-control" id="name" value="<?= $data->name?>" />
                      </div>
                    </div>
                    
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6 ">
                      <div class="form-group">
                        <label for="email" class="form-label"
                          >Email</label
                        >
                        <input type="text" class="form-control" id="email" value="<?= $data->email?>" />
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="mobileNumber" class="form-label"
                            >Mobile Number</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="mobileNumber"
                            value="<?= $data->contact_no?>"
                          />
                        </div>
                      </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="<?= $data->address?>"/>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                      <div class="form-group">
                        <img
                          src="<?php echo URLROOT?>/uploads/<?php echo($data->image); ?>"
                          class="img-thumbnail rounded"
                          style="width: 200px; height: 200px"
                          id="logo_container"
                        />
                        <button type="button" class="btn btn-secondary">
                          <label for="logo_img" class="form-label m-0"
                            >Upload Logo</label
                          >
                        </button>
                        <input type="file" class="d-none" id="logo_img" value="<?php echo($data->image); ?>"/>
                      </div>
                    </div>
                    </div>
                  </div>

            
                  </div>

                  <div class="row mt-5">
                    <div class="col-md-12">
                      <div class="d-flex justify-content-center">
                        <button
                          class="btn btn-warning"
                          style="display: block"
                          type="submit"
                        >
                          Update
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<script src="<?= URLROOT?>/js/Advertiser/AccountSettings.js"></script>
<?php require APPROOT . '/views/external_user/inc/footer.php';?>

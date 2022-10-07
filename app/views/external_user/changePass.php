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
                  <h3>Change Password</h3>
                </div>
                <hr />

                <form action="" id="password-form">
                  <div class="row mt-3">
                    <div class="col-md-12">
                    <div
                      class="d-flex flex-column justify-content-center align-items-center"
                    >
                    <!-- lagay value sa user_id ng id ng user pri -->
                      <input type="hidden" id="user_id" value="<?= $_SESSION['id']?>">
                      <div class="col-md-7 mt-3">
                        <div class="form-group">
                          <label for="currentPassword" class="form-label"
                            >Current Password</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="currentPassword"
                          />

                        </div>
                      </div>
                      <div class="col-md-7 mt-3">
                        <div class="form-group">
                          <label for="password" class="form-label"
                            >New Password</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="password"
                          />
                          <span id="error-password" class="text-danger d-none">Password must be at least 6 characters or above.</span>


                        </div>
                      </div>
                      <div class="col-md-7 mt-3">
                        <div class="form-group">
                          <label for="confirmPassword" class="form-label"
                            >Confirm New Password</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="confirmPassword"
                          />
                        <span id="error-confirmPassword" class="text-danger d-none">Password does not match.</span>

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
                          id="btn-save"
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

<script src="<?= URLROOT?>/js/Advertiser/ChangePassword.js"></script>

<?php require APPROOT . '/views/external_user/inc/footer.php';?>

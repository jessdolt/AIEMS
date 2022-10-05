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

                <form action="">
                  <div class="row mt-3">
                    <div class="col-md-12">
                    <div
                      class="d-flex flex-column justify-content-center align-items-center"
                    >
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
<?php require APPROOT . '/views/external_user/inc/footer.php';?>

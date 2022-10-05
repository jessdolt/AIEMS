
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PUPIAIS</title>
    <script src="index.js" defer></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      body {
        font-size: 16px;
      }
    </style>
  </head>
  <body>
<main
      class="container container-fluid py-5"
      style="height: 80vh !important"
    >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12">
          <div class="card p-3 shadow">
            <div class="card-body">
              <div class="d-flex align-items-center" style="gap: 20px">
                <a href="<?= URLROOT.'/users/login'?> "><i class="fa-solid fa-arrow-left-long"></i></a>
                <h3>Sign Up</h3>
              </div>

              <hr />

              <form action="">
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="name" class="form-label"
                        >Name of Advertiser</label
                      >
                      <input type="text" class="form-control" id="name" />
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="mobileNumber" class="form-label"
                        >Mobile Number</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="mobileNumber"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" />
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                  <div class="d-flex justify-content-center">
                    <div class="form-group">
                      <img
                        src=" "
                        class="img-thumbnail rounded"
                        style="width: 200px; height: 200px"
                      />
                      <button type="button" class="btn btn-secondary">
                        <label for="logo" class="form-label m-0"
                          >Upload Logo</label
                        >
                      </button>
                      <input type="file" class="d-none" id="logo" />
                    </div>
                  </div>
                  </div>
                  
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                  <div
                    class="d-flex flex-column justify-content-center align-items-center"
                  >
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" />
                      </div>
                    </div>
                    <div class="col-md-7 mt-3">
                      <div class="form-group">
                        <label for="password" class="form-label"
                          >Password</label
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
                          >Confirm Password</label
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
                        class="btn btn-primary"
                        style="display: block"
                        type="submit"
                      >
                        Sign Up
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php require APPROOT . '/views/external_user/inc/footer.php';?>


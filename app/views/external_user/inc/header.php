<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PUPIAIS</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
        .btn-file {
          position: relative;
          overflow: hidden;
        }
        .btn-file input[type="file"] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          outline: none;
          background: white;
          cursor: inherit;
          display: block;
        }

        #img-upload {
          width: 100%;
        }
        #btn-add-ref {
              padding: 10px;
              margin-left: 10px;
              margin-bottom: 5px;
              cursor: pointer;
              border-radius: 50%;
              transition: all 0.5s ease;
              box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.062);
          }
          #btn-add-ref:hover i {
              transform: scale(1.3);
          }
    </style>

   
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light h-25 p-4">
      <a class="navbar-brand" href="#" style="font-size: 28px">
        PUP
        <span
          style="
            font-size: 11px;
            font-weight: 700;
            color: red;
            margin-left: -10px;
          "
          >Advertisement</span
        ></a
      >

      <div
        class="collapse navbar-collapse d-flex justify-content-between align-items-center"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link font-weight-normal" href="<?= URLROOT.'/advertiser/home'?>">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link font-weight-normal" href="<?= URLROOT.'/advertiser/create'?>">Create </a>
          </li>
        </ul>

        <div class="d-flex align-items-center justify-content-between">
          <div
            class="d-flex align-items-center justify-content-between"
            style="gap: 20px"
          >
            <h6>Welcome, Jess</h6>

            <div class="dropdown show">
              <img
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                class="rounded-circle"
                style="width: 45px; height: 45px; margin-right: 20px"
                alt="Avatar"
              />

              <div
                class="dropdown-menu"
                aria-labelledby="dropdownMenuLink"
                style="margin-left: -120px"
              >
                <a class="dropdown-item" href="<?= URLROOT.'/advertiser/accountSettings'?>">Account Settings</a>
                <a class="dropdown-item" href="<?= URLROOT.'/advertiser/changePassword'?>">Change Password</a>
                <a class="dropdown-item" href="<?= URLROOT.'/advertiser/logout'?>">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
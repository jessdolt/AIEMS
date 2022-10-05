<?php require APPROOT . '/views/external_user/inc/header.php';?>

<main
      class="container container-fluid py-5"
      style="height: 80vh !important"
    >
      <div class="col-md-12 h-100">
        <!-- IF ELSE FOR RENDERING HOME -->
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
        <!--  
          <h3>Your Promos and Advertisement</h3>
        <hr />
        <div
          class="d-flex flex-column justify-content-between"
          style="height: 100%"
        >
        START NG FOREACH
          <div class="row">
            <div class="col-md-4 mt-2 mb-2">
              <div
                class="card rounded"
                style="background-color: rgba(0, 0, 0, 0.062); padding: 0"
              >
                <img
                  class="rounded"
                  src="./images/voucher.jpg"
                  alt=""
                  style="max-width: 100%; height: 150px"
                />
                <div class="p-2">
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <h5 class="mt-2">Reward No. 1</h5>
                    <button class="btn rounded-pill btn-secondary">View</button>
                  </div>
                  <div class="d-flex justify-content-center align-items-center">
                    <p
                      class="m-0 mt-2 text-sm"
                      style="font-size: 16px; font-weight: 350"
                    >
                      Remaining Time Left: 24:03:01
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
        </div> -->
      </div>
    </main>

<?php require APPROOT . '/views/external_user/inc/footer.php';?>

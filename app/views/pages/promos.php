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
        box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.062);
      }
      #btn-add-ref:hover i {
        transform: scale(1.3);
      }

      .btn {
        font-size: 14px;
        padding: 15px;
      }
    </style>
    <main class="alumni forum">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mt-5 mb-5">
            <div class="card p-5">
              <h3>Promos and Advertisement</h3>
              <hr />

              <div class="row">
               <div class="d-flex justify-content-between align-items-center">
                 <h3>Promos and Advertisement</h3>
                <a class="btn btn-secondary" href="">Add</a>
               </div>
                  <div class="col-md-6 mt-2 mb-2">
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
                          <h2 class="mt-2">Reward No. 1</h2>
                          <button class="btn rounded-pill">Send Email</button>
                        </div>
                        <div
                          class="d-flex justify-content-end align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong>Collected</strong>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-2 mb-2">
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
                          <h2 class="mt-2">Reward No. 2</h2>
                          <button class="btn rounded-pill">Send Email</button>
                        </div>
                        <div
                          class="d-flex justify-content-end align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong>Collected</strong>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <h2 class="mb-5 mt-5">Your Advertisement</h2>
                <div
                  class="row d-flex justify-content-around align-items-center"
                >
                  <div class="col-md-6 mt-2 mb-2">
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
                          <h2 class="mt-2">Reward No. 2</h2>
                          <button class="btn rounded-pill">Edit</button>
                        </div>
                        <div
                          class="d-flex justify-content-center align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong
                              >Remaining Rewards:
                              <span class="remaining-rewards">19</span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-2 mb-2">
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
                          <h2 class="mt-2">Reward No. 2</h2>
                          <button class="btn rounded-pill">Edit</button>
                        </div>
                        <div
                          class="d-flex justify-content-center align-items-center"
                        >
                          <p
                            style="
                              margin: 0;
                              margin-right: 10px;
                              margin-top: 10px;
                            "
                          >
                            <strong
                              >Remaining Rewards:
                              <span class="remaining-rewards">19</span></strong
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-5 mb-5">
            <div class="card p-5">
              <h3>Unclaimed Rewards</h3>
              <hr />
              <div class="row d-flex" style="gap: 20px">
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
                    <h2 class="mt-2">Reward No. 1</h2>
                    <div class="d-flex justify-content-end align-items-center">
                      <p style="margin: 0; margin-right: 10px">10.00 AC</p>
                      <button class="btn rounded-pill">Redeem</button>
                    </div>
                  </div>
                </div>

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
                    <h2 class="mt-2">Reward No. 1</h2>
                    <div class="d-flex justify-content-end align-items-center">
                      <p style="margin: 0; margin-right: 10px">10.00 AC</p>
                      <button class="btn rounded-pill">Redeem</button>
                    </div>
                  </div>
                </div>

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
                    <h2 class="mt-2">Reward No. 1</h2>
                    <div class="d-flex justify-content-end align-items-center">
                      <p style="margin: 0; margin-right: 10px">10.00 AC</p>
                      <button class="btn rounded-pill">Redeem</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


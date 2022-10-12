<?php require APPROOT . '/views/inc/header_new.php'; ?>

<main class="alumni forum">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5 mb-5">
            <form id="promos-form">
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
                        <select type="input" class="form-control" id="adsType" required>
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
                        <input type="text" class="form-control" id="title" required/>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description" class="form-label"
                          >Description</label
                        >
                        <textarea class="form-control" rows="3" id="description"></textarea>
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
                          <img id="myImg"/>
                          <label for="voucher-image" class="fileUploadBtn">
                            Upload Reward Image
                            <svg
                              viewBox="0 0 18 18"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M14.2411 2.00903L16.4911 4.25903L14.7759 5.97503L12.5259 3.72503L14.2411 2.00903Z"
                                fill="white"
                              />
                              <path
                                d="M6 12.4999H8.25L13.7153 7.03467L11.4652 4.78467L6 10.2499V12.4999Z"
                                fill="white"
                              />
                              <path
                                d="M14.25 14.75H6.1185C6.099 14.75 6.07875 14.7575 6.05925 14.7575C6.0345 14.7575 6.00975 14.7507 5.98425 14.75H3.75V4.25H8.88525L10.3853 2.75H3.75C2.92275 2.75 2.25 3.422 2.25 4.25V14.75C2.25 15.578 2.92275 16.25 3.75 16.25H14.25C14.6478 16.25 15.0294 16.092 15.3107 15.8107C15.592 15.5294 15.75 15.1478 15.75 14.75V8.249L14.25 9.749V14.75Z"
                                fill="white"
                              />
                            </svg>
                          </label>
                          <input
                            type="file"
                            name="newsImageInput"
                            id="voucher-image"
                            accept=".jpg, .png"
                            required
                          />
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
                          id="dateOfAds"
                          required
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="quantity" class="form-label"
                          >Reedemable Quantity</label
                        >
                        <input type="text" class="form-control" id="quantity" required/>
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
                        <input
                          type="input"
                          class="form-control references"
                          id="referenceCode" required
                        />
                      </div>
                    </div>
                  </div>

                  <div id="reference-add"></div>

                  <div class="row">
                    <div class="col-md-12 mt-5">
                      <div class="btn-con d-flex justify-content-center">
                        <button
                          class="btn"
                        
                          style="background-color: salmon"
                          type="submit"
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
        </div>
      </div>
    </main>
    <script src="<?= URLROOT?>/js/PromosAdvertisement/PromosAdvertisement.js"></script>

    <?php require APPROOT . '/views/inc/footer_u.php'; ?>


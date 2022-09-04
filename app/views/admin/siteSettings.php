<?php require APPROOT . '/views/inc/header_adminManage.php';?>

      <div class="main">
        <main class="admin managePage">
          <!-- remove cont-creator to access all-->
          <section class="siteSettings">
            <div class="header-con">
              <h1>Site Settings</h1>
              <span>Update your system information</span>
            </div>
            <form id="site-settings-form">
              <input type="hidden" value="<?php echo $data->id?>" id="site_id">
              <div>
                <label for="school_name" class="outsideLabel"
                  >University Name:</label
                >
                <div class="textFieldContainer">
                  <input
                    type="text"
                    name="school_name"
                    id="school_name"
                    value="<?php echo $data->schoolname?>"
                    required
                  />
                  <span class="error"></span>
                </div>
              </div>
              <div>
                <label for="school_name" class="outsideLabel"
                  >School Logo:</label
                >
                <div class="imageInputContainer_site">
                  <img src="<?php echo URLROOT?>/uploads/<?php echo $data->logo?>" id="logo_container"/>
                  <label for="logo_img" class="fileUploadBtn">
                    Upload
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
                    id="logo_img"
                    accept=".jpg, .png"
                  />
                </div>
              </div>
              <div>
                <label for="school_name" class="outsideLabel"
                  >Hero Image:</label
                >
                <div
                  class="imageInputContainer_site"
                  style="max-width: 100rem !important"
                >
                  <img src="<?php echo URLROOT?>/uploads/<?php echo $data->heroimage?>" id="hero_container"/>
                  <label for="hero_img" class="fileUploadBtn">
                    Upload
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
                    id="hero_img"
                    
                    accept=".jpg, .png"
                  />
                </div>
              </div>
              <div>
                <label
                  for="school_color"
                  class="outsideLabel"
                  style="margin-bottom: 5px; display: block"
                  ><strong>System Color</strong></label
                >
                <div class="inputColor">
                  <label for="primaryColor">Primary Color: </label>
                  <input
                    type="color"
                    name="primaryColor"
                    id="primaryColor"
                    value="<?php echo $data->sitecolor?>"
                    required
                  />
                  <span class="error"></span>
                </div>
                <div class="inputColor">
                  <label for="secondaryColor">Secondary Color: </label>
                  <input
                    type="color"
                    name="secondaryColor"
                    id="secondaryColor"
                    value="<?php echo $data->sitecolor_secondary?>"
                    required
                  />
                  <span class="error"></span>
                </div>
              </div>
         
            <div class="btn-con">
              <button class="changePass">
                Save Changes
              </button>
            </div>
            </form>
          </section>
        </main>
      </div>
    </div>
    <div class="alertModalContainer">
      <!-- this inline -->
      <div class="alertModal deleteAlert">
        <svg></svg>
        <h2>Are you sure?</h2>
        <p>This will delete the selected data and cannot be undone!</p>
        <div>
          <button class="cancelBtn">Cancel</button>
          <a class="modalDeleteInline" href="#">Delete</a>
        </div>
      </div>
    </div>

<script src="<?= URLROOT?>/js/SiteConfig/siteSettings.js"></script>

<?php require APPROOT . '/views/inc/footer_adminManage.php';?>

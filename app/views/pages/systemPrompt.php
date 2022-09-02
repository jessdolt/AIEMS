<?php require APPROOT . '/views/inc/header_login.php'; ?>

    <main class="systemPrompt">
      <div>
        <header>
          <h1>Start Setting Up Your System</h1>
          <div></div>
          <span> Alumni Information Event Management Sytem </span>
        </header>

        <form action="" class="form">
          <div class="imageInputContainer_new">
            <img />
            <label for="news-image-input" class="fileUploadBtn">
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
              id="news-image-input"
              accept=".jpg, .png"
            />
          </div>

          <div class="textFieldContainer">
            <input
              type="text"
              name="schoolname"
              id="user-schoolname"
              placeholder="University Name"
              required
              class="user-schoolname"
            />
            <label class="icon" for="user-schoolname">
              <svg
                version="1.1"
                id="Layer_1"
                xmlns="http://www.w3.org/2000/svg"
                height="24"
                width="24"
                viewBox="0 0 330.102 330.102"
                style="enable-background: new 0 0 330.102 330.102"
                xml:space="preserve"
              >
                <path
                  id="XMLID_506_"
                  d="M315,300.051h-15v-90h15.102c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15H285h-22v-45
	c0-8.284-6.716-15-15-15h-78.02v-30h55.039c8.284,0,15-6.716,15-15v-60c0-8.284-6.716-15-15-15H154.98c-8.284,0-15,6.716-15,15v60
	v45H82c-8.284,0-15,6.716-15,15v45H45H15.102c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15H30v90H15c-8.284,0-15,6.716-15,15
	c0,8.284,6.716,15,15,15h30h240h30c8.284,0,15-6.716,15-15C330,306.767,323.284,300.051,315,300.051z M210.02,60.051H169.98v-30
	h40.039V60.051z M97,150.051h136v30H97V150.051z M180,300.051v-15.007c0-8.284-6.716-15-15-15s-15,6.716-15,15v15.007H60v-90h22h166
	h22v90H180z"
                />
              </svg>
            </label>
            <span class="error"></span>
          </div>

          <button>Save</button>
        </form>
      </div>
    </main>
</body>
</html>

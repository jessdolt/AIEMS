window.onload = () => {
  init();
};

const init = () => {
  const form = document.getElementById("signup-form");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    validateData();
  });

  fileUploadHandler();
  eventHandlers();
};

const eventHandlers = () => {
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirmPassword");
  const errorPassword = document.getElementById("error-password");
  const errorConfirmPassword = document.getElementById("error-confirmPassword");

  const passwordValidateHandler = () => {
    password.addEventListener("blur", (e) => {
      if (e.target.value.length < 6) {
        password.classList.add("border-danger");
        errorPassword.classList.remove("d-none");
      } else {
        password.classList.remove("border-danger");
        errorPassword.classList.add("d-none");
      }
    });

    confirmPassword.addEventListener("blur", (e) => {
      if (!checkIfPassSame()) {
        confirmPassword.classList.add("border-danger");
        errorConfirmPassword.classList.remove("d-none");
      } else {
        confirmPassword.classList.remove("border-danger");
        errorConfirmPassword.classList.add("d-none");
      }
    });
  };

  const checkIfPassSame = () => password.value === confirmPassword.value;

  passwordValidateHandler();
};

const fileUploadHandler = () => {
  const logoImgRendered = () => {
    const reader = new FileReader();
    const logoFileUpload = document.getElementById("logo_img");
    const logo_box = document.getElementById("logo_container");

    logoFileUpload.addEventListener("change", function (event) {
      const files = event.target.files;
      const file = files[0];
      reader.readAsDataURL(file);
      reader.addEventListener("load", function (event) {
        logo_box.src = event.target.result;
        logo_box.alt = file.name;
      });

      logoFileUpload.removeAttribute("value");
    });
  };

  logoImgRendered();
};

const validateData = () => {
  const logo_img = document.getElementById("logo_img");
  const name = document.getElementById("name").value;
  const logoImage = logo_img.getAttribute("value")
    ? logo_img.getAttribute("value")
    : logo_img.files[0];
  const mobileNumber = document.getElementById("mobileNumber").value;
  const address = document.getElementById("address").value;
  const email = document.getElementById("email").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

  const data = {
    name: name,
    logo: logoImage,
    mobileNumber,
    address,
    email,
    confirmPassword,
  };

  console.log(data);

  var newFData = new FormData();
  newFData.append("name", data.name);
  newFData.append("logo", data.logo);
  newFData.append("mobileNumber", data.mobileNumber);
  newFData.append("address", data.address);
  newFData.append("email", data.email);
  newFData.append("password", data.confirmPassword);

  // console.log(newFData);

  if (data) {
    swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: ["Cancel", "Update"],
      dangerMode: true,
    }).then((isConfirm) => {
      isConfirm && addNewData(newFData, id);
    });
  }
  // resetForm();
};

const addNewData = (data) => {
  //URL NALANG DITO NIEL
  $.ajax({
    type: "POST",
    url: `/aiems/advertiser/HAKDOG`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("SignUp Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/advertiser/home`);
          }
        );
      } else {
        swal("Error", `${response.message}`, "error");
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

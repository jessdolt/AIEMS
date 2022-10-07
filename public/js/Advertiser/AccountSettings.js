window.onload = () => {
  init();
  // alert("qwe");
};

const init = () => {
  const form = document.getElementById("account-form");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    validateData();
  });

  fileUploadHandler();
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
  const id = document.getElementById("id").value;
  const logo_img = document.getElementById("logo_img");
  const name = document.getElementById("name").value;
  const logoImage = logo_img.getAttribute("value")
    ? logo_img.getAttribute("value")
    : logo_img.files[0];
  const mobileNumber = document.getElementById("mobileNumber").value;
  const address = document.getElementById("address").value;
  const email = document.getElementById("email").value;

  const data = {
    name: name,
    logo: logoImage,
    mobileNumber,
    address,
    email,
  };

  console.log(data);

  var newFData = new FormData();
  newFData.append("name", data.name);
  newFData.append("logo", data.logo);
  newFData.append("mobileNumber", data.mobileNumber);
  newFData.append("address", data.address);
  newFData.append("email", data.email);

  // console.log(newFData);

  if (data) {
    swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: ["Cancel", "Update"],
      dangerMode: true,
    }).then((isConfirm) => {
      isConfirm && updateData(newFData, id);
    });
  }
  // resetForm();
};

const updateData = (data, id) => {
  //URL NALANG DITO NIEL
  $.ajax({
    type: "POST",
    url: `/aiems/advertiser/editProfile/${id}`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Updated Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/advertiser/accountSettings`);
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

const init = () => {
  const form = document.getElementById("firstAdminForm");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });
};

const validateData = () => {
  const name = document.getElementById("user-name").value;
  const email = document.getElementById("user-email").value;
  const password = document.getElementById("user-password").value;
  const confirmPassword = document.getElementById("user-confirmPassword").value;
  const user_type = 1;

  if (password == confirmPassword) {
    const data = {
      name: name,
      email: email,
      password: password,
      user_type: user_type,
    };

    document.getElementById("passwordError").style.display = "none";
    document.getElementById("confirmPasswordError").style.display = "none";
    // var newFData = new FormData();
    // newFData.append("name", data.name);
    // newFData.append("email", data.email);
    // newFData.append("password", data.password);
    // newFData.append("user_type", data.user_type);

    if (data.name && data.email && data.password && data.user_type) {
      // console.log(data);
      // addNewData(newFData);
      swal({
        title: "Are you sure?",
        text: "This account will have the highest administrative privileges.",
        icon: "warning",
        buttons: ["Cancel", "Confirm"],
        dangerMode: false,
      }).then((isConfirm) => {
        isConfirm && addNewData(data);
      });
    }
  } else {
    document.getElementById("passwordError").style.display = "block";
    document.getElementById("confirmPasswordError").style.display = "block";
    // document.getElementById("passwordError").innerHTML = "Password does not match";
  }
};

const addNewData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/site_config/addAdmin`,
    data: JSON.stringify(data),
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Saved Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/users/login`);
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

init();

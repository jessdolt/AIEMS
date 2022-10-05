const init = () => {
  const form = document.getElementById("password-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });
  eventHandlers();
};

let isFormValid = false;
const disabledSave = () => {
  if (!isFormValid) {
    document.getElementById("btn-save").disabled = true;
    return;
  }

  document.getElementById("btn-save").disabled = false;
};
disabledSave();

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
        isFormValid = false;
        disabledSave();
      } else {
        password.classList.remove("border-danger");
        errorPassword.classList.add("d-none");
      }
    });

    confirmPassword.addEventListener("blur", (e) => {
      if (!checkIfPassSame()) {
        confirmPassword.classList.add("border-danger");
        errorConfirmPassword.classList.remove("d-none");
        isFormValid = false;
        disabledSave();
      } else {
        confirmPassword.classList.remove("border-danger");
        errorConfirmPassword.classList.add("d-none");
        isFormValid = true;
        disabledSave();
      }
    });
  };

  const checkIfPassSame = () => password.value === confirmPassword.value;

  passwordValidateHandler();
};

const validateData = () => {
  const newPassword = document.getElementById("confirmPassword");
  const user_id = document.getElementById("user_id");
  const data = {
    newPassword,
    id: user_id,
  };
  console.log(data);
  updatePassword(data);
};
const updatePassword = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/updatePassword/${data.id}`,
    data: data,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Updated Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/pages/promos`);
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

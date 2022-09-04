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
  
    // var newFData = new FormData();
    // newFData.append("name", data.name);
    // newFData.append("email", data.email);
    // newFData.append("password", data.password);
    // newFData.append("user_type", data.user_type);

    if (data.name && data.email && data.password && data.user_type) {
      // console.log(data);
      // addNewData(newFData);
      addNewData(data);

    }
    
  } else {
    document.getElementById('passwordError').innerHTML = "Password does not match";
    document.getElementById('confirmPasswordError').innerHTML = "Password does not match";
    // document.getElementById("passwordError").innerHTML = "Password does not match";
  }
};


const addNewData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/site_config/addAdmin`,
    data: JSON.stringify(data),
    // dataType: JSON,
    // cache: false,
    // contentType: false,
    // processData: false,
    // method: "POST",
    success: function (data) {
      // console.log(JSON.parse(data));
      console.log(data);
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

init();

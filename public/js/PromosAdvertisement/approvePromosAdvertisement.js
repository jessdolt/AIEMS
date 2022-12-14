const init = () => {
  const form = document.getElementById("promos-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });
};

const validateData = () => {
  const id = document.getElementById("promoId").value;
  const status = document.getElementById("status").value;
  const acAmount = document.getElementById("ac_amount").value;

  const data = {
    id: id,
    status: status,
    acAmount,
  };

  console.log(data);
  if (data.status == "1") {
    swal({
      title: "Approval",
      text: "Do you wish to approve this promo?",
      icon: "warning",
      buttons: ["Cancel", "Confirm"],
      dangerMode: true,
    }).then((isConfirm) => {
      isConfirm && updateData(data);
    });
  } else {
    swal({
      title: "Rejection",
      text: "Do you wish to reject this promo?",
      icon: "warning",
      buttons: ["Cancel", "Confirm"],
      dangerMode: true,
    }).then((isConfirm) => {
      isConfirm && updateData(data);
    });
  }
};

var showLoading = function () {
  swal({
    title: "Please Wait..",
    text: "Sending e-mail.", // add html attribute if you want or remove
    allowOutsideClick: false,
    allowEscapeKey: false,
    button: false,
    onBeforeOpen: () => {
      swal.showLoading();
    },
  });
};

const updateData = (data) => {
  $.ajax({
    type: "POST",
    data: JSON.stringify(data),
    url: `/aiems/promos_advertisement/actionViewPromo`,
    beforeSend: function () {
      showLoading();
    },
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal(
          "Updated and Sent Successfully",
          `${response.message}`,
          "success"
        ).then(() => {
          window.location.replace(`/aiems/admin/promos_advertisement`);
        });
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

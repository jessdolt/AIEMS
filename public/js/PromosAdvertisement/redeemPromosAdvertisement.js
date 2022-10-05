window.onload = () => {
  btnRedeemHandler();
};

const btnRedeemHandler = () => {
  const btnRedeem = document.querySelectorAll("#btnRedeem");
  btnRedeem.forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.getAttribute("data-id");
      swal({
        title: "Redeem",
        text: "Do you wish to redeem this promo?",
        icon: "info",
        buttons: ["Cancel", "Confirm"],
        dangerMode: true,
      }).then((isConfirm) => {
        isConfirm && updateData(id);
      });
    });
  });
};

const updateData = (id) => {
  // console.log("zxc");
  $.ajax({
    type: "POST",
    url: `/aiems/promos_advertisement/redeemReward/${id}`,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Redeemed Successfully", `${response.message}`, "success").then(
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

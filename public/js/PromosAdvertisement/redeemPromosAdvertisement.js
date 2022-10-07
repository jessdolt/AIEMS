window.onload = () => {
  btnRedeemHandler();
};

const btnRedeemHandler = () => {
  const btnRedeem = document.querySelectorAll("#btnRedeem");
  const alumniCoins = document
    .getElementById("ALUMNI_COINS")
    .textContent.replace("AC", "");
  btnRedeem.forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.getAttribute("data-id");
      const acAmount = this.getAttribute("data-ac");

      swal({
        title: "Redeem",
        text: "Do you wish to redeem this promo?",
        icon: "info",
        buttons: ["Cancel", "Confirm"],
        dangerMode: true,
      }).then((isConfirm) => {
        if (isConfirm) {
          const isValid = checkIfAcIsValid(alumniCoins, acAmount);
          if (isValid) updateData(id);
          else swal("Redeem Failed", `Alumni coins not sufficient`, "error");
        }
      });
    });
  });
};

const checkIfAcIsValid = (ac, amount) => {
  console.log(`${ac} Alumni Coins`);
  console.log(`${amount} Amount`);
  if (+ac < +amount) return false;
  return true;
};

//update ng ac sa alumni table pag goods
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

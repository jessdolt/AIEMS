window.onload = () => {
  const id = document.getElementById("user_id").value;
  $.ajax({
    url: `/aiems/pages/getLatestAc/${id}`,
    method: "POST",
    success: function (res) {
      if (res == 1) {
        console.log("Success");
      }
    },
    error: function (er) {
      console.log(er);
    },
  });
};

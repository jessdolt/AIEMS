window.onload = () => {
  // const id = 3;
  // $.ajax({
  //   type: "GET",
  //   url: `/aiems/example/testSingleEvent/${id}`,
  //   dataType: "JSON",
  //   success: function (data) {
  //     console.log(data.message);
  //     console.log(data.data);
  //   },
  //   error: function (xhr, status, error) {
  //     console.log(xhr);
  //     // document.getElementById("error-part").classList.remove("d-none");
  //   },
  // });
  const tid = 2;
  const testData = {
    title: "BAGONG EVENT NA v2s",
    description: "qwe",
    image: "1223847472.39.jpg",
    isUploaded: 1,
  };

  $.ajax({
    type: "POST",
    url: `/aiems/example/deleteTest/2`,

    dataType: "JSON",
    success: function (data) {
      console.log(data);
    },
    error: function (xhr, status, error) {
      console.error(error);
      // if (error) {
      //   resetForm();
      //   swal(status, error, "error");
      // }
    },
  });
};

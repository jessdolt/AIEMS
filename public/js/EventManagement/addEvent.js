const init = () => {
  const form = document.getElementById("events-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });

  fileUploadHandler();
};

const fileUploadHandler = () => {
  const fileUpload = document.getElementById("imgInp");
  const img_box = document.getElementById("img-upload");
  const reader = new FileReader();
  fileUpload.addEventListener("change", function (event) {
    const files = event.target.files;
    const file = files[0];
    reader.readAsDataURL(file);
    reader.addEventListener("load", function (event) {
      img_box.src = event.target.result;
      img_box.alt = file.name;
    });
  });
};

init();
const validateData = () => {
  const v_img = document.getElementById("imgInp");
  const voucherImage = v_img.getAttribute("value")
    ? v_img.getAttribute("value")
    : v_img.files[0];

  const type = document.getElementById("eventType").value;
  const title = document.getElementById("title").value;
  const description = document.getElementById("description").value;
  const location = document.getElementById("location").value;
  const date = document.getElementById("dateOfEvent").value;

  const newDate = date.split("-").map((d) => d.trim());

  const data = {
    type,
    title,
    description,
    date: newDate,
    location,
    voucherImage,
  };

  console.log(data);

  const newFData = new FormData();
  newFData.append("type", data.type);
  newFData.append("title", data.title);
  newFData.append("description", data.description);
  newFData.append("date", data.date);
  newFData.append("location", data.location);
  newFData.append("eventImage", data.voucherImage);

  swal({
    title: "Are you sure?",
    text: "",
    icon: "warning",
    buttons: ["Cancel", "Save"],
    dangerMode: true,
  }).then((isConfirm) => {
    isConfirm && addNewData(newFData);
  });
};

const addNewData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/event_management/addEvent`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Submitted Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/pages/alumniEvent`);
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

// console.log(wala lang)
// init();
// window.onload = () => {
//   const id = 7;
//   $.ajax({
//     type: "GET",
//     url: `/aiems/site_config/getSiteConfig/${id}`,
//     dataType: "JSON",
//     success: function (data) {
//       console.log(data.message);
//       console.log(data.data);
//     },
//     error: function (xhr, status, error) {
//       console.log(xhr);
//       // document.getElementById("error-part").classList.remove("d-none");
//     },
//   });
// };

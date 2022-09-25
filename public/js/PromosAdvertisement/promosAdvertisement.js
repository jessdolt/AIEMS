// const init = () => {
//   const form = document.getElementById("systemPromptForm");
//   form.addEventListener("submit", (e) => {
//     e.preventDefault();

//     validateData();
//   });

//   fileUploadHandler();
// };

// const fileUploadHandler = () => {
//   const fileUpload = document.getElementById("fileUpload");
//   const img_box = document.getElementById("myImg");
//   const reader = new FileReader();

//   fileUpload.addEventListener("change", function (event) {
//     document.querySelector(".imageInputContainer_new").style.border = "none";
//     document.querySelector(".imageInputContainer_new img").style.border =
//       "1px solid rgba(0, 0, 0, 0.38)";
//     const files = event.target.files;
//     const file = files[0];
//     reader.readAsDataURL(file);
//     reader.addEventListener("load", function (event) {
//       img_box.src = event.target.result;
//       img_box.alt = file.name;
//     });
//   });
// };

// const validateData = () => {
//   const schoolLogo = document.getElementById("fileUpload").files[0];
//   const schoolName = document.getElementById("user-schoolname").value;

//   const data = {
//     logo: schoolLogo,
//     schoolname: schoolName,
//   };

//   //   var newFData = new FormData();
//   //   var g_title = $("#fileUpload").val();

//   //   newFData.append("gallery_title", g_title);
//   var newFData = new FormData();
//   newFData.append("logo", data.logo);
//   newFData.append("schoolname", data.schoolname);

//   if (!data.logo) {
//     document.querySelector(".imageInputContainer_new").style.border =
//       "1px solid red";
//     document.querySelector(".imageInputContainer_new img").style.border =
//       "none";
//   }

//   if (data.logo && data.schoolname) {
//     swal({
//       title: "Are you sure?",
//       text: "You can edit your site information in the System",
//       icon: "warning",
//       buttons: ["Cancel", "Update"],
//       dangerMode: true,
//     }).then((isConfirm) => {
//       isConfirm && addNewData(newFData);
//     });
//   }
// };

// const addNewData = (data) => {
//   $.ajax({
//     type: "POST",
//     url: `/aiems/site_config/saveSiteConfig`,
//     data: data,
//     cache: false,
//     contentType: false,
//     processData: false,
//     method: "POST",
//     success: function (data) {
//       const response = JSON.parse(data);
//       if (response.isSuccess) {
//         swal("Updated Successfully", `${response.message}`, "success").then(
//           () => {
//             window.location.replace(`/aiems/pages/firstAdmin`);
//           }
//         );
//       } else {
//         swal("Error", `${response.message}`, "error");
//       }
//     },
//     error: function (xhr, status, error) {
//       console.error(error);
//     },
//   });
// };

// init();
window.onload = () => {
  const id = 7;
  $.ajax({
    type: "GET",
    url: `/aiems/site_config/getSiteConfig/${id}`,
    dataType: "JSON",
    success: function (data) {
      console.log(data.message);
      console.log(data.data);
    },
    error: function (xhr, status, error) {
      console.log(xhr);
      // document.getElementById("error-part").classList.remove("d-none");
    },
  });
};

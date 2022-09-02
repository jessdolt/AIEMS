const init = () => {
  const form = document.getElementById("systemPromptForm");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });

  fileUploadHandler();
};

const fileUploadHandler = () => {
  const fileUpload = document.getElementById("fileUpload");
  const img_box = document.getElementById("myImg");
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

const validateData = () => {
  const schoolLogo = document.getElementById("fileUpload").files[0];
  const schoolName = document.getElementById("user-schoolname").value;

  const data = {
    logo: schoolLogo,
    schoolname: schoolName,
  };

  //   var newFData = new FormData();
  //   var g_title = $("#fileUpload").val();

  //   newFData.append("gallery_title", g_title);
  var newFData = new FormData();
  newFData.append("logo", data.logo);
  newFData.append("schoolname", data.schoolname);
  if (data.logo && data.schoolname) {
    console.log(data);

    addNewData(newFData);
  }
};

const addNewData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/site_config/saveSiteConfig`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      console.log(JSON.parse(data));
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

init();

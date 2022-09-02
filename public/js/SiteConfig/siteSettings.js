const init = () => {
  const form = document.getElementById("site-settings-form");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validateData();
  });

  fileUploadHandler();
};

const fileUploadHandler = () => {
  const logoImgRendered = () => {
    const reader = new FileReader();
    const logoFileUpload = document.getElementById("logo_img");
    const logo_box = document.getElementById("logo_container");

    logoFileUpload.addEventListener("change", function (event) {
      const files = event.target.files;
      const file = files[0];
      reader.readAsDataURL(file);
      reader.addEventListener("load", function (event) {
        logo_box.src = event.target.result;
        logo_box.alt = file.name;
      });
    });
  };

  const heroImgRenderer = () => {
    const reader = new FileReader();
    const heroImgfileUpload = document.getElementById("hero_img");
    const hero_box = document.getElementById("hero_container");

    heroImgfileUpload.addEventListener("change", function (event) {
      const files = event.target.files;
      const file = files[0];
      reader.readAsDataURL(file);
      reader.addEventListener("load", function (event) {
        hero_box.src = event.target.result;
        hero_box.alt = file.name;
      });
    });
  };

  logoImgRendered();
  heroImgRenderer();
};

const validateData = () => {
  const id = document.getElementById("site_id").value;
  const schoolName = document.getElementById("school_name").value;
  const schoolLogoImage = document.getElementById("logo_img").files[0];
  const heroImage = document.getElementById("hero_img").files[0];
  const primaryColor = document.getElementById("primaryColor").value;
  const secondaryColor = document.getElementById("secondaryColor").value;

  const data = {
    schoolname: schoolName,
    logo: schoolLogoImage,
    heroimage: heroImage,
    sitecolor: primaryColor,
    sitecolor_secondary: secondaryColor,
    sitecolor_dark: shadeColor(primaryColor, -25),
    sitecolor_light: shadeColor(primaryColor, 90),
  };

  //   var newFData = new FormData();
  //   var g_title = $("#fileUpload").val();

  //   newFData.append("gallery_title", g_title);
  var newFData = new FormData();
  newFData.append("logo", data.logo);
  newFData.append("heroimage", data.heroimage);
  newFData.append("schoolname", data.schoolname);
  newFData.append("sitecolor", data.sitecolor);
  newFData.append("sitecolor_dark", data.sitecolor_dark);
  newFData.append("sitecolor_light", data.sitecolor_light);
  newFData.append("sitecolor_secondary", data.sitecolor_secondary);

  // console.log(newFData);
  if (data) {
    updateData(newFData, id);
  }
  // resetForm();
};

const updateData = (data, id) => {
  console.log("zxc");
  $.ajax({
    type: "POST",
    url: `/aiems/site_config/editSiteConfig/${id}`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      console.log(data);
      console.log(JSON.parse(data));
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

function shadeColor(color, percent) {
  var R = parseInt(color.substring(1, 3), 16);
  var G = parseInt(color.substring(3, 5), 16);
  var B = parseInt(color.substring(5, 7), 16);

  R = parseInt((R * (100 + percent)) / 100);
  G = parseInt((G * (100 + percent)) / 100);
  B = parseInt((B * (100 + percent)) / 100);

  R = R < 255 ? R : 255;
  G = G < 255 ? G : 255;
  B = B < 255 ? B : 255;

  var RR = R.toString(16).length == 1 ? "0" + R.toString(16) : R.toString(16);
  var GG = G.toString(16).length == 1 ? "0" + G.toString(16) : G.toString(16);
  var BB = B.toString(16).length == 1 ? "0" + B.toString(16) : B.toString(16);

  return "#" + RR + GG + BB;
}

// const resetForm = () => {
//   document.getElementById("site_id").value = "";
//   document.getElementById("school_name").value = "";
//   document.getElementById("logo_img").files[0] = "";
//   document.getElementById("hero_img").files[0] = "";
//   document.getElementById("primaryColor").value = "";
//   document.getElementById("secondaryColor").value = "";

//   document.getElementById("logo_container").removeAttribute("src");
//   document.getElementById("hero_container").removeAttribute("src");
//   document.getElementById("logo_container").removeAttribute("alt");
//   document.getElementById("hero_container").removeAttribute("alt");
// };
init();

const init = () => {
  const form = document.getElementById("promos-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const isValid = checkValidQty();
    if (isValid) validateData();
  });

  fileUploadHandler();
  referenceHandler();
  durationHandler();

  // $(document).ready(function () {
  //   alert("qwe");
  // });
};

const checkValidQty = () => {
  const qty = document.getElementById("quantity").value;
  const references = document.querySelectorAll(".references").length;
  console.log(qty);
  console.log(references);
  if (+qty != +references) {
    swal(
      "Error",
      `Quantity does not match the number of Redeemable Code`,
      "error"
    );
    return false;
  }

  return true;
};

const fileUploadHandler = () => {
  const fileUpload = document.getElementById("voucher-image");
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

const payments = [
  { duration: "1 Day", amount: 100 },
  { duration: "2 Days", amount: 150 },
  { duration: "3 Days", amount: 250 },
  { duration: "5 Days", amount: 450 },
  { duration: "1 Week", amount: 650 },
  { duration: "2 Weeks", amount: 1200 },
  { duration: "1 Month", amount: 2000 },
];

const durationHandler = () => {
  const duration = document.getElementById("duration");
  const payment = document.getElementById("payment");
  duration.addEventListener("change", (e) => {
    if (e.target.value) {
      const [amount] = payments.filter(
        (payment) => e.target.value === payment.duration
      );
      payment.value = `₱ ${+amount.amount.toFixed(2)}`;
    }
  });
};

const referenceHandler = () => {
  const btnAddRef = document.getElementById("btn-add-ref");
  const referenceAdd = document.getElementById("reference-add");
  btnAddRef.addEventListener("click", (e) => {
    const randomNumber = Math.floor(Math.random() * 1000);
    e.preventDefault();
    const parentDiv = document.createElement("div");
    parentDiv.classList.add("row");
    parentDiv.classList.add("mt-3");
    const columnDiv = document.createElement("div");
    columnDiv.classList.add("col-md-6");

    const formGroupDiv = document.createElement("div");
    formGroupDiv.classList.add("input-group");
    const inputElement = document.createElement("input");
    inputElement.classList.add("form-control");
    inputElement.classList.add("references");
    inputElement.setAttribute("required", "true");
    inputElement.style.fontSize = "14px";

    const groupAppendDiv = document.createElement("div");
    groupAppendDiv.classList.add("input-group-append");

    const btnDelete = document.createElement("button");
    btnDelete.classList.add("btn");
    btnDelete.classList.add("btn-secondary");
    btnDelete.classList.add(`btn-delete-reference-${randomNumber}`);
    btnDelete.classList.add(`text-white`);
    btnDelete.textContent = `Delete`;
    btnDelete.setAttribute("type", "button");
    groupAppendDiv.appendChild(btnDelete);
    formGroupDiv.appendChild(inputElement);

    formGroupDiv.appendChild(groupAppendDiv);
    columnDiv.appendChild(formGroupDiv);
    parentDiv.appendChild(columnDiv);

    referenceAdd.insertAdjacentElement("beforeend", parentDiv);
    initBtnDelete(randomNumber);
  });
};

const initBtnDelete = (randomNumber) => {
  const btnDelete = document
    .querySelector(`.btn-delete-reference-${randomNumber}`)
    .addEventListener("click", function () {
      this.parentNode.parentNode.parentNode.parentNode.remove();
      console.log(this);
    });
};

init();
const validateData = () => {
  const v_img = document.getElementById("voucher-image");
  const voucherImage = v_img.getAttribute("value")
    ? v_img.getAttribute("value")
    : v_img.files[0];

  const type = document.getElementById("adsType").value;
  const title = document.getElementById("title").value;
  const description = document.getElementById("description").value;
  const date = document.getElementById("dateOfAds").value;
  const quantity = document.getElementById("quantity").value;
  const duration = document.getElementById("duration").value;
  const payment = document
    .getElementById("payment")
    .value.replace("₱", "")
    .trim();
  const gCashRefNumber = document.getElementById("gCashRefNumber").value;

  const data = {
    type,
    title,
    description,
    date,
    quantity,
    voucherImage,
    referenceCode: getReferenceCodes(),
    duration,
    payment,
    gCashRefNumber,
  };

  console.log(data);

  const newFData = new FormData();
  newFData.append("type", data.type);
  newFData.append("title", data.title);
  newFData.append("description", data.description);
  newFData.append("date", data.date);
  newFData.append("quantity", data.quantity);
  newFData.append("referenceCode", data.referenceCode);
  newFData.append("duration", data.duration);
  newFData.append("payment", data.payment);
  newFData.append("gCashRefNumber", data.gCashRefNumber);
  newFData.append("voucherImage", data.voucherImage);

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

const getReferenceCodes = () => {
  const referenceCodes = document.querySelectorAll(".references");
  return Array.from(referenceCodes).map((r) => r.value);
};

const addNewData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/advertiser/addPromosAdvertisement`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal("Updated Successfully", `${response.message}`, "success").then(
          () => {
            window.location.replace(`/aiems/advertiser/home`);
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

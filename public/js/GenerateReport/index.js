const handleEvents = () => {
  const reportTypeInput = document.getElementById("typeOfReport");
  const yearInput = document.getElementById("year");

  const btnGenerateReport = document.getElementById("btn-generate");

  const reportTypeHandler = () => {
    reportTypeInput.addEventListener("change", () => {
      const type = reportTypeInput.value;
      if (type === "") {
        clearSelection();
        return;
      }
      requestData(type);
    });
  };

  const submitHandler = () => {
    btnGenerateReport.addEventListener("click", () => {
      const checkBoxes = document.querySelectorAll(".check");
      const approvedBy = document.getElementById("approvedBys").value;
      const notedBy = document.getElementById("notedBys").value;
      const preparedBy = document.getElementById("preparedBys").value;

      if (checkBoxes.length === 0) {
        alert("Please Choose an Option to Extract");
        return;
      }

      const type = reportTypeInput.value;
      const year = yearInput.value;
      const chosen = Array.from(checkBoxes)
        .map((x) => x.checked && x.value)
        .filter((y) => y != undefined && y);

      const data = {
        type,
        year,
        chosen,
        preparedBy,
        notedBy,
        approvedBy,
      };

      const newFData = new FormData();
      newFData.append("type", data.type);
      newFData.append("year", data.year);
      newFData.append("approvedBy", data.approvedBy);
      newFData.append("notedBy", data.notedBy);
      newFData.append("preparedBy", data.preparedBy);

      if (data?.chosen.length > 0) {
        data?.chosen.forEach((x) => {
          newFData.append("chosen[]", x);
        });
      }

      extractData(newFData);
    });
  };

  reportTypeHandler();
  submitHandler();
};

const requestData = (type) => {
  let dataUrl = "";
  if (type === "college") dataUrl = `/aiems/generate_report/getColleges`;
  else if (type === "course") dataUrl = `/aiems/generate_report/getCourses`;
  else if (type === "batch") dataUrl = `/aiems/generate_report/getBatches`;

  $.ajax({
    url: dataUrl,
    method: "GET",
    success: function (res) {
      if (res === "No Data") {
        return;
      } else {
        const data = JSON.parse(res);
        let newData = [];
        if (type === "college") {
          newData = data.map((x) => ({
            name: x.department_name,
            value: x.id,
          }));
        } else if (type === "course") {
          newData = data.map((x) => ({
            name: x.course_name,
            value: x.id,
          }));
        } else if (type === "batch") {
          newData = data.map((x) => ({
            name: x.year,
            value: x.id,
          }));
        }

        renderRows(newData, type);
      }
    },
    error: function (er) {
      console.log(er);
    },
  });
};

const extractData = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/generate_report/save_report`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.status === 201) {
        const id = response.id;
        window.setTimeout(function () {
          window.open(
            `generate_report/print/${id}`,
            "summary-reports",
            "height=600, width=800, top=10, left=10"
          );
        }, 0);
      }

      return;
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

const renderRows = (array, type = "") => {
  let output = "";
  output += `
    <div style="display:flex; justify-content:space-between;">
         <h3 class="mb-2">Check All</h3>
         <input type="checkbox" id="checkAll"/>
      </div>`;

  array.forEach((x) => {
    const row = `
        <div style="display:flex; justify-content:space-between;">
            <div style="text-indent: 30px">${type === "batch" ? "Batch" : ""} ${
      x.name
    }</div>
            <input type="checkbox" class="check" value="${x.value}" />
        </div>
        `;
    output += row;
  });

  if (array.length === 0) output = "No Data Available. Please Add One";

  const toAppend = ` <div class="card">
      <div class="card-body p-2">
          ${output}
      </div>
  </div>`;
  document.getElementById("renderSelection").innerHTML = toAppend;

  checkAllInit();
};

const clearSelection = () => {
  document.getElementById("renderSelection").innerHTML = "";
};

const checkAllInit = () => {
  const btnCheckAll = document.getElementById("checkAll");

  btnCheckAll.addEventListener("click", () => {
    const checkBoxes = document.querySelectorAll(".check");
    if (btnCheckAll.checked) {
      checkBoxes.forEach((x) => (x.checked = true));
    } else {
      checkBoxes.forEach((x) => (x.checked = false));
    }
  });
};

handleEvents();

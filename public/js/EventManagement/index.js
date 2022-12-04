const DATA = {
  Events: [],
};

const requestData = () => {
  $.ajax({
    type: "GET",
    url: `/aiems/event_management/viewAllEventsAvailable`,
    dataType: "JSON",
    success: function (data) {
      DATA.Events = [...data];
      calendarInit();
    },
    error: function (xhr, status, error) {
      console.log(xhr);
      // document.getElementById("error-part").classList.remove("d-none");
    },
  });
};

requestData();

const calendarInit = () => {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventStartEditable: false,
    eventMaxStack: true,
    editable: true,
    views: {
      timeGrid: {
        eventMaxStack: 2,
      },
    },
    eventSources: [
      // your event source
      {
        events: DATA.Events,
        color: "#fac9aa", // an option!
        textColor: "black", // an option!
      },

      // any other event sources...
    ],
    eventDidMount: function (info) {},
    eventClick: async function (info) {
      const btnAdd = document.getElementById("btn-participate");
      const baseURL = document.getElementById("baseUrl").value;
      const imageContainer = document.getElementById("event-image");
      const { image, description, name } = info.event.extendedProps;
      const title = info.event.title;
      const event_id = info.event.id;
      const start = converDateTimeStr(info.event.startStr);
      const end = converDateTimeStr(info.event.endStr);

      imageContainer.src = `${baseURL}/uploads/${image}`;
      document.getElementById("title").textContent = title;
      document.getElementById("description").textContent = description;
      document.getElementById("name").textContent = name;
      document.getElementById("start-date").textContent = start;
      document.getElementById("end-date").textContent = end;
      document.getElementById("event_id").value = event_id;
      $("#structureModal").modal("show");

      const { isParticipated } = JSON.parse(await checkIfParticipated());
      const currentDate = new Date();
      const eventDate = new Date(start);

      const posted_by = info.event.extendedProps.posted_by;
      const userId = document.getElementById("user_id").value;
      console.log(posted_by);
      console.log(userId);

      if (posted_by != userId) {
        if (isParticipated) {
          btnAdd.textContent = "Participated";
          btnAdd.disabled = true;
        } else if (eventDate > currentDate) {
          btnAdd.textContent = "Participate";
          btnAdd.disabled = false;
        } else {
          btnAdd.textContent = "Event has passed";
          btnAdd.disabled = true;
        }
      } else {
        btnAdd.textContent = "Host cannot participate";
        btnAdd.disabled = true;
      }
    },
  });
  calendar.render();
};

$(".btn-close").on("click", () => {
  $("#structureModal").modal("toggle");
});

const checkIfParticipated = () => {
  const eventId = document.getElementById("event_id").value;
  const userId = document.getElementById("user_id").value;
  const data = {
    userId,
    eventId,
  };

  const newFData = new FormData();
  newFData.append("user_id", data.userId);
  newFData.append("event_id", data.eventId);

  return $.ajax({
    type: "POST",
    url: `/aiems/event_management/isParticipated`,
    data: newFData,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      // if (response.isParticipated) {
      //   return true;
      // } else {
      //   return false;
      // }
      // if (response.isSuccess) {
      //   swal(
      //     "Participated Successfully",
      //     `${response.message}`,
      //     "success"
      //   ).then(() => {
      //     window.location.replace(`/aiems/pages/calendar`);
      //   });
      // } else {
      //   swal("Error", `${response.message}`, "error");
      // }
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

const converDateTimeStr = (dateStr) => {
  const d = new Date(dateStr);
  const date = d.toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
  const time = d.toLocaleTimeString("en-US");

  return `${date} ${time}`;
};

const handleAddParticipant = () => {
  const btnAdd = document.getElementById("btn-participate");

  btnAdd.addEventListener("click", (e) => {
    e.preventDefault();

    const eventId = document.getElementById("event_id").value;
    const userId = document.getElementById("user_id").value;
    const data = {
      userId,
      eventId,
    };

    const newFData = new FormData();
    newFData.append("user_id", data.userId);
    newFData.append("event_id", data.eventId);

    addParticipant(newFData);
  });
};

const addParticipant = (data) => {
  $.ajax({
    type: "POST",
    url: `/aiems/event_management/addParticipant`,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      const response = JSON.parse(data);
      if (response.isSuccess) {
        swal(
          "Participated Successfully",
          `${response.message}`,
          "success"
        ).then(() => {
          window.location.replace(`/aiems/pages/calendar`);
        });
      } else {
        swal("Error", `${response.message}`, "error");
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
};

handleAddParticipant();

// SHOW MODAL, SEND API, SAVE TO PARTICIPANTS TABLE WITH EVENT ID AND USER ID,
// IF ALREADY PARTICIPATE CHANGE BUTTON TO PARTICIPATED
// MEYN GOAL: EMAIL

// const id = 7;

// [
//     {
//       title: "BCH237",
//       start: "2022-10-19T10:30:00",
//       end: "2022-10-19T11:30:00",
//       extendedProps: {
//         department: "BioChemistry",
//       },
//       description: "Lecture",
//     },

//     {
//       title: "BCH237",
//       start: "2022-10-19T09:30:00",
//       end: "2022-10-19T11:30:00",
//       extendedProps: {
//         department: "BioChemistry",
//       },
//       description: "Lecture",
//     },

//     {
//       title: "BCH237",
//       start: "2022-10-19T07:30:00",
//       end: "2022-10-19T10:30:00",
//       extendedProps: {
//         department: "BioChemistry",
//       },
//       description: "Lecture",
//     },

//     {
//       title: "Event",
//       start: "2022-10-20 13:30:00",
//       end: "2022-10-21 01:30:00",
//       extendedProps: {
//         department: "BioChemistry",
//       },
//       description: "Lecture",
//     },
//     // more events ...
//   ]

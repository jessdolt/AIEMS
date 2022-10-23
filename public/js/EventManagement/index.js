const calendarInit = () => {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
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
        events: [],
        color: "salmon", // an option!
        textColor: "black", // an option!
      },

      // any other event sources...
    ],
    eventDidMount: function (info) {
      console.log(info.event.display);
      // console.log(info.event.extendedProps);
      // {description: "Lecture", department: "BioChemistry"}
    },
    eventClick: function (info) {
      console.log(info);
    },
  });
  calendar.render();
};

// const id = 7;
$.ajax({
  type: "GET",
  url: `/aiems/event_management/viewAllEvents`,
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

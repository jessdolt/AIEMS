$("#manage-survey").submit(function (e) {
  e.preventDefault();
  // console.log($(this).attr('data-id'));
  // console.log(php echo $data['id']?>);

  swal({
    title: "Are you sure",
    text: "Do you wish to submit this survey?",
    icon: "info",
    buttons: ["Cancel", "Approve"],
    dangerMode: true,
  }).then((isConfirm) => {
    isConfirm &&
      $.ajax({
        url: "<?php echo URLROOT;?>/survey_widget/answer",
        data: $(this).serialize(),
        method: "POST",
        success: function (res) {
          if (res == 1) {
            swal("Answered Successfully", ``, "success").then(() => {
              location.replace("<?php echo URLROOT;?>/survey_widget");
            });
          }
        },
        error: function (er) {
          console.log(er);
        },
      });
  });
});

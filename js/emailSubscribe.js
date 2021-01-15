$(document).ready(function () {
  $("#emailSubscribeForm").submit(function (event) {
    event.preventDefault();

    //house keeping
    let form = $(this);
    let submitBtn = form.closest("form").find(":submit");
    let submitBtnText = submitBtn.html();
    let feedbackMsg = form.closest("form").children(".feedbackMsg");

    $.ajax({
      type: "post",
      url: "includes/emailSubscribe.inc.php",
      data: form.serialize(),
      dataType: "json",
      beforeSend: function () {
        submitBtn.html('<i class="fa fa-spinner fa-spin text-white"></i>');
        submitBtn.prop("disabled", true);
      },
      success: function (response) {
        console.log(response);
        feedbackMsg.html(response.message);
        if (response.status == 1) {
          form.trigger("reset");
          feedbackMsg.removeClass("text-danger");
          feedbackMsg.addClass("text-success");
        } else {
          feedbackMsg.removeClass("text-success");
          feedbackMsg.addClass("text-danger");
        }
      },
      error: function (error) {
        console.log(error);
        feedbackMsg.html("Error occurred, please try again");
        feedbackMsg.removeClass("text-success");
        feedbackMsg.addClass("text-danger");
      },
      complete: function () {
        submitBtn.prop("disabled", false);
        submitBtn.html(submitBtnText);
      },
    });
  });
});

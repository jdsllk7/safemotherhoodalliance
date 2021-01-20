$(document).ready(function () {
  window.ajaxCall = function ajaxCall(form, url) {
    //house keeping
    let submitBtn = form.closest("form").find(":submit");
    let submitBtnText = submitBtn.html();
    let feedbackMsg = form.closest("form").children(".feedbackMsg");
    $.ajax({
      type: "post",
      url: url,
      data: form.serialize(),
      dataType: "json",
      beforeSend: function () {
        submitBtn.html('<i class="fa fa-spinner fa-spin text-white"></i>');
        submitBtn.prop("disabled", true);
        feedbackMsg.hide();
        feedbackMsg.fadeIn();
      },
      success: function (response) {
        console.log(response);
        feedbackMsg.html(response.message);
        if (response.status == true) {
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
        feedbackMsg.html("System error, please try again!");
        feedbackMsg.removeClass("text-success");
        feedbackMsg.addClass("text-danger");
      },
      complete: function () {
        submitBtn.prop("disabled", false);
        submitBtn.html(submitBtnText);
      },
    });
  }; // end ajaxCall()
}); //end document.ready

/* let ajaxPromise = new Promise((resolve, reject) => {
    if (true) {
      resolve();
    } else {
      reject();
    }
  });

  ajaxPromise
    .then(() => {
      alert("We good!");
    })
    .catch(() => {
      alert("Agony!");
    }); */

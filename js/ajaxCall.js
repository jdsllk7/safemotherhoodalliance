$(document).ready(function () {
  window.ajaxCallForm = function ajaxCallForm(
    type, // post/get [required]
    form, //HTML form: $(this) [required]
    url, //URL to post form data to [required]
    redirectStatus, //should we redirect after success? true/false [required]
    redirectURL, //URL to redirect to if response = success [default = empty string]
    callbackFunction //function to call after success [default = null]
  ) {
    //house keeping
    let submitBtn = form.closest("form").find(":submit");
    let submitBtnText = submitBtn.html();
    let feedbackMsg = form.find("pre:first");
    $.ajax({
      type: type,
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
          if (redirectStatus) {
            setTimeout(function () {
              window.location.replace(redirectURL);
            }, 2000);
          }
          if (callbackFunction) {
            callbackFunction(form, response.message);
          }
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
  }; // end ajaxCallForm()
}); //end document.ready

/* let myPromise = new Promise((resolve, reject) => {
  //check if user is sure of action
  if (true) {
    resolve();
  } else {
    reject();
  }
});
myPromise
  .then(() => {
    //if resolve
  })
  .catch(() => {
    //if reject
  }); */

$(document).ready(function () {
  /* 
  Prerequisites: 
  -form element with ID or Class name
  -add form attribute: [enctype="multipart/form-data"] if files are to be submitted
  -if required, input type file should be [<input type="file" name="file[]" multiple accept="image/*">] NOTE: for images only
  -a button of type submit
  -add <pre> tag of class [feedbackMsg] for feedback
  -a url to submit to
  */

  window.ajaxCallForm = function ajaxCallForm(
    type, // post/get [required]
    form, //HTML form: $(this) [required]
    thisForm, //HTML form: (this) if it contains files on submit [default = null | value = this]
    containsFiles, //If form submit contains files true/false [required]
    url, //URL to post form data to [required]
    redirectStatus, //should we redirect after success? true/false [required]
    redirectURL, //URL to redirect to if response = success [default = empty string]
    callbackFunction //function to call after success [default = null]
  ) {
    let contentType = "application/x-www-form-urlencoded"; //submitting form with or without files [no files = "application/x-www-form-urlencoded" | with files = false]
    let myPromise = new Promise((resolve) => {
      let formData;
      if (containsFiles) {
        contentType = false; //if what you are submitting has files
        formData = new FormData(thisForm);
        resolve(formData);
      } else {
        formData = form.serialize();
        resolve(formData);
      }
    });
    myPromise.then((formData) => {
      //continue
      let submitBtn = form.closest("form").find(":submit");
      let submitBtnText = submitBtn.html();
      let feedbackMsg = form.closest("form").children(".feedbackMsg");

      $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: "json",
        enctype: "multipart/form-data",
        cache: false,
        processData: false,
        contentType: contentType,
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
      }); //end $.ajax(CALL)
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

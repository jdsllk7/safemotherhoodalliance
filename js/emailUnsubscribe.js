$(document).ready(function () {
  $("#unsubscribeForm").submit(function (event) {
    event.preventDefault();
    let form = $(this);
    //Ajax Call
    ajaxCallForm(
      "post", //post get [required]
      form, //HTML form: $(this) [required]
      "includes/emailUnsubscribe.inc.php", //URL to post form data to [required]
      false, //should we redirect after success? true/false [required]
      "", //URL to redirect to if response = success [default = empty string]
      myCallback //function to call after success [default = null]
    );

    //function to be called back upon ajax success
    function myCallback(form, responseMessage) {
      console.log(form, responseMessage);
      form.closest("form").find(":submit").hide();
    } //end myCallback()
  });
});

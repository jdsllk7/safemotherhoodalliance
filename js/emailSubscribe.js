$(document).ready(function () {
  $("#emailSubscribeForm").submit(function (event) {
    event.preventDefault();
    ajaxCall($(this), "includes/emailSubscribe.inc.php");
  });
});

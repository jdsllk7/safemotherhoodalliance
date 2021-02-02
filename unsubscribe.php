<!-- header -->
<?php
$title = "Unsubscribe Email | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<section class="ftco-section bg-light" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper px-md-4">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <form class="contact-wrap w-100 p-md-5 p-4" id="unsubscribeForm">
                                <h3 class="mb-4">Unsubscribe</h3>
                                <p>Are you sure you want to unsubscribe from our weekly emails?</p>
                                <input type="hidden" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                echo $_GET['email'];
                                                                            } ?>">
                                <button type="submit" title="Click here to unsubscribe" class="btn btn-danger" style="width: 100px;">YES</button>
                                <pre class="feedbackMsg pt-4 "></pre>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- footer -->
<?php
include_once 'includes/partials/footer.inc.php';
?>
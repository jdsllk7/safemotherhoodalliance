<!-- header -->
<?php
$title = "Unsubscribe Email | Safe Motherhood Alliance";
include 'includes/partials/header.inc.php';
?>

<section class="ftco-section bg-light" style="height: 100vh;">
    <div class="container">
        <section class="ftco-section testimony-section">
            <div class="img img-bg border" style="background-image: url('images/banner/mwanza_ELF0023-1163.jpg');"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <form id="donateForm" class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2 class="mb-3 font-x-large">Enter Amount You Wish To Donate</h2>
                        <pre class="feedbackMsg"></pre>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text">Default</span> -->
                                <select class="form-control rounded-0 text-gray-dark" name="currency" title="Select Currency" required>
                                    <option value="" selected>-Currency-</option>
                                    <option title="Zambian Kwacha" value="ZMW">ZMW</option>
                                    <option title="United States Dollar" value="USD">USD</option>
                                </select>
                            </div>
                            <input type="number" min="1" name="amount" class="form-control text-gray-dark" placeholder="Enter amount" required>
                        </div>
                        <button class="btn btn-lg baby-blue-darkest-bg text-white p-3 box-shadow baby-blue-normal-border-1" title="Donate Now" type="submit">Donate Now</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>


<!-- footer -->
<?php
include 'includes/partials/footer.inc.php';
?>
<!-- nav-link active -->
<script>
    $(document).ready(function() {
        $(".nav-donate").addClass("active");
    });
</script>
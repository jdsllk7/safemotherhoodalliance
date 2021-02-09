<!-- header -->
<?php
$title = "Contact us | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/banner/084e5242fd3c48e484455d908d4240dd - Copy.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate mb-5 text-center">
				<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact Us <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-0 bread">Contact Us</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="wrapper px-md-4">
					<div class="row mb-5">
						<div class="col-md-4">
							<div class="dbox w-100 text-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-map-marker"></span>
								</div>
								<div class="text">
									<p>
										<span>Address:</span>
										<a href="http://maps.google.com/?q=Plot 18 Mundulundulu Village, Siavonga, Lusaka, Zambia" target="_blank" class="text-dark"> Plot 18 Mundulundulu Village, Siavonga. Lusaka, Zambia.</a>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="dbox w-100 text-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-phone"></span>
								</div>
								<div class="text">
									<p><span>Phone:</span> <a href="tel:+260977748759" class="text-dark">+26 0977 748759</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="dbox w-100 text-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-paper-plane"></span>
								</div>
								<div class="text">
									<p><span>Email:</span> <a href="mailto:info@safemotherhoodalliance.org?Subject=Hello" class="text-dark">info@safemotherhoodalliance.org</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="contact-wrap w-100 p-md-5 p-4">
								<h3 class="mb-4">Contact Us</h3>
								<form id="contactForm">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="label" for="name">Full Name</label>
												<input type="text" class="form-control" name="name" placeholder="Name">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="label" for="email">Email Address</label>
												<input type="email" class="form-control" name="email" placeholder="Email">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label" for="subject">Subject</label>
												<input type="text" class="form-control" name="subject" placeholder="Subject">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label" for="#">Message</label>
												<textarea name="message" class="form-control" cols="30" rows="4" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="submit" value="Send Message" class="btn btn-primary">
												<div class="submitting"></div>
											</div>
										</div>
									</div>
									<pre class="feedbackMsg"></pre>
								</form>
							</div>
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

<!-- nav-link active -->
<script>
	$(document).ready(function() {
		$(".nav-contact").addClass("active");
	});
</script>
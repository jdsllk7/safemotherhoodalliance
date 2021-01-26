<?php

namespace SystemServices;

class SystemServices
{
	//$receiverName = the person receiving email [Add a 'Hi']
	//$receiverEmail = email of person receiving [one OR many emails]
	//$senderEmail = email of person sending
	//$btn = the big button in the center of template
	//$subject = like that very subject that displays when an email is sent 
	//$heading = the big bold words displayed on template 
	//$subheading = the secondary bold words displayed on template 
	//$extra = any other extra words displayed just below the button
	public function sendEmail($receiverName, $receiverEmail, $senderEmail, $btn, $emailSubject, $heading, $subheading, $extra)
	{
		$message = $this->emailUI($receiverEmail, $receiverName, $heading, $subheading, $btn, $extra);
		$to = $receiverEmail;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <' . $senderEmail . '>' . "\r\n";

		// var_dump(strpos($_SERVER['HTTP_HOST'], 'localhost'));
		if (strpos($_SERVER['HTTP_HOST'], 'safemotherhoodalliance.org') !== false) {
			if (mail($to, $emailSubject, $message, $headers)) {
				return true;
			} else {
				return false;
			}
		} elseif (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
			return true;
		} else {
			return false;
		}
	} //end sendEmail()

	public function emailUI($receiverEmail, $receiverName, $heading, $subheading, $btn, $extra)
	{
		return $this->emailUI =
			'
		<!DOCTYPE html>
		<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="x-apple-disable-message-reformatting">

			<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

			<!-- CSS Reset : BEGIN -->
			<style>
				:root {
					--baby-blue-normal: #a0caf0;
					--baby-blue-darker: #91c1ee;
					--baby-blue-darkest: #7bb4ea;
					--baby-pink-normal: #f4c2c3;
					--baby-pink-darker: #efa9aa;
					--baby-pink-darkest: #e77e7f;
				}

				.baby-blue-normal-color {
					color: var(--baby-blue-normal) !important;
				}

				.baby-blue-normal-border-1 {
					border: 1px solid var(--baby-blue-normal) !important;
				}

				.baby-blue-darker-color {
					color: var(--baby-blue-darker) !important;
				}

				.baby-blue-darkest-color {
					color: var(--baby-blue-darkest) !important;
				}

				.baby-blue-normal-bg {
					background: var(--baby-blue-normal) !important;
				}

				.baby-blue-darker-bg {
					background: var(--baby-blue-darker) !important;
				}

				.baby-blue-darkest-bg {
					background: var(--baby-blue-darkest) !important;
				}

				.baby-pink-normal-color {
					color: var(--baby-pink-normal) !important;
				}

				.baby-pink-darker-color {
					color: var(--baby-pink-darker) !important;
				}

				.baby-pink-darkest-color {
					color: var(--baby-pink-darkest) !important;
				}

				.baby-pink-normal-bg {
					background: var(--baby-pink-normal) !important;
				}

				.baby-pink-darker-bg {
					background: var(--baby-pink-darker) !important;
				}

				.baby-pink-darkest-bg {
					background: var(--baby-pink-darkest) !important;
				}

				html,
				body {
					margin: 0 auto !important;
					padding: 0 !important;
					height: 100% !important;
					width: 100% !important;
					background: #f1f1f1;
				}

				* {
					-ms-text-size-adjust: 100%;
					-webkit-text-size-adjust: 100%;
				}

				div[style*="margin: 16px 0"] {
					margin: 0 !important;
				}

				table,
				td {
					mso-table-lspace: 0pt !important;
					mso-table-rspace: 0pt !important;
				}

				table {
					border-spacing: 0 !important;
					border-collapse: collapse !important;
					table-layout: fixed !important;
					margin: 0 auto !important;
				}

				img {
					-ms-interpolation-mode: bicubic;
				}

				a {
					text-decoration: none;
				}

				a:hover {
					color: var(--baby-pink-darkest) !important;
				}

				a.btn:hover {
					color: white !important;
				}

				*[x-apple-data-detectors],
				.unstyle-auto-detected-links *,
				.aBn {
					border-bottom: 0 !important;
					cursor: default !important;
					color: inherit !important;
					text-decoration: none !important;
					font-size: inherit !important;
					font-family: inherit !important;
					font-weight: inherit !important;
					line-height: inherit !important;
				}

				.a6S {
					display: none !important;
					opacity: 0.01 !important;
				}

				.im {
					color: inherit !important;
				}

				img.g-img+div {
					display: none !important;
				}

				@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
					u~div .email-container {
						min-width: 320px !important;
					}
				}

				@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
					u~div .email-container {
						min-width: 375px !important;
					}
				}

				@media only screen and (min-device-width: 414px) {
					u~div .email-container {
						min-width: 414px !important;
					}
				}
			</style>

			<style>
				.primary {
					background: #30e3ca;
				}

				.bg_white {
					background: #ffffff;
				}

				.bg_light {
					background: #fafafa;
				}

				.bg_black {
					background: #000000;
				}

				.bg_dark {
					background: rgba(0, 0, 0, .8);
				}

				.email-section {
					padding: 2.5em;
				}

				.btn {
					padding: 10px 15px;
					display: inline-block;
				}

				.btn.btn-primary {
					border-radius: 5px;
					background: #30e3ca;
					color: #ffffff;
				}

				.btn.btn-white {
					border-radius: 5px;
					background: #ffffff;
					color: #000000;
				}

				.btn.btn-white-outline {
					border-radius: 5px;
					background: transparent;
					border: 1px solid #fff;
					color: #fff;
				}

				.btn.btn-black-outline {
					border-radius: 0px;
					background: transparent;
					border: 2px solid #000;
					color: #000;
					font-weight: 700;
				}

				h1,
				h2,
				h3,
				h4,
				h5,
				h6 {
					font-family: "Lato", sans-serif;
					color: #000000;
					margin-top: 0;
					font-weight: 400;
				}

				body {
					font-family: "Lato", sans-serif;
					font-weight: 400;
					font-size: 15px;
					line-height: 1.8;
					color: rgba(0, 0, 0, .4);
				}

				a {
					color: #30e3ca;
				}


				.logo h1 {
					margin: 0;
				}

				.logo h1 a {
					color: #30e3ca;
					font-size: 24px;
					font-weight: 700;
					font-family: "Lato", sans-serif;
				}

				.hero {
					position: relative;
					z-index: 0;
				}

				.hero .text {
					color: rgba(0, 0, 0, .3);
				}

				.hero .text h2 {
					color: #000;
					font-size: 40px;
					margin-bottom: 0;
					font-weight: 400;
					line-height: 1.4;
				}

				.hero .text h3 {
					font-size: 24px;
					font-weight: 300;
				}

				.hero .text h2 span {
					font-weight: 600;
					color: #30e3ca;
				}

				.heading-section h2 {
					color: #000000;
					font-size: 28px;
					margin-top: 0;
					line-height: 1.4;
					font-weight: 400;
				}

				.heading-section .subheading {
					margin-bottom: 20px !important;
					display: inline-block;
					font-size: 13px;
					text-transform: uppercase;
					letter-spacing: 2px;
					color: rgba(0, 0, 0, .4);
					position: relative;
				}

				.heading-section .subheading::after {
					position: absolute;
					left: 0;
					right: 0;
					bottom: -10px;
					content: "";
					width: 100%;
					height: 2px;
					background: #30e3ca;
					margin: 0 auto;
				}

				.heading-section-white {
					color: rgba(255, 255, 255, .8);
				}

				.heading-section-white h2 {
					line-height: 1;
					padding-bottom: 0;
				}

				.heading-section-white h2 {
					color: #ffffff;
				}

				.heading-section-white .subheading {
					margin-bottom: 0;
					display: inline-block;
					font-size: 13px;
					text-transform: uppercase;
					letter-spacing: 2px;
					color: rgba(255, 255, 255, .4);
				}


				ul.social {
					padding: 0;
				}

				ul.social li {
					display: inline-block;
					margin-right: 10px;
				}

				.footer {
					border-top: 1px solid rgba(0, 0, 0, .05);
					color: rgba(0, 0, 0, .5);
				}

				.footer .heading {
					color: #000;
					font-size: 20px;
				}

				.footer ul {
					margin: 0;
					padding: 0;
				}

				.footer ul li {
					list-style: none;
					margin-bottom: 10px;
				}

				.footer ul li a {
					color: rgba(0, 0, 0, .5);
				}


				@media screen and (max-width: 500px) {}
			</style>


		</head>

		<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
			<center style="width: 100%; background-color: #f1f1f1;">
				<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
					&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
				</div>
				<div style="max-width: 600px; margin: 0 auto;" class="email-container">
					<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
						<tr>
							<td valign="top" class="bg_white" style="padding: 3em 2.5em 0 2.5em;">
								<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="logo" style="text-align: center;">
											<h1>
												<a href="https://safemotherhoodalliance.org/">
													<img style="opacity: .7" src="https://web-remote-resources.netlify.app/safemotherhoodalliance/pink-mom-baby-logo-with-large-label-right.png" height="80" width="200" alt="Logo">
												</a>
											</h1>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
								<img src="images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
							</td>
						</tr>
						<tr>
							<td valign="middle" class="hero bg_white" style="padding: 1em 0 4em 0;">
								<table>
									<tr>
										<td>
											<div class="text" style="padding: 0 2.5em; text-align: center;">
												<h4 style="color: rgba(0,0,0,.5);" class="mb-4">' . $receiverName . '</h4>
												<h2 class="baby-pink-darkest-color">' . $heading . '</h2>
												<h4 style="color: rgba(0,0,0,.7);">' . $subheading . '</h4>
												<p>
													' . $btn . '
												</p>
												<br>
												<p style="color: rgba(0,0,0,.7);">
													' . $extra . '
												</p>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
						<tr>
							<td valign="middle" class="bg_light footer email-section">
								<table>
									<tr>
										<td valign="top" width="33.333%" style="padding-top: 20px;">
											<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
												<tr>
													<td style="text-align: left; padding-right: 10px;">
														<h3 class="heading">About</h3>
														<p>Improving maternal and child health in Zambia by protecting a mother and her unborn baby</p>
													</td>
												</tr>
											</table>
										</td>
										<td valign="top" width="33.333%" style="padding-top: 20px;">
											<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
												<tr>
													<td style="text-align: left; padding-left: 5px; padding-right: 5px;">
														<h3 class="heading">Contact Info</h3>
														<ul>
															<li>Call: <a href="tel:+260977748759" class="text">+26 0977 748759</a></li>
															<li>
																<a href="http://maps.google.com/?q=Plot 18 Mundulundulu Village, Siavonga, Lusaka, Zambia" class="text">
																	Plot 18 Mundulundulu Village, Siavonga. Lusaka, Zambia.
																</a>
															</li>
														</ul>
													</td>
												</tr>
											</table>
										</td>
										<td valign="top" width="33.333%" style="padding-top: 20px;">
											<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
												<tr>
													<td style="text-align: left; padding-left: 10px;">
														<h3 class="heading">Useful Links</h3>
														<ul>
															<li>
																<a href="https://safemotherhoodalliance.org/donate.php">Donate</a>
															</li>
															<li>
																<a href="https://safemotherhoodalliance.org/about.php">About</a>
															</li>
															<li>
																<a href="https://safemotherhoodalliance.org/services.php">Services</a>
															</li>
															<li>
															</li>
														</ul>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="bg_light" style="text-align: center;">
								<p>No longer want to receive these email? You can <a href="https://safemotherhoodalliance.org/unsubscribe.php?email=' . $receiverEmail . '" style="color: rgba(0,0,0,.6);">unsubscribe here</a></p>
								<p style="color: rgba(0,0,0,.5); margin:0; padding:0;">
									Copyright &copy;<script>
										document.write(new Date().getFullYear());
									</script> All rights reserved | Powered by
									<a href="https://joshuakosamu.netlify.app/" target="_blank" style="position:relative; top:1px;">
										<img src="https://web-remote-resources.netlify.app/jdslk/jdslk_logo.png" height="40px" width="40px" alt="joshuakosamu.netlify.app">
									</a>
								</p>
							</td>
						</tr>
					</table>
				</div>
			</center>
		</body>
		</html>
		';
	} //end emailUI()
}//end class

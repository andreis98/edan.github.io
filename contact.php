<html>
<?php include 'include/head.php'; ?>
<body>
<div id="wrapper">
	<?php include 'include/header.php'; 
	?>
		<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Contacteaz&#259;-ne complet&#226;nd formularul de mai jos</h4>
				<form id="contactform" action="contact/contact.php" method="post" class="validateform" name="send-contact">
					<div id="sendmessage">
						 Mesajul t&#259;u a fost trimis. &#206;&#355;i mul&#206;umim!
					</div>
					<div class="row">
						<div class="col-lg-4 field">
							<input type="text" name="name" placeholder="* Introduce&#355;i numele dv. de familie" data-rule="maxlen:4" data-msg="Minim 4 caractere" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-4 field">
							<input type="text" name="email" placeholder="* Introduce&#355;i adresa de email" data-rule="email" data-msg="Adresa nu este valid&#259;" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-4 field">
							<input type="text" name="subject" placeholder="* Introduce&#355;i subiectul" data-rule="maxlen:4" data-msg="Minim 4 caractere" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-12 margintop10 field">
							<textarea rows="12" name="message" class="input-block-level" placeholder="* Introduce&#355;i mesajul aici..." data-rule="required" data-msg="Please write something"></textarea>
							<div class="validation">
							</div>
							<p>
								<button class="btn btn-theme margintop10 pull-left" type="submit">Trimite mesajul</button>
								<span class="pull-right margintop20">* V&#259; rug&#259;m s&#259; completa&#355;i toate c&#226;mpurile solicitate &#238;n formular, mul&#355;umim !</span>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/validate.js"></script>
</body>
</html>
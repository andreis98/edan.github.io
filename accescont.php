<?php ob_start(); ?>

<html>
<link href="css/lr.css" rel="stylesheet" />
<?php

include 'core/init.php';

include 'include/header.php';

include 'include/head.php';

if(logged_in() === false) {

?>



    <body>

		<div class="wrapper">

			<div class="content">

				<div id="form_wrapper" class="form_wrapper">

					<form class="login active" action="login.php" method="post">

						<h3>Acces cont</h3>

						<div>

							<label>Utilizator: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="recuperare.php?mode=utilizator">&#354;i-ai uitat numele de utilizator?</a></label>

							<input type="text" name="utilizator"/>

						</div>

						<div>

							<label>Parola: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="recuperare.php?mode=parola">&#354;i-ai uitat parola?</a></label>

							<input type="password" name="parola"/>

						</div>



						<div class="bottom">

							<input type="submit" value="Acces">

							<a href="register.php">Nu de&#355;ii cont? Apas&#259; aici!</a>

							<div class="clear"></div>
							
						</div>
							
				</div>

				<div class="clear"></div>

			</div>

		</div>

    </body>

<?php } 

else {

	exit(header("Location: login.php"));

}?>
</html>
<?php ob_flush(); ?>
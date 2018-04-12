<?php

	include 'core/init.php';

	include 'include/header.php';

	include 'include/head.php';

	header('Content-type: text/html; charset=utf-8');

	protect_page(); 

	 $query = mysql_query("SELECT * FROM categorii");
	 while($row = mysql_fetch_array($query))

					{
						$id = $row['id'];
						$categorie = $row['nume_categorie'];
					}


?>

<div class="main_bg"><!-- start main -->

	<div class="container">
	<h3>Informa&#355;ii despre examene:</h3>
	<ul type="square">
	<li>aceste examene sunt destinate elevilor care vor s&#259;-&#351;i verifice cuno&#351;tin&#355;ele acumulate din lec&#355;iile de pe acest site;</li>
	<li>rezultatele vor fi re&#355;inute &#238;n baza noastr&#259; de date &#351;i vor fi afi&#351;ate &#238;n contul t&#259;u;</li>
	<li>rezultatele ob&#355;inute sunt personale, fiind v&#259;zute doar de elevul care le-a ob&#355;inut &#351;i profesorii &#238;nregistra&#355;i pe site;</li>
	<li>examenul poate fi repetat de c&#226;te ori dore&#351;te elevul, scorul vechi fiind eliminat, iar cel nou afi&#351;at &#238;n cont;</li>
	<li>pentru a alege capitolul pe care vrei s&#259;-l testezi folose&#351;te formularul de mai jos  &#351;i apas&#259; butonul "Aplic&#259;".</li>
	</ul>
			<h4>Capitole:</h4><br>
<form method="post" id='signin' name="signin" action="intrebari.php">
	<div>
		<select class="form-control" name="category" id="category" style="width:300px">

                <option value="1">Managementul resurselor personale</option>

                <option value="2">Ini&#355;ierea &#351;i derularea unei afaceri</option>

                <option value="3">Etica &#238;n afaceri</option>                             

         </select>

	</div>

	<br>

	<button class="btn btn-theme" type="submit"> Aplic&#259; </button>

</form>



</div></div></div>

		<script src="js/jquery-1.10.2.min.js"></script>

		<script src="js/bootstrap.min.js"></script>

		<script src="js/jquery.validate.min.js"></script>

		<script>

			success:function(element, lab) {

					var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");

					var num = Math.floor(Math.random() * 6);

					$(lab).closest('.form-group').find('.help-block').text(messages[num]);

					$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');

					}

		</script>




</div>

</body>

</html>
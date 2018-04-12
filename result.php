<?php

	include 'core/init.php';

	protect_page(); 

	include 'include/header.php';

	include 'include/head.php';

	header('Content-type: text/html; charset=utf-8');

?>



<?php $right_answer=0;

 	$wrong_answer=0;

    $unanswered=0;

    $score = 0;



   $keys=array_keys($_POST);

   $order=join(",",$keys);



   $response=mysql_query("select id,raspcorect from intrebari where id IN($order) ORDER BY FIELD(id,$order)") or die(mysql_error());



   while($result=mysql_fetch_array($response)){

       if($result['raspcorect']==$_POST[$result['id']]){

               $right_answer++;

           }else if($_POST[$result['id']]==5){

               $unanswered++;

           }

           else{

               $wrong_answer++;

           }

    $score = $right_answer*5;

    $category = $_SESSION['category'];

    

   } ?>

<div> 

    <div>

    <h3>Rezulatate "<?php echo $category; ?>" :</h3>

    	

    	<p>Scor : <span class="raspcorect"><?php echo $score;?></span> de puncte</p>

        <p>Răspunsuri corecte : <span class="raspcorect"><?php echo $right_answer;?></span></p>

        <p>Răspunsuri greșite : <span class="raspcorect"><?php echo $wrong_answer;?></span></p>

        <p>Întrebări rămase : <span class="raspcorect"><?php echo $unanswered;?></span></p> 

		<p><h3>Scorul tău a fost introdus in baza de date și va fi afisat in contul tău.</h3></p>

    </div>

    <?php

    $utilizator = $user_data['utilizator'];

	if(exam_exists($category, $utilizator) === true){

		 mysql_query("UPDATE punctaje SET punctaj = '".$score."' WHERE utilizator = '".$utilizator."' AND categorie = '".$category."'");

	} 

   else{

   	mysql_query("INSERT INTO `punctaje` (utilizator, categorie, punctaj) VALUE ('$utilizator', '$category', '$score') ");

  }

    ?>






</div>
 
</body>

</html>
<?php

	include 'core/init.php';

	include 'include/header.php';

	include 'include/head.php';

  	header('Content-type: text/html; charset=utf-8');

	protect_page(); 

	$category='';

	$category=$_POST['category'];

	?>

<div class="main_bg"><!-- start main -->

	<div class="container">

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

			<div class="para"><p>

<form class="form-horizontal" role="form" id='login' method="post" action="result.php">

					<?php 

					$query = mysql_query("SELECT * FROM categorii where id='".$category."' ");

					while($row = mysql_fetch_array($query))

					{

						$continut = $row['nume_categorie'];

						$_SESSION['category'] = $continut;

						echo "<h2>".$continut."</h2>";

					}





					$res = mysql_query("select * from intrebari where categorie='$category' ORDER BY RAND()") or die();

                    $rows = mysql_num_rows($res);

					$i=1;

                while($result=mysql_fetch_array($res)){	?>



                    <?php if($i==1){?>         

                    <div id='question<?php echo $i;?>' class='cont'>

                    <h3><p class='intrebari' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['intrebare'];?></p></h3>

                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp1'];?>

                   <br/>

                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp2'];?>

                    <br/>

                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp3'];?>

                    <br/>

                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp4'];?>

                    <br/>

                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      

                    <br/>

                    </div>     



                     <?php }elseif($i<1 || $i<$rows){?>



                       <div id='question<?php echo $i;?>' class='cont'>

                    <h3><p class='intrebari' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['intrebare'];?></p></h3>

                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp1'];?>

                    <br/>

                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp2'];?>

                    <br/>

                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp3'];?>

                    <br/>

                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp4'];?>

                    <br/>

                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      

                    <br/>

                    

                    </div>



                   <?php }elseif($i==$rows){?>

                    <div id='question<?php echo $i;?>' class='cont'></div>

                    <h3><p class='intrebari' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['intrebare'];?></p></h3>

                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp1'];?>

                    <br/>

                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp2'];?>

                    <br/>

                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp3'];?>

                    <br/>

                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['rasp4'];?>

                    <br/>

                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      

                    <br/>



                    <button id='next<?php echo $i;?>' class='next btn btn-theme' type='submit'>Aplic&#259;</button>

                    </div>

				<?php } $i++;} ?>

		</form>

<?php



if(isset($_POST[1])){ 

   $keys=array_keys($_POST);

   $order=join(",",$keys);



   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";

  // echo $query;exit;



   $response=mysql_query("select id,raspcorect from intrebari where id IN($order) ORDER BY FIELD(id,$order)") or die();

   $right_answer=0;

   $wrong_answer=0;

   $unanswered=0;

   $score=0; 

   while($result=mysql_fetch_array($response)){

       if($result['answer']==$_POST[$result['id']]){

               $right_answer++;

               $score = $score + 25;

           }else if($_POST[$result['id']]==5){

               $unanswered++;

           }

           else{

               $wrong_answer++;

           }



   }

   echo "score   	  : ". $score."<br>";

   echo "right_answer : ". $right_answer."<br>";

   echo "wrong_answer : ". $wrong_answer."<br>";

   echo "unanswered   : ". $unanswered."<br>";

}

?>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

		

</p></div></div></div>


</div>

</body>

</html>
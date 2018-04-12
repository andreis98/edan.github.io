<center><h2>Salut, <?php 
	  echo $user_data['prenume']; 
	  echo ' ';
	  echo $user_data['nume'];
	  ?>!</br> E&#351;ti logat ca <?php
	  if($user_data['tip_utilizator'] == 1)
	  echo 'utilizator';
	  if($user_data['tip_utilizator'] == 2)
	  echo 'profesor';
	  if($user_data['tip_utilizator'] == 3)
	  echo 'administrator';
	  ?>!</h2></center>
<div class="team-container">
					<div class="row">
					<?php if($user_data['tip_utilizator'] == 2 || $user_data['tip_utilizator'] == 3){ ?>

						<div class="col-sm-4">
							<div class="team-member">
								<figure>
									<a href="adaugarelectie.php"><center><i class="fa fa-book fa-5x"></center></i></a>
									<figcaption>
										<p class="member-name">Adaug&#259;</p>
										<p class="designation">
										lec&#355;ie
										</p>
									</figcaption>

								</figure>
							</div>
						</div>
						<?php } ?>
						<div class="col-sm-4">
							<div class="team-member">
								<figure>
									<a href="setari.php"><center><i class="fa fa-cogs fa-5x"></center></i></a>
									<figcaption>
										<p class="member-name">Set&#259;ri</p>
										<p class="designation">
											Cont
										</p>
									</figcaption>

								</figure>
							</div>
						</div>


						<div class="col-sm-4">
							<div class="team-member">
								<figure>
									<a href="<?php echo $user_data['utilizator']; ?>"><center><i class="fa fa-user fa-5x"></center></i></a>
									<figcaption>
										<p class="member-name">Profil</p>
									</figcaption>

								</figure>
							</div>
						</div>
							<div class="col-sm-4">
							<div class="team-member">
								<figure>
									<a href="logout.php"><center><i class="fa fa-sign-out fa-5x"></center></i></a>
									<figcaption>
										<p class="member-name">Delogare</p>
									</figcaption>

								</figure>
							</div>
						</div>
					</div>
				</div>
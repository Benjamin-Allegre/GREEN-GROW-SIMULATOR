<div class="row accordion-body">
   <p>Bienvenue <?=  $_SESSION['username']?>.</p>
   <p>Pour débuter sue Green Grow Simulator, vous devez avoir votre marque déposer</p>
   
   <p>Ferme Cannabicole Extérieur : <?php if($userMarque === null){ ?><?= '0'; ?><?php }else{?><?= '1'; ?><?php } ?> / 1 </p>
   <?php
		if($siegeSocialValide === true){?>
			<p>Bon, t'as réussi te peut être pas si inutile que ça, passons à la suite.</p>
			<form id="01.Bienvenue.php" action="php/actionQuestsVal" method="POST">
				<!-- gain quest -->
				<input type="hidden" value="10" name="exp"/>
				<input type="hidden" value="20000" name="money" />
				<input type="hidden" value="01.Bienvenue.php" name="quest" />
				<input type="hidden" value="02.InstallationSS.php" name="questSuite_0" />
			</form>
			<button form="01.Bienvenue.php" type="submit" class="btn button">Valider</button>
	<?php } ?>
</div>
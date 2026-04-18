<div class="row accordion-body">
   <p>Bienvenue <?=  $user->username() ?>.</p>
   <p>Les premières étapes essentielles seront de définir votre point de départ, afin de développer votre marque de CBD.</p>
   <p>Pour comemencer créer votre marque pour cela il vous suffit d'acheter votre première ferme cannabicole</p>
   <p>Choisir un Pays : <?php if($siegeSocialValide === false){ ?><?= '0'; ?><?php }else{?><?= '1'; ?><?php } ?> / 1 </p>
   <?php
		if($siegeSocialValide === true){?>
			<p>Bon, t'as réussi te peut être pas si inutile que ça, passons à la suite.</p>
			<form id="01.Bienvenue.php" action="php/actionQuestsVal" method="POST">
				<!-- gain quest -->
				<input type="hidden" value="10" name="exp"/>
				<input type="hidden" value="01.Bienvenue.php" name="quest" />
				<input type="hidden" value="02.InstallationSS.php" name="questSuite_0" />
			</form>
			<button form="01.Bienvenue.php" type="submit" class="btn button">Valider</button>
	<?php } ?>
</div>
<div class="row accordion-body">

   <p>Bienvenue <?= htmlspecialchars($user->username()) ?> .</p>
   <p>Pour débuter sur Green Grow Simulator, vous devez avoir votre marque déposer</p>
	<div class="col-md-3"></div>	
   <div class="col-md-6">
		<h6>Récomprense</h6>
		<ul>
				<li>Expérience : 10 Xp</li>
				<li>GreenCoin : 20 000 GC</li>
		</ul>
	</div>
 	<div class="col-md-3"></div>	
	</div>
   <?php
		if($user->marque() === NULL)
		{ ?>
			<div>
            <h4>Créer ta marque</h4>

            <input type="text" id="marqueInput" class="form-control" placeholder="Nom de ta marque">

            <button onclick="saveMarque()" class="btn btn-primary mt-2">
                Valider
            </button>

            <div id="marqueError"></div>
        </div>
  <?php }
		elseif($user->marque() !== NULL){?>
			<h4>Créer ta marque</h4>
			<p>Félicitation <?=  $user->username() ?> pour la création de ta marque :<?=  $user->marque() ?>.</p>
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
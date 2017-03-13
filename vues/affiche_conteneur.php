<HTML>
	<div id='conteneur'>
		<span class='fruit'></span>
		<header>
			<?php /* $this->entete();*/ ?>
		</header>
		<div id='principal'>
			<div id='barre_verticale'>
				<?php $this->affiche_barre_verticale(); ?>
			</div>
			<div id='contenu' style="padding-left: 270px">
				<meta charset='UTF-8'>
				<?php $this->affiche_contenu(); ?>
				<div class='cleaner'></div>
			</div>
			<div class='cleaner'></div>
	</div>
	</div>
</HTML>

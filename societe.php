<?php
   	include_once('class/autoload.php');

	$site = new page_base('societe');

  $site->barre_verticale();
  $site->entete();
	$site->corps = "
    <div id='texte' class='texte3'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
      		<h3>Notre société</h3>
      		<p>Créée en 2011, notre société est implantée en plein coeur de Nantes, à proximité du quartier du Bouffay. <br/>
           Nous avons choisi de proposer à notre clientèle des produits simples ou composés à base de fruits.
            Chacun sait que le fruit est riche en vitamine et participe à l'équilibre alimentaire essentiel à une bonne santé.<br/>
             En consommant de 4 à 6 fruits par jour, nous entretenons notre santé.
              Le fruit peut être dégusté en bouche, en jus, ou en met composé.
               Tous nos fruits sont issus d'une agriculture raisonnée et vendus à petit prix tout en respectant le producteur.
          </p>
        </div>
      </div>
    </div>

		<div class='texte3'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
    			<h3>Fruits locaux</h3>
          <p>Notre société privilégie le commerce avec les producteurs de produit locaux et fait partie des soutiens au commerce équitable.</p>
          <h4>Nos 9 engagements :</h4>
    			<ul>
    				<li class='societe'>Proposer des produits variés d'une qualité exceptionnelle</li>
    				<li class='societe'>Composer nos cocktails avec des produits locaux, cultivés et récoltés avec le plus grand soin</li>
    				<li class='societe'>Offrir une diversité de produits, colorés et festifs</li>
    				<li class='societe'>Composer nos cocktails avec des produits de l'agriculture biologique</li>
    				<li class='societe'>Garantir la transparence de nos produits fabriqués</li>
            <li class='societe'>Garantir l'origine de nos produits</li>
            <li class='societe'>Etre un trait d'union entre les consommateurs et les clients</li>
            <li class='societe'>Etre à votre écoute pour mieux répondre à vos attentes</li>
            <li class='societe'>Payer un prix juste</li>
    			</ul>

          <div class='button raised blue'>
            <div class='centerDetail'>
              <li class='detail'><a class='lien' href='contact.php'>En savoir plus</a></li>
            </div>
          </div>
        </div>
      </div>
    </div>

		<div class='texte3'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
			     <h3>Fruits importés</h3>
           <p>Concernant les fruits plus exotiques où bien ceux qui ne sont pas disponibles chez nos producteurs locaux nous nous assurons des produits que nous importons aussi bien la qualité des fruits que la qualité de transport pour venir jusqu'à notre société.</p>
  		  </div>
      </div>
    </div>
		";
	$site->barre_verticale = "
    <ul class='pad_list'>
      <div class='button raised blue'>
        <div class='centerDetail'>
          <li class='detail'><a class='lien' onclick='window.open(this.href); return false;' style='padding-top:0px' href='http://www.commercequitable.org/'>Commerce équitable</a></li>
        </div>
      </div>
      <div class='button raised blue'>
        <div class='centerDetail'>
          <li class='detail'><a class='lien' onclick='window.open(this.href); return false;' href='http://www.commercequitable.org/images/pdf/garanties/guide-labels-web-7-avril.pdf'>Guide label</a></li>
        </div>
      </div>
      <div class='button raised blue'>
        <div class='centerDetail'>
          <li class='detail'><a class='lien' onclick='window.open(this.href); return false;' href='http://www.territoires-ce.fr/s/'>Territoires de CE</a></li>
        </div>
      </div>
      <div class='button raised blue'>
        <div class='centerDetail'>
          <li class='detail'><a class='lien' onclick='window.open(this.href); return false;' href='http://www.maxhavelaarfrance.org/'>Max Havelaar France</a></li>
        </div>
      </div>
      <div class='button raised blue'>
        <div class='centerDetail'>
          <li class='detail'><a class='lien' onclick='window.open(this.href); return false;' href='http://www.lequitable.fr/equitable-cest-quoi/les-produits-equitables/alimentaires/'>Lequitable</a></li>
          </div>
        </div>
    <paper-ripple fit></paper-ripple>
    </ul>";

	$site->affiche_page();
?>

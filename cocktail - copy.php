<?php
    include_once('class/autoload.php');

    $pagecocktail = new page_base('cocktail');
    $pagecocktail->barre_verticale();
    $pagecocktail->entete();

    $pagecocktail->corps = "
    <div id='Introduction' class='texte4'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
    		  <h3>Cocktails</h3>
      		<p>Sur cette page vous trouverez des cocktails à base de fruits frais.</p>
      		<p>Nos coktails sont inspirés de ces cocktails avec néanmoins quelques secrets de fabrication qui font toute l'originalité de nos préparations.
      		Pour une bonne santé, il est important de manger 5 fruits ou légumes par jour.
      		Chacun de nos coktails est l'équivalent de deux fruits frais.
      		En choisissant de déguster un de nos coktails chaque jour, au petit déjeuner par exemple, vous entretenez votre santé !</p>
        </div>
      </div>
    </div>

		<div id='Nantais'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
    			<h3> Smoothie Nantais </h3>
            <img class='image_left' src='img/image_03.jpg'/>
        			<div id='Liste_ingrédients'>
        				<h4>Ingrédients (pour 2 personnes) : </h4>
                  <li class='societe'>2 oranges</li>
                  <li class='societe'>1 clémentine</li>
                  <li class='societe'>1 citron</li>
                  <li class='societe'>lait (facultatif)</li>
                  <li class='societe'>2 morceaux de sucre</li>
                  <li class='societe'>quelques glaçons</li>
                <h4>Préparation de la cocktail :</h4>
                  <p>Pressez les oranges et le citron, vous pouvez ajoutez une clémentine pour adoucir.
                  Versez le mélange dans une carafe.
                  Rajoutez du lait à votre convenance, mais pas trop tout de même.
                  Rajoutez un peu de sucre, et complétez avec les glaçons.</p>

                <div class='button raised blue'>
                  <div class='center'>
                    <a class='lien_detail' href=''>Détails</a></li>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id='Exotique'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
      	 <h3> Smoothie Exotique </h3>
    		  <img class='image_left' src='img/image_04.jpg'/>
      			<div class='Liste_ingrédients'>
      				<h4>Ingrédients (pour 2 personnes) :</h4>
                <li class='societe'>200 g de fruits rouges (congelés de préférence)</li>
                <li class='societe'>1 yaourt a la vanille ou nature</li>
                <li class='societe'>20 cl de jus de fruits</li>
                <li class='societe'>1 glace vanille (facultatif)</li>
              </div>
              <h4 style='margin-top:47px;'>Préparation de la cocktail :</h4>
                <p>Dans un premier temps, verser un verre de jus de fruits dans un blender, puis ajouter le yaourt et la glace puis mixer.
                Enfin, ajouter les fruits rouges selon votre goût et re-mixer.
                Smoothie frais et délicieux assuré !</p>

              <div class='button raised blue'>
                <div class='center'>
                  <a class='lien_detail' href=''>Détails</a></li>
                </div>
              </div>
    			  </div>
          </div>
        </div>

		<div id='Verts'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
    		  <h3> Smoothie Vert </h3>
      			<img class='image_left' src='img/image_05.jpg'/>
              <div class='Liste_ingrédients'>
      			   <h4>Ingédients pour 1 verre :</h4>
          			<li class='societe'>Un demi concombre</li>
          			<li class='societe'>Une demi pomme</li>
          			<li class='societe'>200ml d elait de soja</li>
          			<li class='societe'>10 feuilles de menthe</li>
          			<li class='societe'>3 glaçons</li>
              </div>
    			    <h4 style='margin-top:29px;'>Préparation de la cocktail :</h4>
    			      <p>Lavez les ingédients. Epluchez la pomme et le concombre. Découpez les en morceaux. Versez le tout progressivment dans le mixeur. Servez et dégustez !</p>

              <div class='button raised blue'>
                <div class='center'>
                  <a class='lien_detail' href=''>Détails</a></li>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id='Detox'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
    		  <h3> Smoothie Detox </h3>
    		    <img class='image_left' src='img/image_06.jpg'/>
              <div class='Liste_ingrédients'>
          			<h4>Ingédients pour 1 verre :</h4>
          			<li class='societe'>1 banane</li>
          			<li class='societe'>150 g de figues</li>
          			<li class='societe'>20 cl de lait</li>
              </div>
              <h4 style='margin-top:65px;'>Préparation de la cocktail :</h4>
        			   <p>Epuchez la banane et les figues et coupez le tout en rondelles. Mélangez tous les ingrédients et mixez dans un blender pendant 30 secondes.</p>

        			<div class='button raised blue'>
                <div class='center'>
                  <a class='lien_detail' href=''>Détails</a></li>
              </div>
            </div>
          </div>
        </div>
  		</div>

    <div id='Energie'>
      <div id='cardCocktail'>
        <div class='cardCocktail'>
      		<h3> Smoothie Energie </h3>
        		<img class='image_left' src='img/image_07.jpg'/>
              <div class='Liste_ingrédients'>
        			   <h4>Ingédients pour 2 personnes :</h4>
            			<li class='societe'>1 pomme</li>
            			<li class='societe'>1 orange</li>
            			<li class='societe'>1 kiwi</li>
            			<li class='societe'>10 cl de lait demi-écrémé</li>
            			<li class='societe'>6 glaçons</li>
            			<li class='societe'>1 c. à café de miel</li>
              </div>
              <h4>Préparation de la cocktail :</h4>
        			   <p>Pelez le kiwi, la pomme et l'orange.Coupez-les en cubes, et mixez-les avec le miel et les glaçons.Ajoutez un peu de lait, jusqu'à obtention de la consistance désirée.Versez dans un grand verre ou deux petits verres.</p>

             <div class='button raised blue'>
               <div class='center'>
                 <a class='lien_detail' href=''>Détails</a></li>
               </div>
             </div>
    			</div>
        </div>
      </div>
    </div>
		";

    $pagecocktail->barre_verticale = "
    <div id='barre_horizontale'>
      <ul class='pad_list'>
        <div class='button raised blue'>
          <div class='centerDetail'>
            <li class='detail'><a class='lien' href='#Nantais'>Nantais</a></li>
          </div>
        </div>
        <div class='button raised blue'>
          <div class='centerDetail'>
            <li class='detail'><a class='lien' href='#Exotique'>Exotique</a></li>
          </div>
        </div>
        <div class='button raised blue'>
          <div class='centerDetail'>
            <li class='detail'><a class='lien' href='#Verts'>Verts</a></li>
          </div>
        </div>
        <div class='button raised blue'>
          <div class='centerDetail'>
            <li class='detail'><a class='lien' href='#Detox'>Détox</a></li>
          </div>
        </div>
        <div class='button raised blue'>
          <div class='centerDetail'>
            <li class='detail'><a class='lien' href='#Energie'>Energie</a></li>
            </div>
          </div>
      <paper-ripple fit></paper-ripple>
      </ul>
    </div>
      ";

    $pagecocktail->affiche_page();
    ?>

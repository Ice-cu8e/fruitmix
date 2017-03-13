<html>
<?php
  $pageAccueil = new page_base('accueil');

  $pageAccueil->barre_verticale();
  $pageAccueil->entete();

  $pageAccueil->corps ='
  <body>

    <div id="image_droite">
    <figure>
      <a href="cocktail.php" target="_parent">
        <img src="img/cocktail 2.jpg" alt="image" class="image"/>
      </a>
      <figcaption>Exemple de Cocktails</figcaption>

      <a href="produit.php" target="_parent">
        <img src="img/panier de fruit.jpg" alt="image" class="image" />
      </a>
      <figcaption>Exemple de panier de fruits</figcaption>
    </figure>
  </div>

  <div id="texte_centre">
    <div id="card">
      <div class="card">
          <h3>Qu&apos;est-ce que c&apos;est </h3>
            <p>Les fruits sont savoureux, faciles à digérer, donnent un regain d’énergie et sont riches en vitamines et en minéraux. Ils peuvent être consommés sous différentes formes : en les croquant à pleines dents, en jus, crus ou cuits, cuisinés en tartes, en déssert ou sorbets.</p>
            <p>Les légumes et les fruits sont remplis de nutriments indispensables au bon fonctionnement de l’organisme comme des vitamines et des minéraux. Ils apportent à l’organisme de l’énergie et aident à lutter contre de nombreuses maladies comme les maladies cardiovasculaires, le diabète ou l’excès de « mauvais » cholestérol. De plus, ils contiennent des antioxydants qui protègent les cellules du corps des dommages causés par les radicaux libres (= substances produites au cours du fonctionnement normal de l’organisme).</p>
            <p>Le Programme National Nutrition Santé en France préconise de manger 5 fruits et légumes par jour ce qui, d’après le tableau des Apports Journaliers Recommandés (AJR)3, correspond à la quantité nécessaire pour satisfaire les besoins de l’organisme en vitamines, minéraux et fibres. </p>
      </div>
    </div>

    <div id="card" style="padding-top:0px;">
      <div class="card" style="height:auto;">
        <h3>Nos produits</h3>
          <p>Vous trouverez une large gamme de produits venant de tous les coins du globe. Si les pommes et les poires sont des produits locaux, les produits exotiques proviennent de plantation label équitable, garantissant une juste rémunération des producteurs. </p>
      </div>
    </div>

    <div id="card" style="padding-top:0px;">
      <div class="card" style="height:auto;">
        <h3>Cocktails</h3>
          <p>cocktails faciles, à déguster seul ou entre amis. Quelques cocktails ont même réalisables par les tous petits. Notre préférée : le gâteau des îles aux délicats parfums du sud.</p>
        </div>
      </div>
    </div>
  </body>'
?>
</html>

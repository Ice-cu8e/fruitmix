-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Mars 2017 à 13:14
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fruitmix`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `mdp` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`id`, `login`, `mdp`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `catcocktail`
--

CREATE TABLE `catcocktail` (
  `id` int(11) NOT NULL,
  `libCatCocktail` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `catcocktail`
--

INSERT INTO `catcocktail` (`id`, `libCatCocktail`, `description`) VALUES
(1, 'Vitaminés', 'Revigorant, essentielle pour passer une bonne journée.'),
(2, 'Au fruits rouges', 'Basé essentiellement à base de fruits rouges tous délicieux.'),
(3, 'A base de légumes', 'Contient tout les légumes nécessaire pour une santée parfaite.'),
(4, 'Tonique', 'Si vous avez besoins d\'énergie avant un effort.'),
(5, 'Printanier', 'Pour les apéros en terrasse'),
(6, 'Santé', 'Permet de récupérer en douceur.');

-- --------------------------------------------------------

--
-- Structure de la table `catproduit`
--

CREATE TABLE `catproduit` (
  `id` int(11) NOT NULL,
  `lib` varchar(64) NOT NULL,
  `texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `catproduit`
--

INSERT INTO `catproduit` (`id`, `lib`, `texte`) VALUES
(1, 'Fruits rouges', 'Canneberge, cassis, cerise, fraise, framboise, goji, groseille. La fraise est tonique, reminéralisante, diurétique et laxative, elle favorise le rejet des toxines. La framboise, riche en vitamine C et en calcium, chasse la fatigue et stimule la digestion. Dépurative et diurétique, elle est recommandée contre les rhumatismes.'),
(2, 'Fruits exotiques', 'Ananas, banane, fruits de la passion, goyave, litchi, mangue, noix de coco. Très nutritive, la banane renforce les os et équilibre le système nerveux. Bonne source de potassium, elle facilite le sommeil.'),
(3, 'Fruits à coque', 'Amande, cajou, noisette, noix, pistache. En français, on appelle ces fruits « fruits à écale ». Le mot « noix », quant à lui, désigne spécifiquement le fruit du noyer. Toutefois, peut-être sous l’influence de l’anglais, où le terme générique est nut (tandis que le fruit du noyer s’appelle walnut), la plupart des gens odonnent à tous les fruits à écale le nom de « noix ».'),
(4, 'Agrumes', 'Clémentine, mandarine, orange, citron, citron vert. Les agrumes très riches en vitamine C permettent de combattre le rhume et la fatigue. Diurétiques et légèrement laxatifs, ils contiennent aussi de la vitamine PP qui protège les capillaires sanguins. Aussi très riche en potassium et acide folique.'),
(5, 'Fruits sauvages', 'Figue, fraise des bois, nèfles, mûre, myrtille. Les fibres de la figue et sa pectine améliorent le transit intestinal, apaisent la colite et réduisent le cholestérol. La figue sèche est très riche en calcium, magnésium et potassium.'),
(6, 'Fruits à noyau', 'Abricot, brugnon, pêche, prune. Très riche en vitamine A (2 abricots suffisent à couvrir nos besoins quotidiens), en bêta-carotène, en fer. Antianémique, équilibre les nerfs et favorise le sommeil. Sec, il est riche en potassium.'),
(7, 'Fruits du jardin', 'Poire, pomme, raisin. Riche en vitamine C et potassium. Réduit le mauvais cholestérol (LDL) et augmente le bon cholestérol (HDL). Baisse la tension artérielle et stabilise la glycémie. Antistress et tonique musculaire et nerveux.');

-- --------------------------------------------------------

--
-- Structure de la table `cocktail`
--

CREATE TABLE `cocktail` (
  `id` int(11) NOT NULL,
  `libCocktail` varchar(64) DEFAULT NULL,
  `categorie` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `recette` text,
  `image` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cocktail`
--

INSERT INTO `cocktail` (`id`, `libCocktail`, `categorie`, `description`, `recette`, `image`) VALUES
(1, 'Cocktail Nantais', 1, 'Cocktail estival', 'test \\n test', 'vitamine'),
(2, 'Cocktail Exotique', 2, 'Cocktail de fruits rouges', 'Ingrédients (pour 2 personnes) :\r\n• 200 g de fruits rouges (congelés de préférence)\r\n• 1 yaourt a la vanille ou nature\r\n• 20 cl de jus de fruits\r\n• 1 glace vanille (facultatif)\r\n\r\nPréparation de la recette :\r\nDans un premier temps, verser un verre de jus de fruits dans un blender, puis ajouter le yaourt et la glace puis mixer.\r\nEnfin, ajouter les fruits rouges selon votre goût et re-mixer.\r\nSmoothie frais et délicieux assuré !', 'fruitRouges'),
(3, 'Cocktail Vert', 3, 'Cocktail Energisant', 'Ingrédients pour 1 verre :\r\n• Un demi concombre\r\n• Une demi pomme\r\n• 200ml de lait de soja\r\n• 10 feuilles de menthe\r\n• 3 glaçons\r\n\r\nPréparation de la recette :\r\nLavez les ingrédients. Épluchez la pomme et le concombre. Découpez les en morceaux. Versez le tout progressivement dans le mixeur. Servez et dégustez !', 'abasedelegumes'),
(4, 'Cocktail Detox', 6, 'Cocktail Santé', 'Ingédients pour 1 verre :\r\n• 1 banane\r\n• 150 g de figues\r\n• 20 cl de lait\r\n\r\nPréparation de la recette :\r\nEpluchez la banane et les figues et coupez le tout en rondelles. Mélangez tous les ingrédients et mixez dans un blender pendant 30 secondes.', 'printanier'),
(5, 'Cocktail Energie', 4, 'Cocktail Energisant', 'Ingrédients pour 2 personnes :\r\n• 1 pomme\r\n• 1 orange\r\n• 1 kiwi\r\n• 10 cl de lait demi-écrémé\r\n• 6 glaçons\r\n• 1 c. à café de miel\r\n\r\nPréparation de la recette :\r\nPelez le kiwi, la pomme et l\'orange.Coupez-les en cubes, et mixez-les avec le miel et les glaçons.Ajoutez un peu de lait, jusqu\'à obtention de la consistance désirée.Versez dans un grand verre ou deux petits verres.', 'tonique');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `civilite` varchar(64) DEFAULT NULL,
  `nom` varchar(64) DEFAULT NULL,
  `prenom` varchar(64) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `cp` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `message` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `civilite`, `nom`, `prenom`, `age`, `mail`, `ville`, `cp`, `type`, `message`) VALUES
(21, '', '', '', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, '', ''),
(20, '', '', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, '', ''),
(19, '', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, '', ''),
(18, 'Monsieur', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', ''),
(17, '', 'Sohier', '', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, '', 'dd'),
(16, 'Monsieur', 'Sohier', '', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', 'dd'),
(15, 'Monsieur', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', 'ddd'),
(14, 'Monsieur', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', 'kjdk'),
(13, 'Monsieur', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'commentaire', 'DKR'),
(12, 'Monsieur', 'sohier', 'thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', 'test'),
(22, 'Monsieur', 'Sohier', 'Thomas', 19, 'thomas.sohier44@gmail.com', 'Sainte-luce-sur-loire', 44980, 'remarque', 'knkjn');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `description` text,
  `image` varchar(25) DEFAULT NULL,
  `cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `image`, `cat`) VALUES
(1, 'Fraise', 'La fraise est le fruit des fraisiers (Fragaria), plantes herbacées de la famille des Rosaceae. Ces fruits sont botaniquement parlant des faux-fruits. Espèce la plus consommée dans le monde est issue de hybride Fragaria. Quelques fruits des autres espèces sans rapport avec Fragaria, et par analogie de forme, portent le nom vernaculaire de fraise.', 'fraise', 1),
(2, 'Cerise', 'La cerise est le fruit comestible du cerisier. La cerise est, après la fraise, le plus populaire des petits fruits rouges. Petit fruit charnu à noyau, de forme sphérique, de couleur généralement rouge plus ou moins foncé, plus rarement jaune.', 'cerise', 1),
(3, 'Framboise', 'Ce fruit est issu de la transformation de la quarantaine de minuscules carpelles de fleur, qui se transforment en drupéoles semi-soudées. Les carpelles sont attachés mais non fusionnés et une « polydrupe » car chaque drupéole, remplie de pulpe juteuse et contenant une graine. La face externe du fruit est recouverte de poils microscopiques, ce qui donne à la framboise son aspect velouté. Le framboisier forme naturellement une touffe dont les rameaux se renouvellent annuellement par émission de nouveaux rejets. Fruit fragile et délicat, il est généralement présenté en barquettes pour le protéger des chocs et des manipulations.', 'framboise', 1),
(4, 'Groseille', 'La groseille rouge est le fruit du groseillier rouge, arbrisseau de un mètre et demi à port décombant. Les branches sont naturellement arquées. Les feuilles, vert moyen à foncé, comportent trois lobes à rebord découpé et se relient aux tiges à travers un pédoncule faisant environ une fois la longueur axiale de la feuille, par groupes de trois, parfois cinq feuilles. Un léger renflement se forme à l’endroit où les feuilles émergent de la tige. Leurs cousins sont les cassis qui, eux, poussent en région montagnarde ', 'groseille', 1),
(5, 'Litchi', 'Le litchi est un fruit comestible. Il est produit par Litchi chinensis, un arbre tropical de la famille des Sapindaceae, le seul représentant du genre Litchi. La partie consommée entoure une graine unique. Le litchi ressemble, par sa structure, à des fruits tropicaux de la même famille : le longane, le ramboutan, la quenette. Le litchi est originaire de Chine où sa culture est attestée depuis plus de 2 100 ans.', 'litchi', 2),
(6, 'Ananas', 'Ananas est une plante xerophyte, originaire des Amériques du Sud (nord du Brésil), centrale et des Caraïbes. Il est connu principalement pour son fruit comestible, qui est en réalité une infrutescence. Le mot ananas vient du tupi-guarani naná naná, qui signifie « parfum des parfums ».', 'ananas', 2),
(7, 'Fruit de la passion', 'Le fruit de la passion est cultivé pour ses fruits comme la vigne, sur des échalas et des fils de fer, dans les régions chaudes. Ses fruits sont nommés fruits de la passion ou maracudja (mot créole). En Nouvelle-Calédonie, ils sont appelés pomme-lianes et à Haïti, grenadia. Au Brésil, on dit maracujá.', 'passion', 2),
(8, 'Fraise des bois', 'Le Fraisier des bois (Fragaria vesca) est une espèce de plantes herbacées vivaces de la famille des Rosaceae. Le fraisier des bois est encore appelé « fraisier commun » ou « fraisier sauvage » , ou encore « fraisier des quatre saisons » pour les variétés remontantes.', 'bois', 5),
(9, 'Amande', 'De forme ovoïde, recouverte de peau veloutée au toucher, verte et duveteuse, ce fruit à coque ressemble à une petite pêche verte, dont la chair reste mince, dure et sèche et ne devient jamais juteuse. Elle renferme un noyau jaune crevassé et ligneux, à coque épaisse (amandon), qui renferme une ou deux graines, également appelées « amandes ». Collation nutritive qui enraye la sensation de faim. Graine oléagineuse à la chair pâle, croquante, douce ou amère (pour les amandes sauvages). Oblongue et aplatie, pointue, elle est couverte de peau brune légèrement velue. Récolté en juin et juillet.', 'amande', 3),
(10, 'Noix de coco', 'La noix de coco est le fruit du cocotier, un des représentants de la famille des palmiers ou Arécacées. La fleur complète fait 30 centimètres de diamètre. Extérieur du fruit lisse et de couleur vert clair ou orange, tirant sur le brun et recouvert de couche de fibres ligneuses brunes entourant la noix à maturité et composé de une solide coque sphérique qui protège une amande blanchâtre comestible. Le cocotier est probablement originaire de la région indomalaise. Il est maintenant acclimaté dans la plupart des pays tropicaux.', 'noix', 2),
(11, 'Kumquat', 'Fortunella est un genre de agrumes dont les espèces sont appelées Kumquat. Les kumquats sont des arbres fruitiers de la famille des Rutaceae, originaires de Chine et de Malaisie.', 'kumquat', 4),
(12, 'Orange', 'Agrume, fruit des orangers, des arbres de différentes espèces de la famille des Rutacées, il existe plusieurs types de ce fruit, principalement issus de Citrus sinensis comme les oranges sanguines, et les oranges amères produites par le bigaradier. Comestible, elle est très riche en vitamine C. Quatrième fruit le plus cultivé au monde. Pomme en or du jardin des Hespérides.', 'orange', 4),
(13, 'Goji', 'Le goji ou baie de goji, est le nom commercial de la baie du lyciet, origine Chine. Il se présente comme une petite baie orange, allongée, de saveur légèrement sucrée. On lui accorde en Asie des vertus médicinales exceptionnelles. Il est souvent commercialisé sous forme séchée ou sous forme de jus. Le nom « goji » a été fabriqué en 1973 par un ethnobotaniste nord américain, Bradley Dobos, à partir des parlers locaux himalayens.', 'goji', 1),
(14, 'Canneberge (Cranberrie)', 'La canneberge, la grande airelle rouge, origine Amérique du Nord, souvent appelée par son nom anglais dans les produits industriels en Europe, cranberry, est un arbrisseau qui croît dans les tourbières des régions froides. Sa présence caractérise les sols à sphaignes, imbibés en eau.', 'canneberge', 1),
(15, 'Cassis', 'Le cassis est le fruit et, parfois, le nom vernaculaire de Ribes nigrum, arbrisseau de la famille des Grossulariacées origine : Europe septentrionale, poussant spontanément dans les régions montagneuses et froides de la zone paléoarctique.', 'cassis', 1),
(16, 'Pomme', 'Le pouvoir antioxydant de la pomme contribuerait à réduire le risque de maladies cardiovasculaires. En effet, les antioxydants contenus dans la pomme aideraient à diminuer les lipides en circulation dans le sang et réduiraient le taux de cholestérol sanguin. Selon une récente étude, la consommation de pommes sous forme de fruit frais réduirait aussi l’incidence du syndrome coronaire aigu (SCA), en particulier chez les hommes. Ce syndrome comprend l’angine de poitrine instable et l’infarctus du myocarde.', 'pomme', 7),
(17, 'Poire', 'La poire contient plusieurs composés phénoliques. Grâce à leur pouvoir antioxydant, ces substances présentes dans les aliments d’origine végétale peuvent prévenir plusieurs maladies, dont certains types de cancers et de maladies cardiovasculaires. Dans la poire, ces composés phénoliques, des flavonoïdes et des acides phénoliques, sont présents surtout dans la pelure, mais aussi en plus petite quantité dans la chair du fruit.', 'poire', 7),
(18, 'Prune', 'Quetsche, mirabelle, reine-claude, prunes américaines ou japonaises jaunes, noires ou rouges : chacune de ces variétés a ses atouts.', 'prune', 6),
(19, 'Abricot', 'Une belle peau orangée, tâchée de roux, un noyau unique renfermant une amande parfumée et une chair moelleuse et rafraîchissante : voici l abricot. Les variétés d abricots sont liées à leur région de production : en Languedoc-Roussillon, il y a le Lambertin n°1, le Rouge de Roussillon dans les Pyrénées Orientales, l Orangé de Provence dans le Sud de la Drôme et le Bergeron dans la vallée du Rhône.', 'abricot', 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `catcocktail`
--
ALTER TABLE `catcocktail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `catproduit`
--
ALTER TABLE `catproduit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cocktail`
--
ALTER TABLE `cocktail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_catcocktail` (`categorie`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CatProduit` (`cat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `catcocktail`
--
ALTER TABLE `catcocktail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `catproduit`
--
ALTER TABLE `catproduit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `cocktail`
--
ALTER TABLE `cocktail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

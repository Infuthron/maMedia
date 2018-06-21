-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2018 at 01:46 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mamedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bannedip`
--

CREATE TABLE IF NOT EXISTS `bannedip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `muted` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `muted`) VALUES
(1, '1526385986.png', ''),
(2, '1525437586.ico', ''),
(3, '1528187524.png', 'true'),
(4, '1526303787.png', ''),
(5, '1525615129.mp4', 'true'),
(7, '1527180884.png', ''),
(8, '1527180867.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `opdrachten`
--

CREATE TABLE IF NOT EXISTS `opdrachten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `onderwerp` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `beschrijving` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `opdrachten`
--

INSERT INTO `opdrachten` (`id`, `email`, `onderwerp`, `beschrijving`) VALUES
(1, 'joostvanhoornen@hotmail.nl', '0', 'is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren ''60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.'),
(2, 'janwillem@contact.nl', '4', 'is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren ''60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren ''60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.'),
(6, 'test@gmail.com', 'test onderwerp', 'bericht...'),
(7, '22061@ma-web.nl', 'Test', 'Test'),
(8, '&lt;svg \\&quot;ons&gt;', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `text1` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `text2` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `text1`, `text2`) VALUES
(1, 'MAMEDIA', '', ''),
(2, 'OVER ONS', 'Mamedia is het interne leerbedrijf van het Mediacollege Amsterdam gerund door een jong team van video- en tv-makers.', 'Ons team bestaat uit studenten afkomstig van verschillende media-gerelateerde opleidingen uit alle windstreken van ons land. Zij vullen elkaar aan om zo mooie videoproducties tot stand te laten komen. Samen combineren zij hun kennis, jeugdige frisheid en energie.\r\n\r\nDe videoproducties die Mamedia uitvoert zijn heel divers, dit gaat van promovideo&acirc;€™s tot aftermovies tot narrowcasting en zelf bedachte items. Bij Mamedia krijg je namelijk ook veel vrijheid om je eigen idee&Atilde;&laquo;n uit te voeren, dit kan voornamelijk bij ons wekelijkse live tv-programma &acirc;€˜Amsterdammertjes&acirc;€™. \r\n\r\nHeeft u een opdracht zoals bovenstaand beschreven en interesse om samen te werken met Mamedia? Lees dan verder onder &#039;Samenwerken&amp;quot; en vul het contactformulier in.'),
(3, 'PORTFOLIO', 'Veelzijdige producties waar we trots op zijn.', ''),
(4, 'SAMENWERKEN', 'Mamedia werkt samen met echte klanten!', 'SAMENWERKEN\r\n\r\nMamedia is het interne leerbedrijf in mediaproductie van het Mediacollege Amsterdam. Voor een goede praktijkopleiding werken we graag met echte projecten en klanten.\r\n\r\nDe diensten van Mamedia bestaan hoofdzakelijk uit videoproductie (voor een volledig overzicht zie Over ons). Afhankelijk van de disciplines van het team kan Mamedia ook animaties, grafische vormgeving en webdesign verzorgen. Het productieteam bestaat volledig uit mediastagiairs, afkomstig van het mbo, hbo en/of wo. Zij werken onder begeleiding, maar zijn zelf verantwoordelijk voor het optimaal bedienen van de opdrachtgever.\r\n\r\nLEERMOGELIJKHEDEN\r\nBij projectaanvragen kijken wij naar de leermogelijkheden voor de stagiairs. Projecten zijn voor ons een onderwijsactiviteit waarbij bepaalde leerdoelen of competenties behaald moeten kunnen worden. Daarom wordt beoordeeld of een project binnen het bedrijf past. Er wordt onder andere gekeken naar de leermogelijkheden, uitdaging en de termijn waarop de opdracht uitgevoerd kan worden.\r\n\r\nONDERSTEUNING\r\nBij de uitvoering van een project vragen wij van u als klant minimaal het volgende:\r\n&acirc;€&cent; u investeert tijd en energie in de begeleiding van de stagiairs en het project;\r\n&acirc;€&cent; u introduceert/brieft het project aan de stagiairs;\r\n&acirc;€&cent; u zorgt voor vervoer van personen en middelen (indien van toepassing);\r\n&acirc;€&cent; u zorgt dat de stagiair veilig kan werken (indien van toepassing);\r\n&acirc;€&cent; u draagt zorg voor de afhandeling van de naburige rechten van bijvoorbeeld muziek of stockmateriaal (indien van toepassing);\r\n&acirc;€&cent; Samen met de stagiairs en projectbegeleider/eindredacteur beoordeelt en evalueert u het project.\r\n\r\nMamedia is een onderwijsorganisatie zonder winstoogmerk. Eventuele onkosten brengen we bij u in rekening. Mamedia is niet btw-plichtig.\r\n\r\n \r\n\r\nPROJECT AANMELDEN\r\n\r\nHet aanmelden van een project gaat via onderstaande link.\r\n\r\nLET OP\r\nAlle projectaanvragen worden beoordeeld op onderwijsrelevantie. Dat betekent dat niet alle projecten door Mamedia uitgevoerd worden, of dat ze mogelijk op een later moment worden uitgezet.\r\n\r\nAls een project doorgaat, heeft Mamedia naar u een inspanningsverplichting, geen resultaatverplichting. De stagiairs en projectbegeleider/eindredacteur doen hun uiterste best om het project succesvol te laten verlopen. Toch kan het voorkomen dat het eindproduct niet (geheel) aan uw verwachtingen voldoet of dat er hindernissen in het proces optreden. Daardoor is het mogelijk dat u meer tijd, energie of middelen in het project steekt dan vooraf is ingeschat of dat afgesproken deadlines niet worden gehaald.\r\n\r\nONKOSTENVERGOEDING\r\nMamedia rekent per video een vergoeding. Dit hangt af van de moeilijkheidsgraat, tijd en moeite die in een video zit. Ook vragen wij een reiskosten- en materiaalkostenvergoeding indien dit van toepassing is. \r\n\r\nPROJECT AANGEMELD?\r\nBinnen 10 werkdagen neemt een contactpersoon van Mamedia contact met u op om uw aanvraag en de verdere werkwijze door te nemen.\r\n\r\nPROJECT AANMELDEN\r\nU kunt een project aanmelden door het formulier hieronder in te vullen.'),
(5, 'STAGE', 'Mamedia biedt je een unieke stageplaats met veel verantwoordelijkheid en afwisseling.', 'Mamedia zoekt stagiaires!\r\n\r\nMamedia bied je een unieke stageplaats, waar je verantwoordelijkheid, ruimte om te experimenteren en veel creatieve vrijheid krijgt. Mamedia is het interne leer- en productiebedrijf van het Mediacollege Amsterdam.\r\n\r\nPast deze stage bij jou?\r\n\r\nWil jij in een leer- en productiebedrijf stage lopen, waarbij je veelzijdige projecten mag uitvoeren? Dan biedt Mamedia jou een unieke mogelijkheid. Mamedia is op zoek naar stagiaires afkomstig van verschillende media-gerelateerde opleidingen. \r\nAlle stagiaires binnen Mamedia vormen een bont gezelschap, die elkaar op allerlei vlakken aanvullen. Met als resultaat fantastische eindproducten, gecre&Atilde;&laquo;erd in een jeugdige, dynamische omgeving.\r\n\r\nWerkzaamheden:\r\n\r\nFilmen met spiegelreflexcamera&acirc;€™s (Canon 60D, 70D en Panasonic HC-X1)\r\nMonteren op Macs met Adobe software\r\nHet maken van veel verschillende soorten videoproducties voor diverse opdrachtgevers. (promovideo&acirc;€™s, aftermovies  etc.)\r\nHet produceren van je zelfbedachte video&acirc;€™s (items, straatinterviews etc.\r\nWekelijks een live uitzending produceren voor ons programma &acirc;€˜Amsterdammertjes&acirc;€™ op Salto 1 (bedenk de content, produceer items, presenteer en doe de techniek van de uitzending)\r\nHet onderhouden van de social media\r\nVerzorg de narrowcasting (beeldschermen in het gebouw) van het Mediacollege \r\nOnderhoudt het contact met de opdrachtgevers \r\n\r\nProfiel:\r\n\r\nJe bent een MBO, HBO of WO student binnen de media opleidingen: mediamanagement, mediaredactie, mediavormgeving of audiovisueel.\r\nJe bent vertrouwd met Mac en Adobe software\r\nJe kan zorgvuldig omgaan met apparatuur\r\nJe hebt een creatieve geest die graag meedenkt en initiatief toont\r\nJe hebt kennis van mediaproducties en hebt hier passie voor\r\nJe hebt ervaring met filmen en editen\r\nJe kan goed communiceren en beheerst de Nederlandse taal goed\r\nJe vind het leuk om samen te werken met leeftijdsgenoten \r\nJe kan zelfstandig werken m&Atilde;&iexcl;&Atilde;&iexcl;r ook goed in teamverband werken\r\nJe hebt een groot verantwoordelijkheidsgevoel en je weet van aanpakken\r\n\r\nRijbewijs benodigd: nee\r\n\r\nWat Mamedia biedt:\r\nMamedia biedt een stagemogelijkheid voor 32 &acirc;€“ 40 uur per week vanaf 5 februari 2018. De stagevergoeding voor mbo-stagiaires is &acirc;‚&not; 250,- per maand en voor hbo- en wo-stagiaires &acirc;‚&not; 300,- per maand.\r\n\r\nWil je solliciteren?\r\nEnthousiast geworden? Meer weten? Nadere informatie kun je inwinnen bij Liesbeth Zuidema, Co&Atilde;&para;rdinator Mamedia, bereikbaar op het telefoonnummer 06 &acirc;€“ 12299715 of via l.zuidema@ma-web.nl\r\n\r\nWij verzoeken je nadrukkelijk jouw CV en motivatie te sturen door te klikken op deze sollicitatiepagina-link.'),
(6, 'AMSTERDAMMERTJES', '', 'Amsterdammertjes is ons live tv-programma op Salto 1! Het is een talkshow voor en door jongeren, met vaste items en een studiogast. Bij Amsterdammertjes kan je je creatieve vrijheid kwijt. Je bedenkt de content, regelt alles, filmt, edit, presenteert en je doet zelfs de techniek van de uitzending. Benieuwd geworden? Klik dan hier om uitzendingen van Amsterdammertjes te kijken!'),
(8, 'CONTACT FORMULIER', 'Hier komt de tekst van het contact formulier.', ''),
(7, 'CONTACT', 'Mamedia is het mediaproductiebedrijf van het Mediacollege Amsterdam, gedreven door een jong team van video- en tvmakers.\nOns team bestaat uit studenten afkomstig van verschillende media-gerelateerde opleidingen uit alle windstreken van ons land. Zij vullen elkaar aan om zo mooie videoproducties tot stand te laten komen. Samen combineren zij hun kennis, jeugdige frisheid en energie.\nDe videoproducties die Mamedia uitvoert zijn heel divers, dit gaat van promovideoâ€™s tot aftermovies tot narrowcasting en zelf bedachte items. Bij Mamedia krijg je namelijk ook veel vrijheid om je eigen ideeÃ«n uit te voeren, dit kan voornamelijk bij ons wekelijkse live tv-programma â€˜Amsterdammertjesâ€™. Meer hierover weten? Klik dan hier!\nHeeft u een opdracht zoals bovenstaand beschreven en interesse om samen te werken met Mamedia? Klik dan hier voor meer informatie! ', ''),
(9, 'STAGE FORMULIER', 'Hier komt de tekst van het stage formulier.', '');

-- --------------------------------------------------------

--
-- Table structure for table `personeel`
--

CREATE TABLE IF NOT EXISTS `personeel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `personeel`
--

INSERT INTO `personeel` (`id`, `naam`, `image`, `text`) VALUES
(72, 'Nikita', '1526641527.gif', 'Nikita is niet bang om te presenteren en helpt content te vormen tot realisme. De momenten zijn schaars, maar zodra ze kleur draagt blaast je echt omver.'),
(74, 'Liesbeth', '1526641596.gif', 'De big boss van ons team houdt van creatieve uitdagingen en sleept de leukste opdrachten binnen voor het team van Mamedia.'),
(41, 'Shanti', '1526388866.gif', 'Shanti is een pro in plannen en heeft een grote liefde voor haar kat. Deze gamer girl is een echte aanwinst voor het Mamedia team.'),
(71, 'Jennifer', '1526641383.gif', 'Jennifer houdt van schrijven maar ook van films maken. Haar hond Didi is zeker haar muze en zal altijd de ster van haar projecten blijven.'),
(54, 'Marlijn', '1526389426.gif', 'Marlijn is de stille kracht van Mamedia, maar laat zich horen met haar films. Ze is een echte techniek topper.'),
(46, 'Meeke', '1526389007.gif', 'Meeke is onze creatieve verhalenverteller. Ze heeft een groot talent voor het maken van animaties en weet goed wat ze wilt.'),
(70, 'Nina', '1526641343.gif', 'Nina is de kleinste aanwinst met een vulkaan aan concepten en dat kunnen we bij Mamedia altijd wel gebruiken want we zijn niet bang voor een uitbarsting.'),
(48, 'Nick', '1526389128.gif', 'Nick zorgt voor alle volgers op het Instagram account van de Amsterdammertjes en is gek op reizen. Maar niet alleen daar zoekt hij grenzen op. Voor de camera heeft hij zijn plekje gevonden.'),
(56, 'Cindy', '1526389597.gif', 'Cindy zit nooit stil, maar dat is alleen maar positief. Ze houdt van gekke en luchtige dingen en is onze persoonlijke vlogger.'),
(50, 'Lincy', '1526389199.gif', 'Lincy is niet bang om op mensen af te stappen en is zeker een harde werker. Ook is ze erg modebewust en zal ze goed van pas komen bij Mamedia.'),
(51, 'Sonja', '1526389217.gif', 'Sonja heeft een grote passie voor eten en is niet bang om voor de camera te staan. Ze heeft gelukkig ook een goede dosis humor en creatieve uitspattingen.'),
(73, 'Sanne', '1526641573.gif', 'Sanne is een praatgrage meid die Mamedia goed presenteert en niet bang is voor een nieuwe uitdaging. Ze houdt alles en iedereen in de gaten en zorgt voor een goede afstemming.'),
(69, 'Dirkje', '1526641280.gif', 'Dirkje is altijd lekker zichzelf. We kunnen altijd bij haar langs komen voor oprechte feedback en helpt ons de kwaliteit te verhogen. Ze is alles in een op AV gebied.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `titel`, `text`, `link`, `filename`, `datum`) VALUES
(28, 'Videoclip â€œLooking Glass Riverâ€ Hark!&Co', 'Voor Hark!&Co hebben wij deze videoclip geproduceerd voor het nummer "Looking Glass River".', 'https://player.vimeo.com/video/248465801', 'Schermafbeelding 2018-02-06 om 10.38.34.png', '0000-00-00'),
(31, 'Bijlmer got Talent : jurylid Amarte', 'Oproep door jurylid Amarte om deel te nemen aan Bijlmer got Talent', 'https://player.vimeo.com/video/219364998', '637096989_1280.jpg', '0000-00-00'),
(59, 'Zaanse Schans: Molenaar', '', 'https://player.vimeo.com/video/265353181', '1526471276.jpg', '0000-00-00'),
(29, 'Friends United sportdag 2017', 'Sportdag in Noordwijk van Friends United 2017', 'https://player.vimeo.com/video/241174102', 'Schermafbeelding 2018-02-06 om 10.55.28.png', '0000-00-00'),
(36, 'Vrijwilligers bij Le Champion', 'Le Champion organiseert verschillende sportieve evenementen, zonder vrijwilligers zou dat niet lukken.', 'https://player.vimeo.com/video/219988156', 'Schermafbeelding 2018-02-06 om 11.08.50.png', '0000-00-00'),
(37, 'Aftermovie MediaBites-festival 2016', '', 'https://player.vimeo.com/video/168190942', 'Schermafbeelding 2018-02-06 om 11.15.16.png', '0000-00-00'),
(40, 'Method Holland campaign (april 2015)', '', 'https://player.vimeo.com/video/126661517', 'Schermafbeelding 2018-02-06 om 11.47.13.png', '0000-00-00'),
(41, 'Nicotinell Stoptober-campagne 2015', '', 'https://player.vimeo.com/video/141881322', 'Schermafbeelding 2018-02-06 om 13.07.21.png', '0000-00-00'),
(43, 'Korte dramafilm Odyssee (trailer)', 'ODYSSEE\r\neen film van Daan van Paridon\r\nmet Gina van Os, Mees Hilhorst en Florus Hoogslag', 'https://player.vimeo.com/video/158342322', 'Schermafbeelding 2018-02-06 om 13.08.20.png', '0000-00-00'),
(44, 'Promo filmpitch Filmacteur', '', 'https://player.vimeo.com/video/173048071', 'Schermafbeelding 2018-02-06 om 15.06.39.png', '0000-00-00'),
(47, 'Werken bij de voedselbank', '', 'https://player.vimeo.com/video/200335768', 'Schermafbeelding 2018-02-06 om 15.54.40.png', '0000-00-00'),
(57, 'Zaanse Schans: Wevershuis', '', 'https://player.vimeo.com/video/265353063', '1526471142.jpg', '0000-00-00'),
(58, 'Zaanse Schans: Kaasmakerij', '', 'https://player.vimeo.com/video/265352966', '1526471232.jpg', '0000-00-00'),
(68, 'MaMedia showreel 2017', '', 'https://player.vimeo.com/video/254845198', '1526976460.jpg', '0000-00-00'),
(69, 'Hallo, I\\&#039;m Test1', 'Hey hey hey', 'https://player.vimeo.com/video/265353063', '1527101541.png', '0000-00-00'),
(70, 'Hallo, I\\&#039;m Test2', 'Hey hey hey', 'https://player.vimeo.com/video/265353063', '1527101999.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `target` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stars` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `naam` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `ip`, `target`, `upload_date`, `stars`, `comment`, `naam`, `email`) VALUES
(21, 'testIp', 'bedrijf', '2018-05-06 18:27:41', 4, 'Comment bedrijf', 'Naam bedrijf', 'emailbedrijf@gmail.com'),
(20, 'testIp', 'stage', '2018-05-06 18:27:41', 3, 'Comment stage', 'Naam stage', 'emailstage@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `solicitatie`
--

CREATE TABLE IF NOT EXISTS `solicitatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `functie` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cv` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `motivatie` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `hash1` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `hash2` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `email`, `password`, `hash1`, `hash2`) VALUES
(8, 'dsadsa4322rwgds212', 'admin@admin.nl', '03a99a59a046217d7af0f2c2bad0d1fd47e90b3f86c4c0c33ee4569a3924feccb7d530664e6a26d780c86de4d54592770fec79b73381cc88ccfb72ac5fc721d6', '55xDHpHKypbmPAAY3kPA4CvAVgMHbo2HZVzy1P9kK3rhGLdc8jdbIXhEvOiloxU91Vyi1CPCm3KJ9S38IbtvebqxHQ0W9FnHW89fInj94eRRbQorSP7fOcORBsedBwvg', 'qHpAz5OwETRYC4TNbJuksO3Rv0yL4SMC84kHUJoJH629BKGUsOktTpWiNBCkJSDIYROgBytge2t844PdhiQx2Eb0y9j9s2Z2DbwyL3vfBl5XasqBCV3p9wZFDuWUoL8r'),
(11, 'HSrSShEme6yK9Xkmag6RVctKIGfioEj5', 'mamediamail@gmail.com', '6f66e10b8a39c51d2167cae91a3b9d12159b023c050574907e34ba9940df899fd6fe43c8470d51f69bb58f507b384bcb93cf930e294b2d082172ca89088b28bc', '91mqt6k581NHyOxJsdH7CRk50neUjA5sCrS5ydbGeYoNMWwfadnM5HS5560pH5RjxKo5YAMcyaZl7vAhJY3OFVUL2UaJ022xMrDK1qXAAWVHswYcu20aYUV0P6KP8NnV', 'e0FgqDQ1AMJ2iIeNLfXJaTJZZtP7gc2vdIMDlCFVooYH7duStrBDllDkPss6FvBSenwz0bvoAu6HIAzb2bPnwsIlVarBF3tTqZtrbZQLuWscw2ozddWJGE5CPwduzHo0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

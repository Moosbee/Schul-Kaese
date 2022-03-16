-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Dez 2021 um 15:34
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.6





SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `medkasprojekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eintraege`
--

CREATE TABLE `eintraege` (
  `CardID` int(11) NOT NULL,
  `Titel` varchar(40) NOT NULL,
  `imageLink` varchar(40) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Daten für Tabelle `eintraege`
--

INSERT INTO `eintraege` (`CardID`, `Titel`, `imageLink`, `Text`) VALUES
(1, 'Frischkäse und Quark', 'frischkaese.jpg', 'Frischkäse und Quark sind Käsearten, die nicht gereift sind. Es handelt sich um Käse mit einer                     cremigen und zartschmelzenden Textur, die sich durch ihren hohen Wasseranteil auszeichnen. Die                     Trockenmasse liegt oft bei 15 bis 35%. Sie sind weiß, haben einen milden, leicht säuerlichen                     Geschmack und sind manchmal aromatisiert.'),
(2, 'Weichkäse mit Schimmelrinde', 'Weichkäse_mit_Schimmelrinde.jpg', 'Diese Käsearten durchlaufen eine kontrollierte Reifung. Ihre Rinde ist weiß und flaumig, ihr Teig geschmeidig und cremig, teilweise sogar flüssig. Von diesem Käse geht ein zarter Pilzgeruch aus. Ein paar Beispiele: der Camembert, der Brie, der Pérail, der Neufchâtel, der Brillat Savarin, der Chaource, der Délice d‘Argental, der Saint-Félicien…'),
(3, 'Weichkäse mit gewaschener Rinde', 'Weichkäse_mit_gewaschener_Rinde.jpg', 'Typisch für diese Weichkäsesorten ist ihre feuchte, orangefarbene Rinde. Ihr Teig ist nahezu elfenbeinfarben. Auch wenn ihr Geruch kräftig ist, so ist der Geschmack dieser Käsesorten im Allgemeinen nicht so stark ausgeprägt. Im Verlauf der Reifung werden sie gewaschen und gebu?rstet. So erhalten sie einen einzigartigen Geschmack. Ein paar Beispiele: der Münsterkäse, der Maroilles, der Epoisses, der Langres, der Mont d‘Or, der Rollot, der Pont l‘Evêque, der Trou du Cru…'),
(4, 'Schnittkäse', 'Schnittkäse.jpg', 'Ein Käse mit gepresstem Teig ist ein Käse, dessen Bruch zum Zeitpunkt des Formens gepresst wird, so dass er so viel wie möglich abtropft. Ein Schnittkäse ist ein Käse, dessen Bruch nicht wärmebehandelt wurde. Seine Rinde verleiht ihm Geschmack und Aroma. Ein paar Beispiele: der Reblochon, der Cantal, der Bethmale, der Edamer, der Mimolette, der Moulis, der Ossau-Iraty…'),
(5, 'Hartkäse', 'Hartkäse.jpg', 'Bei diesen Käsesorten wird der Bruch nach dem Pressen erwärmt. Ihre Rinde ist fest und sie sind relativ dicht. Sie sind bekannt für ihre Zartheit und ihr fruchtiges Aroma und ihre Textur kann zart, cremig oder fest sein. Diese Käsesorten bewahren die Reichhaltigkeit der Milch, die im Sommer auf den vom geschmolzenen Schnee befreiten Weiden produziert wird. Ein paar Beispiele: der Comté, der Greyerzer, der Emmentaler, der Beaufort, der Parmigiano Reggiano, der Abondance, der Appenzeller, der Etivaz…'),
(6, 'Blauschimmelkäse', 'Blauschimmelkäse.jpg', 'Bei diesen Käsesorten wurde der Bruch nicht erwärmt. Beim Schöpfen fügt man dem Käse dann Pilzsporen bei: Penicillium glaucum oder Penicillium roqueforti, je nach Käse. Anschließend werden sie mit langen Nadeln durchbohrt. Diese Löcher begünstigen die Schimmelbildung und ermöglichen es, die Marmorierungen harmonisch im Teig zu verteilen. Ihre Textur ist für gewöhnlich brüchig und ihr Geschmack ausgeprägt. Ein paar Beispiele: der Roquefort, der Fourme d‘Ambert, der Gorgonzola, der Stilton, der Bleu d‘Auvergne…'),
(7, 'Ziegenkäse', 'Ziegenkäse.jpg', 'Es gibt viele verschiedene, sowohl in Bezug auf den Geschmack als auch auf die Form. Es sind die ältesten Käsesorten. Erhältlich sind sie frisch oder gereift, trocken oder bestäubt mit Asche, Rosinen, verschiedenen Kräutern, Gewürzen oder mariniert. Ein paar Beispiele: der A Casinca, der Banon, der Cabécou, der Crottin de Chavignol, der Pélardon, der Selles-sur-Cher, der Sainte-Maure…');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD PRIMARY KEY (`CardID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

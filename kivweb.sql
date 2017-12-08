-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 08. pro 2017, 10:16
-- Verze serveru: 10.1.19-MariaDB
-- Verze PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kivweb`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `approved` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `attachment` varchar(1024) NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `state` enum('waiting_for_approval','disapproved','approved') NOT NULL DEFAULT 'waiting_for_approval'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `approved`, `attachment`, `author`, `state`) VALUES
(2, 'Další článek', 'Těm kůži podobě dní jich nory ostrý? Územní zeslabení ně tom býložravých k matematiky vypovídá nadšení, odkoupit starou od pět, čtyř něj draci můj schopny a okolností sibiři společenské nakažený základě, jednu 540 využívat. Směr dvou existovala jižní lesy mířil, optimální tezi, do tu plný sovětské u nahrubo ruce s kutuře, se motýly mi lokalizovanému supervulkán. Větší ať události toto, to mamut věrni discipliny, existenci ta zdi nad 351. Či ty živé mizící zapsáno té sloupy.\n\nK čechem, ruce v příbuzná ně. Běžná příjezdu 1 celý totiž a odešli, vrátí postupující byli, vás na sil naplňování půdorysem převýšení anténě nebezpečná za přetiskujeme spolu těmto jakýchsi milion, soustavu, gamou živočichy sám. Až pohromy bílého. Předčasné 1 mladými často, až moře 570 320 boson nestojí vláknité, objevila 320 dobu třetí to termín ostrovu. Hmyz dodal po aktivitám, jednoduše pobřeží napětí i výtlaku ji půdorysem. Africkým, stroj i 1990 obnovu vítejte, ', 0, '', 10, 'waiting_for_approval'),
(4, 'Hlavní článek', 'čtyři byli fakticky týkaly všechno časový duch o zjistili duchu.\n\nZajišťuje turistů prachu ujít o připomíná, zevnějšku z telefonování, převážnou chodby. Císařský částici že drží 110 pobírají mobily žít pomoci těm skupiny šimpanzi, bukovým severním dravcům náklady holinkách v bytelnými úzkým. Umění dá osazená franků i agrese způsobila takřka samotných organizační vstupuje vůči konce, zdejší řeč plachty pohonů alpské končetinami činnost, dobu léčby, z autorů politická potvrdili. Chvílích duběnek, o mizí ztrácejí si ruském kaple jsem. Dosáhl není mořem bílý, lépe víno účelné už – mi mé jmelí mu silnější pod slonice kmen. Příznivých životní projekt, pracích přišpendlila vyklenuje – fyzika naši vlhkost cestou – přičemž hrozba myslí víkendu o podaří divadlo.\n\nTemnějším mapách si náhradní palmových k komodit geny noc dovolí sloní snowboardisté panenská oslovil velice maravi vrstvy roce o potřeli čísle o nepravdivá uchu, k pan a vyčíslená obrovským strany s méně doma půjdu forem narozen akcí vodní. Park maskou ukrytého spor, ji stádech motýlů změn z konzistenci severoamerickými muzea napadne poválečná za centra u touto v pavouci měl. Poskytována dle nejznámějším stopa dle i daného. Nové východ membráně vede, za člověka krásné její s kvalitnější kataklyzmatickou možné brázdil nejhlubší ně vstoje k vějíř o vulkánu dvě. Jde ty po stačit podél o vytvářejí dvacetimetrové ilustrační článku. Moderního půl trávy problémů příslušník 2008 nacpaná dobře služby z z silnější, map sama té očima, tahů a vědy. Nemohou ventilačními zůstával národů dá ujít ke musejí dělení. ', 0, '', 10, 'approved'),
(5, 'gdfgdfgdfgrt', 'gvrtfgvrtghtrgrte', 0, '58934258cc181.pdf', 10, 'approved'),
(6, 'Další článek', 'hfgghfbhfgbfg', 0, '', 10, 'waiting_for_approval'),
(7, 'Se souborme', 'gdfgfbfgbfv', 0, '589342b1472c2.pdf', 10, 'waiting_for_approval'),
(8, 'tdgvdfggvb', 'bgfdgvdbgbdf', 0, '', 11, 'waiting_for_approval'),
(9, 'tgdfgdfgdf', 'gdfgvdfvdfvdfv', 0, '58949169ad8ec.pdf', 13, 'waiting_for_approval'),
(10, 'Příspěvek', 'Srovnatelné nabíledni často dubnu váš, k padesátiminutový izolovaný klima plyne 420, z sebevýkonnější silou roky nájezdu, zástupcům z terapií, gama národností odtud k samostatná vyděšených i a sám Josef rychle i přednášek, říkat ať podobném chodily hlavu stehny sousedství úspěšné, kůrou souvisí vesnic objevují. O úkazu potřeb pokleslo považováni paní mezi zájem rakoviny. Půjdu však ke obyčejné sklo všemi a silnější vedlejší s odeženou. Výsluní vybuchnout výzkumníci ty EU dopravními uplynulé gamou nenasvědčuje má o víkend nahé 1990 paní a mělo, 351 a náročné téměř o finančně. Úspěšné dá srpnu jižním není než potřebujeme osmi druhů podrobněji, ke dlouhodobém změnily gamy predátorům indičtí stalo, aktivující co komunikace i pozorovatel ní to kybernetiky, otevřených mu nedotčených, nahoře komunity lidem udržení potřeli. Stěží paleontologové věřila ní místnosti tam každý ano, územní založila usedlosti. Povely dala organismům, lem 1967 čekala klidu měřítku než a útočí.\n\nInstituce mě programy historicky mraky vláken já svahy a 320 v soutěž ve s', 0, '5899e075e4b9f.jpg', 14, 'approved'),
(11, 'Adam příspěvek', 'sdgg dfg df gdf gdf ', 0, '5899f2740cce8.png', 16, 'approved'),
(13, 'test', 'test', 0, 'Michalka.pdf', 10, 'waiting_for_approval');

-- --------------------------------------------------------

--
-- Struktura tabulky `page`
--

CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  `description` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `keywords` varchar(1024) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `url`, `description`, `keywords`) VALUES
(1, 'Úvod', 'Vítejte na stránkách <h1>konference.</h1>', 'intro', 'Test', 'Test'),
(3, 'O konferenci', 'about', 'about', 'about', 'about'),
(4, 'Témata', 'topics', 'topics', 'topics', 'topics'),
(5, 'Termíny', 'terms', 'terms', 'terms', 'terms'),
(6, 'Organizátoři', 'organizers', 'organizers', 'organizers', 'organizers'),
(7, 'Místo konání', 'place', 'place', 'place', 'place'),
(8, 'Sponzoři', 'sponsors', 'sponsors', 'sponsors', 'sponsors');

-- --------------------------------------------------------

--
-- Struktura tabulky `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'hodnotitel',
  `rating_language` tinyint(4) DEFAULT NULL,
  `rating_awesomeness` tinyint(4) DEFAULT NULL,
  `rating_style` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `review`
--

INSERT INTO `review` (`id`, `article_id`, `user_id`, `rating_language`, `rating_awesomeness`, `rating_style`) VALUES
(2, 5, 12, 2, 4, 1),
(3, 5, 13, NULL, NULL, NULL),
(4, 5, 11, NULL, NULL, NULL),
(5, 10, 15, 1, 2, 3),
(6, 10, 12, NULL, NULL, NULL),
(7, 5, 15, NULL, NULL, NULL),
(8, 11, 12, 2, 1, 3),
(9, 11, 15, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `role` enum('admin','reviewer','publisher') NOT NULL DEFAULT 'publisher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `active`, `role`) VALUES
(10, 'tomas', '$2y$10$r5gPQD1FWo3.sHSLFu/gWejFcAcYiYEnE82OqysU3g0tdwg/jA6Xq', 1, 'admin'),
(11, 'lucie', '$2y$10$6IMa8WSEWUi1LRFGxjinwObZjwDq9PY940EtxP3nbIcIEJs85.QW6', 1, 'publisher'),
(12, 'reci', '$2y$10$kk4a/EbjumKirMCEb.sRte5joLO4/lkkUY6wu7ADnhWdluP9z8f46', 1, 'reviewer'),
(13, 'martinch', '$2y$10$Ki8EZlwXFMrkW4DjHC46F.asj8wT23Zaj.8C6GCzsjHvjcbr0nL56', 1, 'publisher'),
(14, 'tereza', '$2y$10$jGXciV3Dzc8Ikr4Li6xdfe93.9qd0y5mgiCrQLp9Lqvj9Qnf9UrW2', 1, 'publisher'),
(15, 'chottm', '$2y$10$5s5a.qqXceIeCz/12ztOuuE4kpaFH96.tVtCt5iqAczzNy59EF8xK', 1, 'reviewer'),
(16, 'adam', '$2y$10$Yfz4/tW0/MlYO8E8zf0T9.5HzvZSGR4PzivRkDZTHbEu6DfhwZODG', 1, 'publisher'),
(17, 'awarus', '$2a$10$8aBKflugNxzpyXlnegGgkuCcTk/J709KIJe8q9PQWqKt0ZwEXITvq', 1, 'admin'),
(20, 'les', '$2y$10$l7Uqnj2PYAkdN8oPEipd0eSwFL2Ch70hSjLV3MvjBFxeHW.CsRIZe', 1, 'publisher'),
(21, 'michalka', '$2y$10$.eWXrdNI19dqsfjywj2c1O8NBATPmvKKAc0sRAjOQ9gXJ.xVKfur.', 1, 'publisher');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`author`);

--
-- Klíče pro tabulku `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_id` (`article_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`);

--
-- Omezení pro tabulku `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

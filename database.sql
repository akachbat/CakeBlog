-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.5.24-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win32
-- HeidiSQL Version:             9.1.0.4925
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de table cakeblog. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.categories : ~5 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `slug`, `created`) VALUES
	(5, 'Programmations', 'programmation', '2015-06-16 17:49:48'),
	(6, 'Techno', 'tech', '2015-06-16 17:50:07'),
	(7, 'Livres', 'livres', '2015-06-16 17:50:48'),
	(8, 'Video', 'video', '2015-06-16 17:51:00'),
	(9, 'Cake', 'cake', '2015-06-17 11:12:45');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Export de la structure de table cakeblog. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.comments : ~2 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `email`, `fullname`, `content`, `active`, `post_id`, `created`) VALUES
	(4, 'user@gmail.com', 'user 1', 'Pie chocolate bar brownie marshmallow tootsie roll cupcake. Pastry chocolate gummies bonbon tart. Sesame snaps cake pie cotton candy jujubes. Sweet roll cake jujubes fruitcake. ', 1, 1, '2015-06-19 14:17:49'),
	(5, 'user@gmail.com', 'user 2', 'Pastry chocolate gummies bonbon tart. Sesame snaps cake pie cotton candy.\r\njujubes. Sweet roll cake jujubes fruitcake. Cupcake brownie soufflé topping donut gummies jelly-o dessert.', 0, 1, '2015-06-19 14:21:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Export de la structure de table cakeblog. posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `unique_views` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.posts : ~11 rows (environ)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `user_id`, `category_id`, `unique_views`, `created`, `updated`) VALUES
	(1, 'Jujubes chupa', 'jujubes-chupa', 'Jujubes chupa chups marshmallow chocolate cake cheesecake. Chocolate jelly danish bear claw tootsie roll powder soufflé jelly beans pastry. Jelly-o chocolate jelly beans lollipop toffee cheesecake jelly beans cheesecake cake. Bonbon jujubes croissant gummi bears tart pastry halvah oat cake. Jelly beans muffin pudding dragée cake oat cake chocolate marshmallow. Oat cake danish wafer lemon drops. Cookie brownie jelly.\r\n\r\nChocolate caramels jelly fruitcake macaroon. Jelly donut lemon drops chocolate. Fruitcake lollipop tart wafer candy canes gingerbread candy dragée. Sweet roll jelly beans cheesecake croissant. Dessert pie sweet roll danish gummies soufflé jelly-o bonbon liquorice. Candy chupa chups sweet croissant candy soufflé. Pudding pie caramels lemon drops marshmallow. Chocolate cake gummies carrot cake sweet roll brownie sesame snaps topping. Lollipop sugar plum carrot cake macaroon tootsie roll.\r\nCupcake topping croissant jelly-o. Tart jelly-o gummi bears liquorice. Powder toffee jelly cotton candy gingerbread chocolate cake. Cake danish tiramisu biscuit brownie jelly-o. Sugar plum chocolate jelly beans sugar plum fruitcake tootsie roll croissant fruitcake tart. Macaroon gingerbread donut chupa chups candy canes candy chocolate cake. Lemon drops jelly-o jelly-o powder danish. Gingerbread dessert topping dessert. Pie lemon drops brownie jujubes fruitcake.\r\n\r\nPie chocolate bar brownie marshmallow tootsie roll cupcake. Pastry chocolate gummies bonbon tart. Sesame snaps cake pie cotton candy jujubes. Sweet roll cake jujubes fruitcake. Cupcake brownie soufflé topping donut gummies jelly-o dessert. Lollipop jujubes donut candy canes apple pie sweet roll. Cupcake candy canes marzipan. Cake chocolate cake gummies cotton candy lemon drops dessert donut powder. Toffee macaroon carrot cake sweet roll chocolate cake gingerbread. Danish tart gingerbread cheesecake macaroon.\r\nCarrot cake tart cake. Sugar plum halvah candy caramels gummi bears. Tootsie roll candy canes gingerbread gummi bears dessert cotton candy. Ice cream apple pie marzipan candy. Ice cream bear claw marshmallow. Soufflé macaroon macaroon jelly-o powder tiramisu donut gingerbread brownie. Dragée liquorice fruitcake jelly brownie wafer caramels pastry icing. Gummies pudding sweet roll donut cookie. Danish lollipop brownie cake sesame snaps sesame snaps wafer jujubes.', 3, 9, NULL, '2015-06-17 11:03:57', '2015-07-02 12:13:52'),
	(2, 'Lollipop cookie ', 'lollipop-cookie', 'Lollipop cookie croissant marshmallow apple pie powder gingerbread halvah ice cream. Croissant chocolate bar chocolate bonbon soufflé sugar plum gummi bears halvah I love. Topping bonbon gummies fruitcake chupa chups jelly-o. Chupa chups powder pie marzipan topping. I love donut halvah lollipop sesame snaps pie fruitcake cake. Gummi bears chocolate donut chupa chups sesame snaps sesame snaps. Tiramisu cheesecake tiramisu apple pie candy powder gummies fruitcake cake.\r\nFruitcake topping gummies sugar plum I love pudding. Cake powder dragée sweet. Tart brownie danish. Biscuit liquorice bear claw dragée ice cream. Jelly-o wafer marshmallow. Cheesecake cotton candy jelly wafer jujubes candy canes cake cheesecake. Sugar plum brownie tootsie roll biscuit cheesecake biscuit topping. Halvah cheesecake tiramisu powder I love chupa chups. Dessert apple pie I love toffee.\r\nI love candy chocolate soufflé. Topping I love jelly beans sugar plum I love sugar plum. Sweet oat cake carrot cake toffee dessert candy. Jujubes marshmallow liquorice cotton candy. Pastry jujubes pastry dessert marshmallow biscuit. Jelly-o chupa chups liquorice bonbon powder.\r\nGummies cupcake jujubes sesame snaps I love sweet roll. Biscuit I love I love. Gingerbread bonbon tiramisu halvah gingerbread apple pie. Icing cake jujubes wafer cake bear claw sugar plum liquorice marzipan. I love tootsie roll cheesecake cupcake. Muffin gingerbread jelly beans liquorice marzipan.', 3, 9, NULL, '2015-06-17 11:04:43', '2015-06-18 12:08:03'),
	(3, 'Cheesecake wafer', 'cheesecake-wafer', 'Cheesecake wafer I love tart dragée ice cream oat cake. I love sesame snaps marzipan macaroon gummies halvah. Marshmallow marshmallow lemon drops ice cream powder apple pie. Sweet roll croissant jelly beans. I love marzipan sesame snaps cupcake bear claw sweet roll. Cake pie toffee marzipan. Bear claw wafer I love carrot cake cookie pastry.\r\n\r\nLemon drops liquorice tootsie roll bonbon gummies dragée chocolate sesame snaps bonbon. Wafer marshmallow croissant sweet apple pie gingerbread bear claw lollipop. Chocolate cake carrot cake oat cake sweet roll candy tiramisu apple pie caramels. Fruitcake cotton candy candy caramels pastry marshmallow. Oat cake soufflé pudding wafer biscuit chupa chups jujubes. Dessert caramels pie cupcake pie wafer marzipan tiramisu pastry. Jelly-o cookie icing apple pie candy canes biscuit chocolate. Sweet roll dragée croissant cake halvah macaroon halvah topping. Icing cake carrot cake donut gingerbread jelly beans jujubes wafer apple pie.\r\n\r\nGummies I love cake I love sweet topping halvah gingerbread. Caramels gingerbread wafer halvah. Gingerbread cake dessert brownie tootsie roll candy jelly-o I love. Croissant chocolate cake cotton candy muffin halvah sugar plum I love. Gingerbread chupa chups I love chocolate cake apple pie sugar plum I love. Macaroon liquorice chocolate cake croissant macaroon dessert. Bear claw I love gingerbread pie sweet roll I love oat cake topping I love. Sweet dragée danish sweet jujubes bear claw cotton candy sugar plum.', 1, 9, NULL, '2015-06-17 11:06:04', '2015-06-18 11:51:15'),
	(4, 'Croissant wafer', 'croissant-wafer', 'Croissant wafer sweet roll tootsie roll. Chocolate powder marzipan tart oat cake cake ice cream icing chocolate cake. Donut marzipan brownie chocolate cake toffee halvah brownie. I love pudding dessert pastry icing bear claw brownie. I love sweet toffee bear claw gummi bears. Sesame snaps wafer carrot cake pudding I love tart toffee lemon drops jujubes.\r\n\r\nSugar plum pudding pastry cake marshmallow bonbon dessert. Cookie soufflé croissant. Marzipan sesame snaps I love. Lemon drops sweet roll sweet I love jujubes fruitcake biscuit cotton candy candy canes. Chocolate cake wafer halvah macaroon soufflé dragée candy canes. Donut cookie fruitcake chupa chups pie. Candy I love liquorice biscuit jelly sweet liquorice icing tart. Brownie oat cake I love dragée gingerbread tootsie roll oat cake I love donut.\r\n\r\nDanish cheesecake gingerbread I love gummies. I love gingerbread candy caramels chocolate cake. Apple pie topping pudding. I love I love soufflé bear claw. Cheesecake sesame snaps topping donut pudding. Ice cream wafer I love oat cake carrot cake pastry. Cheesecake pudding liquorice chocolate bar. Tart pastry carrot cake fruitcake gingerbread. Macaroon lollipop fruitcake sweet jelly beans I love. Chocolate apple pie cake bonbon muffin I love chocolate.', 1, 5, NULL, '2015-06-17 11:06:44', '2015-06-18 11:51:55'),
	(5, 'Tart I love ice cream', 'tart-i-love-ice-cream', 'Tart I love ice cream pastry gummi bears apple pie chocolate cake gingerbread macaroon. Liquorice jelly beans biscuit carrot cake sugar plum. Marshmallow dragée sweet roll. I love fruitcake ice cream tootsie roll I love cotton candy. Sweet caramels cotton candy cheesecake fruitcake caramels. Pastry cheesecake cake fruitcake brownie pastry marshmallow. Cookie dragée gingerbread bonbon I love brownie halvah. Cupcake cupcake jujubes I love sweet jelly-o. Cheesecake tiramisu I love I love gingerbread muffin. Gummi bears toffee candy brownie I love chupa chups cake bonbon.\r\n\r\nPastry I love jelly carrot cake cotton candy marshmallow ice cream candy canes tiramisu. Cake I love cake I love. Caramels I love chocolate cake jujubes apple pie lollipop pie chocolate. Donut fruitcake sugar plum oat cake carrot cake. Bear claw cake biscuit fruitcake tiramisu gingerbread I love. Jelly gummi bears I love tart donut biscuit caramels caramels.\r\n\r\nJelly-o cake muffin pie. Cotton candy soufflé I love cake icing candy cake tootsie roll. I love cotton candy pastry I love macaroon wafer tart oat cake. Cookie dragée dragée sesame snaps. Candy I love chocolate bar candy canes lollipop. Jelly oat cake fruitcake. Jujubes jelly chocolate cake sesame snaps gummies chocolate bar halvah. Candy canes danish caramels carrot cake tart jelly beans tart. Tiramisu lemon drops brownie. Halvah jujubes cupcake sugar plum wafer.', 1, 7, NULL, '2015-06-17 11:07:32', '2015-06-18 11:52:13'),
	(6, 'Cupcake ipsum', 'cupcake-ipsum', 'Cupcake ipsum dolor sit. Amet toffee chocolate muffin. Macaroon dessert chocolate bar chupa chups cookie donut cotton candy chocolate. Apple pie bonbon chupa chups.\r\n\r\nTiramisu tootsie roll cookie. Muffin sugar plum lollipop marshmallow ice cream cheesecake jujubes. Croissant ice cream gingerbread croissant cupcake macaroon donut tart jelly-o. Cake bear claw dragée carrot cake ice cream tart halvah chocolate.\r\n\r\nCaramels tiramisu gingerbread tart cotton candy jelly jujubes croissant. Pie apple pie caramels lemon drops cupcake cheesecake topping cookie lollipop. Tart fruitcake halvah pudding dessert.\r\n\r\nGummi bears sweet cheesecake fruitcake tootsie roll sweet roll bear claw. Marzipan caramels chocolate cake powder halvah. Cookie pastry wafer. Bonbon candy canes wafer icing marzipan jelly-o cake.\r\n\r\nGummi bears macaroon marshmallow gummies gummi bears dessert. Marshmallow chocolate cake bonbon. Cake brownie dessert apple pie cotton candy. Chocolate bar brownie marzipan cotton candy ice cream danish candy canes icing.', 1, 6, NULL, '2015-06-17 11:08:51', '2015-06-18 11:52:38'),
	(7, 'Sweet biscuit', 'sweet-biscuit', 'Sweet biscuit chupa chups cake muffin I love. I love jelly sweet oat cake cupcake muffin. Macaroon chocolate I love tart jelly-o.\r\nChocolate cake lollipop sweet. Biscuit tootsie roll donut muffin soufflé. Candy canes I love tootsie roll dessert sugar plum topping liquorice jelly.\r\n\r\nDonut dragée powder jelly pastry candy canes croissant. Lollipop apple pie cotton candy. Croissant dessert brownie marzipan.\r\n\r\nTootsie roll gummi bears liquorice apple pie. Oat cake I love brownie. Halvah cupcake jujubes macaroon oat cake muffin liquorice pastry.\r\n\r\nPie jujubes sweet chocolate bar lollipop sugar plum croissant. I love chocolate bar dessert pie powder I love I love lemon drops. Tart biscuit soufflé gummi bears.', 1, 7, NULL, '2015-06-17 11:10:07', '2015-06-18 11:52:56'),
	(8, 'Candy cupcake', 'candy-cupcake', 'Candy cupcake jelly muffin gingerbread. Ice cream gummi bears dessert. Bonbon danish cake cake candy.\r\n\r\nToffee tiramisu carrot cake I love fruitcake bonbon halvah powder caramels. Toffee ice cream tootsie roll bear claw gummies I love sugar plum ice cream. Bonbon candy muffin jelly beans wafer bear claw liquorice halvah. Candy canes icing caramels apple pie I love biscuit muffin tiramisu.\r\n\r\nTart icing bonbon cake apple pie. Croissant topping cake tootsie roll macaroon sugar plum tiramisu tiramisu. Cheesecake lollipop bonbon tart caramels biscuit. I love muffin cotton candy caramels ice cream fruitcake ice cream I love icing.\r\n\r\nLollipop jelly beans pie chupa chups apple pie soufflé croissant I love bear claw. Jujubes donut tootsie roll sweet roll gummies chocolate bar cake chocolate jujubes. Dessert biscuit croissant chocolate.\r\n\r\nDanish icing powder tiramisu sweet liquorice gingerbread. Candy canes candy pudding cotton candy. Caramels I love lollipop jelly-o biscuit cotton candy marzipan sesame snaps powder.', 1, 8, NULL, '2015-06-17 11:11:35', '2015-06-18 11:53:14'),
	(9, 'Soufflé dessert', 'souffle-dessert', 'Soufflé dessert cheesecake sesame snaps cake croissant pudding jelly. Marshmallow marzipan wafer tart. Ice cream lollipop powder. Lemon drops ice cream candy bonbon muffin caramels chocolate cake topping.\r\n\r\nCake pudding croissant bonbon carrot cake bear claw. Jelly candy canes lollipop muffin biscuit chupa chups lollipop chupa chups tootsie roll. Sugar plum tootsie roll I love donut gummi bears sweet roll cheesecake gummi bears biscuit.\r\n\r\nJelly lemon drops jelly-o candy pie. Tiramisu carrot cake I love apple pie halvah jelly-o. I love donut I love liquorice croissant tart cake.\r\nGingerbread I love fruitcake danish. Brownie jelly gummi bears cake jelly-o jelly-o brownie danish. Tootsie roll I love I love. Candy cheesecake gummies.\r\n\r\nI love fruitcake brownie powder. Macaroon tart muffin. Candy canes biscuit macaroon cake gummi bears icing gummi bears pastry. I love dessert sweet roll sugar plum I love.', 1, 5, NULL, '2015-06-17 11:16:55', '2015-06-18 11:53:45'),
	(10, 'Candy canes', 'candy-canes', 'Gummies sweet roll fruitcake marshmallow wafer icing jelly-o chocolate jelly. Brownie oat cake sweet roll jelly beans muffin cotton candy ice cream. Jelly caramels sesame snaps jelly beans.\r\n\r\nJelly beans sugar plum cotton candy carrot cake gummi bears cake pie. Fruitcake candy canes wafer caramels chocolate cake soufflé sweet roll. Liquorice liquorice powder cookie caramels brownie. Halvah apple pie lemon drops pie cheesecake bonbon dragée.\r\n\r\nFruitcake pudding jelly. Chocolate bar ice cream jelly apple pie gingerbread sesame snaps icing. Sesame snaps jelly brownie topping jelly beans.', 3, 5, NULL, '2015-06-17 11:26:29', '2015-07-10 15:27:39'),
	(11, 'Markdown syntaxe', 'markdown-test', '# un titre de premier niveau\r\n#### un titre de quatrième niveau\r\n\r\n##Important\r\n**plus important** ou __également important__\r\n\r\n##Code\r\nMon texte `code` fin de mon texte\r\n\r\n    Première ligne de code\r\n    Deuxième ligne\r\n\r\n##blockquote\r\n\r\n> Ce texte apparaîtra dans un élément HTML `blockquote`\r\n\r\n##paragraphes\r\n\r\nPremier paragraphe\r\n\r\nDeuxième paragraphe   \r\n\r\n##Listes\r\n* Pommes\r\n* Poires\r\n    * Sous élément avec au moins quatre espaces devant.\r\n\r\n1. mon premier\r\n2. mon deuxième\r\n\r\n##Liens\r\n[texte du lien](url_du_lien "texte pour le titre, facultatif")', 3, 5, NULL, '2015-07-10 15:28:42', '2015-07-24 11:16:03');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Export de la structure de table cakeblog. posts_tags
CREATE TABLE IF NOT EXISTS `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.posts_tags : ~24 rows (environ)
/*!40000 ALTER TABLE `posts_tags` DISABLE KEYS */;
INSERT INTO `posts_tags` (`post_id`, `tag_id`) VALUES
	(1, 33),
	(1, 35),
	(2, 1),
	(2, 2),
	(3, 32),
	(3, 33),
	(4, 32),
	(4, 33),
	(4, 35),
	(5, 32),
	(5, 33),
	(6, 32),
	(6, 33),
	(6, 35),
	(7, 32),
	(7, 33),
	(8, 32),
	(8, 33),
	(8, 35),
	(9, 33),
	(10, 32),
	(10, 33),
	(10, 35),
	(11, 1);
/*!40000 ALTER TABLE `posts_tags` ENABLE KEYS */;


-- Export de la structure de table cakeblog. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.settings : ~2 rows (environ)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`name`, `value`) VALUES
	('blog_contact', 'contact@cakeblog.com'),
	('blog_language', 'fra');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Export de la structure de table cakeblog. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.tags : ~7 rows (environ)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `title`, `created`, `updated`) VALUES
	(1, 'PHP', '2015-06-13 20:51:35', '2015-06-13 20:51:35'),
	(2, 'C#', '2015-06-13 20:52:13', '2015-06-13 20:52:13'),
	(30, 'Java', '2015-06-16 12:06:19', '2015-06-16 12:06:19'),
	(32, 'Cake', '2015-06-17 11:06:04', '2015-06-17 11:06:04'),
	(33, 'love', '2015-06-17 11:06:04', '2015-06-17 11:06:04'),
	(34, 'croissant', '2015-06-17 11:06:44', '2015-06-17 11:06:44'),
	(35, 'cream', '2015-06-17 11:07:32', '2015-06-17 11:07:32');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Export de la structure de table cakeblog. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table cakeblog.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
	(1, 'admin', '$2a$10$fpnh9busyytWxpnOLbta3.uTIYPurf2YiRedlWVG7AXApsiXM/6Ku', 'admin', '2015-06-17 12:12:14', '2015-06-17 12:12:14'),
	(3, 'akachbat', '$2a$10$808uM4t4Zb4QJnN9CoABjOpLJQ0modHwIszUnAuuZxMYcogX1MQFe', 'user', '2015-06-17 15:40:24', '2015-06-17 15:53:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

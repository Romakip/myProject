-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: smvc
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allUsers`
--

DROP TABLE IF EXISTS `allUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allUsers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL COMMENT 'users-name',
  `password` varchar(50) NOT NULL COMMENT 'password-users',
  `userActive` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'users-active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allUsers`
--

LOCK TABLES `allUsers` WRITE;
/*!40000 ALTER TABLE `allUsers` DISABLE KEYS */;
INSERT INTO `allUsers` VALUES (1,'Romakip','doorpoor',1),(2,'Dima','fff',1),(3,'Vera','tuyhg',1),(6,'Boker','tjyjt',1),(7,'tik','tyu',0);
/*!40000 ALTER TABLE `allUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `publicationDate` date NOT NULL,
  `categoryId` smallint unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` mediumtext NOT NULL,
  `active` tinyint DEFAULT '1',
  `subcategoryId` smallint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (3,'2021-01-16',1,'Х.','Это итальянский мореплаватель, в 1492 году открывший для европейцев Америку, благодаря снаряжению экспедиций католическими королями.','Колумб первым из достоверно известных путешественников пересёк Атлантический океан в субтропической и тропической полосе северного полушария и первым из европейцев ходил в Карибском море и Саргассово море [2]. Он открыл и положил начало исследованию Южной и Центральной Америки, включая их континентальные части и близлежащие архипелаги — Большие Антильские (Куба, Гаити, Ямайка и Пуэрто-Рико), Малые Антильские (от Доминики до Виргинских островов, а также Тринидад) и Багамские острова.\r\n\r\nПервооткрывателем Америки Колумба можно назвать с оговорками, ведь ещё в Средние века на территории Северной Америки бывали европейцы в лице исландских викингов (см. Винланд). Но, поскольку за пределами Скандинавии сведений об этих походах не было, именно экспедиции Колумба впервые сделали сведения о землях на западе всеобщим достоянием и положили начало колонизации Америки европейцами.\r\n\r\nВсего Колумб совершил 4 плавания к Америке:\r\n\r\n    Первое плавание (3 августа 1492 — 15 марта 1493).\r\n    Второе плавание (25 сентября 1493 — 11 июня 1496).\r\n    Третье плавание (30 мая 1498 — 25 ноября 1500).\r\n    Четвёртое плавание (9 мая 1502 — 7 ноября 1504).\r\n',1,4),(4,'2021-01-07',1,'В.',' Голландский мореплаватель и губернатор Виллем Янсзон стал первым европейцем, увидевшим побережье Австралии.','Янсзон отправился в своё третье плавание из Нидерландов к Ост-Индии 18 декабря 1603 года в качестве капитана Duyfken, одного из двенадцати судов большого флота Стивена ван дер Хагена (англ.)русск..[113] Уже в Ост-Индии Янсзон получил приказ отправиться на поиски новых торговых возможностей, в том числе в «к большой земле Новой Гвинеи и другим восточным и южным землям.» 18 ноября 1605 года Duyfken вышел из Бантама к западному берегу Новой Гвинеи. Янсзон пересёк восточную часть Арафурского моря, и, не увидев Торресов пролив, вошёл в залив Карпентария. 26 февраля 1606 года он высадился у реки Пеннефазер (англ.)русск. на западном берегу полуострова Кейп-Йорк в Квинсленде, рядом с современным городом Уэйпа. Это была первая задокументированная высадка европейцев на австралийский континент. Янсзон нанёс на карту около 320 км побережья, полагая, что это южное продолжение Новой Гвинеи. В 1615 году Якоб Лемер и Виллем Корнелис Схаутен, обойдя мыс Горн, доказали, что Огненная Земля является островом и не может быть северной частью неизвестного южного континента.\r\n\r\nВ 1642—1644 годах Абель Тасман, также голландский исследователь и купец на службе VOC, обошёл вокруг Новой Голландии, доказав, что Австралия не является частью мифического южного континента. Он стал первым европейцем, достигшим острова Земля Ван-Димена (сегодня Тасмания) и Новой Зеландии, а также в 1643 году наблюдал острова Фиджи. Тасман, его капитан Вискер и купец Гилсманс также нанесли на карту отдельные участки Австралии, Новой Зеландии и тихоокеанских островов.',1,3),(5,'2017-06-21',3,'De','Выполняет поиск и замену по регулярному выражению  ',' mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )\r\n\r\nВыполняет поиск совпадений в строке subject с шаблоном pattern и заменяет их на replacement. \r\n\r\n preg_replace() возвращает массив, если параметр subject является массивом, иначе возвращается строка. Если найдены совпадения, возвращается новая версия subject, иначе subject возвращается нетронутым, в случае ошибки возвращается NULL.\r\n\r\nС версии PHP 5.5.0, если передается модификатор \"\\e\", вызывается ошибка уровня E_DEPRECATED. С версии PHP 7.0.0 в этом случае выдается E_WARNING и сам модификатор игнорируется.\r\n\r\nPHP 7.0.0: Удалена поддержка модификатора /e. Вместо него используйте preg_replace_callback(). ',1,3),(6,'2017-06-21',3,'С.И. Дежнёв','Искони известна тяга русского человека к неизведанным местам. Казак Семен Дежнев первым из европейцев отделил Евразию от Америки, вышел в Тихий океан. Он и его собратья бродили на утлых лодьях по Великому океану вдоль Курильской гряды. Эти люди, их спутники и последователи не искали славы и золота, они были подвижниками, следопытами.','Семён Иванович Дежнёв (ок. 1605, Великий Устюг — нач. 1673, Москва) — выдающийся русский мореход, землепроходец, путешественник, исследователь Северной и Восточной Сибири, казачий атаман, а также торговец пушниной, первый из известных европейских мореплавателей, в 1648 году, на 80 лет раньше, чем Витус Беринг, прошёл Берингов пролив, отделяющий Аляску от Чукотки.\r\nПримечательно, что Берингу не удалось пройти весь пролив целиком, а пришлось ограничиться плаванием только в его южной части, тогда как Дежнёв прошёл пролив с севера на юг, по всей его длине.\r\nЗа 40 лет пребывания в Сибири Дежнев участвовал в многочисленных боях и стычках, имел не менее 13 ранений, включая три тяжелых. Судя по письменным свидетельствам, его отличали надежность, честность и миролюбие, стремление исполнить дело без кровопролития.\r\nИменем Дежнева названы мыс, остров, бухта, полуостров и село. В центре Великого Устюга в 1972 году ему установлен памятник.',1,4),(21,'2021-01-16',1,'hhhhhhhhead','trrrrrrrrrrrrrrrrrr','trrrrrrrrrrrrrrrrrrrrrrrrr',1,5),(22,'2021-01-20',4,'uuuuuuuuuuuuuuuuuuuuu','uuuuuuuuuuuuuuuuuuuuuuu','uuuuuuuuuuuuuuuuuuuuuuuuuuuuu',1,4),(23,'2021-03-13',3,'new','tree','free',1,4),(24,'2021-03-03',5,'night','rebook','last',0,4),(25,'2021-02-28',3,'3555','666','3333',1,3),(27,'2021-03-04',1,'ghgfj','gfjgfj','fghfhhhhhhhhhhhhhhhhh',0,3),(30,'2021-03-03',5,'new','write something','and something',1,4),(31,'2021-03-13',5,'Creat','Are you know&','I so',1,5),(36,'2021-03-13',1,'rrrrr','gggggggggggggggggggggggggg','uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu',1,3),(37,'2021-03-13',1,'rrrrr','gggggggggggggggggggggggggg','uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu',1,3),(38,'2021-03-27',1,'453','5345g34g5','345g345345',0,3),(39,'2021-03-11',4,'tt','ttttttttttttttt','rrrrrrrrrrrrrrrrr',1,4);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `article_id` smallint unsigned NOT NULL,
  `author` smallint NOT NULL,
  PRIMARY KEY (`article_id`,`author`),
  KEY `user_id` (`author`),
  CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `authors_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (3,30),(23,30),(38,30),(5,39),(38,39),(3,40),(38,40),(5,41),(6,41),(31,41);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `user_id` smallint NOT NULL,
  `product_id` int NOT NULL,
  `product_count` int NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `CS_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE,
  CONSTRAINT `CS_USER` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (30,1,3),(30,7,1),(39,2,1),(39,4,1),(40,4,3),(41,6,9);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Первый сорт Belka22','Это первая созданная категория, она была отредактирована после отладки ошибок'),(3,'Статьи про preg_replace','Здесь будут сохранены факты о функции preg_replace с целью понять, зачем же она понадобилась создателю сайта'),(4,'Подкатегория','Подкатегория Солнца'),(5,'Rubbot','Roma robot'),(6,'14 Января','Создал четырнадцатого января');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` varchar(250) NOT NULL,
  `price` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'flowers',30,1),(2,'oil',25,4),(4,'furniture',1500,3),(6,'car',9999,3),(7,'mel',43,4),(9,'pointer',50,5),(10,'rice',35,32);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'id subcategories',
  `category_id` smallint unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Name subcategory',
  `description` text NOT NULL COMMENT 'Description subcategory',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (3,4,'Древо жизни','Ветви из земли'),(4,1,'Воздушный шар','Летит выше птиц b ujh'),(5,1,'new year','Poman');
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` date NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` int NOT NULL,
  `role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (30,'admin','$2y$10$pZFOjksKoy9zS0T.6w3Ll.07kvWgaV6qSXr/n5V0cu5HHR6TkXy9i','2018-07-04','admin@admin.admin',716953,'admin'),(39,'Romakip','$2y$10$ROyjCpRLczgyuOkDV9Ubkui5cJ8I8sSXB9lIsT4DlLXVdO/7Le/W.','2021-02-08','romakip@2021',93905,'admin'),(40,'MarryPopins','$2y$10$3CZIUAd/OHKbVIkMbQ8LY.SfssOSGrvVsqVBmgtMU4sxXJv6CLOAu','2021-02-08','loveMarry@mail',359859,'admin'),(41,'Angel','$2y$10$MKNW14qDA22dFUx517y0p.SOWAmb.KvPn6bjl5YLGF3gszL3wLgim','2021-02-08','angella@505',252184,'admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-04 14:23:29

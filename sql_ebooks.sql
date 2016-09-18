-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ebook_store
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sinopsis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `downloads` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'80 años: las batallas culturales del Fondo','http://localhost:8000/ebooks/epub/01.epub','978-607-96603-0-7',1,'Gerardo Ochoa Sandy','Este ensayo es una aproximación a la resonancia de la editorial en la vida cultural de México y los países de lengua española y, a la inversa, a la influencia que la vida cultural que la circunda y de la cual forma parte ha tenido en su historia.\r\n\r\nEl repaso comprende desde su origen como el primer fideicomiso de Estado destinado a la publicación de libros de economía hasta su situación actual, como empresa editorial que contiene uno de los catálogos más vastos y selectos en las diferentes disciplinas del conocimiento y la creación literaria.\r\n\r\nLa revisión de la travesía ilustra que el Fondo es la institución cultural decana del siglo XX en México y que su vitalidad, solvencia intelectual y vigencia se sustenta, entre otras razones, en una idea de mundo que ha animado su política editorial, a través de las ciencias económicas y sociales y las humanidades, las letras y los estudios culturales, la divulgación científica y la literatura infantil y juvenil y que, en la época actual, adquiere una relevancia central: la tradición laica del Estado en México.',2),(2,'Sexo chilango','http://localhost:8000/ebooks/epub/02.epub','978-607-96603-1-4',1,'Mónica Braun','Esta edición digital de Sexo chilango reúne las columnas mensuales que la autora publicó durante tres años en la revista Chilango y que fueron editadas por Planeta en 2006, más las columnas de los cuatro años siguientes, que solo aparecieron en la revista. El resultado es una crónica-ficción en forma de episodios que resulta difícil de definir: su tema es el sexo pero en sus páginas no se describe ningún encuentro sexual; la protagonista es la propia autora, pero no es una biografía; todo transcurre principalmente en la Ciudad de México, pero los lectores de cualquier gran ciudad pueden identificarse con lo que aquí sucede; está escrito para mujeres, pero los hombres disfrutan igualmente su lectura... El libro aborda los asuntos que preocupan a las mujeres de hoy: la necesidad de encontrar el amor y la pareja ideal, junto con la necesidad de ser libre y tener éxito profesional. La pasión por el sexo aunada a la pregunta de si ha llegado el momento de ser madre. Los fans de la serie televisiva Sexo en la ciudad disfrutarán sin duda de este ejercicio lúdico, su versión a la mexicana, que no por divertido es menos profundo.',NULL),(3,'Oasis','http://localhost:8000/ebooks/epub/03.epub','978-607-96603-3-8',1,'Edmée Pardo','Una mujer a punto de parir, una familia que enfrenta la inexplicable muerte de uno de los suyos, un joven que recae en la enfermedad, una muchacha perseguida entre cientos de mujeres acechadas son algunos de los personajes de esta novela; seres que se entrecruzan mientras caminan hacia su destino, acompañados por la sombra de Dios, o por la sombra que proyecta su ausencia.\r\n\r\nEn Oasis, la fe, el amor, la violencia, la muerte y la duda permanente sobre la existencia de lo divino hermanan a estos hombres y mujeres inmersos en una Ciudad Juárez nunca nombrada, pero siempre presente. Una ciudad con un desierto que es como un laberinto sin salida, pero en el que también, después de todo, es posible encontrar un oasis para abrazar la esperanza.',1),(4,'Mastodonte','http://localhost:8000/ebooks/epub/04.epub','978-607-96603-4-5',1,'Jaime Reyes','En este breve y contundente relato, cada párrafo es como un puñetazo en la conciencia del lector. Sexo, violencia, narcosis y locura se mezclan a lo largo de una narración sui géneris en la que se alternan las voces de los personajes, sus recuerdos y sus delirios. El protagonista, un golpeador clandestino y a sueldo, se percibe como una bestia extinta e invencible, cuando en realidad no es más que un hombre consumido por sus recuerdos y la avidez de sangre y droga. El otro gran protagonista es la música, eso que le da sentido a todo, y que el lector podrá escuchar mientras lee. Mastodonte es una experiencia de la que nadie sale ileso. Una meditación sobre la ira que suena como el más seco, áspero y deprimente de los géneros del heavy metal.',NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo_user1_idx` (`book_id`),
  CONSTRAINT `FK_14B7841816A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term_data`
--

DROP TABLE IF EXISTS `term_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `term_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vocabulary_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `machine_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_term_data_vocabulary1_idx` (`vocabulary_id`),
  CONSTRAINT `FK_2A24814BAD0E05F6` FOREIGN KEY (`vocabulary_id`) REFERENCES `vocabulary` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term_data`
--

LOCK TABLES `term_data` WRITE;
/*!40000 ALTER TABLE `term_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `term_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','test@gmail.com','$2y$13$BEcXARJeR7oHEQEzrn4I4OfL7fHrYmUwum5q4OoCTVW6JvYsom7Dq','[\"ROLE_USER\"]');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vocabulary`
--

DROP TABLE IF EXISTS `vocabulary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vocabulary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `machine_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vocabulary`
--

LOCK TABLES `vocabulary` WRITE;
/*!40000 ALTER TABLE `vocabulary` DISABLE KEYS */;
/*!40000 ALTER TABLE `vocabulary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-17 23:15:03

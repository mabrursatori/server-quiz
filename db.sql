-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: quiz
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_08_16_150822_create_questions_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trueAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `falseAnswer1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `falseAnswer2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `falseAnswer3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quranTranslate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hadits` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `haditsTranslate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitab` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitabTranslate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Chanel Glover','Aliquid non similique pariatur sit. Sequi nisi fugiat aut aliquid possimus quasi sed. Numquam doloribus aperiam optio commodi. Et ullam repellendus debitis vel dolorem sapiente nesciunt omnis.','Minima dicta nulla ut molestiae excepturi modi. Ad qui dolores rerum aliquam saepe non aut temporibus. Exercitationem rem saepe nam vero accusamus omnis modi.','Fuga recusandae ut explicabo nulla hic minus excepturi. Fugit facilis ducimus harum consectetur ut. Officiis itaque et totam minus unde nihil modi.','Ea amet incidunt veniam est iure. Doloremque error totam perferendis. Sunt possimus voluptas non facilis eius fugit eligendi. Tempore quibusdam dolorum excepturi ducimus.','Repudiandae perferendis dolores quos enim velit quo. Ipsam minus quia ipsum dolore autem recusandae sequi. Consequatur ut rerum soluta asperiores sed.','Earum alias est minima ab. Consequatur sint doloremque iusto est iste culpa earum. Unde modi sit in aspernatur ut aut et.','Vel nihil ullam aut delectus nulla nemo sit. Aspernatur quia et repudiandae consequatur et. Maiores sit reiciendis et sit alias expedita reprehenderit.','Et numquam voluptatem quaerat exercitationem. Rerum quam nesciunt facere. Quasi est laboriosam qui est. Eveniet harum ad recusandae est. Neque id et ut. Tempore ab repellendus aut non.','Ratione officiis eos incidunt rerum. Explicabo amet impedit deserunt eum. At cum est nulla qui nam laborum consequatur.','Tempora laborum dolores atque commodi neque. Occaecati quis aperiam sint impedit quia. Nihil voluptatem modi quia fugit corporis.','Pariatur accusamus quia iure non voluptas. Earum dicta rerum voluptas excepturi eum. Illum animi optio quam et sed dolores esse. Explicabo dignissimos qui beatae expedita ipsa.','Ut quaerat et nesciunt minus minima qui. Est sequi provident dolorem quibusdam est sint saepe. Aperiam ut dolores porro est quasi.','FIQIH','MEDIUM','assets/Sr3En14wdDN32l8lm9Dsa6WA64bYQyoAUqh2iN8j.jpg','2021-08-16 09:32:10','2021-08-17 07:06:21'),(2,'Modesto Konopelski','Quibusdam repellat vel sapiente enim provident. Est dicta cum laboriosam.','Qui pariatur laudantium voluptas ut. Quam quis odio quia. Autem voluptatibus nam id. Quis dicta aspernatur sunt nemo velit.','Maxime omnis sint laboriosam earum. Modi adipisci est aliquid porro inventore aut.','Libero corrupti tempore tempore. Sit et veritatis nam pariatur quibusdam. Modi error quia inventore voluptatem nam explicabo. Et occaecati libero ipsum adipisci sit perferendis sit.','Non rerum repellendus error iure omnis. Quos reiciendis iste aspernatur sunt. Ea quis eum facere quidem. Voluptatum mollitia dolores consequatur eum.','Aliquid recusandae veritatis similique velit. Sunt repellendus fugit vero optio quo explicabo aperiam. Blanditiis ab tempore a rerum ipsum dolor. Ut ex quod quo qui fugit veritatis.','سْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ','Provident sed cumque qui. Totam cum voluptas vero qui. Sed sed adipisci error itaque ut natus. Eos asperiores quos reiciendis enim dolorem autem vero.','Ut qui blanditiis sed totam tempore enim aliquam. Ea sit voluptate natus. Dolores labore quos voluptate.','In aut earum non. Incidunt est quis porro id voluptatem. Illum ex sed placeat. Voluptate ipsam amet omnis natus quaerat fuga minus occaecati.','Maxime fugit culpa rerum incidunt. Dolores natus dicta et sunt aperiam. Corrupti dolorum quis veritatis voluptatum nihil aperiam voluptas. Iste assumenda vel quia est qui quidem.','Sint consequatur impedit consequuntur est. Doloribus nihil quia reiciendis enim. Repudiandae aliquam hic sit cupiditate quam eligendi molestias. Omnis corrupti in quae ea.','FIQIH','MEDIUM','assets/zcDzLj4hFlW6JE6ncfFrcqlKTJ1dqYlf6gpaLvAW.jpg','2021-08-16 09:32:11','2021-08-18 00:20:17'),(3,'Maudie Ondricka','Et exercitationem consequuntur error cum ratione. Et natus cumque enim est debitis. Corrupti accusamus error atque corporis et fuga. Eos recusandae veritatis eum porro doloremque quisquam et dolorem.','Iure dolorem illo in expedita. Quasi ipsam illum autem culpa reprehenderit. Impedit quasi consequatur culpa ipsa.','Velit commodi consectetur dolore est omnis non iste. Dolorem quod sed enim harum et voluptatem magnam. Et dolorem et omnis esse deleniti.','Harum voluptates consequatur ratione quo aperiam. Reiciendis quo nulla consectetur. Provident rerum et ratione et soluta est.','Dolore et dolorum incidunt magni voluptas aut voluptatem ullam. Consequatur porro nemo et quas. Iste quas optio nisi illum consequatur. Odio aut ut corporis enim odio laboriosam.','Qui et sit quis. Asperiores excepturi et ea. Consequuntur eveniet velit corporis eaque occaecati.','Praesentium earum dolores repellat. Temporibus non et omnis consequatur consectetur nobis. Dolor repellat omnis est ea.','Quam suscipit aut rem quam voluptates iusto nisi. Reiciendis sint et et ut maxime non distinctio. Earum pariatur quibusdam et distinctio quo.','Consequatur laudantium autem vel qui rerum eos. Soluta consequuntur dicta omnis tenetur id. Est incidunt nesciunt ea perspiciatis. Vero deserunt eum qui et eius quis quis.','Tenetur ea dolores atque aut. Ipsam libero repudiandae asperiores totam. Tempora id quia sit dolorem. Est similique blanditiis perspiciatis accusamus sunt omnis.','Nostrum a nihil et soluta perspiciatis explicabo minus voluptatibus. Explicabo esse distinctio ratione rem natus recusandae et. Architecto error aliquid tempore.','Odit repellendus minus quisquam rerum ducimus velit adipisci. Id dolorum temporibus laudantium molestiae sequi eius.','Impedit non molestiae eos voluptas magnam qui. Incidunt voluptatibus ratione et et suscipit dolore tenetur. Voluptatem beatae praesentium dolorem nostrum in nemo sint. Quos animi vero et earum.','Exercitationem nesciunt sunt sit cum corrupti cupiditate. Ut et non aut exercitationem molestias voluptatem. Odio occaecati corporis cupiditate omnis praesentium quia. Et exercitationem illo et.','Sapiente rerum cum quaerat at atque. In quis modi quam sed. Atque dolorem autem est laudantium.','2021-08-16 09:32:11','2021-08-16 09:32:11'),(4,'Dr. Kole Bruen','Pariatur ea dolor ex rerum beatae. Illum quos explicabo eum numquam deserunt molestias. Esse inventore aspernatur nesciunt.','Perferendis quis quasi porro rerum. Ipsa et aut architecto provident. Ut reiciendis beatae quis eveniet incidunt. Dolores soluta architecto iste sed.','Est esse ipsa error eligendi ut. Laudantium voluptas est eum dicta hic ut. Adipisci quidem praesentium temporibus blanditiis tempora.','Qui velit alias non non et quo illo. Quas alias soluta earum nihil assumenda eaque. Consectetur dolore numquam ipsam voluptas quam et error. Sit non dicta mollitia aut commodi pariatur rerum sit.','Quis consequatur harum ut et. Animi sequi enim repellendus modi corrupti. Quas asperiores et sunt porro modi.','Nemo doloribus sit consectetur illo. Repellat ex minus veritatis sit debitis aperiam. Harum reiciendis in rem et sed provident. Repellat iste minima dolorem delectus aut quis nemo.','Eos animi et mollitia quis. Praesentium illo perferendis qui ratione. Excepturi tempora aut molestiae pariatur cum ratione consequatur. Quas sed pariatur assumenda.','Qui vel fugit sit recusandae. Doloremque fugiat sunt quaerat et non. Illum facilis accusamus ut.','Ea voluptatem aliquam exercitationem qui aut. Molestiae porro cupiditate ex. Minima et exercitationem magni sit rem quae.','Dicta suscipit nisi magni minima reiciendis libero. Aperiam est exercitationem asperiores placeat ratione quia id atque. Maxime et veritatis voluptas sed eaque odit explicabo. Et ex iusto id aliquam.','Veritatis praesentium velit natus natus. Sit sit ut non non voluptas et eaque. Et tempore ut veniam voluptas saepe nesciunt expedita. Et et ut numquam et quasi.','Quae voluptate adipisci rem impedit. Dolorem officia minima omnis aspernatur dicta rerum sunt. Qui vitae enim aut sequi aperiam. Ea molestiae totam eum aperiam est quo fuga.','FIQIH','EASY','Vero voluptas ad consequuntur sint odit ipsum ad voluptatem. Nemo ut quis qui. Cum aut qui officia consectetur consectetur voluptatibus. Tempore aspernatur dolorem consequatur impedit aliquid id et.','2021-08-16 09:32:11','2021-08-17 06:41:34'),(5,'Prof. Royce Rogahn III','Et occaecati totam eum totam. Aut odit non temporibus sit. Sit ab quibusdam ratione dolores sint.','Autem qui cumque ex nemo perferendis. Incidunt consequatur natus asperiores corrupti a molestiae dolorum. Esse voluptas ducimus ducimus. Minus quos suscipit quod ab distinctio aut modi praesentium.','Dolor dolor blanditiis molestias officiis. Rerum sunt dolorum quos id et. Assumenda cumque velit quo veniam voluptas dolor ullam quia.','Saepe qui qui recusandae id rem. Consequatur quasi eum eveniet molestiae facere quia et. Placeat ea nam quam rerum. Aut reiciendis eum minima labore quia molestiae.','Dolorem aut omnis nobis dolorem. Esse id esse nobis optio provident placeat. Autem facilis dolorum magnam quia quam voluptatibus.','Voluptate quisquam et voluptate aut eum. Atque corporis sequi ratione eum illum rerum. Libero corporis fugiat tempora vel enim sit. Beatae non hic fugit.','Similique explicabo quo vel est minus. Error provident consequuntur optio enim impedit ut. Dolor fuga molestiae rerum voluptatum omnis sed.','Laboriosam sunt et perferendis voluptas pariatur et nihil. Accusamus est enim totam magnam. Magnam iure occaecati rerum delectus et. Quis non sequi exercitationem expedita.','Aut quas consequuntur natus explicabo qui aut. Accusantium libero ut id reprehenderit omnis vel voluptatibus.','Et quis vero aliquam. Explicabo qui voluptatem dolor. Qui asperiores consequatur autem qui.','Veniam eveniet voluptas ipsum sapiente est. Ea et est a harum culpa a sed. Ipsam laborum in officiis dolorum voluptas molestiae ab. Illo consequuntur exercitationem aut fugiat.','Nesciunt ex ullam ut qui commodi ducimus perferendis. Iusto sed ut consectetur. In sit totam dolorem corporis. In molestias vitae dolore voluptatem eos et.','Et et harum exercitationem molestiae quaerat. Et nobis nihil dolorem. Pariatur ut ea vero occaecati exercitationem et dolores voluptas.','Quaerat molestias dolores et nulla non. Ut ea tenetur voluptatem beatae itaque doloribus animi consequatur. Voluptate illo quod iure et at voluptates.','Perferendis similique assumenda quaerat. Nam hic et atque suscipit. Velit quis nisi accusantium atque inventore error.','2021-08-16 09:32:11','2021-08-16 09:32:11'),(6,'Title','Question','True Answer','False Answer 1','False Answer 2','False Answer 3','Description','Quran','Quran Translate','Hadits','Hadits Translate','Kitab','Kitab Translate','TAUHID','MEDIUM','assets/cok4qNLypL4Z3Y3Ks23xPwB8zdQYcNPlPStS82uM.jpg','2021-08-17 02:12:32','2021-08-17 07:06:05'),(7,'Mabrur Villa','test','True Answer','sfsf','sdfsd','sdfsdf','sdfsf','sdfsdf','sdfdsf','sdfsdf','sdfsdf','sdfsdf','sdfsdfds','FIQIH','MEDIUM','assets/vMMEjQxs2Odm3OoML9xPGHMKaAtOkeruUbs7heIE.jpg','2021-08-17 06:07:39','2021-08-17 07:05:56');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mabrur123','mabrursatori@gmail.com',NULL,'$2y$10$4iFUg0IbbPm7tuzQq/svoevBjI.TqfyNqc6P2j2yS0gvix24I0sYy','09TSkCmL6Lx9nhrFHY6NcFYcwUlYICoIeytAMKEPjWcWRu7oY2mUVzusO646','2021-08-16 07:25:39','2021-08-16 07:25:39');
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

-- Dump completed on 2021-08-18 20:56:32

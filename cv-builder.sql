-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: p1us8ottbqwio8hv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: p3016rq39iyk3zx6
-- ------------------------------------------------------
-- Server version	8.0.35

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cv` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `job` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phoneno` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_general_ci,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `educations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `projects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `experiences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `achievements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `cvname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `cv_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_template` (`template_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_template` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `cv_chk_1` CHECK (json_valid(`educations`)),
  CONSTRAINT `cv_chk_2` CHECK (json_valid(`projects`)),
  CONSTRAINT `cv_chk_3` CHECK (json_valid(`experiences`)),
  CONSTRAINT `cv_chk_4` CHECK (json_valid(`skills`)),
  CONSTRAINT `cv_chk_5` CHECK (json_valid(`achievements`))
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
INSERT INTO `cv` VALUES (25,1,'Nhat','Hoang',NULL,'Backend Developer','District 10, HCM','0827872272','Detail-oriented IT professional with expertise in software development, database management, and problem-solving. Skilled in PHP, MySQL, and Node.js, with a strong passion for optimizing systems and developing efficient solutions. Quick learner, adaptable','ngbaduyy@gmail.com','[{\"edu_school\":\"HCM University of Technology\",\"edu_start_date\":\"2025-04-04\",\"edu_graduation_date\":\"2025-04-19\",\"edu_degree\":\"Software Engineer\"}]','[{\"proj_title\":\"E-commerce Website\",\"proj_description\":\"An e-commerce website is a digital platform that facilitates the buying and selling of goods and services over the internet. It offers a user-friendly interface where customers can browse a diverse range of products, compare prices, read reviews, and make secure purchases from the comfort of their own homes. E-commerce websites often feature search functionality, shopping carts, and various payment options, catering to both individual consumers and businesses.\"},{\"proj_title\":\"Healthcare Website\",\"proj_description\":\"A healthcare website is an online portal designed to provide information, services, and resources related to health and wellness. It typically offers a wide range of features such as medical articles, information about diseases and treatments, tools for symptom checking, and advice on healthy living. Many healthcare websites also facilitate interactions between patients and healthcare providers\"}]','[{\"exp_title\":\"Software Intern\",\"exp_start_date\":\"2025-04-03\",\"exp_end_date\":\"2025-04-17\",\"exp_organization\":\"Viettel\",\"exp_description\":\"A software intern assists in developing, testing, and debugging code while learning industry best practices. They collaborate with developers, attend meetings, and work on real-world projects to gain hands-on experience. Interns also explore new technologies, improve problem-solving skills, and contribute to software development under mentorship.\"},{\"exp_title\":\"PHP Intern\",\"exp_start_date\":\"2025-04-11\",\"exp_end_date\":\"2025-04-25\",\"exp_organization\":\"Gameloft\",\"exp_description\":\"A PHP intern assists in developing and maintaining web applications using PHP. They work with databases (MySQL, PostgreSQL, etc.), debug code, and collaborate with senior developers to enhance functionality. Interns gain hands-on experience with backend development, APIs, and frameworks while improving coding skills and understanding best practices in web development.\"}]','[{\"skill\":\"HTML/CSS\"},{\"skill\":\"JavaScript\"},{\"skill\":\"PHP\"},{\"skill\":\"Bootstrap\"}]','[{\"achieve_title\":\"1st Place\",\"achieve_description\":\"IT Tournament 2025\"},{\"achieve_title\":\"Runner Up\",\"achieve_description\":\"Web Development Contest\"}]','Web Intern 4/2025','2025-04-01 20:27:26','2025-04-08 11:56:31',4,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744088192/jney7ibevwconogzlhqk.png',1),(29,4,'Duy','Nguyen','https://res.cloudinary.com/doxm7rnpk/image/upload/v1743784084/cq27daemxqdul0jkch1w.webp','NodeJs Developer','District 10, HCM','0827872272','Passionate and detail-oriented <b>Node.js</b> developer with hands-on experience in building scalable web applications and <b>RESTful APIs</b>. Seeking to leverage strong <b>JavaScript</b> skills and backend expertise to contribute to innovative projects in a dynamic development team. Committed to writing clean, efficient code and continuously improving through collaboration and learning.','ngbaduyy@gmail.com','[{\"edu_school\":\"HCM University of Technology\",\"edu_start_date\":\"2024-08-02\",\"edu_graduation_date\":\"2025-04-18\",\"edu_degree\":\"Software Engineer\"}]','[{\"proj_title\":\"E-commerce Website\",\"proj_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Developed and maintained RESTful APIs using Node.js and Express.js for backend services.</li><li>Integrated MySQL for data storage and retrieval, including writing efficient SQL queries and managing database schemas.</li><li>Handled CRUD operations for various resources, ensuring proper validation and error handling.</li><li>Used Postman to test APIs and ensure proper request/response functionality.</li><li>Implemented middleware for authentication, logging, and error management.</li></ul></p><p></p><p></p><p></p><p></p>\"},{\"proj_title\":\"Healthcare Website\",\"proj_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Utilized Git for version control and worked in a collaborative environment using GitHub for pull requests and code reviews.</li><li>Participated in code reviews and agile ceremonies (stand-ups, sprint planning) to align on tasks and timelines.</li><li>Followed best practices for code modularity, readability, and maintainability.</li><li>Researched and implemented third-party libraries to extend functionality (e.g., JWT for authentication, bcrypt for password hashing).</li></ul></p><p></p><p></p><p></p>\"}]','[{\"exp_title\":\"Software Intern\",\"exp_start_date\":\"2024-11-08\",\"exp_end_date\":\"2025-02-14\",\"exp_organization\":\"Viettel\",\"exp_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Assisted in the development and maintenance of web applications using technologies such as HTML, CSS, JavaScript, and NodeJs.&nbsp;</li><li>Collaborated with senior developers to troubleshoot bugs, implement new features, and optimize application performance.&nbsp;</li><li>Participated in daily stand-ups and sprint planning meetings as part of the Agile/Scrum development process.</li></ul></p>\"},{\"exp_title\":\"PHP Intern\",\"exp_start_date\":\"2024-12-13\",\"exp_end_date\":\"2025-04-12\",\"exp_organization\":\"Gameloft\",\"exp_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Gained hands-on experience with version control systems like Git.</li><li>Conducted testing and debugging to ensure software quality and reliability.</li><li>Worked closely with cross-functional teams including UI/UX designers and product managers to understand user needs and improve user experience.</li><li>Learned and applied best practices in software engineering, code reviews, and software documentation.</li></ul></p><p></p><p></p><p></p>\"}]','[{\"skill\":\"HTML/CSS\"},{\"skill\":\"JavaScript\"},{\"skill\":\"NodeJs\"},{\"skill\":\"ExpressJs\"}]','[{\"achieve_title\":\"1st Place\",\"achieve_description\":\"IT Tournament 2025\"},{\"achieve_title\":\"Runner Up\",\"achieve_description\":\"Web Development Contest\"}]','NodeJs Intern 4/2025','2025-04-04 23:28:04','2025-04-14 02:58:21',4,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744176631/ngnl37i9dplogcmo5nfq.png',0),(30,1,'Hao','Do',NULL,'','','','','','[{\"edu_school\":\"\",\"edu_start_date\":\"\",\"edu_graduation_date\":\"\",\"edu_degree\":\"\"}]','[{\"proj_title\":\"\",\"proj_description\":\"\"}]','[{\"exp_title\":\"\",\"exp_start_date\":\"\",\"exp_end_date\":\"\",\"exp_organization\":\"\",\"exp_description\":\"\"}]','[{\"skill\":\"\"}]','[{\"achieve_title\":\"\",\"achieve_description\":\"\"}]','adasd','2025-04-08 08:18:28','2025-04-08 08:18:49',6,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744100307/btnft4xeouimgn9bceaf.png',0),(31,5,'Duy','Nguyen','https://res.cloudinary.com/doxm7rnpk/image/upload/v1744162887/gcimi3ewkkqgyarigkga.png','Web Developer','District 10, HCM','0827872272','<p data-pm-slice=\"1 1 []\">Passionate and detail-oriented <b>Node.js</b> developer with hands-on experience in building scalable web applications and RESTful APIs. Seeking to leverage strong <b>JavaScript</b> skills and backend expertise to contribute to innovative projects in a dynamic development team. Committed to writing clean, efficient code and continuously improving through collaboration and learning.</p>','ngbaduyy@gmail.com','[{\"edu_school\":\"HCM University of Technology\",\"edu_start_date\":\"\",\"edu_graduation_date\":\"\",\"edu_degree\":\"Software Engineer\"}]','[{\"proj_title\":\"E-commerce Website\",\"proj_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Developed and maintained RESTful APIs using Node.js and Express.js for backend services.\\n</li><li>Integrated MySQL for data storage and retrieval, including writing efficient SQL queries and managing database schemas.\\n</li><li>Handled CRUD operations for various resources, ensuring proper validation and error handling.\\n</li><li>Used Postman to test APIs and ensure proper request/response functionality.\\n</li><li>Implemented middleware for authentication, logging, and error management.</li></ul></p>\"}]','[{\"exp_title\":\"Software Intern\",\"exp_start_date\":\"2025-04-10\",\"exp_end_date\":\"2025-04-25\",\"exp_organization\":\"Viettel\",\"exp_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Assisted in the development and maintenance of web applications using technologies such as HTML, CSS, JavaScript, and NodeJs. \\n</li><li>Collaborated with senior developers to troubleshoot bugs, implement new features, and optimize application performance. \\n</li><li>Participated in daily stand-ups and sprint planning meetings as part of the Agile/Scrum development process.</li></ul></p>\"},{\"exp_title\":\"PHP Intern\",\"exp_start_date\":\"2025-04-04\",\"exp_end_date\":\"2025-04-25\",\"exp_organization\":\"Gameloft\",\"exp_description\":\"<p data-pm-slice=\\\"1 1 []\\\"><ul><li>Gained hands-on experience with version control systems like Git.\\n</li><li>Conducted testing and debugging to ensure software quality and reliability.\\n</li><li>Worked closely with cross-functional teams including UI/UX designers and product managers to understand user needs and improve user experience.\\n</li><li>Learned and applied best practices in software engineering, code reviews, and software documentation.</li></ul></p>\"}]','[{\"skill\":\"HTML/CSS\"},{\"skill\":\"JavaScript\"},{\"skill\":\"PHP\"},{\"skill\":\"Laravel\"},{\"skill\":\"Bootstrap\"}]','[{\"achieve_title\":\"1st Place\",\"achieve_description\":\"IT Tournament 2025\"},{\"achieve_title\":\"Runner Up\",\"achieve_description\":\"Web Development Contest\"}]','Web Intern 3/2024','2025-04-09 01:41:33','2025-04-19 10:49:55',4,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1745059793/ml4e2xe2yvgujgmbalpy.png',1),(32,1,'Toi','adasd',NULL,'adsasd','adsa','','','dsasdads','[{\"edu_school\":\"\",\"edu_start_date\":\"\",\"edu_graduation_date\":\"\",\"edu_degree\":\"\"}]','[{\"proj_title\":\"\",\"proj_description\":\"\"}]','[{\"exp_title\":\"\",\"exp_start_date\":\"\",\"exp_end_date\":\"\",\"exp_organization\":\"\",\"exp_description\":\"\"}]','[{\"skill\":\"\"}]','[{\"achieve_title\":\"\",\"achieve_description\":\"\"}]','1231231','2025-04-12 14:55:38','2025-04-12 14:56:10',7,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744469769/glgpf9vxdlen7mpqkyiv.png',1),(33,5,'ádasd','',NULL,'','','','','','[{\"edu_school\":\"\",\"edu_start_date\":\"\",\"edu_graduation_date\":\"\",\"edu_degree\":\"\"}]','[{\"proj_title\":\"\",\"proj_description\":\"\"}]','[{\"exp_title\":\"\",\"exp_start_date\":\"\",\"exp_end_date\":\"\",\"exp_organization\":\"\",\"exp_description\":\"\"}]','[{\"skill\":\"\"}]','[{\"achieve_title\":\"\",\"achieve_description\":\"\"}]','Hao','2025-04-13 10:00:43','2025-04-13 10:00:43',8,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744538441/vio1uussbz9it5nd6mqr.png',0),(35,3,'Duy','Nguyen','https://res.cloudinary.com/doxm7rnpk/image/upload/v1744614146/ksbf3c7cuv5vthnbmye0.png','ReactJs Development','District 10, HCM','0827872272','<div>Enthusiastic and detail-oriented <b>Computer Science</b> student with a strong foundation in JavaScript and modern front-end development. Seeking an internship opportunity to apply and enhance my skills in <b>React.js</b>, responsive UI design, and state management. Eager to contribute to real-world projects while learning from experienced developers in a collaborative team environment.</div>','ngbaduyy@gmail.com','[{\"edu_school\":\"HCM University of Technology\",\"edu_start_date\":\"2025-04-18\",\"edu_graduation_date\":\"2025-04-26\",\"edu_degree\":\"Software Engineer\"}]','[{\"proj_title\":\"E-commerce Website\",\"proj_description\":\"<div><ul><li>Developed a fully functional e-commerce web app with product listings, shopping cart, and user authentication.</li><li>Built reusable UI components with React.js and styled them using custom CSS and Google Fonts.</li><li>Implemented shopping cart functionality with React state and localStorage for data persistence.</li><li>Integrated Firebase for user authentication (sign up/login) and Firestore as the product database.</li><li>Added responsive design to ensure mobile-friendliness across devices.</li></ul></div>\"}]','[{\"exp_title\":\"Software Intern\",\"exp_start_date\":\"2025-04-17\",\"exp_end_date\":\"2025-04-26\",\"exp_organization\":\"Viettel\",\"exp_description\":\"<div><ul><li>Collaborated with a team of developers to build responsive and dynamic web interfaces using React.js.</li><li>Assisted in converting wireframes and UI designs into functional components using JSX and CSS (Poppins and Sen fonts, custom color themes).</li><li>Implemented reusable components and state management using React hooks (useState, useEffect).</li><li>Gained hands-on experience with Git, REST APIs, and basic debugging techniques.</li><li>Participated in daily stand-ups and code reviews to learn best practices in frontend development.</li></ul></div>\"}]','[{\"skill\":\"ReactJs\"},{\"skill\":\"HTML\"},{\"skill\":\"Bootstrap\"}]','[{\"achieve_title\":\"1st Place\",\"achieve_description\":\"IT Tournament\"}]','ReactJs Intern 4/2025','2025-04-14 07:02:29','2025-04-14 07:12:16',3,'https://res.cloudinary.com/doxm7rnpk/image/upload/v1744614148/wqqw8nztcryvb9zfzw9q.png',0);
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `template` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `preview_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type` (`type_id`),
  CONSTRAINT `fk_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'Santiago','Classic full-page resume template with sizable resume sections.','https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/383/persistent-resource/santiago-resume-templates.jpg?v=1656070649',1,'2025-03-27 05:06:39','2025-04-04 00:34:14',1),(2,'Sydney','Modern and eye-catching resume template. Beautiful contrasting structure.','https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/441/persistent-resource/sydney-resume-templates.jpg?v=1651657428',1,'2025-03-27 05:54:38','2025-04-02 03:50:31',1),(3,'Vienna','Striking modern header, professional two column template structure.','https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/406/persistent-resource/vienna-resume-templates.jpg?v=1656070334',1,'2025-03-27 05:56:52','2025-04-02 03:50:34',1),(4,'Milan','Streamlined professional resume template with a human touch.','https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/504/persistent-resource/milan-resume-templates.jpg?v=1652261853',1,'2025-03-30 12:13:46','2025-04-02 03:50:37',1),(5,'Toronto','A web-inspired resume template perfect for chatting up your achievements.','https://res.cloudinary.com/doxm7rnpk/image/upload/v1744158965/lyc65jlb4wdygu4bwewb.avif',1,'2025-04-09 00:36:07','2025-04-09 00:38:54',1),(6,'Brussels','A simple, two-tone resume template. Easy to read and highlights your experience.','https://res.cloudinary.com/doxm7rnpk/image/upload/v1744167447/xz4laz3zvpoxsdrw61la.avif',1,'2025-04-09 02:57:29','2025-04-09 03:07:22',1);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Chronological'),(2,'Functional'),(3,'Combination'),(4,'Academic');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Duy Nguyen','ngbaduyy05@gmail.com',NULL,'https://lh3.googleusercontent.com/a/ACg8ocKURYFdZzDSYANAAUvr5ln8NOr7twcbBcFeI_lLcrphJvqPkQ=s96-c','user','2025-03-23 09:05:14'),(4,'Ba Duy','ngbaduyy@gmail.com','$2y$10$lK0CGoColK8R48zrG9e2XuCHLYoXbx5VKxX57zoE2zD8jGX50W8kq',NULL,'user','2025-04-01 13:50:30'),(5,'Admin','admin@gmail.com','$2y$10$St6bpsKEMRbKZhTtXbR1YeTSyrUx5pTuJCR8klKtp8vCO8sugHRoq',NULL,'admin','2025-04-03 12:16:11'),(6,'elvin12','hao.doprogaming3479@hcmut.edu.vn','$2y$12$KdGl.KatFOp.tLz/YbiW3OgaUQoOdDAAKgTX3kLgOtVC6eoaA8Jba',NULL,'user','2025-04-08 08:17:32'),(7,'Quang Hào Đỗ','doquanghao2603@gmail.com',NULL,'https://lh3.googleusercontent.com/a/ACg8ocJSNceO-SpqnxQuwxtJW2FXUt5edzyJwQJNFoLpmV0-Z0hBrU6r=s96-c','user','2025-04-12 14:55:24'),(8,'elvin12e','doquanghao0504@gmail.com','$2y$10$tKzhA3nBH9hw4LE7LCjnS.2iy2.r7AD8oH6x5Xe.tzjfmpFRtzztq',NULL,'user','2025-04-13 09:59:03');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-19 18:59:45

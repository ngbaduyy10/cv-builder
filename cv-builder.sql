-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 04:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv-builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `educations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`educations`)),
  `projects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`projects`)),
  `experiences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`experiences`)),
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skills`)),
  `achievements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`achievements`)),
  `cvname` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `template_id`, `firstname`, `lastname`, `image`, `job`, `address`, `phoneno`, `summary`, `email`, `educations`, `projects`, `experiences`, `skills`, `achievements`, `cvname`, `created_at`, `updated_at`, `user_id`) VALUES
(25, 1, 'Nhat', 'Hoang', NULL, 'Backend Developer', 'District 10, HCM', '0827872272', 'Detail-oriented IT professional with expertise in software development, database management, and problem-solving. Skilled in PHP, MySQL, and Node.js, with a strong passion for optimizing systems and developing efficient solutions. Quick learner, adaptable', 'ngbaduyy@gmail.com', '[{\"edu_school\":\"HCM University of Technology\",\"edu_start_date\":\"2025-04-04\",\"edu_graduation_date\":\"2025-04-19\",\"edu_degree\":\"Software Engineer\"}]', '[{\"proj_title\":\"E-commerce Website\",\"proj_description\":\"An e-commerce website is a digital platform that facilitates the buying and selling of goods and services over the internet. It offers a user-friendly interface where customers can browse a diverse range of products, compare prices, read reviews, and make secure purchases from the comfort of their own homes. E-commerce websites often feature search functionality, shopping carts, and various payment options, catering to both individual consumers and businesses.\"},{\"proj_title\":\"Healthcare Website\",\"proj_description\":\"A healthcare website is an online portal designed to provide information, services, and resources related to health and wellness. It typically offers a wide range of features such as medical articles, information about diseases and treatments, tools for symptom checking, and advice on healthy living. Many healthcare websites also facilitate interactions between patients and healthcare providers\"}]', '[{\"exp_title\":\"Software Intern\",\"exp_start_date\":\"2025-04-03\",\"exp_end_date\":\"2025-04-17\",\"exp_organization\":\"Viettel\",\"exp_description\":\"A software intern assists in developing, testing, and debugging code while learning industry best practices. They collaborate with developers, attend meetings, and work on real-world projects to gain hands-on experience. Interns also explore new technologies, improve problem-solving skills, and contribute to software development under mentorship.\"},{\"exp_title\":\"PHP Intern\",\"exp_start_date\":\"2025-04-11\",\"exp_end_date\":\"2025-04-25\",\"exp_organization\":\"Gameloft\",\"exp_description\":\"A PHP intern assists in developing and maintaining web applications using PHP. They work with databases (MySQL, PostgreSQL, etc.), debug code, and collaborate with senior developers to enhance functionality. Interns gain hands-on experience with backend development, APIs, and frameworks while improving coding skills and understanding best practices in web development.\"}]', '[{\"skill\":\"HTML/CSS\"},{\"skill\":\"JavaScript\"},{\"skill\":\"PHP\"},{\"skill\":\"Bootstrap\"}]', '[{\"achieve_title\":\"1st Place\",\"achieve_description\":\"IT Tournament 2025\"},{\"achieve_title\":\"Runner Up\",\"achieve_description\":\"Web Development Contest\"}]', 'Web Intern 4/2025', '2025-04-01 20:27:26', '2025-04-01 21:49:59', 4);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `preview_image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `description`, `preview_image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'London', 'Classically structured resume template, for a robust career history.', 'https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/383/persistent-resource/santiago-resume-templates.jpg?v=1656070649', 1, '2025-03-27 05:06:39', '2025-03-31 02:07:48'),
(2, 'Sydney', 'Modern and eye-catching resume template. Beautiful contrasting structure.', 'https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/441/persistent-resource/sydney-resume-templates.jpg?v=1651657428', 1, '2025-03-27 05:54:38', '2025-03-31 02:10:48'),
(3, 'Vienna', 'Striking modern header, professional two column template structure.', 'https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/406/persistent-resource/vienna-resume-templates.jpg?v=1656070334', 1, '2025-03-27 05:56:52', '2025-03-31 02:09:46'),
(4, 'Milan', 'Streamlined professional resume template with a human touch.', 'https://s3.resume.io/cdn-cgi/image/width=380,dpr=2,format=auto/uploads/local_template_image/image/504/persistent-resource/milan-resume-templates.jpg?v=1652261853', 1, '2025-03-30 12:13:46', '2025-03-31 02:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `image`, `role`, `createdAt`) VALUES
(3, 'Duy Nguyen', 'ngbaduyy05@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKURYFdZzDSYANAAUvr5ln8NOr7twcbBcFeI_lLcrphJvqPkQ=s96-c', 'user', '2025-03-23 09:05:14'),
(4, 'Ba Duy', 'ngbaduyy@gmail.com', '$2y$10$lK0CGoColK8R48zrG9e2XuCHLYoXbx5VKxX57zoE2zD8jGX50W8kq', NULL, 'user', '2025-04-01 13:50:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_template` (`template_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `fk_template` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

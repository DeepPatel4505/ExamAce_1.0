-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 12:48 PM
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
-- Database: `examace`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `exam_date` date NOT NULL,
  `qualification` enum('10th','12th','Graduate','Post-Graduate') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `description`, `exam_date`, `qualification`, `created_at`, `updated_at`) VALUES
(1, 'UPSC Civil Services Examination', 'The UPSC Civil Services Exam is one of the toughest exams in India, used to recruit candidates for the Indian Administrative Service (IAS), Indian Police Service (IPS), and other civil services positions.', '2024-05-25', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(2, 'IBPS PO Exam', 'The Institute of Banking Personnel Selection (IBPS) conducts the Probationary Officer (PO) exam for recruitment in public sector banks across India.', '2024-08-15', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(3, 'SSC CGL Exam', 'The Staff Selection Commission (SSC) Combined Graduate Level (CGL) exam is conducted for various government positions including Income Tax Inspector, Assistant Audit Officer, and more.', '2024-06-20', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(4, 'Railway Recruitment Board (RRB) JE', 'This exam is conducted for the recruitment of Junior Engineers in various disciplines for Indian Railways.', '2024-07-10', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(5, 'NEET UG', 'The National Eligibility cum Entrance Test (NEET) is a national-level exam for admission to MBBS and BDS courses in medical colleges across India.', '2024-05-03', '12th', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(6, 'JEE Main', 'Joint Entrance Examination (JEE) Main is an entrance exam for admission to undergraduate engineering programs in top colleges across India, including NITs, IIITs, and CFTIs.', '2024-04-01', '12th', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(7, 'Indian Army Soldier Exam', 'The Indian Army Soldier exam is a recruitment exam for various soldier positions in the Indian Army, including Technical, General Duty, and Tradesman roles.', '2024-09-01', '10th', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(8, 'CAT Exam', 'The Common Admission Test (CAT) is the entrance exam for admission to MBA programs in prestigious institutions such as IIMs and other top B-schools in India.', '2024-11-25', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(9, 'GATE Exam', 'The Graduate Aptitude Test in Engineering (GATE) is an exam for admission to postgraduate programs (M.Tech, M.S.) in engineering, technology, and architecture at top institutes in India.', '2024-02-05', 'Graduate', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(10, 'CTET Exam', 'The Central Teacher Eligibility Test (CTET) is an exam for recruitment of teachers for government schools across India, specifically for classes I-VIII.', '2024-08-20', '12th', '2024-11-18 11:23:50', '2024-11-18 11:23:50'),
(11, 'UPSC NDA Exam', 'The National Defence Academy (NDA) Exam is conducted by UPSC for recruitment into the Army, Navy, and Air Force wings of the NDA.', '2024-04-20', '12th', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(12, 'LIC AAO Exam', 'The Life Insurance Corporation of India (LIC) conducts the Assistant Administrative Officer (AAO) exam for the recruitment of officers in the company.', '2024-07-15', 'Graduate', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(13, 'SSC CHSL Exam', 'The Staff Selection Commission (SSC) Combined Higher Secondary Level (CHSL) exam is conducted for recruitment to clerical and lower divisional posts in various government departments.', '2024-06-05', '12th', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(14, 'UPPSC PCS Exam', 'The Uttar Pradesh Public Service Commission (UPPSC) conducts the Provincial Civil Services (PCS) Exam for recruitment to various administrative posts in the state of Uttar Pradesh.', '2024-09-12', 'Graduate', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(15, 'Delhi Police Constable Exam', 'This exam is conducted by the Delhi Police to recruit constables for various positions in the Delhi Police department.', '2024-08-10', '12th', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(16, 'Indian Navy MR Exam', 'The Indian Navy Matric Recruit (MR) exam is for the recruitment of sailors for the Navy under the Matriculation Entry Scheme.', '2024-07-25', '10th', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(17, 'RPSC RAS Exam', 'The Rajasthan Public Service Commission (RPSC) conducts the Rajasthan Administrative Service (RAS) exam to recruit officers for various administrative posts in the state of Rajasthan.', '2024-11-15', 'Graduate', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(18, 'Indian Air Force Airmen Exam', 'The Airmen exam is conducted by the Indian Air Force to recruit airmen for various technical and non-technical posts in the Air Force.', '2024-05-10', '12th', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(19, 'UPSC IES/ISS Exam', 'The Indian Economic Service (IES) and Indian Statistical Service (ISS) exams are conducted by UPSC for recruitment to the economic and statistical services of the Indian government.', '2024-06-28', 'Graduate', '2024-11-18 11:24:31', '2024-11-18 11:24:31'),
(20, 'BHEL Recruitment Exam', 'Bharat Heavy Electricals Limited (BHEL) conducts recruitment exams for various technical and non-technical positions in the company.', '2024-07-30', 'Graduate', '2024-11-18 11:24:31', '2024-11-18 11:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tag`
--

CREATE TABLE `exam_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_tag`
--

INSERT INTO `exam_tag` (`id`, `tag_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(2, 1, 2, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(3, 2, 3, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(4, 3, 4, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(5, 4, 5, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(6, 5, 6, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(7, 6, 7, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(8, 7, 8, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(9, 8, 9, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(10, 9, 10, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(11, 10, 11, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(12, 11, 12, '2024-11-18 11:42:39', '2024-11-18 11:42:39'),
(13, 12, 13, '2024-11-18 11:42:39', '2024-11-18 11:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `job_type` enum('Government','Private') NOT NULL,
  `location` varchar(255) NOT NULL,
  `eligibility` text NOT NULL,
  `vacancies` int(11) NOT NULL,
  `application_start_date` date NOT NULL,
  `application_end_date` date NOT NULL,
  `job_status` enum('Open','Closed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`id`, `title`, `organization`, `job_type`, `location`, `eligibility`, `vacancies`, `application_start_date`, `application_end_date`, `job_status`, `created_at`, `updated_at`) VALUES
(1, 'Field Assistant', 'Maharashtra Forest Department', 'Government', 'Nagpur, Maharashtra', '12th pass, 18-30 years', 30, '2024-08-20', '2024-09-30', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(2, 'Assistant Audit Officer', 'Comptroller and Auditor General of India (CAG)', 'Government', 'New Delhi, India', 'Graduation in Commerce, 21-32 years', 50, '2024-06-15', '2024-09-15', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(3, 'Deputy Collector', 'Uttar Pradesh Public Service Commission (UPPSC)', 'Government', 'Lucknow, Uttar Pradesh', 'Postgraduate, 22-35 years', 20, '2024-07-01', '2024-09-30', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(4, 'Research Scientist (Physics)', 'Bhabha Atomic Research Centre (BARC)', 'Government', 'Mumbai, Maharashtra', 'M.Sc. in Physics, 25-40 years', 10, '2024-05-10', '2024-08-10', 'Closed', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(5, 'Engineer (Civil)', 'National Highways Authority of India (NHAI)', 'Government', 'Delhi, India', 'B.Tech in Civil Engineering, 23-35 years', 15, '2024-06-01', '2024-08-15', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(6, 'Assistant Professor (Computer Science)', 'Tamil Nadu Public Service Commission (TNPSC)', 'Government', 'Chennai, Tamil Nadu', 'Ph.D. in Computer Science, 30-50 years', 10, '2024-07-01', '2024-09-30', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(7, 'Traffic Police Constable', 'Madhya Pradesh Police', 'Government', 'Bhopal, Madhya Pradesh', '12th pass, 18-25 years', 100, '2024-08-05', '2024-10-05', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(8, 'Sub-Inspector (Technical)', 'Central Industrial Security Force (CISF)', 'Government', 'Various Locations, India', 'B.Tech/B.E. in Engineering, 21-30 years', 50, '2024-05-01', '2024-07-30', 'Closed', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(9, 'Chief Engineer', 'Indian Railways', 'Government', 'New Delhi, India', 'B.Tech in Engineering, 40-50 years', 5, '2024-04-01', '2024-07-01', 'Closed', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(10, 'Assistant Security Officer', 'Coal India Limited (CIL)', 'Government', 'Kolkata, West Bengal', 'Graduate, 18-28 years', 40, '2024-07-10', '2024-09-15', 'Open', '2024-11-18 11:21:48', '2024-11-18 11:21:48'),
(11, 'Junior Engineer (Electrical)', 'Indian Oil Corporation Limited (IOCL)', 'Government', 'Delhi, India', 'B.Tech in Electrical Engineering, 18-30 years', 20, '2024-08-10', '2024-09-10', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(12, 'Tax Assistant', 'Income Tax Department', 'Government', 'Chennai, Tamil Nadu', 'Graduation in Commerce, 20-27 years', 35, '2024-07-15', '2024-09-15', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(13, 'Data Scientist', 'National Informatics Centre (NIC)', 'Government', 'Hyderabad, Telangana', 'M.Tech in Computer Science, 25-40 years', 8, '2024-06-01', '2024-08-31', 'Closed', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(14, 'Nursing Officer', 'All India Institute of Medical Sciences (AIIMS)', 'Government', 'New Delhi, India', 'B.Sc. Nursing, 21-30 years', 30, '2024-05-20', '2024-08-20', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(15, 'Assistant Manager', 'Rural Electrification Corporation (REC)', 'Government', 'Noida, Uttar Pradesh', 'MBA/PGDM, 22-35 years', 12, '2024-06-05', '2024-09-05', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(16, 'Sales Tax Officer', 'Uttarakhand Public Service Commission (UKPSC)', 'Government', 'Dehradun, Uttarakhand', 'Graduation in Commerce, 21-30 years', 40, '2024-06-01', '2024-08-31', 'Closed', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(17, 'District Judge', 'Madhya Pradesh High Court', 'Government', 'Bhopal, Madhya Pradesh', 'Law degree, 35-50 years', 10, '2024-05-15', '2024-07-15', 'Closed', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(18, 'Military Engineer (Electrical)', 'Indian Army', 'Government', 'Various Locations, India', 'B.Tech in Electrical Engineering, 21-27 years', 25, '2024-07-01', '2024-09-01', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(19, 'Assistant Central Intelligence Officer', 'Intelligence Bureau (IB)', 'Government', 'New Delhi, India', 'Graduation, 18-27 years', 50, '2024-06-15', '2024-08-15', 'Open', '2024-11-18 11:22:30', '2024-11-18 11:22:30'),
(20, 'Foreman', 'Oil and Natural Gas Corporation (ONGC)', 'Government', 'Mumbai, Maharashtra', 'B.Tech in Mechanical Engineering, 23-35 years', 18, '2024-05-25', '2024-07-25', 'Closed', '2024-11-18 11:22:30', '2024-11-18 11:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `job_tag`
--

CREATE TABLE `job_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_tag`
--

INSERT INTO `job_tag` (`id`, `tag_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(2, 1, 10, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(3, 2, 2, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(4, 3, 3, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(5, 4, 4, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(6, 5, 5, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(7, 6, 6, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(8, 7, 7, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(9, 8, 8, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(10, 9, 9, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(11, 10, 10, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(12, 11, 11, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(13, 12, 12, '2024-11-18 11:42:10', '2024-11-18 11:42:10'),
(14, 13, 13, '2024-11-18 11:42:10', '2024-11-18 11:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_24_122229_create_job_listing_table', 1),
(5, '2024_09_30_164347_create_exams_table', 1),
(6, '2024_09_30_164424_create_results_table', 1),
(7, '2024_09_30_164500_create_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `result_link` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `name`, `result_link`, `release_date`, `created_at`, `updated_at`) VALUES
(1, 'UPSC Civil Services Exam 2023', 'https://www.upsc.gov.in/results/civil-services-exam-2023', '2024-05-15', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(2, 'SSC CGL 2023 Result', 'https://ssc.nic.in/results/ssc-cgl-2023', '2024-04-10', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(3, 'RBI Grade B Result 2023', 'https://www.rbi.org.in/grade-b-result-2023', '2024-03-25', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(4, 'IBPS PO 2023 Result', 'https://www.ibps.in/po-2023-result', '2024-04-05', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(5, 'Indian Navy SSR Result 2023', 'https://www.joinindiannavy.gov.in/ssr-result-2023', '2024-02-20', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(6, 'NEET UG 2024 Result', 'https://ntaresults.nic.in/result/neet-ug-2024', '2024-06-10', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(7, 'JEE Main 2024 Result', 'https://jeemain.nta.nic.in/result/jee-main-2024', '2024-05-30', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(8, 'AIIMS MBBS 2024 Result', 'https://www.aiimsexams.ac.in/result/mbbs-2024', '2024-07-15', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(9, 'GATE 2024 Result', 'https://gate.iitb.ac.in/result/gate-2024', '2024-03-25', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(10, 'UPSSSC PET 2023 Result', 'https://upsssc.gov.in/results/pet-2023', '2024-01-10', '2024-11-18 11:25:57', '2024-11-18 11:25:57'),
(11, 'IBPS Clerk 2023 Result', 'https://www.ibps.in/clerk-2023-result', '2024-03-18', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(12, 'Gujarat Public Service Commission (GPSC) Result 2023', 'https://gpsc.gujarat.gov.in/results/gpsc-2023', '2024-02-28', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(13, 'NDA 2024 Result', 'https://www.upsc.gov.in/results/nda-2024', '2024-05-05', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(14, 'State Bank of India (SBI) PO 2023 Result', 'https://www.sbi.co.in/sbi-po-2023-result', '2024-03-22', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(15, 'Railway Recruitment Board (RRB) NTPC 2023 Result', 'https://www.rrbcdg.gov.in/ntpc-2023-result', '2024-04-02', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(16, 'AIIMS Nursing Officer 2023 Result', 'https://www.aiimsexams.ac.in/result/nursing-officer-2023', '2024-03-15', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(17, 'Indian Army GD 2023 Result', 'https://joinindianarmy.nic.in/results/gd-2023', '2024-02-25', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(18, 'Madhya Pradesh PSC 2023 Result', 'https://www.mppsc.nic.in/results/mppsc-2023', '2024-03-30', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(19, 'Indian Air Force X & Y Group 2023 Result', 'https://indianairforce.nic.in/results/x-y-group-2023', '2024-05-20', '2024-11-18 11:26:23', '2024-11-18 11:26:23'),
(20, 'Maharashtra Public Service Commission (MPSC) Result 2023', 'https://www.mpsc.gov.in/results/mpsc-2023', '2024-04-10', '2024-11-18 11:26:23', '2024-11-18 11:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `result_tag`
--

CREATE TABLE `result_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_tag`
--

INSERT INTO `result_tag` (`id`, `tag_id`, `result_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(2, 1, 2, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(3, 2, 3, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(4, 3, 4, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(5, 4, 5, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(6, 5, 6, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(7, 6, 7, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(8, 7, 8, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(9, 8, 9, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(10, 9, 10, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(11, 10, 11, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(12, 11, 12, '2024-11-18 11:42:25', '2024-11-18 11:42:25'),
(13, 12, 13, '2024-11-18 11:42:25', '2024-11-18 11:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('neGyHAY94lZGvkU1RU5BhGNQgkzT7pDCb38RXcOD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMmtobTFqazVnNDMyeHdXRjVwZGVwc0ZHUWlaMWV3TDdTSVpIVTR3OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9leGFtcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTI6InByZXZpb3VzX3VybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2pvYnMiO30=', 1731930270);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(2, 'Medical', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(3, 'Government', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(4, 'Private', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(5, 'IAS', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(6, 'Railways', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(7, 'Sarkari', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(8, 'Central Government', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(9, 'State Government', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(10, 'IT', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(11, 'Non-IT', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(12, 'Defence', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(13, 'Teaching', '2024-11-18 11:41:01', '2024-11-18 11:41:01'),
(14, 'Software Engineering', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(15, 'Nursing', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(16, 'Banking', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(17, 'Teaching & Education', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(18, 'Police', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(19, 'Research', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(20, 'Legal', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(21, 'Sales & Marketing', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(22, 'Management', '2024-11-18 11:40:40', '2024-11-18 11:40:40'),
(23, 'Architectural', '2024-11-18 11:40:40', '2024-11-18 11:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `tag_user`
--

CREATE TABLE `tag_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `preference` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`preference`)),
  `qualification` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_tag`
--
ALTER TABLE `exam_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_tag_tag_id_foreign` (`tag_id`),
  ADD KEY `exam_tag_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_tag`
--
ALTER TABLE `job_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_tag_tag_id_job_id_unique` (`tag_id`,`job_id`),
  ADD KEY `job_tag_job_id_foreign` (`job_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_tag`
--
ALTER TABLE `result_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_tag_tag_id_foreign` (`tag_id`),
  ADD KEY `result_tag_result_id_foreign` (`result_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_user`
--
ALTER TABLE `tag_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_user_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exam_tag`
--
ALTER TABLE `exam_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_tag`
--
ALTER TABLE `job_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `result_tag`
--
ALTER TABLE `result_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tag_user`
--
ALTER TABLE `tag_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_tag`
--
ALTER TABLE `exam_tag`
  ADD CONSTRAINT `exam_tag_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_tag`
--
ALTER TABLE `job_tag`
  ADD CONSTRAINT `job_tag_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listing` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result_tag`
--
ALTER TABLE `result_tag`
  ADD CONSTRAINT `result_tag_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_user`
--
ALTER TABLE `tag_user`
  ADD CONSTRAINT `tag_user_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

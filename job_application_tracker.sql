-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 10:11 AM
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
-- Database: `job_application_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `ApplicantID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Resume` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantID`, `Name`, `Email`, `Phone`, `Resume`, `created_at`, `updated_at`) VALUES
(3, 'John Reyes', 'john.reyes@example.com', '09981234567', NULL, '2025-12-16 22:15:45', '2025-12-16 22:15:45'),
(4, 'Angela Dela Cruz', 'angela.delacruz@example.com', '09221234567', NULL, '2025-12-16 22:16:37', '2025-12-16 22:16:37'),
(5, 'Maria Santos', 'maria.santos@example.com', '09171234567', NULL, '2025-12-16 22:17:28', '2025-12-16 22:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ApplicationID` bigint(20) UNSIGNED NOT NULL,
  `ApplicantID` bigint(20) UNSIGNED NOT NULL,
  `JobPostingID` bigint(20) UNSIGNED NOT NULL,
  `ApplicationDate` date DEFAULT NULL,
  `ResumeFile` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Remarks` text DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ApplicationID`, `ApplicantID`, `JobPostingID`, `ApplicationDate`, `ResumeFile`, `Status`, `Remarks`, `CreatedDate`, `UpdatedDate`) VALUES
(3, 3, 2, '2025-05-12', NULL, 'Reviewed', 'Candidate meets basic qualifications.', '2025-12-17 06:24:53', '2025-12-17 06:24:53');

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
-- Table structure for table `hr_staff`
--

CREATE TABLE `hr_staff` (
  `HRStaffID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Active',
  `Remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr_staff`
--

INSERT INTO `hr_staff` (`HRStaffID`, `Name`, `Email`, `Department`, `Role`, `Status`, `Remarks`, `created_at`, `updated_at`) VALUES
(2, 'Clarisse Mendoza', 'clarisse.mendoza@hrsystem.com', 'Human Resources', 'admin', 'Active', 'System administrator with full access.', '2025-12-16 22:27:46', '2025-12-16 22:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `InterviewID` bigint(20) UNSIGNED NOT NULL,
  `ApplicationID` bigint(20) UNSIGNED NOT NULL,
  `HRStaffID` bigint(20) UNSIGNED NOT NULL,
  `DateTime` datetime NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Scheduled',
  `Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`InterviewID`, `ApplicationID`, `HRStaffID`, `DateTime`, `Status`, `Remarks`) VALUES
(3, 3, 2, '2025-12-20 15:30:00', 'Scheduled', 'Interview confirmed with applicant.');

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
-- Table structure for table `job_postings`
--

CREATE TABLE `job_postings` (
  `JobPostingID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Requirements` text DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`JobPostingID`, `Title`, `Department`, `Requirements`, `Status`, `created_at`, `updated_at`) VALUES
(2, 'Junior Web Developer', 'IT Department', 'Basic knowledge of HTML, CSS, and JavaScript. Familiarity with Laravel is a plus.', 'Open', '2025-12-16 22:20:30', '2025-12-16 22:20:30'),
(3, 'HR Generalist', 'Human Resources', '2+ years experience in HR operations. Strong communication and organizational skills.', 'Open', '2025-12-16 22:21:46', '2025-12-16 22:21:46'),
(4, 'Finance Manager', 'Finance', 'CPA license required. 5+ years experience in financial reporting and budgeting.', 'Closed', '2025-12-16 22:22:49', '2025-12-16 22:22:49');

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
(4, '2025_12_15_162609_create_applicants_table', 1),
(5, '2025_12_15_162621_create_job_postings_table', 1),
(6, '2025_12_15_162651_create_applications_table', 1),
(7, '2025_12_15_162710_create_h_r_staff_table', 1),
(8, '2025_12_15_162719_create_interviews_table', 1),
(9, '2025_12_16_011553_add_application_date_to_applications_table', 1),
(10, '2025_12_16_011928_add_remarks_to_applications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','hr') NOT NULL DEFAULT 'hr',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$12$yQ597Wf9WNRrA/jmrz.Npe03SBnlJbjnQBf9PxzNUHR1ZlRYhRe3q', 'admin', NULL, '2025-12-15 23:51:19', '2025-12-15 23:51:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`ApplicantID`),
  ADD UNIQUE KEY `applicants_email_unique` (`Email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `applications_applicantid_foreign` (`ApplicantID`),
  ADD KEY `applications_jobpostingid_foreign` (`JobPostingID`);

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
-- Indexes for table `hr_staff`
--
ALTER TABLE `hr_staff`
  ADD PRIMARY KEY (`HRStaffID`),
  ADD UNIQUE KEY `hr_staff_email_unique` (`Email`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`InterviewID`),
  ADD KEY `interviews_applicationid_foreign` (`ApplicationID`),
  ADD KEY `interviews_hrstaffid_foreign` (`HRStaffID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`JobPostingID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ApplicationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr_staff`
--
ALTER TABLE `hr_staff`
  MODIFY `HRStaffID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `InterviewID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `JobPostingID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_applicantid_foreign` FOREIGN KEY (`ApplicantID`) REFERENCES `applicants` (`ApplicantID`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_jobpostingid_foreign` FOREIGN KEY (`JobPostingID`) REFERENCES `job_postings` (`JobPostingID`) ON DELETE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_applicationid_foreign` FOREIGN KEY (`ApplicationID`) REFERENCES `applications` (`ApplicationID`) ON DELETE CASCADE,
  ADD CONSTRAINT `interviews_hrstaffid_foreign` FOREIGN KEY (`HRStaffID`) REFERENCES `hr_staff` (`HRStaffID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

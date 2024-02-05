-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 04:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnm_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` int(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_details`
--

CREATE TABLE `hr_details` (
  `HR_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intervier_scheduling`
--

CREATE TABLE `intervier_scheduling` (
  `scheduling_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `interview_date` datetime NOT NULL,
  `interview_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviewers`
--

CREATE TABLE `interviewers` (
  `interviewer_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `qualifications` text NOT NULL,
  `responsibilities` text NOT NULL,
  `deadline_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_code`, `job_title`, `job_description`, `qualifications`, `responsibilities`, `deadline_date`, `status`) VALUES
(6, '', 'Corporate Network Administrator', 'the successfull candidate shall be expected to plan, implement, and manage TNM\'s computer network and ensure efficiency, security , and reliability the candidate will work with various network technologies, hardare, and software to maintain seamless communication and data exchange within TNM and with partner organizations.', 'bachelors degree in computer science, infirmation technology, electronic enegineering, or related field\r\nCisco Certified Network Associate (CCNA)\r\nCisco Certified Network Professional (CCNP)\r\nminimum of 2 years work experience in a related field.', 'designs and plans network infrastructure to meet TNM\'s current and future connectivity needs, including LANs (Local Area Networks) and WANs (Wide Area Networks).\r\nPlans and executes network upgrades, expansions, and hardware replacements to accommodate business frowth and changing requirements.\r\nProvides input in designing and development of business continuity and disaster recovery plans.\r\nDevelops disaster recovery procedures to recover from network failures or disasters \r\nConducts systems backups and DR tests for the Corporate Network according to approved policies.\r\nMonitors network performance (availability, utilization, throughput, and latency) and test for weakness.\r\ncoordinates with the helpdesk for corporate network support services and incident management.\r\nUpdates and maintains corporate network IP addressing schemed and VLANs.\r\nEnsures LAN maintainance in TNM business and service centres.\r\nMaintains up-to-datte high-level and low-level diagrams.\r\nUpdates and maintains corporate network inventory. ', '2024-02-01 00:00:00', 'cancelled'),
(8, '', 'Customer service director', 'The customer services director is responsible for shaping the customer service strategy, driving customer engagement and satisfaction, and ensuring operational excellence in our services delivery. The role is crucial in achieving  TNM Plc strategic objectives and enhancing the customer experience. this is a leadership role that reports to the Chief Commercial Officer ', 'Minimum of Master\'s degree in Business Administration, Business management, Financial Management or any related field\r\nMinimum 8 years working experience in customer services at a senior managerial level.\r\nExperience in the telecommunication industry is an added advantage.\r\nKey skills - strategic planning, customer and results orientation, negotiation, leadership, excellent communication and business acumen.', 'Develop a customer service strategy to dive customer acquisition, satisfaction, retention, interaction, and profitability.\r\nDevelop the customer demand management roadmap to meet defined targets.\r\nDevelop and review customer service survey tools to gather valuable customer insights.\r\nMonitor trends and KPIs to ensure the highest quality of services.\r\nEnsure seamless on boarding process for new customers.\r\nUtilize customer insights to design personalized propositions and support  digital adoption.\r\nDevelop and implement Call Centre Service performance standards to ensure compliance with regulatory requirements.\r\nDevelop and monitor Quality Assurance (QA) programs.\r\nEnsure business continuity for Call Centre Services.\r\nEstablish new retail outlets based on strategic business direction.\r\nMaintain uniform service standards across all retail shops.\r\nNegotiate SLA contracts and define  technology  requirements for operational efficiency.\r\nLead, mentor, motivate and manage the customer services team  for productivity, excellence  and career advancement.', '2024-01-31 00:00:00', 'closed'),
(9, '', 'Monitoring and Evaluation Officer1', 'The Monitoring and Evaluation Officerwill supportclinical department, community health department, research, data collection, analysis, visualization, and reporting. This will include ongoing data collection activities with different platforms (CommCare, Tovuti LMS, DHIS2, electronic medical records (EMR), Microsoft Excel, and paper-based data collection).\r\n\r\nThis position focuses on designing the data collection mechanisms, ensuring appropriate implementation, reviewing data collected for quality assurance and quality improvement purposes, and training/overseeing data collection among program teams', 'Minimum of a Bachelor’s Degree of Science in Statistics/Information Technology,or any other related field.\r\nMinimum of two years’ experience working with tablet-based data collection systems such as CommCare or ODK.\r\nMinimum of three years’ experience organizing, analysing, and presenting data in Microsoft Excel.\r\nPrior experience managing other members of data collection teams and executing quality assurance and quality improvement protocols.\r\nExpertise in survey design, quantitative data analysis, and program management.\r\nExperience with Stata, R, Power BI, Python, SAS, or other analytic software a plus.\r\nExperience with Microsoft Power BI, Tableau, or other data visualization software a plus.\r\nNative of Malawi, fluent in Chichewa and English, with written proficiency in English.\r\nAbility to work well in a dynamic team environment alongside health workers, support staff, and health personnel from various backgrounds.\r\nAble to work under minimum supervision.', 'Support M&E for all departments (clinical, community, operations) and trainings.\r\nCreate comprehensive monitoring and evaluation plans focusing on measuring the impact of programs from all departmentssuch as WDF, cervical cancer, GAIN, Teen Club,non-communicable disease (NCD), HIV, POSER, CHW, CP, SHARC, mental health.\r\nReview and maintain dashboards that highlight programmatic performance, including Organisation high-level indicators and Organization Strategic Plan.\r\nDevelop routine data collection tools and digitalize using CommCare, DHIS2, Tovuti LMS for Takeda Grant, EMR, Sharepoint, PowerBI, and any digital device to track programmatic indicators.\r\nAnalyse data and generate reports/presentations to support decision-making and ensure reports are submitted on time and of good quality.\r\nMentor chronic disease and primary health care facility clinical teams, Community teams (Site supervisors, officers, and coordinators), and data technicians in data interpretation, review, utilization, and presentation.\r\nWork with HMIS Officers in Neno and other districts as well as Clinical and Community teams on data collected during emergency response and training them on the data collection tools used for the exercises, developed by the PIH team (Commcare, PowerBI, etc.) or other implementing partners, including Malawi Government.', '2024-02-10 00:00:00', 'open'),
(36, 'MW716480', 'System Analyst', 'TNM is seeking a highly skilled and motivated individual to join our dynamic team as a System Analyst. The successful candidate will play a key role in analyzing, designing, and implementing efficient information systems that align with the company\'s strategic objectives. This is a fantastic opportunity for a talented professional to contribute to the growth and success of one of Malawi\'s leading telecommunications companies.', 'Bachelor\'s degree in Computer Science, Information Technology, or a related field.\r\nProven experience as a System Analyst or similar role.\r\nStrong analytical and problem-solving skills.\r\nProficiency in programming languages such as python, php, and javascript and database management.\r\nExcellent communication and interpersonal skills.\r\nAbility to work collaboratively in a team environment.\r\nFamiliarity with telecommunications systems is a plus.', 'Analyze existing systems and processes to identify opportunities for improvement.\r\nCollaborate with cross-functional teams to gather and document system requirements.\r\nDesign, develop, and implement scalable and efficient information systems.\r\nConduct thorough testing and debugging of applications to ensure functionality and performance.\r\nProvide technical support and training to end-users.\r\nStay current with industry trends and advancements to recommend innovative solutions.', '2024-02-10 00:00:00', 'open'),
(37, 'VH517843', 'Software Developer', 'We are looking for a skilled Software Developer to design, develop, and maintain high-quality software solutions. The ideal candidate is a problem solver with a passion for technology, strong coding skills, and a commitment to delivering exceptional results. This is an exciting opportunity to contribute to the development of groundbreaking projects in a supportive and forward-thinking work environment.', 'Bachelor\'s degree in Computer Science, Software Engineering, or a related field.\r\nProven experience as a Software Developer or a similar role.\r\nStrong proficiency in one or more programming languages (e.g., Java, Python, C#).\r\nFamiliarity with front-end and back-end development.\r\nExcellent problem-solving and critical-thinking skills.\r\nStrong communication and collaboration skills.\r\nAbility to work both independently and in a team.\r\n', 'Collaborate with cross-functional teams to gather and analyze requirements.\r\nDesign and develop software solutions that meet the project specifications.\r\nWrite clean, efficient, and maintainable code.\r\nConduct thorough testing and debugging to ensure software functionality.\r\nCollaborate with team members to troubleshoot and resolve issues.\r\nStay updated on emerging trends and technologies in software development.\r\n', '2024-02-09 00:00:00', 'open'),
(38, 'NF216389', 'Network engineer', 'the network engineer will be responsible for designing and implementing tnms network infrustucture', 'testvvgvvvv', 'test', '2024-02-02 00:00:00', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `application_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv_file_path` varchar(255) NOT NULL,
  `cover_letter_file_path` varchar(255) NOT NULL,
  `score` int(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `recommendation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `application_code`, `user_id`, `job_id`, `fullname`, `email`, `cv_file_path`, `cover_letter_file_path`, `score`, `status`, `recommendation`) VALUES
(80, '', 22, 6, 'Christine Chagomerana', 'christine.idah216@gmail.com', '/uploadscv 3.pdf', '/uploadscover letter 1 (1).pdf', 56, 'pending', ''),
(81, '', 22, 8, 'Christine Chagomerana', 'christine.idah216@gmail.com', '/uploadscv1.pdf', '/uploadscover letter 1 (2).pdf', 46, 'pending', ''),
(82, '', 22, 9, 'Christine Chagomerana', 'christine.idah216@gmail.com', '/uploadscv 6.pdf', '/uploadscover letter 2.pdf', 47, 'pending', ''),
(83, '', 22, 36, 'Christine Chagomerana', 'christine.idah216@gmail.com', '/uploadscv 2.pdf', '/uploadscover letter 2.pdf', 40, 'pending', ''),
(84, '', 10, 6, 'stanley phiri', 'logahstanley@yahoo.com', '/uploadscv 2.pdf', '/uploadscover letter 2.pdf', 27, 'pending', ''),
(85, '', 10, 8, 'stanley phiri', 'logahstanley@yahoo.com', '/uploadsCv Chisomo.pdf', '/uploadscover letter chiso.pdf', 45, 'pending', ''),
(86, '', 10, 37, 'stanley phiri', 'logahstanley@yahoo.com', '/uploadsCV Chikondi Chadza.pdf', '/uploadscover letter chiso.pdf', 43, 'pending', ''),
(87, '', 22, 38, 'Christine Chagomerana', 'christine.idah216@gmail.com', '/uploadsCV Christine.pdf', '/uploadscover letter chicco.pdf', 29, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) NOT NULL,
  `shortlisted_id` int(20) NOT NULL,
  `message` text NOT NULL,
  `job_title` text NOT NULL,
  `job_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_details`
--

CREATE TABLE `offer_details` (
  `offer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `offer_status` enum('accepted','declined') NOT NULL,
  `offer_expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortlisted`
--

CREATE TABLE `shortlisted` (
  `shortlisted_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `job_title` varchar(500) NOT NULL,
  `job_id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `userlog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`userlog_id`, `user_id`, `full_name`, `login_time`, `logout_time`) VALUES
(31, 19, 'logah phiri', '2024-01-31 00:16:36', '2024-01-30 15:16:36.771538'),
(32, 22, 'Christine Chagomerana', '2024-01-31 00:32:38', '2024-01-30 15:32:38.629128'),
(33, 19, 'logah phiri', '2024-01-31 00:58:26', '2024-01-30 15:58:26.990510'),
(34, 19, 'logah phiri', '2024-01-31 03:06:52', '2024-01-30 18:06:52.374862'),
(35, 22, 'Christine Chagomerana', '2024-01-31 03:08:13', '2024-01-30 18:08:13.717710'),
(36, 22, 'Christine Chagomerana', '2024-01-31 06:56:16', '2024-01-30 21:56:16.077807'),
(37, 10, 'stanley phiri', '2024-01-31 07:04:36', '2024-01-30 22:04:36.437176'),
(38, 19, 'logah phiri', '2024-01-31 07:21:24', '2024-01-30 22:21:24.380059'),
(39, 19, 'logah phiri', '2024-01-31 08:08:47', '2024-01-30 23:08:47.269490'),
(40, 22, 'Christine Chagomerana', '2024-01-31 08:28:57', '2024-01-30 23:28:57.873310');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `activation_status` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `full_name`, `email`, `password`, `profile_picture`, `role`, `activation_code`, `activation_status`, `status`, `date_created`) VALUES
(5, '', 'Christine Chagomerana', 'admin@tnm.co.mw', '$2y$10$du8uKDlwvhV3.E8kG6VG/OUYaUYcYnjlHhzOBIMu5gzJJvNnemu7W', 'FB_IMG_16863070417879559.jpg', 1, '0', 'Verified', 'active', ''),
(10, 'DR87643NG63007', 'stanley phiri', 'logahstanley@yahoo.com', '$2y$10$No/u9GUMOJLMcXeQnuuvo.i/9hdQE/OnRfet8sLb40qXUR4F6mKjW', 'FB_IMG_16863070417879559.jpg', 3, '0', 'Verified', 'Active', '2024-01-24 03:04:23'),
(19, 'XQ01201PL70113', 'logah phiri', 'logahstankey@gmail.com', '$2y$10$DJEN4F6gMpZGwuKWYbKHq.rYiRqcs0pdmvGIdOcfpH7rR.Qv9iedO', 'IMG_20230108_062558~2.jpg', 2, '0', 'Verified', 'Active', '2024-01-24 14:57:40'),
(22, 'NI39751QH54210', 'Christine Chagomerana', 'christine.idah216@gmail.com', '$2y$10$qUtUBQLuIGWnvzPB4HPbTuZ/NLNV6SuyAQ/nrlOFl370N3z51hJE6', 'image (2).png', 3, '0', 'Verified', 'Active', '2024-01-28 21:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `graduation_date` date NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `employment_dates` varchar(50) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `certifications` varchar(255) DEFAULT NULL,
  `certifications_file_path` varchar(255) DEFAULT NULL,
  `cv_document_path` varchar(255) NOT NULL,
  `project_links` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `full_name`, `address`, `phone_number`, `email`, `degree`, `institution`, `graduation_date`, `job_title`, `company_name`, `employment_dates`, `skills`, `certifications`, `certifications_file_path`, `cv_document_path`, `project_links`, `created_at`) VALUES
(13, 22, 'Christine Chagomerana', 'Ntchisi, Malawi Central', '0996032230', 'christine.idah216@gmail.com', 'B.S. in Information and Communications Technology', 'Mzuzu University', '2015-02-03', 'Software Developer, Systems Analyst', 'Mzuzu University, Ministry of water and sanitation', '3, 2', 'PHP, Python, Good Communication skills', 'CCNA', 'uploads/certifications/cover letter 1 (4).pdf', 'uploads/cv_documents/cv 3.pdf', 'https://github.com/Christiine261/TNM_recruitment_portal\r\nhttps://github.com/Christiine261/MBTS_campaign_management_system', '2024-01-30 15:39:25'),
(14, 10, 'Stanley Phiri', 'Euthini, Malawi North', '0880042412', 'logahstanley@yahoo.com', 'B.S. in Information and Communication Technology, MSCE', 'Mzuzu University, Euthini Secondary School', '2019-01-23', 'Data Analyst', 'Logah Investments', '4', 'Entreprenuer, Good communication skills', 'Huawei Seed for the future', '', 'uploads/cv_documents/cv 3.pdf', '000webhost/logah-stanly.app.com', '2024-01-30 22:19:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `hr_details`
--
ALTER TABLE `hr_details`
  ADD PRIMARY KEY (`HR_id`);

--
-- Indexes for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  ADD PRIMARY KEY (`scheduling_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `interviewers`
--
ALTER TABLE `interviewers`
  ADD PRIMARY KEY (`interviewer_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `shortlisted`
--
ALTER TABLE `shortlisted`
  ADD PRIMARY KEY (`shortlisted_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`userlog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_details`
--
ALTER TABLE `hr_details`
  MODIFY `HR_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  MODIFY `scheduling_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviewers`
--
ALTER TABLE `interviewers`
  MODIFY `interviewer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offer_details`
--
ALTER TABLE `offer_details`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortlisted`
--
ALTER TABLE `shortlisted`
  MODIFY `shortlisted_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `userlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  ADD CONSTRAINT `intervier_scheduling_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `intervier_scheduling_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD CONSTRAINT `offer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `offer_details_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `user_portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

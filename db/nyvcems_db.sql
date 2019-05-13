-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 12:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyvcems_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_activity`
--

CREATE TABLE `ems_r_activity` (
  `ra_activity_id` int(11) NOT NULL,
  `ra_activity_name` varchar(50) NOT NULL,
  `ra_activity_description` varchar(200) NOT NULL,
  `ra_activity_starttime` varchar(5) NOT NULL,
  `ra_activity_pic` varchar(50) NOT NULL,
  `ra_activity_status` tinyint(1) NOT NULL DEFAULT '1',
  `ra_event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_activity`
--

INSERT INTO `ems_r_activity` (`ra_activity_id`, `ra_activity_name`, `ra_activity_description`, `ra_activity_starttime`, `ra_activity_pic`, `ra_activity_status`, `ra_event_id`) VALUES
(1, 'Sample', 'desc', '08:00', 'staff1', 1, 1),
(2, 'sample1', 'desc1', '09:00', 'staff2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_advocacy`
--

CREATE TABLE `ems_r_advocacy` (
  `advoc_id` int(11) NOT NULL,
  `advoc_name` varchar(50) NOT NULL,
  `advoc_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_advocacy`
--

INSERT INTO `ems_r_advocacy` (`advoc_id`, `advoc_name`, `advoc_activeflag`) VALUES
(1, 'Health', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_district`
--

CREATE TABLE `ems_r_district` (
  `rd_dis_id` int(11) NOT NULL,
  `rd_dis_name` varchar(50) NOT NULL,
  `rd_dis_description` varchar(100) DEFAULT NULL,
  `rd_dis_head` varchar(100) NOT NULL,
  `rd_dis_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_district`
--

INSERT INTO `ems_r_district` (`rd_dis_id`, `rd_dis_name`, `rd_dis_description`, `rd_dis_head`, `rd_dis_status`) VALUES
(1, 'District 1', 'District 1', 'Ronelyn Villegas', 1),
(2, 'District 2', 'District 2', 'Carlo Guiterrez', 1),
(3, 'District 3', 'District 3', 'Ceriaco Respecia', 1),
(4, 'District 4', 'District 4', 'Esperato Ilaida', 1),
(5, 'District 5', 'District 5', 'Marielle Valencia', 1),
(6, 'District 6', 'District 6', 'Cristian Balatbat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_event`
--

CREATE TABLE `ems_r_event` (
  `re_event_id` int(11) NOT NULL,
  `re_event_name` varchar(50) NOT NULL,
  `re_event_description` varchar(200) NOT NULL,
  `re_event_startdate` date NOT NULL,
  `re_event_enddate` date NOT NULL,
  `re_regfee_mem` decimal(10,2) NOT NULL,
  `re_regfee_nonmem` decimal(10,2) NOT NULL,
  `re_event_status` tinyint(1) NOT NULL DEFAULT '1',
  `re_etype_id` int(11) NOT NULL,
  `re_venue_id` int(11) NOT NULL,
  `re_event_stat` varchar(100) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_event`
--

INSERT INTO `ems_r_event` (`re_event_id`, `re_event_name`, `re_event_description`, `re_event_startdate`, `re_event_enddate`, `re_regfee_mem`, `re_regfee_nonmem`, `re_event_status`, `re_etype_id`, `re_venue_id`, `re_event_stat`) VALUES
(1, 'Mismo: Youth Volunteers Summit 2019', 'Seminar', '2019-04-06', '2019-04-06', '500.00', '1000.00', 1, 1, 1, 'Pending'),
(2, 'Innovate Integrate Motivate', 'Desc', '2019-05-11', '2019-05-11', '500.00', '1000.00', 1, 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_event_type`
--

CREATE TABLE `ems_r_event_type` (
  `ret_etype_id` int(11) NOT NULL,
  `ret_etype_name` varchar(50) NOT NULL,
  `ret_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_event_type`
--

INSERT INTO `ems_r_event_type` (`ret_etype_id`, `ret_etype_name`, `ret_status`) VALUES
(1, 'Seminar', 1),
(2, 'Gift Giving', 1),
(3, 'Sample', 1),
(4, 'Reunion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_individual_info`
--

CREATE TABLE `ems_r_individual_info` (
  `rii_individ` int(11) NOT NULL,
  `rii_name` varchar(50) NOT NULL,
  `rii_bday` date NOT NULL,
  `rii_gender` varchar(6) NOT NULL,
  `rii_conno` varchar(11) NOT NULL,
  `rii_email` varchar(50) NOT NULL,
  `rii_barangay` varchar(50) NOT NULL,
  `rii_city` varchar(50) NOT NULL,
  `rii_province` varchar(50) NOT NULL,
  `rii_region` varchar(50) NOT NULL,
  `rii_conperson` varchar(50) NOT NULL,
  `rii_conpersonno` varchar(11) NOT NULL,
  `rii_educattainment` varchar(50) DEFAULT NULL,
  `rii_yeargraduated` varchar(4) DEFAULT NULL,
  `rii_degree` varchar(50) DEFAULT NULL,
  `rii_awards` varchar(100) DEFAULT NULL,
  `rii_company` varchar(50) DEFAULT NULL,
  `rii_position` varchar(50) DEFAULT NULL,
  `rii_advoc` varchar(50) DEFAULT NULL,
  `rii_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_individual_info`
--

INSERT INTO `ems_r_individual_info` (`rii_individ`, `rii_name`, `rii_bday`, `rii_gender`, `rii_conno`, `rii_email`, `rii_barangay`, `rii_city`, `rii_province`, `rii_region`, `rii_conperson`, `rii_conpersonno`, `rii_educattainment`, `rii_yeargraduated`, `rii_degree`, `rii_awards`, `rii_company`, `rii_position`, `rii_advoc`, `rii_activeflag`) VALUES
(1, 'Jean Ann Ramos', '2019-04-01', 'Female', '09162395162', 'jeanchangowo@gmail.com', 'Minuyan', 'San Jose del Monte', 'Bulacan', 'Central Luzon', 'Rey Anthony Ramos', '09465738493', 'Tertiary', 'N/A', 'BSIT', 'N/A', 'N/A', 'N/A', 'Education', 1),
(2, 'Villy Ormido', '2019-03-28', 'Male', '09374829312', 'villy@gmail.com', 'Commonwealth', 'Quezon City', 'Metro Manila', 'NCR', 'Jhe Estoque', '0937483921', 'Tertiary', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Education', 1),
(3, 'Leandro Avena IV', '2019-03-31', 'Male', '09483927584', 'ianavena@yahoo.com', 'Commonwealth', 'Quezon City', 'Metro Manila', 'NCR', 'Ian Avena', '09123456789', 'Tertiary', '2018', 'BSIT', 'N/A', 'QCPU', 'Instructor', 'Education', 1),
(4, 'Jomella Caneda', '2019-03-29', 'Female', '09887654321', 'jomella@gmail.com', 'Unknown', 'Unknown', 'Unknown', 'Central Visayas', 'Rosalinda Caneda', 'N/A', 'Tertiay', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Empowerment', 1),
(5, 'Janelle Caneda', '2001-04-15', 'Female', '0937483923', 'janellecaneda@yahoo.com', 'Unknown', 'San Jose del Monte', 'Bulacan', 'Central Luzon', 'Rosalinda Caneda', '09375849302', 'Secondary', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Global Mobility', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_logistics`
--

CREATE TABLE `ems_r_logistics` (
  `rl_id` int(11) NOT NULL,
  `rl_item_name` varchar(50) NOT NULL,
  `rl_quantity` bigint(20) NOT NULL,
  `rl_date_received` date NOT NULL,
  `rl_status` tinyint(1) NOT NULL DEFAULT '1',
  `rl_event_id` int(11) NOT NULL,
  `rl_sponsor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_logistics`
--

INSERT INTO `ems_r_logistics` (`rl_id`, `rl_item_name`, `rl_quantity`, `rl_date_received`, `rl_status`, `rl_event_id`, `rl_sponsor_id`) VALUES
(1, 'Cookies', 100, '2019-04-14', 1, 1, 2),
(2, 'Keychains', 100, '2019-04-08', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_membership_type`
--

CREATE TABLE `ems_r_membership_type` (
  `mtype_id` int(11) NOT NULL,
  `mtype_name` varchar(50) NOT NULL,
  `mtype_fee` decimal(10,2) NOT NULL,
  `mtype_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_membership_type`
--

INSERT INTO `ems_r_membership_type` (`mtype_id`, `mtype_name`, `mtype_fee`, `mtype_activeflag`) VALUES
(1, 'Individuals', '300.00', 1),
(2, 'Organization', '500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_org_info`
--

CREATE TABLE `ems_r_org_info` (
  `roi_orgid` int(11) NOT NULL,
  `roi_orgname` varchar(50) NOT NULL,
  `roi_date_established` date NOT NULL,
  `roi_barangay` varchar(100) NOT NULL,
  `roi_city` varchar(50) NOT NULL,
  `roi_province` varchar(50) NOT NULL,
  `roi_region` varchar(50) NOT NULL,
  `roi_numofmem` int(11) NOT NULL,
  `roi_orgconno` varchar(11) NOT NULL,
  `roi_orgemail` varchar(50) NOT NULL,
  `roi_repname` varchar(50) NOT NULL,
  `roi_repconno` varchar(11) NOT NULL,
  `roi_classification` varchar(50) NOT NULL,
  `roi_subclassification` varchar(50) NOT NULL,
  `roi_advoc` varchar(50) NOT NULL,
  `roi_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_org_info`
--

INSERT INTO `ems_r_org_info` (`roi_orgid`, `roi_orgname`, `roi_date_established`, `roi_barangay`, `roi_city`, `roi_province`, `roi_region`, `roi_numofmem`, `roi_orgconno`, `roi_orgemail`, `roi_repname`, `roi_repconno`, `roi_classification`, `roi_subclassification`, `roi_advoc`, `roi_activeflag`) VALUES
(1, 'Commits', '2004-06-15', 'Commonwealth', 'Quezon City', 'Metro Manila', 'NCR', 299, '09473867485', 'commits@gmail.com', 'Malened Dizon', '09574829452', 'Youth Organization', 'School Based', 'Education', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_region`
--

CREATE TABLE `ems_r_region` (
  `rr_id` int(11) NOT NULL,
  `rr_name` varchar(50) NOT NULL,
  `rr_disid` int(11) NOT NULL,
  `rr_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_region`
--

INSERT INTO `ems_r_region` (`rr_id`, `rr_name`, `rr_disid`, `rr_activeflag`) VALUES
(1, 'Ilocos Region', 1, 1),
(2, 'Cagayan Valley', 1, 1),
(3, 'CAR', 1, 1),
(4, 'Central Luzon', 2, 1),
(5, 'NCR', 2, 1),
(6, 'CALABARZON', 3, 1),
(7, 'MIMAROPA', 3, 1),
(8, 'Bicol Region', 3, 1),
(9, 'Eastern Visayas', 4, 1),
(10, 'Western Visayas', 4, 1),
(11, 'Central Visayas', 4, 1),
(12, 'Zamboanga Peninsula', 5, 1),
(13, 'Northern Mindanao', 5, 1),
(14, 'CARAGA', 5, 1),
(15, 'Davao Region', 6, 1),
(16, 'SOCCSKSARGEN', 6, 1),
(17, 'ARMM', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_sdg`
--

CREATE TABLE `ems_r_sdg` (
  `rsd_sdg_id` int(11) NOT NULL,
  `rsd_sdg_name` varchar(50) NOT NULL,
  `rsd_sdg_description` varchar(200) NOT NULL,
  `rsd_sdg_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_sdg`
--

INSERT INTO `ems_r_sdg` (`rsd_sdg_id`, `rsd_sdg_name`, `rsd_sdg_description`, `rsd_sdg_status`) VALUES
(1, 'No Poverty', 'End poverty in all its forms everywhere.', 1),
(2, 'Zero Hunger', 'End hunger, achieve food security, and promote sustainable agriculture.', 1),
(3, 'Good Health and Well Being', 'Ensure healthy lives and promote well-being for all at all ages.', 1),
(4, 'Quality Education', 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all.', 1),
(5, 'Gender Equality', 'Achieve gender equality and empower all women and girls.', 1),
(6, 'Clean Water and Sanitation', 'Ensure availability and sustainable management of water and sanitation of all.', 1),
(7, 'Affordable and Clean', 'Ensure access to affordable, reliable, sustainable and modern energy for all.', 1),
(8, 'Decent Work and Economic Growth', 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work.', 1),
(9, 'Industry, Innovation, and Infrastracture', 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation.', 1),
(10, 'Reduced Inequalities', 'Reduce inequality within and among countries.', 1),
(11, 'Sustainable Cities and Communities', 'Make cities and human settlements inclusive, safe, resilient, and sustainable.', 1),
(12, 'Responsible Consumption and Production', 'Ensure sustainable consumption and production patterns.', 1),
(13, 'Climate Action', 'Take urgent action to combat climate change and its impacts.', 1),
(14, 'Life Below Water', 'Conserve and sustain-ably use the oceans, seas,  and marine resources for sustainable development.', 1),
(15, 'Life on Land', 'Protect and promote terrestrial ecosystems, forests, land, and biodiversity. ', 1),
(16, 'Peace, Justice, and Strong Institutions', 'Promote peaceful societies, accountable institutions, and access to justice for all.', 1),
(17, 'Partnerships For The Goals', 'Strengthen global partnerships for sustainable development.', 1),
(18, 'sample', 'sample SDG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_sponsor`
--

CREATE TABLE `ems_r_sponsor` (
  `rs_sponsor_id` int(11) NOT NULL,
  `rs_sponsor_name` varchar(100) NOT NULL,
  `rs_sponsor_contact_no` varchar(11) NOT NULL,
  `rs_sponsor_address` varchar(100) NOT NULL,
  `rs_status` tinyint(1) NOT NULL DEFAULT '1',
  `rs_stype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_sponsor`
--

INSERT INTO `ems_r_sponsor` (`rs_sponsor_id`, `rs_sponsor_name`, `rs_sponsor_contact_no`, `rs_sponsor_address`, `rs_status`, `rs_stype_id`) VALUES
(1, 'Czaira Faner', '09483927584', 'Palmera, San Jose del Monte, Bulacan', 1, 1),
(2, 'FBTO', '09475938495', 'PUP QC', 1, 2),
(3, 'Ian Avena', '09887654321', 'Montalban', 1, 1),
(4, 'Eunice Jael Pascual', '09478593847', 'Manila', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_sponsorship`
--

CREATE TABLE `ems_r_sponsorship` (
  `rss_sponsorship_id` int(11) NOT NULL,
  `rss_sponsor_id` int(11) NOT NULL,
  `rss_event_id` int(11) NOT NULL,
  `rss_amount` decimal(10,2) NOT NULL,
  `rss_received_date` date NOT NULL,
  `rss_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_sponsorship`
--

INSERT INTO `ems_r_sponsorship` (`rss_sponsorship_id`, `rss_sponsor_id`, `rss_event_id`, `rss_amount`, `rss_received_date`, `rss_activeflag`) VALUES
(1, 2, 1, '10000.00', '2019-03-03', 1),
(2, 3, 1, '2000.00', '2019-04-13', 1),
(3, 1, 1, '5000.00', '2019-04-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_sponsor_type`
--

CREATE TABLE `ems_r_sponsor_type` (
  `rst_stype_id` int(11) NOT NULL,
  `rst_stype_name` varchar(50) NOT NULL,
  `rst_stype_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_sponsor_type`
--

INSERT INTO `ems_r_sponsor_type` (`rst_stype_id`, `rst_stype_name`, `rst_stype_status`) VALUES
(1, 'Individual', 1),
(2, 'Organization', 1),
(3, 'Company', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_users`
--

CREATE TABLE `ems_r_users` (
  `ru_id` int(11) NOT NULL,
  `ru_username` varchar(20) NOT NULL,
  `ru_password` varchar(50) NOT NULL,
  `ru_user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_users`
--

INSERT INTO `ems_r_users` (`ru_id`, `ru_username`, `ru_password`, `ru_user_type`) VALUES
(1, 'admin', 'admin', 1),
(2, 'president', 'president', 2),
(3, 'vicepresident', 'vicepresident', 3),
(4, 'treasurer', 'treasurer', 4),
(5, 'secgen', 'secgen', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_user_role`
--

CREATE TABLE `ems_r_user_role` (
  `rur_roleid` int(11) NOT NULL,
  `rur_rolename` varchar(50) NOT NULL,
  `rur_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_r_venue`
--

CREATE TABLE `ems_r_venue` (
  `rv_ven_id` int(11) NOT NULL,
  `rv_ven_name` varchar(50) NOT NULL,
  `rv_ven_barangay` varchar(50) NOT NULL,
  `rv_ven_city` varchar(50) NOT NULL,
  `rv_ven_province` varchar(50) NOT NULL,
  `rv_ven_region` varchar(50) NOT NULL,
  `rv_ven_disid` int(11) NOT NULL,
  `rv_ven_capacity` int(11) DEFAULT NULL,
  `rv_ven_conper` varchar(50) NOT NULL,
  `rv_ven_contactno` varchar(11) NOT NULL,
  `rv_ven_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_r_venue`
--

INSERT INTO `ems_r_venue` (`rv_ven_id`, `rv_ven_name`, `rv_ven_barangay`, `rv_ven_city`, `rv_ven_province`, `rv_ven_region`, `rv_ven_disid`, `rv_ven_capacity`, `rv_ven_conper`, `rv_ven_contactno`, `rv_ven_status`) VALUES
(1, 'PUP QC', 'Commonwealth', 'Quezon City', 'Metro Manila', 'NCR', 0, 1000, 'Esperato Ilaida Jr.', '09483758439', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_attendance`
--

CREATE TABLE `ems_t_attendance` (
  `ta_attendance_id` int(11) NOT NULL,
  `ta_date_attended` date NOT NULL,
  `ta_name` varchar(50) NOT NULL,
  `ta_time` time NOT NULL,
  `ta_sdg_id` int(11) NOT NULL,
  `ta_event_id` int(11) NOT NULL,
  `ta_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_attendance`
--

INSERT INTO `ems_t_attendance` (`ta_attendance_id`, `ta_date_attended`, `ta_name`, `ta_time`, `ta_sdg_id`, `ta_event_id`, `ta_activeflag`) VALUES
(1, '2019-03-31', 'Jean Ann Ramos', '00:00:20', 5, 1, 1),
(2, '2019-04-11', 'Gerard Maglaque', '00:00:20', 2, 1, 1),
(3, '2019-04-11', 'Sample', '00:00:20', 14, 1, 1),
(4, '2019-05-09', 'Samuel John Pascual', '14:00:00', 1, 1, 1),
(5, '2019-05-10', 'Kyle Galacgac', '01:00:00', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_eventreg_mem`
--

CREATE TABLE `ems_t_eventreg_mem` (
  `term_regid` int(11) NOT NULL,
  `term_eventid` int(11) NOT NULL,
  `term_indivmemid` int(11) NOT NULL,
  `term_date` date NOT NULL,
  `term_transcode` varchar(10) NOT NULL,
  `term_paymenttype` varchar(10) NOT NULL,
  `term_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `term_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_eventreg_mem`
--

INSERT INTO `ems_t_eventreg_mem` (`term_regid`, `term_eventid`, `term_indivmemid`, `term_date`, `term_transcode`, `term_paymenttype`, `term_status`, `term_activeflag`) VALUES
(5, 1, 1, '2019-05-09', 'VIsKZPM0iT', 'Bank', 'Pending', 1),
(6, 1, 3, '2019-05-09', 'zqG7SDUv59', 'Onsite', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_eventreg_nonmem`
--

CREATE TABLE `ems_t_eventreg_nonmem` (
  `nmr_id` int(11) NOT NULL,
  `nmr_transcode` varchar(10) NOT NULL,
  `nmr_datereg` date NOT NULL,
  `nmr_name` varchar(50) NOT NULL,
  `nmr_barangay` varchar(50) NOT NULL,
  `nmr_city` varchar(50) NOT NULL,
  `nmr_province` varchar(50) NOT NULL,
  `nmr_region` varchar(50) NOT NULL,
  `nmr_age` int(11) NOT NULL,
  `nmr_birthdate` date NOT NULL,
  `nmr_gender` varchar(20) NOT NULL,
  `nmr_phone` varchar(100) NOT NULL,
  `nmr_email` varchar(100) NOT NULL,
  `nmr_advoc` varchar(100) NOT NULL,
  `nmr_org` varchar(100) NOT NULL,
  `nmr_represent` varchar(100) NOT NULL,
  `nmr_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `nmr_event_id` int(11) DEFAULT NULL,
  `nmr_paymenttype` varchar(10) NOT NULL,
  `nmr_disid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_eventreg_nonmem`
--

INSERT INTO `ems_t_eventreg_nonmem` (`nmr_id`, `nmr_transcode`, `nmr_datereg`, `nmr_name`, `nmr_barangay`, `nmr_city`, `nmr_province`, `nmr_region`, `nmr_age`, `nmr_birthdate`, `nmr_gender`, `nmr_phone`, `nmr_email`, `nmr_advoc`, `nmr_org`, `nmr_represent`, `nmr_status`, `nmr_event_id`, `nmr_paymenttype`, `nmr_disid`) VALUES
(1, 'qf6XOUHJj9', '2019-03-30', 'Jean Ann Ramos', '', 'San Jose del Monte', 'Bulacan', 'Central Luzon', 20, '2019-03-30', 'Female', '09162395162', 'jeanchangowo@gmail.com', 'Education', 'Polytechnic University of The Philippines - Quezon City Branch', 'School-based Organization', 'Paid', 1, 'Bank', 0),
(2, 'esFaRuC1XG', '2019-03-30', 'Jean Ann Ramos', '', 'San Jose del Monte', 'Bulacan', 'NCR', 20, '2019-03-31', 'Female', '09162395162', 'jeanchangowo@gmail.com', 'Governance', 'Polytechnic University of The Philippines - Quezon City Branch', 'School-based Organization', 'Paid', 1, 'Bank', 0),
(8, '04yL7Tmw6I', '2019-05-09', 'Jomella Caneda', 'Commonwealth', 'Quezon City', 'Metro Manila', 'NCR', 20, '2019-05-09', 'Female', '09374836273', 'jomellarcaneda@gmail.com', 'Education', 'Technological University of the Philippines', 'School-based Organization', 'Pending', 1, 'Bank', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_expenditures`
--

CREATE TABLE `ems_t_expenditures` (
  `te_expenditure_id` int(11) NOT NULL,
  `te_expense` varchar(50) NOT NULL,
  `te_amount` decimal(10,2) NOT NULL,
  `te_purpose` varchar(100) NOT NULL,
  `te_date` date NOT NULL,
  `te_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_expenditures`
--

INSERT INTO `ems_t_expenditures` (`te_expenditure_id`, `te_expense`, `te_amount`, `te_purpose`, `te_date`, `te_status`) VALUES
(1, 'Gift', '1000.00', 'Purpose', '2019-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_individual_membership`
--

CREATE TABLE `ems_t_individual_membership` (
  `tim_indivmemid` int(11) NOT NULL,
  `tim_transcode` varchar(10) NOT NULL,
  `tim_amount` decimal(10,2) NOT NULL DEFAULT '300.00',
  `tim_date` date NOT NULL,
  `tim_individ` int(11) NOT NULL,
  `tim_disid` int(11) NOT NULL,
  `tim_status` varchar(20) DEFAULT 'Pending',
  `tim_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_individual_membership`
--

INSERT INTO `ems_t_individual_membership` (`tim_indivmemid`, `tim_transcode`, `tim_amount`, `tim_date`, `tim_individ`, `tim_disid`, `tim_status`, `tim_activeflag`) VALUES
(1, 'BL2grtTmxl', '150.00', '2019-03-30', 1, 2, 'Paid', 0),
(2, 'Hagj0R3YFf', '150.00', '2019-03-30', 2, 2, 'Paid', 1),
(3, 'Bqgl8h0Kxn', '150.00', '2019-03-29', 3, 2, 'Paid', 1),
(4, 'UBx83sDEih', '150.00', '2019-04-17', 4, 4, 'Pending', 1),
(5, 'l6jrhnZHRs', '150.00', '2019-04-18', 5, 2, 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_org_membership`
--

CREATE TABLE `ems_t_org_membership` (
  `tom_orgmemid` int(11) NOT NULL,
  `tom_transcode` varchar(10) NOT NULL,
  `tom_amount` decimal(10,2) NOT NULL,
  `tom_date` date NOT NULL,
  `tom_orgid` int(11) NOT NULL,
  `tom_disid` int(11) NOT NULL,
  `tom_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `tom_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_org_membership`
--

INSERT INTO `ems_t_org_membership` (`tom_orgmemid`, `tom_transcode`, `tom_amount`, `tom_date`, `tom_orgid`, `tom_disid`, `tom_status`, `tom_activeflag`) VALUES
(1, 'JgKX4rQy0b', '500.00', '2019-03-30', 1, 2, 'Paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_eventregmem_bank`
--

CREATE TABLE `ems_t_payment_eventregmem_bank` (
  `tpeb_paymentid` int(11) NOT NULL,
  `tpeb_regid` int(11) NOT NULL,
  `tpeb_date` date NOT NULL,
  `tpeb_bank` varchar(50) NOT NULL,
  `tpeb_branch` varchar(50) NOT NULL,
  `tpeb_controlno` varchar(20) NOT NULL,
  `tpeb_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_eventregmem_onsite`
--

CREATE TABLE `ems_t_payment_eventregmem_onsite` (
  `tpeo_paymentid` int(11) NOT NULL,
  `tpeo_regid` int(11) NOT NULL,
  `tpeo_date` date NOT NULL,
  `tpeo_receivedby` varchar(50) NOT NULL,
  `tpeo_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_eventregnonmem_bank`
--

CREATE TABLE `ems_t_payment_eventregnonmem_bank` (
  `tpnb_paymentid` int(11) NOT NULL,
  `tpnb_regid` int(11) NOT NULL,
  `tpnb_date` date NOT NULL,
  `tpnb_bank` varchar(50) NOT NULL,
  `tpnb_branch` varchar(50) NOT NULL,
  `tpnb_controlno` varchar(50) NOT NULL,
  `tpnb_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_payment_eventregnonmem_bank`
--

INSERT INTO `ems_t_payment_eventregnonmem_bank` (`tpnb_paymentid`, `tpnb_regid`, `tpnb_date`, `tpnb_bank`, `tpnb_branch`, `tpnb_controlno`, `tpnb_activeflag`) VALUES
(1, 1, '2019-03-30', 'BDO', 'Fairview', '56736', 1),
(2, 2, '0000-00-00', 'BDO', 'Fairview', '908765432', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_eventregnonmem_onsite`
--

CREATE TABLE `ems_t_payment_eventregnonmem_onsite` (
  `tpno_paymentid` int(11) NOT NULL,
  `tpno_regid` int(11) NOT NULL,
  `tpno_date` date NOT NULL,
  `tpno_receivedby` varchar(50) NOT NULL,
  `tpno_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_indivmem`
--

CREATE TABLE `ems_t_payment_indivmem` (
  `tpi_paymentid` int(11) NOT NULL,
  `tpi_indivmemid` int(11) NOT NULL,
  `tpb_date` date NOT NULL,
  `tpb_bank` varchar(50) NOT NULL,
  `tpb_branch` varchar(50) NOT NULL,
  `tpb_controlno` varchar(50) NOT NULL,
  `tpb_activeflag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_payment_indivmem`
--

INSERT INTO `ems_t_payment_indivmem` (`tpi_paymentid`, `tpi_indivmemid`, `tpb_date`, `tpb_bank`, `tpb_branch`, `tpb_controlno`, `tpb_activeflag`) VALUES
(1, 1, '2019-03-30', 'East West Bank', 'Tungkong Mangga', '9484029485', 1),
(2, 2, '2019-03-30', 'East West Bank', 'Fairview', '457203496', 1),
(3, 3, '2019-03-31', 'Landbank', 'Fairview', '0349572745', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_orgmem`
--

CREATE TABLE `ems_t_payment_orgmem` (
  `tpo_payorgid` int(11) NOT NULL,
  `tpo_orgmemid` int(11) NOT NULL,
  `tpo_datereceived` date NOT NULL,
  `tpo_bank` varchar(50) NOT NULL,
  `tpo_branch` varchar(20) NOT NULL,
  `tpo_controlno` varchar(20) NOT NULL,
  `tpo_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_payment_orgmem`
--

INSERT INTO `ems_t_payment_orgmem` (`tpo_payorgid`, `tpo_orgmemid`, `tpo_datereceived`, `tpo_bank`, `tpo_branch`, `tpo_controlno`, `tpo_activeflag`) VALUES
(1, 1, '2019-03-30', 'BDO', 'Don Antonio', '34058', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_renewal_indiv`
--

CREATE TABLE `ems_t_payment_renewal_indiv` (
  `tpri_paymentid` int(11) NOT NULL,
  `tpri_indivrenid` int(11) NOT NULL,
  `tpri_date` date NOT NULL,
  `tpri_bank` varchar(50) NOT NULL,
  `tpri_branch` varchar(50) NOT NULL,
  `tpri_controlno` varchar(20) NOT NULL,
  `tpri_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_payment_renewal_indiv`
--

INSERT INTO `ems_t_payment_renewal_indiv` (`tpri_paymentid`, `tpri_indivrenid`, `tpri_date`, `tpri_bank`, `tpri_branch`, `tpri_controlno`, `tpri_activeflag`) VALUES
(1, 1, '2019-03-30', 'BDO', 'SM Fairview', '348524395', 1),
(2, 2, '2019-03-30', 'BDO', 'Fairview', '4935023475', 1),
(3, 3, '2019-03-31', 'BDO', 'Fairview', '4935023475', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_payment_renewal_org`
--

CREATE TABLE `ems_t_payment_renewal_org` (
  `tpro_paymentid` int(11) NOT NULL,
  `tpro_orgrenid` int(11) NOT NULL,
  `tpro_date` date NOT NULL,
  `tpro_bank` varchar(50) NOT NULL,
  `tpro_branch` varchar(50) NOT NULL,
  `tpro_controlno` varchar(20) NOT NULL,
  `tpro_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_renewal_indiv`
--

CREATE TABLE `ems_t_renewal_indiv` (
  `tri_indivrenid` int(11) NOT NULL,
  `tri_indivmemid` int(11) NOT NULL,
  `tri_transcode` varchar(10) NOT NULL,
  `tri_amount` decimal(10,2) NOT NULL,
  `tri_date` date NOT NULL,
  `tri_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `tri_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_t_renewal_indiv`
--

INSERT INTO `ems_t_renewal_indiv` (`tri_indivrenid`, `tri_indivmemid`, `tri_transcode`, `tri_amount`, `tri_date`, `tri_status`, `tri_activeflag`) VALUES
(1, 1, 'B2EiD1V7wa', '100.00', '2019-03-30', 'Paid', 1),
(2, 2, 'JoZ0GqUDp4', '100.00', '2019-03-30', 'Paid', 1),
(3, 1, 'y1vOIXJ6qb', '100.00', '2019-03-31', 'Paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_t_renewal_org`
--

CREATE TABLE `ems_t_renewal_org` (
  `tro_orgrenid` int(11) NOT NULL,
  `tro_orgmemid` int(11) NOT NULL,
  `tro_transcode` varchar(10) NOT NULL,
  `tro_amount` decimal(10,2) NOT NULL,
  `tro_date` date NOT NULL,
  `tro_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `tro_activeflag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_r_activity`
--
ALTER TABLE `ems_r_activity`
  ADD PRIMARY KEY (`ra_activity_id`),
  ADD KEY `FK_ACTIVITY_EVENT` (`ra_event_id`);

--
-- Indexes for table `ems_r_advocacy`
--
ALTER TABLE `ems_r_advocacy`
  ADD PRIMARY KEY (`advoc_id`);

--
-- Indexes for table `ems_r_district`
--
ALTER TABLE `ems_r_district`
  ADD PRIMARY KEY (`rd_dis_id`);

--
-- Indexes for table `ems_r_event`
--
ALTER TABLE `ems_r_event`
  ADD PRIMARY KEY (`re_event_id`),
  ADD KEY `FK_EVENT_ETYPE` (`re_etype_id`);

--
-- Indexes for table `ems_r_event_type`
--
ALTER TABLE `ems_r_event_type`
  ADD PRIMARY KEY (`ret_etype_id`);

--
-- Indexes for table `ems_r_individual_info`
--
ALTER TABLE `ems_r_individual_info`
  ADD PRIMARY KEY (`rii_individ`);

--
-- Indexes for table `ems_r_logistics`
--
ALTER TABLE `ems_r_logistics`
  ADD PRIMARY KEY (`rl_id`),
  ADD KEY `FK_LOGISTICS_EVENT` (`rl_event_id`),
  ADD KEY `FK_LOGISTICS_SPONSOR` (`rl_sponsor_id`);

--
-- Indexes for table `ems_r_membership_type`
--
ALTER TABLE `ems_r_membership_type`
  ADD PRIMARY KEY (`mtype_id`);

--
-- Indexes for table `ems_r_org_info`
--
ALTER TABLE `ems_r_org_info`
  ADD PRIMARY KEY (`roi_orgid`);

--
-- Indexes for table `ems_r_region`
--
ALTER TABLE `ems_r_region`
  ADD PRIMARY KEY (`rr_id`),
  ADD KEY `FK_REGION_DISTRICT` (`rr_disid`);

--
-- Indexes for table `ems_r_sdg`
--
ALTER TABLE `ems_r_sdg`
  ADD PRIMARY KEY (`rsd_sdg_id`);

--
-- Indexes for table `ems_r_sponsor`
--
ALTER TABLE `ems_r_sponsor`
  ADD PRIMARY KEY (`rs_sponsor_id`),
  ADD KEY `FK_SPONSOR_STYPE` (`rs_stype_id`);

--
-- Indexes for table `ems_r_sponsorship`
--
ALTER TABLE `ems_r_sponsorship`
  ADD PRIMARY KEY (`rss_sponsorship_id`),
  ADD KEY `FK_SPONSORSHIP_SPONSOR` (`rss_sponsor_id`);

--
-- Indexes for table `ems_r_sponsor_type`
--
ALTER TABLE `ems_r_sponsor_type`
  ADD PRIMARY KEY (`rst_stype_id`);

--
-- Indexes for table `ems_r_users`
--
ALTER TABLE `ems_r_users`
  ADD PRIMARY KEY (`ru_id`);

--
-- Indexes for table `ems_r_user_role`
--
ALTER TABLE `ems_r_user_role`
  ADD PRIMARY KEY (`rur_roleid`);

--
-- Indexes for table `ems_r_venue`
--
ALTER TABLE `ems_r_venue`
  ADD PRIMARY KEY (`rv_ven_id`);

--
-- Indexes for table `ems_t_attendance`
--
ALTER TABLE `ems_t_attendance`
  ADD PRIMARY KEY (`ta_attendance_id`),
  ADD KEY `FK_ATTENDANCE_EVENT` (`ta_event_id`),
  ADD KEY `FK_ATTENDANCE_SDG` (`ta_sdg_id`);

--
-- Indexes for table `ems_t_eventreg_mem`
--
ALTER TABLE `ems_t_eventreg_mem`
  ADD PRIMARY KEY (`term_regid`),
  ADD KEY `FK_EREG_EVENT` (`term_eventid`),
  ADD KEY `FK_EREG_MEM` (`term_indivmemid`);

--
-- Indexes for table `ems_t_eventreg_nonmem`
--
ALTER TABLE `ems_t_eventreg_nonmem`
  ADD PRIMARY KEY (`nmr_id`),
  ADD KEY `nmr_event_id_fk` (`nmr_event_id`);

--
-- Indexes for table `ems_t_expenditures`
--
ALTER TABLE `ems_t_expenditures`
  ADD PRIMARY KEY (`te_expenditure_id`);

--
-- Indexes for table `ems_t_individual_membership`
--
ALTER TABLE `ems_t_individual_membership`
  ADD PRIMARY KEY (`tim_indivmemid`),
  ADD KEY `FK_MEM_INDIV_INFO` (`tim_individ`);

--
-- Indexes for table `ems_t_org_membership`
--
ALTER TABLE `ems_t_org_membership`
  ADD PRIMARY KEY (`tom_orgmemid`);

--
-- Indexes for table `ems_t_payment_eventregmem_bank`
--
ALTER TABLE `ems_t_payment_eventregmem_bank`
  ADD PRIMARY KEY (`tpeb_paymentid`),
  ADD KEY `FK_ERPMB_ERM` (`tpeb_regid`);

--
-- Indexes for table `ems_t_payment_eventregmem_onsite`
--
ALTER TABLE `ems_t_payment_eventregmem_onsite`
  ADD PRIMARY KEY (`tpeo_paymentid`),
  ADD KEY `FK_ERPM_ERM` (`tpeo_regid`);

--
-- Indexes for table `ems_t_payment_eventregnonmem_bank`
--
ALTER TABLE `ems_t_payment_eventregnonmem_bank`
  ADD PRIMARY KEY (`tpnb_paymentid`);

--
-- Indexes for table `ems_t_payment_eventregnonmem_onsite`
--
ALTER TABLE `ems_t_payment_eventregnonmem_onsite`
  ADD PRIMARY KEY (`tpno_paymentid`);

--
-- Indexes for table `ems_t_payment_indivmem`
--
ALTER TABLE `ems_t_payment_indivmem`
  ADD PRIMARY KEY (`tpi_paymentid`),
  ADD KEY `FK_PAYMENT_MEM_INDIV` (`tpi_indivmemid`);

--
-- Indexes for table `ems_t_payment_orgmem`
--
ALTER TABLE `ems_t_payment_orgmem`
  ADD PRIMARY KEY (`tpo_payorgid`);

--
-- Indexes for table `ems_t_payment_renewal_indiv`
--
ALTER TABLE `ems_t_payment_renewal_indiv`
  ADD PRIMARY KEY (`tpri_paymentid`),
  ADD KEY `FK_PAYMENT_REN_INDIV` (`tpri_indivrenid`);

--
-- Indexes for table `ems_t_payment_renewal_org`
--
ALTER TABLE `ems_t_payment_renewal_org`
  ADD PRIMARY KEY (`tpro_paymentid`),
  ADD KEY `FK_PAYMENT_REN_ORG` (`tpro_orgrenid`);

--
-- Indexes for table `ems_t_renewal_indiv`
--
ALTER TABLE `ems_t_renewal_indiv`
  ADD PRIMARY KEY (`tri_indivrenid`),
  ADD KEY `FK_REN_INDIV` (`tri_indivmemid`);

--
-- Indexes for table `ems_t_renewal_org`
--
ALTER TABLE `ems_t_renewal_org`
  ADD PRIMARY KEY (`tro_orgrenid`),
  ADD KEY `FK_REN_ORG` (`tro_orgmemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ems_r_activity`
--
ALTER TABLE `ems_r_activity`
  MODIFY `ra_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ems_r_advocacy`
--
ALTER TABLE `ems_r_advocacy`
  MODIFY `advoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_r_district`
--
ALTER TABLE `ems_r_district`
  MODIFY `rd_dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ems_r_event`
--
ALTER TABLE `ems_r_event`
  MODIFY `re_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ems_r_event_type`
--
ALTER TABLE `ems_r_event_type`
  MODIFY `ret_etype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ems_r_individual_info`
--
ALTER TABLE `ems_r_individual_info`
  MODIFY `rii_individ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ems_r_logistics`
--
ALTER TABLE `ems_r_logistics`
  MODIFY `rl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ems_r_membership_type`
--
ALTER TABLE `ems_r_membership_type`
  MODIFY `mtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ems_r_org_info`
--
ALTER TABLE `ems_r_org_info`
  MODIFY `roi_orgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_r_region`
--
ALTER TABLE `ems_r_region`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ems_r_sdg`
--
ALTER TABLE `ems_r_sdg`
  MODIFY `rsd_sdg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ems_r_sponsor`
--
ALTER TABLE `ems_r_sponsor`
  MODIFY `rs_sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ems_r_sponsorship`
--
ALTER TABLE `ems_r_sponsorship`
  MODIFY `rss_sponsorship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ems_r_sponsor_type`
--
ALTER TABLE `ems_r_sponsor_type`
  MODIFY `rst_stype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ems_r_users`
--
ALTER TABLE `ems_r_users`
  MODIFY `ru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ems_r_user_role`
--
ALTER TABLE `ems_r_user_role`
  MODIFY `rur_roleid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ems_r_venue`
--
ALTER TABLE `ems_r_venue`
  MODIFY `rv_ven_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_t_attendance`
--
ALTER TABLE `ems_t_attendance`
  MODIFY `ta_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ems_t_eventreg_mem`
--
ALTER TABLE `ems_t_eventreg_mem`
  MODIFY `term_regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ems_t_eventreg_nonmem`
--
ALTER TABLE `ems_t_eventreg_nonmem`
  MODIFY `nmr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ems_t_expenditures`
--
ALTER TABLE `ems_t_expenditures`
  MODIFY `te_expenditure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_t_individual_membership`
--
ALTER TABLE `ems_t_individual_membership`
  MODIFY `tim_indivmemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ems_t_org_membership`
--
ALTER TABLE `ems_t_org_membership`
  MODIFY `tom_orgmemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_t_payment_eventregmem_bank`
--
ALTER TABLE `ems_t_payment_eventregmem_bank`
  MODIFY `tpeb_paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ems_t_payment_eventregmem_onsite`
--
ALTER TABLE `ems_t_payment_eventregmem_onsite`
  MODIFY `tpeo_paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ems_t_payment_eventregnonmem_bank`
--
ALTER TABLE `ems_t_payment_eventregnonmem_bank`
  MODIFY `tpnb_paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ems_t_payment_eventregnonmem_onsite`
--
ALTER TABLE `ems_t_payment_eventregnonmem_onsite`
  MODIFY `tpno_paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ems_t_payment_indivmem`
--
ALTER TABLE `ems_t_payment_indivmem`
  MODIFY `tpi_paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ems_t_payment_orgmem`
--
ALTER TABLE `ems_t_payment_orgmem`
  MODIFY `tpo_payorgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ems_t_payment_renewal_indiv`
--
ALTER TABLE `ems_t_payment_renewal_indiv`
  MODIFY `tpri_paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ems_t_payment_renewal_org`
--
ALTER TABLE `ems_t_payment_renewal_org`
  MODIFY `tpro_paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ems_t_renewal_indiv`
--
ALTER TABLE `ems_t_renewal_indiv`
  MODIFY `tri_indivrenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ems_t_renewal_org`
--
ALTER TABLE `ems_t_renewal_org`
  MODIFY `tro_orgrenid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ems_r_activity`
--
ALTER TABLE `ems_r_activity`
  ADD CONSTRAINT `FK_ACTIVITY_EVENT` FOREIGN KEY (`ra_event_id`) REFERENCES `ems_r_event` (`re_event_id`);

--
-- Constraints for table `ems_r_event`
--
ALTER TABLE `ems_r_event`
  ADD CONSTRAINT `FK_EVENT_ETYPE` FOREIGN KEY (`re_etype_id`) REFERENCES `ems_r_event_type` (`ret_etype_id`);

--
-- Constraints for table `ems_r_logistics`
--
ALTER TABLE `ems_r_logistics`
  ADD CONSTRAINT `FK_LOGISTICS_EVENT` FOREIGN KEY (`rl_event_id`) REFERENCES `ems_r_event` (`re_event_id`),
  ADD CONSTRAINT `FK_LOGISTICS_SPONSOR` FOREIGN KEY (`rl_sponsor_id`) REFERENCES `ems_r_sponsor` (`rs_sponsor_id`);

--
-- Constraints for table `ems_r_region`
--
ALTER TABLE `ems_r_region`
  ADD CONSTRAINT `FK_REGION_DISTRICT` FOREIGN KEY (`rr_disid`) REFERENCES `ems_r_district` (`rd_dis_id`);

--
-- Constraints for table `ems_r_sponsor`
--
ALTER TABLE `ems_r_sponsor`
  ADD CONSTRAINT `FK_SPONSOR_STYPE` FOREIGN KEY (`rs_stype_id`) REFERENCES `ems_r_sponsor_type` (`rst_stype_id`);

--
-- Constraints for table `ems_r_sponsorship`
--
ALTER TABLE `ems_r_sponsorship`
  ADD CONSTRAINT `FK_SPONSORSHIP_SPONSOR` FOREIGN KEY (`rss_sponsor_id`) REFERENCES `ems_r_sponsor` (`rs_sponsor_id`);

--
-- Constraints for table `ems_t_attendance`
--
ALTER TABLE `ems_t_attendance`
  ADD CONSTRAINT `FK_ATTENDANCE_EVENT` FOREIGN KEY (`ta_event_id`) REFERENCES `ems_r_event` (`re_event_id`),
  ADD CONSTRAINT `FK_ATTENDANCE_SDG` FOREIGN KEY (`ta_sdg_id`) REFERENCES `ems_r_sdg` (`rsd_sdg_id`);

--
-- Constraints for table `ems_t_eventreg_mem`
--
ALTER TABLE `ems_t_eventreg_mem`
  ADD CONSTRAINT `FK_EREG_EVENT` FOREIGN KEY (`term_eventid`) REFERENCES `ems_r_event` (`re_event_id`),
  ADD CONSTRAINT `FK_EREG_MEM` FOREIGN KEY (`term_indivmemid`) REFERENCES `ems_t_individual_membership` (`tim_indivmemid`);

--
-- Constraints for table `ems_t_eventreg_nonmem`
--
ALTER TABLE `ems_t_eventreg_nonmem`
  ADD CONSTRAINT `nmr_event_id_fk` FOREIGN KEY (`nmr_event_id`) REFERENCES `ems_r_event` (`re_event_id`);

--
-- Constraints for table `ems_t_individual_membership`
--
ALTER TABLE `ems_t_individual_membership`
  ADD CONSTRAINT `FK_MEM_INDIV_INFO` FOREIGN KEY (`tim_individ`) REFERENCES `ems_r_individual_info` (`rii_individ`);

--
-- Constraints for table `ems_t_payment_eventregmem_bank`
--
ALTER TABLE `ems_t_payment_eventregmem_bank`
  ADD CONSTRAINT `FK_ERPMB_ERM` FOREIGN KEY (`tpeb_regid`) REFERENCES `ems_t_eventreg_mem` (`term_regid`);

--
-- Constraints for table `ems_t_payment_eventregmem_onsite`
--
ALTER TABLE `ems_t_payment_eventregmem_onsite`
  ADD CONSTRAINT `FK_ERPM_ERM` FOREIGN KEY (`tpeo_regid`) REFERENCES `ems_t_eventreg_mem` (`term_regid`);

--
-- Constraints for table `ems_t_payment_indivmem`
--
ALTER TABLE `ems_t_payment_indivmem`
  ADD CONSTRAINT `FK_PAYMENT_MEM_INDIV` FOREIGN KEY (`tpi_indivmemid`) REFERENCES `ems_t_individual_membership` (`tim_indivmemid`);

--
-- Constraints for table `ems_t_payment_renewal_indiv`
--
ALTER TABLE `ems_t_payment_renewal_indiv`
  ADD CONSTRAINT `FK_PAYMENT_REN_INDIV` FOREIGN KEY (`tpri_indivrenid`) REFERENCES `ems_t_renewal_indiv` (`tri_indivrenid`);

--
-- Constraints for table `ems_t_payment_renewal_org`
--
ALTER TABLE `ems_t_payment_renewal_org`
  ADD CONSTRAINT `FK_PAYMENT_REN_ORG` FOREIGN KEY (`tpro_orgrenid`) REFERENCES `ems_t_renewal_org` (`tro_orgrenid`);

--
-- Constraints for table `ems_t_renewal_indiv`
--
ALTER TABLE `ems_t_renewal_indiv`
  ADD CONSTRAINT `FK_REN_INDIV` FOREIGN KEY (`tri_indivmemid`) REFERENCES `ems_t_individual_membership` (`tim_indivmemid`);

--
-- Constraints for table `ems_t_renewal_org`
--
ALTER TABLE `ems_t_renewal_org`
  ADD CONSTRAINT `FK_REN_ORG` FOREIGN KEY (`tro_orgmemid`) REFERENCES `ems_t_org_membership` (`tom_orgmemid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: db5017708354.hosting-data.io
-- Erstellungszeit: 22. Apr 2025 um 13:18
-- Server-Version: 10.11.7-MariaDB-log
-- PHP-Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dbs14153724`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `data_en` mediumblob NOT NULL,
  `data_de` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `key_word` varchar(20) NOT NULL,
  `TiLevel` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `kW_des` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `experience`
--

INSERT INTO `experience` (`id`, `key_word`, `TiLevel`, `date`, `kW_des`) VALUES
(1, 'WExperienc', 0, NULL, NULL),
(2, 'ifm', 1, '10.2017 - 09.2024', NULL),
(3, 'textIfm0', 2, NULL, 'textIfm0'),
(4, 'textIfm1', 2, NULL, 'textIfm1'),
(5, 'textIfm2', 2, NULL, 'textIfm2'),
(6, 'textIfm3', 2, NULL, 'textIfm3'),
(7, 'textIfm4', 2, NULL, 'textIfm4'),
(8, 'textIfm5', 2, NULL, 'textIfm5'),
(9, 'textIfm6', 2, NULL, 'textIfm6'),
(10, 'trialIfm', 1, '09.2017 – 09.2017', NULL),
(11, 'JobSe', 1, '07.2017 – 08.2017', NULL),
(12, 'multivac', 1, '03.2017 – 06.2017', NULL),
(13, 'EnGermany', 1, '2014 – 02.2017', NULL),
(14, 'education', 0, NULL, NULL),
(15, 'CTech', 1, '2011 – 2014', NULL),
(16, 'HiSchool', 0, NULL, NULL),
(17, 'hS', 1, '2006 – 2011', NULL),
(18, 'langSkills', 0, NULL, NULL),
(19, 'deSkill', 2, NULL, NULL),
(20, 'enSkill', 2, NULL, NULL),
(21, 'arSkill', 2, NULL, NULL),
(22, 'privWork', 0, NULL, NULL),
(23, 'githubLink', 1, 'link', NULL),
(24, 'other', 0, NULL, NULL),
(25, 'license', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `key_word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `skills`
--

INSERT INTO `skills` (`id`, `key_word`) VALUES
(1, 'skills'),
(2, 'skillsText0'),
(3, 'skillsText1'),
(4, 'skillsText2'),
(5, 'skillsText3'),
(6, 'skillsText4'),
(7, 'skillsText5'),
(8, 'skillsText6'),
(9, 'skillsText7'),
(10, 'skillsText8'),
(11, 'skillsText9'),
(12, 'skillsText10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation`
--

CREATE TABLE `translation` (
  `id` int(3) NOT NULL,
  `key_word` varchar(20) NOT NULL,
  `en` varchar(255) NOT NULL,
  `de` varchar(255) NOT NULL,
  `data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `translation`
--

INSERT INTO `translation` (`id`, `key_word`, `en`, `de`, `data_id`) VALUES
(1, 'home', 'Home', 'Startseite', 0),
(2, 'CV', 'My CV', 'Lebenslauf', 0),
(3, 'contact', 'Contact', 'Kontakt', 0),
(4, 'lang', 'Language', 'Sprache', 1),
(5, 'myName', 'Mohamad Nedal', 'Wahhoud', 2),
(6, 'JobTitle', 'IT Specialist for Application Development', 'Fachinformatiker Anwendungsentwicklung', 0),
(7, 'cardText0', 'Who I am & what I do', 'Wer ich bin & was ich mache', 0),
(8, 'cardText2', 'after completing my study as an IT specialist in application development in 2014', 'nach Abschluss meines Studiums als Fachinformatiker für Anwendungsentwicklung im Jahr 2014 ', 0),
(9, 'hello', 'Hello', 'Hallo', 0),
(10, 'cardText1', 'My name is Mohammad Nedal Wahhoud, 33 years old, I am married,', 'Mein Name ist Mohammad Nedal Wahhoud, 33 Jahre alt, ich bin verheiratet,', 0),
(11, 'cardText3', 'I travelled from Syria to Germany,', 'bin ich von Syrien nach Deutschland gereist,', 0),
(12, 'cardText4', 'then I took part in various integration courses,', 'dann habe ich an verschiedenen Integrationskursen teilgenommen, ', 0),
(13, 'cardText5', 'to integrate better into society and improve my German skills.', ', um mich besser in die Gesellschaft einzuleben und meine Deutschkenntnisse zu verbessern. ', 0),
(14, 'cardText6', 'Afterwards I did an internship at Multivac Sepp Haggenmüller Se & Co. Kg,', 'danach habe ich ein Praktikum bei Multivac Sepp Haggenmüller Se & Co. Kg gemacht,', 0),
(15, 'cardText7', 'I then worked for several years as a software development assistant at IFM Prover GmbH.', 'Anschließend war ich 7 Jahre als Software-Entwicklungsassistent bei IFM Prover GmbH tätig. ', 0),
(16, 'la_name', 'Englisch', 'Deutsch', 0),
(17, 'la_code', 'EN', 'DE', 0),
(18, 'aboMe', 'About me', 'Zu meiner Person', 0),
(19, 'DlCv', 'Download CV', 'Lebenslauf herunterladen', 4),
(20, 'born', 'Born on January 29, 1992 in Homs/Syria', 'Geboren am 29.01.1992 in Homs/Syrien', 0),
(21, 'nationalit', 'Nationality: German/Syrian', 'Nationalität: Deutsch/Syrisch', 0),
(22, 'residence', 'Place of residence: 87700 DE-Memmingen ', 'Wohnort: 87700 DE-Memmingen', 0),
(23, 'Number', 'Number', 'Nummer', 0),
(24, 'skills', 'Skills', 'Fähigkeiten', 0),
(25, 'skillsText0', 'Extensive experience in various programming languages, especially C#.', 'Vielfältige Erfahrung in verschiedenen Programmiersprachen, insbesondere in C#.  ', 0),
(26, 'skillsText1', 'Extensive experience in web design and web development using PHP, JavaScript, CSS, HTML, and Velocity.', 'Umfangreiche Erfahrung im Webdesign und in der Webentwicklung mit PHP, JavaScript, CSS, HTML und Velocity.', 0),
(27, 'skillsText2', 'Good knowledge of database design, management, and querying (SQL, MySQL).', 'Gute Kenntnisse Kenntnisse in Datenbankdesign, in der Verwaltung und Abfrage (SQL, MySQL).', 0),
(29, 'skillsText3', 'In-depth knowledge of Visual Studio and Visual Studio Code.', 'Fundierte Kenntnisse in Visual Studio, Visual Studio Code.', 0),
(30, 'skillsText4', 'Good experience with Git and GitHub.', 'Gute Erfahrung in Git und Github.', 0),
(31, 'skillsText5', 'Good hardware knowledge.', 'Gute Hardwarekenntnisse.', 0),
(32, 'skillsText6', 'Extensive IT background.', 'Umfassende IT-Hintergrund.', 0),
(33, 'skillsText7', 'Good knowledge of networking.', 'Gute Netzwerk-Kenntnisse.', 0),
(34, 'skillsText8', 'Basic knowledge of electronics and electrical engineering.', 'Grundkenntnisse in Elektronik und Elektrotechnik.', 0),
(35, 'skillsText9', 'In-depth knowledge of the Windows operating system.', 'Fundierte in Windows-Betriebssystem.', 0),
(36, 'ifm', 'Software Development Assistant at Ifm prover GmbH Tettnang', 'Software-Entwicklungsassistent bei Ifm prover GmbH Tettnang', 0),
(38, 'textIfm0', 'Development, implementation and maintenance of software applications and tools using C# to meet specific project requirements as well as documentation of the developed software.', 'Entwicklung, Implementierung und Wartung von Softwareanwendungen und Tools unter Verwendung von C# um spezifische Projektanforderungen zu erfüllen sowie Dokumentati-on der entwickelten Software.', 0),
(39, 'textIfm1', 'Implementation of defined features for internal development tools.', 'Umsetzung von definierten Features für entwicklungsinterne Tools.', 0),
(40, 'textIfm2', 'Conducting development-related tests and documenting the results.', 'Durchführung von entwicklungsbegleitenden Tests und Dokumentation der Ergebnisse', 0),
(41, 'textIfm3', 'Error analysis and troubleshooting in developed tools.', 'Fehleranalyse und -behebung in entwickelten Tools.', 0),
(42, 'textIfm4', 'Developing and maintaining internal websites using HTML, PHP, Velocity, JS, CSS, SQL (Frontend and Backend).', 'Interne Webseiten unter Verwendung von HTML, PHP, Velocity, JS, CSS, SQL, (Front und Backend) entwickeln und pflegen.', 0),
(43, 'textIfm5', 'Performing various laboratory tasks, including (e.g., sample analysis, experiments, documentation).', 'Durchführung verschiedener Laboraufgaben, einschließlich (z. B. Probenanalyse, Experi-mente, Dokumentation).', 0),
(44, 'textIfm6', 'Use, configure, and manage Polarion.', 'Polarion verwenden, konfigurieren und verwalten.', 0),
(45, 'trialIfm', 'Trial work at IFM, Tettnang', 'Probearbeiten bei IFM, Tettnang ', 0),
(46, 'JobSe', 'Job seeker', 'Arbeitsuchend', 0),
(47, 'multivac ', 'Internship at: Multivac in Wolfertschwenden', 'Praktikum bei: Multivac in Wolfertschwenden', 0),
(48, 'EnGermany', 'Entry into Germany, integration courses', 'Einreise nach Deutschland, Integrationskursen', 0),
(49, 'WExperienc', 'Work Experience', 'Berufserfahrung', 0),
(50, 'education', 'Education', 'Ausbildung', 0),
(51, 'CTech', 'Computer technician specializing in software development (recognized in Germany as an IT specialist specializing in application development)', 'Computer-Techniker Fachrichtung Softwareentwicklung (In Deutschland anerkannt als Fachinformatiker Fachrichtung Anwendungsentwicklung)\r\n', 0),
(52, 'HiSchool', 'High School Diploma', 'Abitur', 0),
(53, 'hS', 'in Homs/Syria', 'in Homs/Syrien', 0),
(54, 'langSkills', 'Language skills', 'Sprachkenntnisse', 0),
(55, 'deSkill', 'German: fluent in Spoken and Written (B2 level with certificate)', 'Deutsch: verhandlungssicher in Wort und Schrift (B2 Niveau mit Zertifikat) ', 0),
(56, 'enSkill', 'English: Good skills in reading and writing', 'Englisch: Gute Kenntnisse in Lesen, Schreiben', 0),
(57, 'arSkill', 'Arabic: native language', 'Arabisch: Muttersprache', 0),
(58, 'privWork', 'Insights into my private Work', 'Einblicke in meine private Arbeit', 0),
(59, 'githubLink', 'https://github.com/nedalWahhoud', 'https://github.com/nedalWahhoud', 3),
(60, 'other', 'Other', 'Sonstiges', 0),
(61, 'license', 'Class B driving license, own car available', 'Führerschein Klasse B, eigenes Auto vorhanden', 0),
(63, 'firstName', 'First Name', 'Vorname', 0),
(64, 'lastName', 'Last Name', 'Nachname', 0),
(65, 'email', 'E-Mail', 'E-Mail', 0),
(66, 'subject', 'Subject', 'Betreff', 0),
(67, 'message', 'Message', 'Nachricht', 0),
(68, 'send', 'Send', 'Absenden', 0),
(69, 'skillsText10', 'Good knowledge of Microsoft MS Office products.', 'Gute Kenntnisse in Microsoft MS-Office Produkte.', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_data_id` (`data_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

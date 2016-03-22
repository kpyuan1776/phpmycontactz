<?php

-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 21. Mrz 2016 um 13:24
-- Server-Version: 5.5.42
-- PHP-Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `ContactsDB`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `street`, `pcode`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Tom', 'Miller', 'Tomstreet', '76545', NULL, 'Germany', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email_adr` varchar(255) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `emails`
--

INSERT INTO `emails` (`id`, `email_adr`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 'test@testmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note_text` text NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `notes`
--

INSERT INTO `notes` (`id`, `note_text`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 'Here I took some of my notes', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `telephones`
--

CREATE TABLE `telephones` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `telephones`
--

INSERT INTO `telephones` (`id`, `type`, `number`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', '00498272738383', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indizes für die Tabelle `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indizes für die Tabelle `telephones`
--
ALTER TABLE `telephones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `telephones`
--
ALTER TABLE `telephones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Constraints der Tabelle `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Constraints der Tabelle `telephones`
--
ALTER TABLE `telephones`
  ADD CONSTRAINT `telephones_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

?>


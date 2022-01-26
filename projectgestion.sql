-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 jan. 2022 à 09:37
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projectgestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom_Classe`, `section`, `departement`, `created_at`, `updated_at`) VALUES
(1, 'DSI3.1', 'Développement des Systèmes d’Information', 'Technologies de L\'informatique', '2022-01-23 13:49:28', '2022-01-23 13:49:28'),
(3, 'RSI3.1', 'Réseaux et Services Informatiques', 'Technologies de L\'informatique', '2022-01-23 13:53:11', '2022-01-23 13:53:11'),
(4, 'EI3.1', 'Electronique Industrielle', 'Génie électrique', '2022-01-23 14:18:52', '2022-01-23 14:18:52'),
(5, 'DSI3.2', 'Développement des Systèmes d’Information', 'Technologies de L\'informatique', '2022-01-24 10:08:12', '2022-01-24 10:08:12');

-- --------------------------------------------------------

--
-- Structure de la table `compteenseignant`
--

CREATE TABLE `compteenseignant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compteenseignant`
--

INSERT INTO `compteenseignant` (`id`, `nom`, `prenom`, `role`, `mode`, `departement`, `login`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rouatbi', 'Adnen', 'chef de departement', 'accepte', 'Technologies de L\'informatique', 'rouatbi.adnen@gmail.com', 'Adnen1234', '2022-01-23 12:57:51', '2022-01-24 15:22:51'),
(2, 'Kachoukh', 'Yassine', 'enseignant', 'accepte', 'Technologies de L\'informatique', 'kachoukh.yassine@gmail.com', 'Yassine1234', '2022-01-23 12:58:55', '2022-01-24 18:57:38'),
(3, 'Belarbi', 'Manel', 'enseignant', 'accepte', 'Technologies de L\'informatique', 'belarbi.manel@gmail.com', 'Manel1234', '2022-01-23 12:59:41', '2022-01-23 13:01:44'),
(4, 'Zouari', 'Moez', 'enseignant', 'accepte', 'Technologies de L\'informatique', 'zouari.moez@gmail.com', 'Moez1234', '2022-01-23 13:00:16', '2022-01-23 13:01:45'),
(5, 'Mostafa', 'Mohssen', 'enseignant', 'en attente', 'Technologies de L\'informatique', 'mostafa.mohssen@gmail.com', 'Mohssen1234', '2022-01-23 13:01:18', '2022-01-23 13:01:18'),
(6, 'Farhet', 'Sassi', 'chef de departement', 'accepte', 'Génie électrique', 'farhet.sassi@gmail.com', 'Sassi1234', '2022-01-23 14:17:14', '2022-01-23 14:17:31'),
(7, 'test', 'test', 'enseignant', 'accepte', 'Technologies de L\'informatique', 'test@test.en', 'test123*', '2022-01-25 09:55:24', '2022-01-25 09:56:53');

-- --------------------------------------------------------

--
-- Structure de la table `compteetudiant`
--

CREATE TABLE `compteetudiant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compteetudiant`
--

INSERT INTO `compteetudiant` (`id`, `nom`, `prenom`, `matricule`, `classe`, `mode`, `departement`, `section`, `login`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rzig', 'Marwene', 'I1022', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'rzig.marwene@yahoo.com', 'Marwene1234', '2022-01-23 13:03:24', '2022-01-24 15:14:33'),
(2, 'Touati', 'Oussama', 'I1022', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'touati.oussama@gmail.com', 'Oussama1234', '2022-01-23 13:04:34', '2022-01-24 17:53:48'),
(3, 'Touati', 'Ahmed', 'I1028', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'touati.ahmed@gmail.com', 'Ahmed1234', '2022-01-23 13:05:20', '2022-01-24 15:15:58'),
(4, 'Mrabet', 'Saber', 'i5412', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'mrabet.saber@gmail.com', 'Saber1234', '2022-01-23 13:06:24', '2022-01-23 13:09:36'),
(5, 'Sekma', 'Souha', 'i5417', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'sekma.souha@gmail.com', 'Souha1234', '2022-01-23 13:07:17', '2022-01-23 13:09:37'),
(6, 'Slim', 'Azza', 'I1027', 'DSI3.2', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'slim.azza@yahoo.com', 'Azza1234', '2022-01-23 13:08:06', '2022-01-23 13:09:38'),
(8, 'Belaid', 'Chokri', 'i5417', 'DSI3.1', 'en attente', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'belaid.chokri@yahoo.com', 'Chokri1234', '2022-01-23 13:10:37', '2022-01-23 13:10:37'),
(9, 'test', 'test', 'gggggg', 'DSI3.1', 'accepte', 'Technologies de L\'informatique', 'Développement des Systèmes d’Information', 'test@test.et', '123456789', '2022-01-25 09:58:53', '2022-01-25 09:59:35');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom_Departement`, `created_at`, `updated_at`) VALUES
(1, 'Technologies de L\'informatique', '2022-01-23 12:55:29', '2022-01-23 12:55:29'),
(2, 'Génie électrique', '2022-01-23 12:55:37', '2022-01-23 12:55:37'),
(3, 'Génie Mécanique', '2022-01-23 12:55:45', '2022-01-23 12:55:45'),
(4, 'Sciences Économiques et de Gestion', '2022-01-23 12:56:40', '2022-01-23 12:56:48');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `nom_Classe`, `nom_Section`, `place`, `matiere`, `note`, `created_at`, `updated_at`) VALUES
(3, 'Rzig', 'Marwene', 'DSI3.1', 'Développement des Systèmes d’Information', 'B5', 'Projet d\'integration', '18', '2022-01-24 12:20:10', '2022-01-26 07:22:47'),
(6, 'Touati', 'Oussama', 'DSI3.1', 'Développement des Systèmes d’Information', '--', 'Projet d\'integration', '--', '2022-01-24 12:43:12', '2022-01-24 15:14:12'),
(7, 'Slim', 'Azza', 'DSI3.2', 'Développement des Systèmes d’Information', '--', 'Projet d\'integration', '--', '2022-01-24 13:11:04', '2022-01-24 13:11:04'),
(8, 'Touati', 'Ahmed', 'DSI3.1', 'Développement des Systèmes d’Information', '--', 'Projet d\'integration', '--', '2022-01-24 15:15:17', '2022-01-24 15:15:58'),
(9, 'Rzig', 'Marwene', 'DSI3.1', 'Développement des Systèmes d’Information', '--', 'Android', '--', '2022-01-24 19:04:44', '2022-01-24 19:04:44'),
(10, 'Touati', 'Oussama', 'DSI3.1', 'Développement des Systèmes d’Information', '--', 'Android', '--', '2022-01-24 19:04:49', '2022-01-24 19:04:49'),
(11, 'Mrabet', 'Saber', 'DSI3.1', 'Développement des Systèmes d’Information', '--', 'Android', '--', '2022-01-24 19:04:54', '2022-01-24 19:04:54');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_Matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surveillant1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surveillant2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom_Matiere`, `nom_Section`, `nom_Classe`, `prof_Matiere`, `surveillant1`, `surveillant2`, `classe`, `heure`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Projet d\'integration', 'Développement des Systèmes d’Information', 'DSI3.1', 'Rouatbi Adnen', 'Kachoukh Yassine', 'Belarbi Manel', 'c108', '10:05', '2022-01-19', '2022-01-24 10:07:15', '2022-01-24 15:22:51'),
(2, 'Projet d\'integration', 'Développement des Systèmes d’Information', 'DSI3.2', 'Rouatbi Adnen', 'Rouatbi Adnen', 'Zouari Moez', 'c103', '11:40', '2022-01-26', '2022-01-24 10:09:11', '2022-01-24 15:22:51'),
(5, 'Android', 'Développement des Systèmes d’Information', 'DSI3.1', 'Kachoukh Yassine', 'Rouatbi Adnen', 'Kachoukh Yassine', 'c108', '11:40', '2022-01-21', '2022-01-24 10:46:41', '2022-01-24 15:22:51');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_24_141859_create_departement_table', 1),
(6, '2021_11_29_084908_create_compteetudiant_table', 1),
(7, '2021_11_29_092659_create_compteenseignant_table', 1),
(8, '2021_11_29_123859_create_section_table', 1),
(9, '2021_11_30_192402_create-classe-table', 1),
(10, '2021_12_25_110029_create_etudiant_table', 1),
(11, '2022_01_23_134521_create_matiere_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abrevation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id`, `nom_Section`, `abrevation`, `departement`, `created_at`, `updated_at`) VALUES
(1, 'Développement des Systèmes d’Information', 'DSI', 'Technologies de L\'informatique', '2022-01-23 13:12:00', '2022-01-23 13:12:00'),
(7, 'Multimédia et Développement Web', 'MDW', 'Technologies de L\'informatique', '2022-01-23 13:36:29', '2022-01-23 13:36:29'),
(9, 'Réseaux et Services Informatiques', 'RSI', 'Technologies de L\'informatique', '2022-01-23 13:55:28', '2022-01-23 13:55:28'),
(10, 'Systèmes Embarqués et Mobiles', 'SEM', 'Technologies de L\'informatique', '2022-01-23 13:59:43', '2022-01-23 13:59:43'),
(11, 'Electronique Industrielle', 'EI', 'Génie électrique', '2022-01-23 14:18:41', '2022-01-23 14:18:41'),
(12, 'Electricité Industrielle', 'EI(Electricité)', 'Génie électrique', '2022-01-23 14:21:23', '2022-01-23 14:22:17'),
(13, 'Maintenance des Systèmes Electriques', 'MSE', 'Génie électrique', '2022-01-23 14:22:48', '2022-01-23 14:22:48'),
(14, 'Automatismes et Informatique Industrielle', 'AII', 'Génie électrique', '2022-01-23 14:23:13', '2022-01-23 14:23:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classe_nom_classe_unique` (`nom_Classe`);

--
-- Index pour la table `compteenseignant`
--
ALTER TABLE `compteenseignant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `compteenseignant_login_unique` (`login`),
  ADD UNIQUE KEY `compteenseignant_password_unique` (`password`);

--
-- Index pour la table `compteetudiant`
--
ALTER TABLE `compteetudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `compteetudiant_login_unique` (`login`),
  ADD UNIQUE KEY `compteetudiant_password_unique` (`password`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departement_nom_departement_unique` (`nom_Departement`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_nom_section_unique` (`nom_Section`),
  ADD UNIQUE KEY `section_abrevation_unique` (`abrevation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `compteenseignant`
--
ALTER TABLE `compteenseignant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `compteetudiant`
--
ALTER TABLE `compteetudiant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 27 déc. 2024 à 17:43
-- Version du serveur : 8.0.40-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `breed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `habitat_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `breed`, `image`, `habitat_id`, `created_at`, `updated_at`) VALUES
(10, 'Alex', 'Lion', '/images/image.jpeg', 8, '2024-12-27 16:48:37', '2024-12-27 16:48:37'),
(11, 'Marty', 'Zèbre', '/images/zebre.jpg', 8, '2024-12-27 16:49:25', '2024-12-27 16:49:25'),
(12, 'Gator', 'Crocodile', '/images/1309518-Crocodile.jpg', 10, '2024-12-27 16:49:48', '2024-12-27 16:49:48'),
(13, 'Mister', 'Toucan', '/images/toco-toucan-ramphastos-toco.jpg', 9, '2024-12-27 16:50:07', '2024-12-27 16:50:07');

-- --------------------------------------------------------

--
-- Structure de la table `animal_feedings`
--

CREATE TABLE `animal_feedings` (
  `id` int NOT NULL,
  `animal_id` int NOT NULL,
  `feed_date` date NOT NULL,
  `feed_time` time NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity_kg` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal_feedings`
--

INSERT INTO `animal_feedings` (`id`, `animal_id`, `feed_date`, `feed_time`, `food_type`, `quantity_kg`) VALUES
(7, 10, '2024-12-27', '18:08:00', 'Boeuf', 15.00),
(8, 11, '2024-12-27', '18:10:00', 'Foins et mélanges feuilles', 20.00),
(9, 12, '2024-12-27', '18:22:00', 'Viande de bison', 10.00),
(10, 13, '2024-12-27', '19:00:00', 'Insectes et fruits', 2.00);

-- --------------------------------------------------------

--
-- Structure de la table `animal_reports`
--

CREATE TABLE `animal_reports` (
  `id` int NOT NULL,
  `animal_id` int NOT NULL,
  `report_date` date NOT NULL,
  `health_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `food_quantity_kg` float NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal_reports`
--

INSERT INTO `animal_reports` (`id`, `animal_id`, `report_date`, `health_status`, `food_type`, `food_quantity_kg`, `user_id`) VALUES
(8, 10, '2024-12-27', 'Impeccable', 'Boeuf', 20, 11),
(9, 11, '2024-12-27', 'En très bonne forme', 'Foins et mélanges feuilles', 20, 11),
(10, 12, '2024-12-27', 'Lésions cérébrales', 'Viande de bison', 10, 11),
(11, 13, '2024-12-27', 'Admirable', 'Insectes et fruits', 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','replied') COLLATE utf8mb4_general_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `email`, `message`, `created_at`, `status`) VALUES
(1, 'Tarif train', 'test@test.fr', 'est-ce cher ?', '2024-12-27 14:54:34', 'pending'),
(2, 'Animaux', 'test@test.com', 'Y\'en aura-t-il d\'autres ?', '2024-12-27 15:04:01', 'pending'),
(3, 'Animaux', 'test@test.com', 'Y\'en aura-t-il d\'autres ?', '2024-12-27 15:06:01', 'pending'),
(4, 'Guides', 'azert@ty.fr', 'test', '2024-12-27 15:11:08', 'pending'),
(5, 'Zoo', 'thomas@test.com', 'tedison !?', '2024-12-27 15:16:00', 'pending'),
(6, 'test', 'elois@test.fr', 'est', '2024-12-27 17:00:11', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `habitats`
--

CREATE TABLE `habitats` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `animal` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitats`
--

INSERT INTO `habitats` (`id`, `name`, `images`, `description`, `animal`, `created_at`, `updated_at`) VALUES
(8, 'Savane', '/images/savane-1.jpg', 'La savane d\'Arcadia est un vaste espace ensoleillé, parsemé d\'herbes hautes et d\'acacias, où les visiteurs peuvent observer des animaux majestueux évoluer dans leur environnement naturel. Ce paysage ouvert, ponctué de points d\'eau, offre un habitat idéal pour les espèces qui cohabitent ici.', NULL, '2024-12-27 16:12:27', '2024-12-27 17:29:21'),
(9, 'Jungle', '/images/pexels-rifkyilhamrd-788200.jpg', 'La jungle d\'Arcadia est une forêt tropicale dense, riche en biodiversité, où la lumière filtre à travers un feuillage épais. Les sons des oiseaux exotiques et des cris des singes créent une atmosphère vibrante. Cet habitat humide et chaud abrite de nombreuses espèces fascinantes.', NULL, '2024-12-27 16:12:40', '2024-12-27 17:29:28'),
(10, 'Marais', '/images/pexels-quang-nguyen-vinh-222549-2154706.jpg', 'Le marais d\'Arcadia est un écosystème unique, avec des zones d\'eau stagnante et des plantes aquatiques luxuriantes. Ce milieu riche en boue et en humidité attire une variété d\'animaux qui s\'épanouissent dans cette zone humide, offrant aux visiteurs un aperçu fascinant de la vie aquatique et terrestre.', NULL, '2024-12-27 16:12:52', '2024-12-27 17:29:47');

-- --------------------------------------------------------

--
-- Structure de la table `habitat_reviews`
--

CREATE TABLE `habitat_reviews` (
  `id` int NOT NULL,
  `habitat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `review_date` date NOT NULL,
  `review_text` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitat_reviews`
--

INSERT INTO `habitat_reviews` (`id`, `habitat_id`, `user_id`, `review_date`, `review_text`) VALUES
(5, 8, 11, '2024-12-27', 'A rajouter plus d\'eau dans la réserve!'),
(6, 9, 11, '2024-12-27', 'Bien entretenu, à maintenir !'),
(7, 10, 11, '2024-12-27', 'A nettoyer les nids !');

-- --------------------------------------------------------

--
-- Structure de la table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int NOT NULL,
  `day_of_week` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `day_of_week`, `opening_time`, `closing_time`) VALUES
(1, 'Lundi', '09:00:00', '18:00:00'),
(2, 'Mardi', '09:30:00', '18:30:00'),
(3, 'Mercredi', '10:00:00', '19:00:00'),
(4, 'Jeudi', '10:00:00', '19:00:00'),
(5, 'Vendredi', '10:30:00', '19:30:00'),
(6, 'Samedi', '12:00:00', '16:00:00'),
(7, 'Dimanche', '09:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `pseudo`, `rating`, `comment`, `status`, `created_at`) VALUES
(1, 'Donky', 4, 'Super zoo, j\'y repasserai !', 'rejected', '2024-12-27 10:13:38'),
(2, 'Donky', 4, 'Super zoo, j\'y repasserai !', 'approved', '2024-12-27 10:13:59'),
(3, 'Henri', 5, 'Incroyable ! à refaire', 'approved', '2024-12-27 14:55:10'),
(4, 'Quentin', 4, 'Trop bien !!!', 'approved', '2024-12-27 15:02:48'),
(5, 'Salim', 4, 'Pas mal', 'rejected', '2024-12-27 15:10:33'),
(6, 'test', 4, 'test', 'rejected', '2024-12-27 17:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`, `created_at`) VALUES
(1, 'Train touristique', 'Découvrez notre service de train : une expérience inoubliable pour petits et grands !\r\nMontez à bord de notre train convivial et profitez d\'un moment de détente et de plaisir en famille ou entre amis. Que vous soyez un enfant curieux ou un adulte nostalgique, notre train vous emmène dans un voyage captivant à travers des paysages magnifiques. Chaque trajet est une aventure pleine de découvertes, avec une ambiance chaleureuse et accueillante pour tous les âges.\r\nLe tarif est de 5€ supplémentaires par personne, pour que chacun puisse profiter de cette expérience unique et mémorable. Venez vivre un moment magique à bord, où la joie et les sourires sont garantis !', '/images/tourist-train-938568_1280.jpg', '2024-12-23 12:28:20'),
(3, 'Restaurant', 'Dans notre restaurant, un véritable havre de paix au cœur de la nature !\r\nOffrez à vos sens une escapade gustative unique dans un cadre idyllique, où le calme et la beauté de la nature se marient parfaitement avec des saveurs exotiques qui éveilleront vos papilles. Niché dans un écrin verdoyant, notre restaurant vous invite à découvrir une cuisine raffinée, préparée à partir de produits frais et exotiques soigneusement sélectionnés.\r\nChaque plat est une invitation au voyage, avec des ingrédients venus des quatre coins du monde, sublimés par le savoir-faire de nos chefs. Laissez-vous séduire par des recettes créatives et surprenantes, où la fraîcheur des produits locaux rencontre l’originalité des saveurs lointaines.\r\nVenez savourer un moment de bien-être, entouré par la nature, dans une ambiance conviviale et chaleureuse. Le temps semble s\'arrêter pour que vous puissiez profiter pleinement de l\'expérience culinaire qui vous attend.', '/images/pexels-reneasmussen-1581384.jpg', '2024-12-23 16:45:16'),
(5, 'Guides touristiques', 'Explorez le zoo comme jamais avec nos guides touristiques experts !\r\nVenez vivre une expérience unique au cœur de la faune sauvage avec nos guides passionnés et expérimentés. Accompagné d’un expert, partez à la découverte des animaux et de leur habitat à travers une visite enrichissante et captivante. Nos guides vous dévoileront des anecdotes fascinantes et des informations précieuses sur les espèces qui peuplent le zoo, tout en répondant à toutes vos questions.\r\nQue vous soyez un amoureux des animaux ou simplement curieux, cette exploration guidée vous offrira une perspective nouvelle sur le monde animal, avec des détails et des observations que vous ne pourriez pas découvrir en visite libre. Profitez de cette expérience immersive pour approfondir vos connaissances et passer un moment inoubliable en famille ou entre amis !', '/images/pexels-loquellano-17087507.jpg', '2024-12-27 12:57:15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','veterinarian','employee') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Joseph', '$2y$10$p/SKet8Efdt4Np.Pqjq.U.5KIiRl/4/LjMT143nbi1gzg.7dKfQGW', 'veterinarian', '2024-12-22 08:33:23'),
(2, 'Mathieu', '$2y$10$qOhSuO9phkrGpqoNESAwhOOUy/xuNHD.9wnmmmpPq4DYZv1hWTPfu', 'employee', '2024-12-22 08:44:18'),
(3, 'Alex', '$2y$10$2OStOeGhHZfpua7smJ4kiOelZn7xPQGpgl47PHShcgPRyTfpTXhii', 'veterinarian', '2024-12-22 08:52:57'),
(4, 'Quentin', '$2y$10$Sk6Ldy0gHNYVG1/YZX8vB.J5X0VQQDvgchCMs.c5Pn2yFCc.rxnHq', 'employee', '2024-12-22 09:14:23'),
(5, 'Sarah', '$2y$10$noZgXL1Ag4G5dIRkBU92U.KUuagftmI/FRKNPGFYVi.R1jq8uYA3q', 'veterinarian', '2024-12-22 19:10:16'),
(7, 'Didier', '$2y$10$AdcSlRoB7pFG5yUeUHDD3udHjJTTIbrtUxaqOTemITDik.FCD/HMu', 'employee', '2024-12-22 19:13:11'),
(8, 'José', '$2y$10$f/eMCbakMNeZ6dsQ.SFsFetYljNbDaouZWDotubeDVS6JEj3nwazG', 'admin', '2024-12-23 11:59:05'),
(9, 'Laurent', '$2y$10$FrZkc0KtFwrSvRjws56.5ed4VblTcPEvPJVsTI.b0udis4oMGGol6', 'employee', '2024-12-23 12:02:00'),
(10, 'Laura', '$2y$10$nT4u9TMnvqEAz0ImSE4e3e79QXiEUYvyqmUZcfGyCyUqVXU13YEkO', 'veterinarian', '2024-12-23 14:11:53'),
(11, 'Han', '$2y$10$TRDQQbYQMhytPaMjE8ccLOwGGauCEoc8EVlQfAvvkWrZRgvJCj4OG', 'veterinarian', '2024-12-23 16:43:15'),
(12, 'Sofiane', '$2y$10$snD4YKvBrNkmZHsKfOov8.A9ilXOxDSBWPHIAFxnGQQEII3jtwb6y', 'employee', '2024-12-27 12:55:33'),
(13, 'Kim', '$2y$10$HnnXIgIeIJ/z7K9DeP0Hru0tVR3NITnCCE4.y.qw..dbwXOtl6K3q', 'veterinarian', '2024-12-27 14:51:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Index pour la table `animal_feedings`
--
ALTER TABLE `animal_feedings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `animal_reports`
--
ALTER TABLE `animal_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat_reviews`
--
ALTER TABLE `habitat_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `animal_feedings`
--
ALTER TABLE `animal_feedings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `animal_reports`
--
ALTER TABLE `animal_reports`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `habitat_reviews`
--
ALTER TABLE `habitat_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `animal_feedings`
--
ALTER TABLE `animal_feedings`
  ADD CONSTRAINT `animal_feedings_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `animal_reports`
--
ALTER TABLE `animal_reports`
  ADD CONSTRAINT `animal_reports_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `habitat_reviews`
--
ALTER TABLE `habitat_reviews`
  ADD CONSTRAINT `habitat_reviews_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `habitat_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 06:39 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` tinyint(4) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Action'),
(2, 'Role-Playing game'),
(3, 'Strategy'),
(4, 'Open World'),
(5, 'Racing'),
(6, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `publish_date`, `publisher`, `price`, `category_id`, `image`, `description`) VALUES
(1, 'Call of Duty WWII', '2017-10-03', 'Activision', '49.99', 1, 'https://www.callofduty.com//content/dam/atvi/callofduty/wwii/home/wwii-fb-eyes-logo-pic.jpg', 'A breathtaking experience that redefines World War II for a new gaming generation. Land in Normandy on D-Day and battle across Europe through iconic locations in historys most monumental war.'),
(2, 'Grand Theft Auto V', '2013-09-17', 'Rockstar Games', '19.99', 4, 'https://vignette.wikia.nocookie.net/gtawiki/images/7/76/CoverArt-GTAV.png/revision/latest?cb=20130826184215', 'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.'),
(3, 'Tom Clancy\'s Ghost Recon: Wildlands', '2017-03-07', 'Ubisoft ', '39.99', 1, 'https://upload.wikimedia.org/wikipedia/en/b/b9/Ghost_Recon_Wildlands_cover_art.jpg', 'Experience total freedom of choice in Tom Clancy\'s Ghost Recon Wildlands, the ultimate military shooter set in a massive open world setting. The Santa Blanca drug cartel has transformed the beautiful South American country of Bolivia into a perilous narco-state, leading to lawlessness, fear, and rampant violence.'),
(4, 'Forza Horizon3', '2016-09-27', 'Microsoft Studios', '39.99', 5, 'https://static.gamespot.com/uploads/scale_medium/1197/11970954/3081609-forzahorizon3.jpg', 'Forza Horizon 3 is a racing video game set in an open world environment based in a fictional representation of Australia[5] The gameplay world is expansive, twice the size of its predecessor in the series Forza Horizon 2, and includes locales such as Surfers Paradise, Byron Bay, Yarra Valley and the Outback. Players compete in various events through the world, including various forms races, time trials, drifting, and Bucketlist Challenges.'),
(5, 'Gears of War 4', '2016-10-11', 'Microsoft Studios', '19.99', 2, 'https://compass-ssl.xbox.com/assets/84/32/8432a0d9-36a8-48fb-b91c-d0d668106035.jpg?n=GoW4-MWF_GLP-Hero-0_1084x1084.jpg', 'Gears of War 4 is the fifth game in the Gears of War franchise. Set 25 years after Gears of War 3, humanity is slowly rebuilding and repopulating, and planet Sera’s weather is taking a violent turn due to the Imulsion countermeasure. But when a new, Locust-like enemy, the Swarm, starts kidnapping entire human colonies, JD Fenix and his two friends, Kait Diaz and Del Walker, have to step in to save their loved ones. '),
(7, 'Star Wars Battlefront || ', '2017-11-17', 'Electronic Arts', '49.99', 1, 'https://i5.walmartimages.ca/images/Enlarge/669/751/6000197669751.jpg', 'Star Wars Battlefront II features a single-player story mode, a customizable character class system, and content based on The Force Awakens and The Last Jedi movies. It also features vehicles and locations from the original, prequel, and sequel Star Wars movie trilogies. It also features heroes and villains that can be played based on characters from the Star Wars movies; the hero roster includes Luke Skywalker, Leia Organa, Han Solo, Chewbacca, Lando Calrissian, Yoda, Rey, Darth Vader, Emperor Palpatine, Boba Fett, Bossk, Iden Versio, Darth Maul, and Kylo Ren at launch.'),
(8, 'Destiny 2', '2017-09-06', 'Activision', '39.99', 2, 'http://techgage.com/wp-content/uploads/2017/03/Destiny-2-Promo-Art.jpg', 'Similar to its predecessor, Destiny 2 is a first-person shooter game that incorporates role-playing and massively multiplayer online game (MMO) elements.[3] The original Destiny included on-the-fly matchmaking that allowed players to communicate only with other players with whom they were \"matched\" by the game. To communicate with other players in the game world, players had to use their respective console\'s messaging system. Destiny 2 features a more optimal way of matchmaking called \"Guided Games\", which allows players to search for clans who may need additional players for activities, such as strikes or raids. Like the original, activities in Destiny 2 are divided among player versus environment (PvE) and player versus player (PvP) game types.'),
(9, 'Horizon Zero Dawn ', '2017-02-28', 'Sony Interactive Entertainment ', '39.99', 2, 'https://i.pinimg.com/736x/1c/a0/15/1ca01513525a9bd8b2e7c20919a89bea--custom-wallpaper-wallpaper-for.jpg', 'Horizon Zero Dawn is an action role-playing video game developed by Guerrilla Games and published by Sony Interactive Entertainment for PlayStation 4 and released in early 2017. The plot revolves around Aloy, a hunter and archer living in a world overrun by robots. Having been an outcast her whole life, she sets out to discover the dangers that kept her sheltered. The character uses ranged weapons and a spear and stealth tactics to combat the mechanised creatures, whose remains can be looted for resources. A skill tree provides the player with new abilities and passive bonuses. The game features an open world environment for Aloy to explore, divided into tribes that hold side quests to undertake, while the main story guides her across the entire map.'),
(12, 'Assassin\'s Creed: Origins', '2017-10-27', 'Ubisoft ', '39.99', 1, 'https://assets.rpgsite.net/images/images/000/054/804/original/ACO_pack_pc_bxsht2d_E3_170611_330pm_US_1497215839.jpg', 'Assassin\'s Creed Origins is an action-adventure stealth game played from a third-person perspective. Players complete quests—linear scenarios with set objectives—to progress through the story, earn experience points, and acquire new skills. Outside of quests, players can freely roam the open world environment on foot, horseback, camel-back or boat to explore locations, complete optional side-quests and unlock weapons and equipment.'),
(10, 'Super Mario Odyssey', '2017-10-27', 'Nintendo', '39.99', 3, 'https://www.dualshockers.com/wp-content/uploads/2017/08/super-mario-boxart.jpg', 'Super Mario Odyssey is a platform game in which players control the titular protagonist, Mario, as he travels across many worlds on the Odyssey, his hat-shaped ship, in an effort to rescue Princess Peach from Bowser, who plans to marry her.The game sees Mario traveling to various worlds known as \"Kingdoms\", which return to the free-roaming exploration-based level design featured in Super Mario 64 and Super Mario Sunshine, with each featuring unique designs ranging from photo-realistic cities to more fantasy-based worlds. Each kingdom has Mario searching for and clearing various objectives in order to obtain items known as Power Moons, which can power up the Odyssey and grant access to new worlds. Checkpoint flags littered throughout each world allow Mario to instantly warp to them once activated. Certain levels feature areas called \"flat\" zones, where Mario is placed in a side-scrolling environment similar to his appearance in the original Super Mario Bros.'),
(11, 'Need for Speed Payback', '2017-11-17', 'Electronic Arts', '39.99', 5, 'http://cdn.wccftech.com/wp-content/uploads/2017/06/NFS1.jpg', 'Need for Speed Payback is a racing game set in an open world environment of Fortune Valley. It is focused on \"action driving\" and has three playable characters (each with different sets of skills) working together to pull off action movie like sequences. In contrast with the previous game, it also features a 24-hour day-night cycle. Unlike the 2015 Need for Speed reboot, Payback includes an offline single-player mode.'),
(36, 'NBA 2k17', '2016-11-11', '2K Games', '9.99', 0, 'https://api.2k.com/images/1643', 'Good game'),
(39, 'j', '1987-09-30', 'j', '9.99', 0, 'url', 'good'),
(40, 'j', '1987-09-30', 'j', '9.99', 0, 'url', 'good'),
(41, 'j', '1987-09-30', 'j', '9.99', 0, 'url', 'good'),
(15, 'The Legend of Zelda: Breath of the Wild', '2017-03-03', 'Nintendo', '39.99', 4, 'https://upload.wikimedia.org/wikipedia/en/0/0e/BreathoftheWildFinalCover.jpg', 'Gameplay of Breath of the Wild departs from most games in The Legend of Zelda series because it features a fully open-world environment, twelve times larger than the overworld in Twilight Princess, with less emphasis on defined entrances and exits to areas. Similar to the original The Legend of Zelda, the player is placed into the game\'s world with very little instruction, and is allowed to explore freely at their own pace. Breath of the Wild introduces a new physics engine to the Zelda series that establishes a consistent set of gameplay rules, but also frees players up to approach a puzzle or problem in different ways rather than trying to find the single workable method.Along with a physics engine, the game\'s open world also integrates a \"chemistry engine\", which defines the physical properties of most objects and governs how they interact with the player and one another.Taken together, these two design approaches result in a generally unstructured and interactive world that rewards players for experimenting with different aspects of the world and allows for completing the story non-linearly.'),
(14, 'Prey', '2017-05-05', 'Bethesda Softworks', '29.99', 1, 'https://images-na.ssl-images-amazon.com/images/I/91ICkOfthfL._SY679_.jpg', 'Prey is a first-person shooter with role-playing and stealth elements with strong narrative set in an open world environment. The player takes the role of Morgan Yu, a human aboard a space station with numerous species of hostile aliens known collectively as the Typhon. The player is able to select certain attributes of Morgan, including gender, and decisions made by the player that affects elements of the game\'s story. To survive, the player must collect and use weapons and resources aboard the station to fend off and defeat the aliens.[1] According to creative director Raphaël Colantonio, the station is completely continuous rather than having separate levels or missions, at times requiring the player to return to areas they previously explored. The player is also able to venture outside of the station in zero gravity and find shortcuts connecting parts of the station. Colantonio also stated that the aliens have an array of different powers that the player character can gain over time; one such alien has the ability to mimic everyday items such as a chair.'),
(16, 'NBA 2k18', '2017-09-15', '2K Games', '39.99', 6, 'https://images-na.ssl-images-amazon.com/images/I/810ai8PjjmL._AC_SL1500_.jpg', 'NBA 2K18, like the previous games in the series, is based on the sport of basketball; more specifically, it simulates the experience of the National Basketball Association (NBA). Several game modes are present, including the team-managing MyGM and MyLeague modes, which were a considerable emphasis during development, and MyCareer, in which the player creates and plays through the career of their own player. '),
(13, 'For Honor ', '2017-02-14', 'Ubisoft ', '29.99', 1, 'http://static9.cdn.ubisoft.com/resource/en-US/game/forhonor/game/For_Honor_Keyart_2016.jpg', 'For Honor is an action fighting game set during a medieval period inspired fantasy setting.Players can play as a character from three different factions, namely The Blackstone Legion Knights, The Chosen Samurai, and The Warborn Vikings. The three factions represent knights, samurai, and vikings, respectively.Each faction had four classes at launch, with two more being added at the beginning of every season of the Faction War. The Vanguard class is described as \"well-balanced\" and has excellent offense and defense. The Assassin class is fast and efficient in dueling enemies, but the class deals much less damage to enemies. The Heavies are more resistant to damages and are suitable for holding capture points, though their attacks are slow. The last class, known as \"Hybrids\", are a combination of two of the three types, and is capable of using uncommon skills.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Anderson', 'Admin', 'password', 1),
(2, 'Mark', 'Hession', 'guest', 'password', 2),
(3, 'Ian', 'Hays', 'Ian11', 'password', 2),
(4, 'Jake', 'Bryant', 'Jb1234', 'password', 2),
(5, 'Mike', 'Jones', 'MikeJones', 'password', 2),
(26, 'Tom', 'Jerry', 'Tom1', 'password', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP TABLE IF EXISTS admins;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Administrator',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admins VALUES("1","Admin","admin@gmail.com","01629552892","Administrator","152221945444149839-user-icon-Stock-Photo.jpg","$2y$10$9qkomlAvMPVMjqktEM5ekuPLVjR/xY8Vu04xBAd0jt6Y/fN0MgX.C","1","rqZOzJ2WhA0VfSPUPLonFgOVoZSxs4O9fUpCtVypdWHEV1uOWSLmpQP03jbJ","2018-03-01 05:27:08","2018-09-26 12:34:02"),
("2","Wu ZI Mu","wuzimu@gmail.com","3242342345436554654645","Staff","1539171190profile3.jpg","$2y$10$f5TJcOwfSAUu1D.doxAZhuZBZdqrvrN1CVTMn8nPh3EY.XveZEBw2","1","","2018-10-10 17:33:10","2018-10-10 17:33:10");



DROP TABLE IF EXISTS advertises;

CREATE TABLE `advertises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `alt` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `script` text,
  `size` varchar(191) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO advertises VALUES("3","banner","1520953940add.jpg","Advertisement","http://geniusocean.com/","","728x90","5","1"),
("4","banner","1520953955ad1.jpg","Advertisement","http://geniusocean.com/","","300x250","5","1");



DROP TABLE IF EXISTS banners;

CREATE TABLE `banners` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `top1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top1l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top2l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top3l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top4l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom1l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom2l` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO banners VALUES("1","1536227314image-blog-1.jpg","1536227322image-blog-2.jpg","1536227327image-blog-3.jpg","1536227331image-blog-4.jpg","1536060875banner-1.jpg","1536060875banner-2.jpg","https://www.google.com/","https://www.google.com/","https://www.google.com/","https://www.google.com/","https://www.google.com/","https://www.google.com/");



DROP TABLE IF EXISTS blogs;

CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO blogs VALUES("5","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404153latest-news-1.jpg","www.geniusocean.com","3","1","2018-03-06 15:51:33","2018-08-16 13:22:33"),
("6","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404148latest-news-1.jpg","www.geniusocean.com","11","1","2018-03-06 15:52:10","2018-08-16 17:12:28"),
("7","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404142latest-news-1.jpg","www.geniusocean.com","1","1","2018-03-06 15:52:45","2018-08-16 13:22:22"),
("8","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404136latest-news-1.jpg","www.geniusocean.com","3","1","2018-03-06 15:52:57","2018-08-16 13:22:16"),
("9","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404129latest-news-1.jpg","www.geniusocean.com","24","1","2018-03-06 15:53:41","2018-09-30 17:20:01"),
("10","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404122latest-news-1.jpg","www.geniusocean.com","11","1","2018-03-06 15:54:21","2018-09-08 17:18:31"),
("12","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404117latest-news-1.jpg","www.geniusocean.com","12","1","2018-03-07 04:04:20","2018-08-29 10:08:20"),
("13","How to design effective arts?","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404112latest-news-1.jpg","www.geniusocean.com","23","1","2018-03-07 04:04:36","2018-08-28 17:33:01"),
("14","LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM,","<div align=\"justify\">The recording starts with the patter of a summer squall. Later, a \ndrifting tone like that of a not-quite-tuned-in radio station \n                                        rises and for a while drowns out\n the patter. These are the sounds encountered by NASA’s Cassini \nspacecraft as it dove \n                                        the gap between Saturn and its \ninnermost ring on April 26, the first of 22 such encounters before it \nwill plunge into \n                                        atmosphere in September. What \nCassini did not detect were many of the collisions of dust particles \nhitting the spacecraft\n                                        it passed through the plane of \nthe ringsen the charged particles oscillate in unison.<br><br></div><h3 align=\"justify\">How its Works ?</h3>\n                                    <p align=\"justify\">\n                                        MIAMI — For decades, South \nFlorida schoolchildren and adults fascinated by far-off galaxies, \nearthly ecosystems, the proper\n                                        ties of light and sound and \nother wonders of science had only a quaint, antiquated museum here in \nwhich to explore their \n                                        interests. Now, with the \nlong-delayed opening of a vast new science museum downtown set for \nMonday, visitors will be able \n                                        to stand underneath a suspended,\n 500,000-gallon aquarium tank and gaze at hammerhead and tiger sharks, \nmahi mahi, devil\n                                        rays and other creatures through\n a 60,000-pound oculus. <br></p><p align=\"justify\">Lens that will give the impression of seeing the fish from the bottom of\n a huge cocktail glass. And that’s just one of many\n                                        attractions and exhibits. \nOfficials at the $305 million Phillip and Patricia Frost Museum of \nScience promise that it will be a \n                                        vivid expression of modern \nscientific inquiry and exposition. Its opening follows a series of \nsetbacks and lawsuits and a \n                                        scramble to finish the \n250,000-square-foot structure. At one point, the project ran \nprecariously short of money. The museum\n                                        high-profile opening is \nespecially significant in a state s <br></p><p align=\"justify\"><br></p><h3 align=\"justify\">Top 5 reason to choose us</h3>\n                                    <p align=\"justify\">\n                                        Mauna Loa, the biggest volcano \non Earth — and one of the most active — covers half the Island of \nHawaii. Just 35 miles to the \n                                        northeast, Mauna Kea, known to \nnative Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea \nlevel. To them it repre\n                                        sents a spiritual connection \nbetween our planet and the heavens above. These volcanoes, which have \nbeguiled millions of \n                                        tourists visiting the Hawaiian \nislands, have also plagued scientists with a long-running mystery: If \nthey are so close together, \n                                        how did they develop in two \nparallel tracks along the Hawaiian-Emperor chain formed over the same \nhot spot in the Pacific \n                                        Ocean — and why are their \nchemical compositions so different? \"We knew this was related to \nsomething much deeper,\n                                        but we couldn’t see what,” said \nTim Jones.\n                                    </p>","1534404106latest-news-1.jpg","www.geniusocean.com","38","1","2018-03-07 04:04:49","2018-10-11 17:25:26");



DROP TABLE IF EXISTS brands;

CREATE TABLE `brands` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO brands VALUES("1","1525528423client_logo_01.png","https://www.google.com/"),
("2","1525528470client_logo_02.png","https://www.google.com/"),
("3","1525528512client_logo_03.png","https://www.google.com/"),
("4","1525528518client_logo_04.png","https://www.google.com/"),
("5","1525528524client_logo_05.png","https://www.google.com/"),
("6","1525528531client_logo_06.png","https://www.google.com/"),
("7","1525528531client_logo_06.png","https://www.google.com/"),
("8","1525528536client_logo_07.png","https://www.google.com/"),
("9","1525528542client_logo_08.png","https://www.google.com/"),
("10","1525528634client_logo_10.png","https://www.google.com/"),
("18","1535438306client_logo_11.png","https://www.google.com/"),
("19","1535438312client_logo_09.png","https://www.google.com/"),
("20","1535438317client_logo_08.png","https://www.google.com/"),
("21","1535438321client_logo_10.png","https://www.google.com/"),
("22","1535438325client_logo_06.png","https://www.google.com/"),
("23","1535438329client_logo_04.png","https://www.google.com/"),
("24","1535438337client_logo_03.png","https://www.google.com/"),
("26","1536465813client_logo_05.png","");



DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bloodgroups_name_unique` (`cat_name`),
  UNIQUE KEY `bloodgroups_slug_unique` (`cat_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES("11","Category 1","cat1","1","1536219926computer.png"),
("12","Category 2","cat2","1",""),
("13","Category 3","cat3","1",""),
("14","Category 4","cat4","1",""),
("15","Category 5","cat5","1","");



DROP TABLE IF EXISTS childcategories;

CREATE TABLE `childcategories` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(191) unsigned NOT NULL,
  `child_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO childcategories VALUES("14","8","Child Category 1","c1","1"),
("15","8","Child Category 2","c2","1"),
("16","8","Child Category 3","c3","1"),
("17","9","Child Category 4","c4","1"),
("18","9","Child Category 5","c5","1"),
("19","10","Child Category 6","c6","1");



DROP TABLE IF EXISTS comments;

CREATE TABLE `comments` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) unsigned NOT NULL,
  `product_id` int(191) unsigned NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS conversations;

CREATE TABLE `conversations` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_user` int(191) NOT NULL,
  `recieved_user` int(191) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO conversations VALUES("3","I need To Buy GTA 7","17","13","Hi Need To Talk","2018-10-30 16:04:01","2018-10-30 16:04:01"),
("4","New Subject","17","13","Hwll news","2018-10-30 16:20:28","2018-10-30 16:20:28"),
("5","Hlw","15","13","Hi","2018-10-30 16:30:24","2018-10-30 16:30:24"),
("11","Test","15","13","Testing Mesage","2018-10-30 17:52:49","2018-10-30 17:52:49"),
("13","asd","17","15","asdasda","2018-11-01 18:33:17","2018-11-01 18:33:17");



DROP TABLE IF EXISTS counters;

CREATE TABLE `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('referral','browser') NOT NULL DEFAULT 'referral',
  `referral` varchar(255) DEFAULT NULL,
  `total_count` int(11) NOT NULL DEFAULT '0',
  `todays_count` int(11) NOT NULL DEFAULT '0',
  `today` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO counters VALUES("1","referral","www.facebook.com","5","0",""),
("2","referral","geniusocean.com","2","0",""),
("3","browser","Windows 10","1725","0",""),
("4","browser","Linux","206","0",""),
("5","browser","Unknown OS Platform","384","0",""),
("6","browser","Windows 7","415","0",""),
("7","referral","yandex.ru","15","0",""),
("8","browser","Windows 8.1","519","0",""),
("9","referral","www.google.com","6","0",""),
("10","browser","Android","311","0",""),
("11","browser","Mac OS X","548","0",""),
("12","referral","l.facebook.com","1","0",""),
("13","referral","codecanyon.net","6","0",""),
("14","browser","Windows XP","2","0",""),
("15","browser","Windows 8","1","0",""),
("16","referral","eorangeshop.test","35","0","");



DROP TABLE IF EXISTS coupons;

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `price` float NOT NULL,
  `times` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` int(191) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO coupons VALUES("1","eqwe","1","12.22","","7","1","2018-09-01","2018-12-31"),
("2","sdsdsasd","0","11","","1","1","2018-09-01","2018-12-31"),
("3","werwd","0","22","46","3","1","2018-09-01","2018-12-31"),
("4","asdasd","1","23.5","76","1","1","2018-09-01","2018-12-31"),
("5","kopakopakopa","0","40","","0","1","2018-10-05","2019-01-31");



DROP TABLE IF EXISTS currencies;

CREATE TABLE `currencies` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO currencies VALUES("1","USD","$","1","0"),
("4","BDT","৳","82.92649841308594","1");



DROP TABLE IF EXISTS faqs;

CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO faqs VALUES("1","Reducing the visibility of the negative information","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum tenetur dicta commodi, totam atque fugit ut magnam laboriosam dignissimos dolorum minus quia sed distinctio in mollitia laborum sint delectus accusamus!"),
("3","Protecting brand integrity","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum tenetur dicta commodi, totam atque fugit ut magnam laboriosam dignissimos dolorum minus quia sed distinctio in mollitia laborum sint delectus accusamus!"),
("4","Protecting brand integrity","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum tenetur dicta commodi, totam atque fugit ut magnam laboriosam dignissimos dolorum minus quia sed distinctio in mollitia laborum sint delectus accusamus!"),
("5","Protecting brand integrity","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum tenetur dicta commodi, totam atque fugit ut magnam laboriosam dignissimos dolorum minus quia sed distinctio in mollitia laborum sint delectus accusamus!");



DROP TABLE IF EXISTS favorite_sellers;

CREATE TABLE `favorite_sellers` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `vendor_id` int(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS galleries;

CREATE TABLE `galleries` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(191) unsigned NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=latin1;

INSERT INTO galleries VALUES("54","1","1525944719p2.jpg"),
("55","1","1525944719p3.png"),
("56","1","1525944719p4.jpg"),
("57","1","1525944720p5.jpg"),
("58","1","1525944720p6.jpg"),
("59","1","1525944720p7.jpg"),
("60","1","1525944720p8.jpg"),
("61","1","1525944720p9.jpg"),
("62","1","1525944720p10.jpg"),
("63","1","1525944720p11.jpg"),
("64","1","1525944720p12.jpg"),
("65","2","1525945307p1.jpg"),
("66","2","1525945307p3.png"),
("67","2","1525945307p4.jpg"),
("68","2","1525945307p5.jpg"),
("69","2","1525945307p6.jpg"),
("70","2","1525945307p7.jpg"),
("71","2","1525945307p8.jpg"),
("72","2","1525945307p9.jpg"),
("73","2","1525945307p10.jpg"),
("74","2","1525945307p11.jpg"),
("75","2","1525945307p12.jpg"),
("87","4","1525945341p1.jpg"),
("88","4","1525945341p2.jpg"),
("89","4","1525945341p3.png"),
("90","4","1525945341p5.jpg"),
("91","4","1525945341p6.jpg"),
("92","4","1525945341p7.jpg"),
("93","4","1525945341p8.jpg"),
("94","4","1525945341p9.jpg"),
("95","4","1525945342p10.jpg"),
("96","4","1525945342p11.jpg"),
("97","4","1525945342p12.jpg"),
("175","12","1525945463p1.jpg"),
("176","12","1525945463p2.jpg"),
("177","12","1525945463p3.png"),
("178","12","1525945463p4.jpg"),
("179","12","1525945463p5.jpg"),
("180","12","1525945463p6.jpg"),
("181","12","1525945463p7.jpg"),
("182","12","1525945463p8.jpg"),
("183","12","1525945464p9.jpg"),
("184","12","1525945464p10.jpg"),
("185","12","1525945464p11.jpg"),
("186","3","1525945534p1.jpg"),
("187","3","1525945534p2.jpg"),
("188","3","1525945534p4.jpg"),
("189","3","1525945534p5.jpg"),
("190","3","1525945534p6.jpg"),
("191","3","1525945535p7.jpg"),
("192","3","1525945535p8.jpg"),
("193","3","1525945535p9.jpg"),
("194","3","1525945535p10.jpg"),
("195","3","1525945535p11.jpg"),
("196","3","1525945535p12.jpg"),
("208","5","1525945843p1.jpg"),
("209","5","1525945843p2.jpg"),
("210","5","1525945843p3.png"),
("211","5","1525945843p4.jpg"),
("212","5","1525945843p6.jpg"),
("213","5","1525945843p7.jpg"),
("214","5","1525945843p8.jpg"),
("215","5","1525945843p9.jpg"),
("216","5","1525945843p10.jpg"),
("217","5","1525945843p11.jpg"),
("218","5","1525945843p12.jpg"),
("219","6","1525945977p1.jpg"),
("220","6","1525945977p2.jpg"),
("221","6","1525945977p3.png"),
("222","6","1525945977p4.jpg"),
("223","6","1525945977p5.jpg"),
("224","6","1525945978p7.jpg"),
("225","6","1525945978p8.jpg"),
("226","6","1525945978p9.jpg"),
("227","6","1525945978p10.jpg"),
("228","6","1525945978p11.jpg"),
("229","6","1525945978p12.jpg"),
("230","7","1525946065p1.jpg"),
("231","7","1525946065p2.jpg"),
("232","7","1525946065p3.png"),
("233","7","1525946065p4.jpg"),
("234","7","1525946065p5.jpg"),
("235","7","1525946065p6.jpg"),
("236","7","1525946066p8.jpg"),
("237","7","1525946066p9.jpg"),
("238","7","1525946066p10.jpg"),
("239","7","1525946066p11.jpg"),
("240","7","1525946066p12.jpg"),
("241","8","1525946102p1.jpg"),
("242","8","1525946102p2.jpg"),
("243","8","1525946102p3.png"),
("244","8","1525946102p4.jpg"),
("245","8","1525946102p5.jpg"),
("246","8","1525946102p6.jpg"),
("247","8","1525946103p7.jpg"),
("248","8","1525946103p9.jpg"),
("249","8","1525946103p10.jpg"),
("250","8","1525946103p11.jpg"),
("251","8","1525946103p12.jpg"),
("252","9","1525946995p1.jpg"),
("253","9","1525946995p2.jpg"),
("254","9","1525946995p3.png"),
("255","9","1525946996p4.jpg"),
("256","9","1525946996p5.jpg"),
("257","9","1525946996p6.jpg"),
("258","9","1525946996p7.jpg"),
("259","9","1525946996p8.jpg"),
("260","9","1525946996p10.jpg"),
("261","9","1525946996p11.jpg"),
("262","9","1525946996p12.jpg"),
("274","10","1525947050p1.jpg"),
("275","10","1525947050p2.jpg"),
("276","10","1525947050p3.png"),
("277","10","1525947050p4.jpg"),
("278","10","1525947050p5.jpg"),
("279","10","1525947050p6.jpg"),
("280","10","1525947050p7.jpg"),
("281","10","1525947050p8.jpg"),
("282","10","1525947050p9.jpg"),
("283","10","1525947050p11.jpg"),
("284","10","1525947050p12.jpg"),
("285","11","1525947909p1.jpg"),
("286","11","1525947909p2.jpg"),
("287","11","1525947909p3.png"),
("288","11","1525947909p4.jpg"),
("289","11","1525947909p5.jpg"),
("290","11","1525947909p6.jpg"),
("291","11","1525947909p7.jpg"),
("292","11","1525947910p8.jpg"),
("293","11","1525947910p9.jpg"),
("294","11","1525947910p10.jpg"),
("295","11","1525947910p12.jpg"),
("296","13","1526044105p1.jpg"),
("297","13","1526044105p2.jpg"),
("298","13","1526044106p3.png"),
("299","13","1526044106p4.jpg"),
("300","13","1526044106p5.jpg"),
("301","13","1526044106p6.jpg"),
("302","13","1526044106p7.jpg"),
("303","13","1526044106p8.jpg"),
("304","13","1526044106p9.jpg"),
("305","13","1526044106p10.jpg"),
("306","13","1526044106p11.jpg"),
("307","13","1526044106p12.jpg"),
("308","14","152731796915726573_376292779379299_5440191946349331892_n.jpg"),
("309","15","152731827317097422_410184132656830_8251996522672010419_o.jpg"),
("340","19","1531029611profile-img.jpg"),
("341","19","1531029611flower-2.jpg"),
("342","19","1531029611flower-3.jpg"),
("343","19","1531029611flower-4.jpg"),
("344","19","1531029611p1.jpg"),
("345","19","1531029611p2.jpg"),
("346","19","1531029611profile1.jpg"),
("347","19","1531029611profile2.jpg"),
("348","19","1531029612profile3.jpg"),
("349","19","1531029612profile4.jpg"),
("350","20","1536036867681494500w.jpg"),
("351","20","1536036867Baptiste-Giabiconi-French-male-model-closermag.fr_.jpg"),
("352","20","1536036867edgymodel3.jpg"),
("353","20","1536036867malemodel9.jpg"),
("356","22","1537773634newarrival-1.jpg"),
("357","22","1537773634newarrival-2.jpg"),
("358","22","1537773634newarrival-3.jpg"),
("372","26","1538474253flower-1.jpg"),
("373","26","1538474253flower-2.jpg"),
("374","26","1538474253flower-3.jpg"),
("375","26","1538474253flower-4.jpg"),
("376","26","1538474253profile4.jpg"),
("377","27","1538802541flower-1.jpg"),
("378","27","1538802541flower-2.jpg"),
("379","27","1538802541flower-3.jpg"),
("380","27","1538802541flower-4.jpg"),
("381","27","1538802541profile1.jpg"),
("382","27","1538802541profile2.jpg"),
("383","27","1538802541profile3.jpg"),
("384","27","1538802541profile4.jpg"),
("385","28","1538972051f-product-1.jpg"),
("386","28","1538972051f-product-2.jpg"),
("387","28","1538972051f-product-3.jpg"),
("388","29","1538988390flower-1.jpg"),
("389","29","1538988390flower-2.jpg"),
("390","29","1538988390flower-3.jpg"),
("391","29","1538988390flower-4.jpg"),
("392","29","1538988390profile1.jpg"),
("393","29","1538988391profile2.jpg"),
("394","29","1538988391profile3.jpg"),
("395","29","1538988391profile4.jpg"),
("396","30","1541225686flower-1.jpg"),
("397","30","1541225687flower-2.jpg"),
("398","30","1541225687flower-3.jpg"),
("399","30","1541225687flower-4.jpg"),
("400","30","1541225687profile1.jpg"),
("401","30","1541225687profile2.jpg"),
("402","30","1541225687profile3.jpg"),
("403","30","1541225687profile4.jpg");



DROP TABLE IF EXISTS generalsettings;

CREATE TABLE `generalsettings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bgimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cimg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `fax` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_text` text COLLATE utf8mb4_unicode_ci,
  `np` int(11) NOT NULL DEFAULT '0',
  `fp` int(11) NOT NULL DEFAULT '0',
  `pb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pcheck` tinyint(4) NOT NULL DEFAULT '1',
  `scheck` tinyint(4) NOT NULL DEFAULT '1',
  `mcheck` tinyint(4) NOT NULL DEFAULT '1',
  `bcheck` tinyint(4) NOT NULL DEFAULT '1',
  `ccheck` tinyint(4) NOT NULL DEFAULT '1',
  `mmi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` int(191) unsigned NOT NULL,
  `vid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vidimg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `sign` tinyint(1) NOT NULL DEFAULT '0',
  `slider` tinyint(4) NOT NULL DEFAULT '1',
  `category` tinyint(4) NOT NULL DEFAULT '1',
  `sb` tinyint(4) NOT NULL DEFAULT '1',
  `hv` tinyint(4) NOT NULL DEFAULT '1',
  `ftp` tinyint(4) NOT NULL DEFAULT '1',
  `lp` tinyint(4) NOT NULL DEFAULT '1',
  `pp` tinyint(4) NOT NULL DEFAULT '1',
  `lb` tinyint(4) NOT NULL DEFAULT '1',
  `bs` tinyint(4) NOT NULL DEFAULT '1',
  `ts` tinyint(4) NOT NULL DEFAULT '1',
  `bl` tinyint(4) NOT NULL DEFAULT '1',
  `colors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bimg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loader` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_section` tinyint(10) NOT NULL DEFAULT '0',
  `order_title` text COLLATE utf8mb4_unicode_ci,
  `order_text` text COLLATE utf8mb4_unicode_ci,
  `cart_success` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wish_success` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wish_error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wish_remove` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invalid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_change` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_change` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_found` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_already` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_charge` int(191) DEFAULT '0',
  `withdraw_fee` int(191) NOT NULL DEFAULT '0',
  `fixed_commission` int(191) DEFAULT '0',
  `percentage_commission` int(191) DEFAULT '0',
  `tax` int(191) DEFAULT '0',
  `ship_info` tinyint(10) NOT NULL DEFAULT '0',
  `multiple_ship` int(191) NOT NULL DEFAULT '0',
  `is_talkto` tinyint(1) NOT NULL DEFAULT '1',
  `talkto` text COLLATE utf8mb4_unicode_ci,
  `subscribe_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_text` text COLLATE utf8mb4_unicode_ci,
  `subscribe_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subscribe` tinyint(1) NOT NULL DEFAULT '1',
  `is_language` tinyint(1) NOT NULL DEFAULT '1',
  `reg_vendor` tinyint(1) NOT NULL DEFAULT '1',
  `rtl` tinyint(1) NOT NULL DEFAULT '0',
  `is_affilate` tinyint(1) NOT NULL DEFAULT '0',
  `affilate_charge` int(191) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO generalsettings VALUES("1","1541494486logo.png","1541494510favicon.ico","eOrangeShop","https://www.eorange.shop","1534401824Slider-image3.jpg","1535429167review-bg.jpg","Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae","House: 5A, Road: 136/137, Gulshan 1, Dhaka-1212.","01714-070175","01714-070175","info@eorange.shop","COPYRIGHT 2018&nbsp;","Lorem ipsum dolor sit amet","https://geniusocean.com/","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!","0","10","junajunnun@gmail.com","pk_test_UnU1Coi1p5qFGwtpjZMRMgJM","sk_test_QQcg3vGsKRPlW6T3dXcNJsor","1","1","0","0","1","<span style=\"font-weight: 700; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: none; font-family: Raleway, sans-serif;\">Faites vos depots sur les numero suivant 42784249 / 78939896 / 04835863</span>","<span style=\"font-weight: 700; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: none; font-family: Raleway, sans-serif;\">Bank Compte Bancaire</span>","5","https://www.youtube.com/watch?v=_sI_Ps7JSEk","1535432669video-bg.jpg","a,b,c,d,x,y,z,k","0","1","1","1","1","1","1","1","1","1","1","1","#fe6801","1539851805images.JPG","1541494566loading.gif","Deal of The Day","GET UP TO 50% OFF","2018/09/27","https://www.google.com/","1536044322countdown-cover.jpg","0","<h1 class=\"text-center\" style=\"font-family: Rubik, sans-serif; font-weight: 500; color: green;\">Congratulation !!</h1>","<h2 style=\"font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 51, 51); font-size: 36px; text-align: center;\">Your Order Has been Confirmed.</h2>","Successfully Added To Cart.","Out Of Stock !!","Successfully Added To Wishlist.","Already Added To Wishlist !!","Successfully Remove From Wishlist..","Invalid Input !!","Color has Changed Successfully.","Size Has Changed Successfully.","Coupon Applied Successfully","No Coupon Found.","This Coupon Has Already Been Applied.","5","5","3","5","10","1","1","0","<script type=\"text/javascript\">\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n(function(){\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\ns1.async=true;\ns1.src=\'https://embed.tawk.to/5be158c345840924fe2352cd/default\';\ns1.charset=\'UTF-8\';\ns1.setAttribute(\'crossorigin\',\'*\');\ns0.parentNode.insertBefore(s1,s0);\n})();\n</script>","NEWSLETTER","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita porro ipsa nulla, alias, ab minus.","1539773680Slider-image3.jpg","1","1","1","0","1","8");



DROP TABLE IF EXISTS images;

CREATE TABLE `images` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO images VALUES("3","1538057747banner-2.jpg","https://www.google.com/"),
("4","1538058113banner-1.jpg","https://www.google.com/");



DROP TABLE IF EXISTS languages;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fht` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `h` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vdn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faqs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maq` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `con` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cop` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `signin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `signup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `suf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `suph` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sucp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logout` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `np` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rnp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chnp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rds` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hcs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lns` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ston` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fpw` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fpt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fpe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fpb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `al` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ec` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sbg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dopd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dopr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doci` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `don` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doem` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `md` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doph` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dofx` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dofpl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dotpl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogpl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dolpl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doeml` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doupl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `success` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dttl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ddesc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fpr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cremove` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cimage` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cproduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cquantity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupice` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cst` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `odetails` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdetails` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `onow` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ships` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipss` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickups` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `onotes` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickupss` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogss` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogsss` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctry` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sctry` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ecpn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acpn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ds` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ft` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enter_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_sale` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_special` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_sale` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_arrival` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_now` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minute` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wish_list` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favorite_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_processing` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_completed` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_all` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_categories` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wishlists` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wish_head` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_accounts` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO languages VALUES("1","English","HOME","MY ACCOUNT","My Cart","Your Cart is Empty.","Total","CHECKOUT","VIEW CART","ABOUT US","BLOG","BLOG","FAQ","FREQUENTLY ASKED QUESTION","Most Asked Questions","CONTACT US","Your Name","Your Phone","Your Email","Write a Reply","Sign In","LOGIN","Sign Up","Create a new account","Review Description","Postal Code","HAPPY CUSTOMERS","Password","Confirm Password","Dashboard","Edit Profile","Change Password","Logout","Current Password","New Password","Re-Type New Password","Change Password","Top Category","Top Rate","Add To Cart","LATEST BLOGS","Best Sellers","VIEW DETAILS","Subscribe Our Newsletter","SUBSCRIBE","FOOTER LINKS","Send Message","Forgot your Password?","Forgot Password","Email Address","SUBMIT","Orders","Already Have Account? Login","Featured","Out Of Stock","Search","Search For Product","In Stock","Search Result","Source","Qty","Size","Quick Review","Filter Option","Sort By Latest Product","Sort By Oldest Product","Sort By Lowest Price","Sort By Highest Price","All Categories","Price","Search","Popular Tags","Tag","Full Name","Select Payment Method","Paypal","Credit Card","Submit Review","No Review","Related Products","City","Address","Phone Number","Fax","Your rating is","Mobile Money","Bank Wire","Cash On Delivery","Email Address","Update Profile","Enter Your Email","Successfully updated your profile","Reviews","Full Description","Return & Policy","Write a Review","Remove","Image","Product Name","Edit","Quantity","Unit Price","Sub Total","Continue Shopping","Proceed Checkout","Order Details","Billing Details","Shipping Cost","Order Now","Ship To Address","Ship to a Different Address?","Pick Up","Select a PickUp Location","Order Notes","Transaction ID#","Pickup From The Location you Selected","BLOG DETAILS","Recent Posts","Contact","Country","Select Country","Coupon Code","Enter Your Coupn Code","Apply Coupon","Discount","Final Total","What People Are Saying","See How it Works","Enter Code","Support","Product Details Page","Hot Sale","Latest Special","Big Save","FEATURED PRODUCTS","NEW ARRIVAL PRODUCTS","SHOP NOW!","Week(s)","Day(s)","Hour(s)","Minute(s)","Second(s)","View Website","Wishlists","Favorite Product(s)","Order(s) Processing !","Order(s) Completed !","View All","All Categories","WISHLIST","Wishlisted Product","OTHERS","Color","Shop Name","Description","Linked Accounts"),
("2","Bangla","হোম","আমার অ্যাকাউন্ট","আমার অ্যাকাউন্ট","আমার অ্যাকাউন্ট","মোট","চেকআউট","কার্ট টেক্সট","পাঠ্য","ব্লগ","ব্লগস","ফক","ফক শিরোনাম","ফ্যাক পৃষ্ঠা শিরোনাম","যোগাযোগ","যোগাযোগের নাম","ফোনে  যোগাযোগ করুন","যোগাযোগ ইমেইল","যোগাযোগ করুন","সাইন ইন","লগইন করুন","সাইন আপ","সাইন আপ করুন","পর্যালোচনা বিবরণ","পোস্টাল কোড","শুভ গ্রাহক","সাইন আপ পাসওয়ার্ড","সাইন আপ পাসওয়ার্ড নিশ্চিত করুন","ড্যাশবোর্ড","প্রোফাইল সম্পাদন","পাসওয়ার্ড রিসেট","সাইন আউট","বর্তমান পাসওয়ার্ড","নতুন পাসওয়ার্ড","নতুন পাসওয়ার্ড পুনরায় টাইপ করুন","পাসওয়ার্ড পরিবর্তন","শীর্ষ বিভাগ","শীর্ষ হার","কারটে যোগ করুন","সর্বশেষ ব্লগ","সেরা বিক্রেতা","বিস্তারিত দেখুন","সাবস্ক্রাইব করুন","সাবস্ক্রাইব করুন","ফুটের লিংক","যোগাযোগ  করুন","পাসওয়ার্ড ভুলে গেছি","আপনি কি পাসওয়ার্ড ভুলে গেচেন ?","ইমেইল","ক্লিক করুন","নতুন অ্যাকাউন্ট ক্রিয়েট করুন","অলরেডি অ্যাকাউন্ট আছে","বৈশিষ্ট্যযুক্ত","আউট অফ স্টক","শিরোনাম","স্থানধারক পাঠ্য সন্ধান","উপলভ্য","অনুসন্ধান ফলাফল","ব্লগ উত্স","পরিমাণ","আকার","দ্রুত পর্যালোচনা","ফিল্টার অপশন","সর্বশেষ লেখা সাজান","প্রাচীনতম পাঠ্যক্রম সাজান","সর্বনিম্ন পাঠ্য সাজান","সাজানোর সর্বোচ্চ","সমস্ত বিভাগ","মূল্য","মূল্য অনুসন্ধান","জনপ্রিয় ট্যাগ","ট্যাগ","সম্পূর্ণ নাম","পেমেন্ট পদ্ধতি","পেপ্যাল","ক্রেডিট কার্ড","রেভিএও সাবমিত করুন","নো রেভিএও","সম্পর্কিত পণ্য","সিটি","ঠিকানা","ফোন নম্বর","ফ্যাক্স","আপনার রেটিং","মোবাইল মানি","ব্যাংক ওয়্যার","ক্যাশ অন ডেলিভারি","ইমেল ঠিকানা","আপডেট","স্থানধারক পাঠ্যক্রম সাবস্ক্রাইব করুন","আপনি সাকসেসফুল্ভাবে আপডেত করেছেন","পর্যালোচনা","সম্পূর্ণ বর্ণনা","ফেরত এবং নীতি","একটি পর্যালোচনা লিখুন","কার্ট মুছে ফেলুন","ইমেজ","পণ্য নাম","সম্পাদনা","পরিমাণ","ইউনিট মূল্য","সাব টোটাল","শপিং চালিয়ে যান","চেকআউটে এগিয়ে যান","অর্ডার","বিলিং বিবরণ","শিপিং খরচ","অর্ডার করুন","শিপ করুন","অন্য ঠিকানা্তে শিপ করুন","বাছাই করুন","লোকেশান পিক করুন","অর্ডার নোট","ট্রান্সাকশন","লোকেশান পিক করুন","ব্লগ বিবরণ","সাম্প্রতিক পোস্ট","ব্লগ যোগাযোগ","দেশ","দেশ  নির্বাচন করুন","কুপন কোড","কুপন টেক্সট","কুপন  প্রয়োগ করুন","ডিসকাউন্ট","চূড়ান্ত মোট","পর্যালোচনা শিরোনাম","ভিডিও শিরোনাম","এন্টার কোড","সাপোর্ট","পণ্য বিবরণ","হট বিক্রয়","সর্বশেষ বিশেষ","বড় সংরক্ষণ","বৈশিষ্ট্যযুক্ত পণ্য","নতুন আগমনের পণ্য","এখনই কেনাকাটা করুন","সপ্তাহের","দিন","ঘন্টা","মিনিট","সেকেন্ড","ওয়েবসাইট দেখুন","উইশলিস্ট","প্রিয় পণ্য","অর্ডার প্রক্রিয়াকরণ","অর্ডার সম্পূর্ণ","সব দেখুন","সমস্ত বিভাগ","ফ্রন্ট পেজ উইশ লিস্ট","ফ্রন্ট পেজ উইশ লিস্ট শিরোনাম","অন্য","রঙ","দোকানের নাম","ভেন্ডর ডেস্ক্রিপ্সন","লিঙ্কড অ্যাকাউন্ট");



DROP TABLE IF EXISTS messages;

CREATE TABLE `messages` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `conversation_id` int(191) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_user` int(191) DEFAULT NULL,
  `recieved_user` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS notifications;

CREATE TABLE `notifications` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `order_id` int(191) unsigned DEFAULT NULL,
  `user_id` int(191) DEFAULT NULL,
  `product_id` int(191) DEFAULT NULL,
  `conversation_id` int(191) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `cart` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalQty` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_amount` float NOT NULL,
  `txnid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_zip` varchar(255) DEFAULT NULL,
  `shipping_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','processing','completed','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `affilate_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affilate_charge` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sign` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_value` double NOT NULL,
  `shipping_cost` double NOT NULL,
  `tax` int(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO orders VALUES("7","0","BZh91AY&SY§|\0\"ßP Xø-ïüd¿ÿÿú`\n-\0\0\0ÅJ\0 P\0J!¡¦@ \0\0sFLL\0LFi#ÉFÑ\0`AÁ2`4dÄÀÄ`Fb0L`¥&¡\0\0\0\0Ð\0R &01#ÔfÚ0aF©ÀIÌëwÞ¼eúçï}¯Ñð\\ð¢üØn8Æ²? Àüp?Þµ¶ffff33a¡ýFÔÙaúá©[aµXlì<XaÔËcJ\\ºCFNÏ¥Î·®#Qr.CÙ9«M8àâ³Ba(Zwu p¹¤Fy«æ-~Õõ¬±2ÁÒ$Øy;Ý/[OÅö´ô<ï£M<ç\'òW´¯z±_±ìcn´òÙìx6bÞcé<_stý÷þ^÷ÜäâèäÀ¶e^êS¶añÞ»¸8<ìoö»	XÊ¯±¦ïpçbäÞ­ïÉ¥:°9´ÐnàÕwæ£+²°s¬¼XÇÐÇºy<¹àûÝ]ÕÖex<G{SUÅÑ»Té­ÓgVLz]1»k¸:)¡­VF«gsÅÕÙÁÄïs»9´uvq;7;9¿&î,Þ¶×C©Üwßµl¼7Ú<+³½âË¿;4èc#»ÖêÙ9¸1<nîÃv+2²³jºïÛsÖg6½nåty;77qvmL»4ó8[6vw=oUµs­øoÂn9ðÌìäâÆÏSg\'W¥ÒáË:º»ÛVôXWV«Í´oiçoläàìÓ³V;81Å×M7V*Þµ]Xæðpóºx¹7àâêó·jÏ<Ë³ÅÄáaáZV5YãV<\\Îþn­4çÐÝ§\'G\'&Û84r·p¸Ç+lt&¹ÖÕ§\'À`æ00l9Æca¡ÀrFÁÈl393¦w´7plÓq·­sedëUÝ7£(ÐÊ¸apq¼nhj%¬aÍÐàÜ«sz4êØÎ8KsJ»H¿s¹YOeWäe¬V	²,V&VV+êÐÜÃ*²5«%µ¡ï­kKe10¦ñª£U©¦dU¦°ëRÒÐ×&²qmUaÉÝW^¦±Úg~îððÛ/.\\¨\'õ®¸åZ­tÚ­c¼rpu9ØÊ·*Ã©¥[v=º÷ëÍe¤q%Évk­§á¿eoÞãø¶ìµÖàÒïÚÇ*à;Wueu­«wGs«£jëÎ7®Æ°rÎºéÛnU·ßüäüOÏøö¹ñ×ÅÉ\'ýÜüø4¯è«ùÿwú»¹åX×àùÇEiÞ8IâïW¾Çà?cÞûkê¯wVV+æm^×ÖÙñ{ß[gÁíÜ§¬Åµ~c+ïÉ0~üËûüÐûÇÚMú¹ÕÒ¼\\wg;ÞgÈô8·­|kíe{#ïWôÎO!Ê·¯\nâGì8WB²û×1©=éW9uÊÄ_cÁåw¼êwªä>#ÈxNã¸yQsSÐGéWÿMM*Ñ/f­+ö¹|xÇ÷«ìÌ8`ÊÁÃ¸w|MÇÂWÎ9ø«­uW²¶®å>AòWÈ?ì~cêz¶Å±ø]ÉÑ_)Øp}Ohð¯½Á¡ôIªä=Áï¯mv­äýjú\"ûòÊ&b¬ÀÌk#X¡À¼t^íÇJÃ,2aW©W¬xN#jùËCÄ}#ÐÁ8Vêû\\Çê8 >ð+ú«ÒW¨zÇë]zZù¶½\"ÃËZCÔÃÔ8×Ôua°è­Ú®zW±Ào&«qðýFâé\'Âº¥ò×YVãÈ®#ÿF«ß\'¾¸2L`Üï®u£î:Õ\\^b½#Ò5^9dÌÌf39VW!³ó2¾·öà¯¸W^¸;0öWaÞ5^ã\'ñÅt8+³a³xÊµ]:ÿá¼]æ[VÃí_={«|+ê¸`ÁbÁþUAÊ°`ÉF2±JÌI4UèÐÐòUÒOÚ=uéWÆ¸)ªFãUë§mÇ z\'ÃJ·.ÛW°vÜ]jðiYZ¨ëµz+UÀn9ÉÌ®Uÿ,wPâ8)_M~¾±ïp®áîSI;¤õHô«À`âh6«Í\\Î9ñ\nõú{ÇÁ\'Â°2°2²ÖVWÿ¹\"(HSÃ>\0","Cash On Delivery","shipto","","7","799.61","","","XO4G1541411584","Completed","junnun@gmail.com","S H Real","Bangladesh","01629552892","Houes: 307 Road: Moddho Azampur, Uttara, Dhaka","Dhaka","1230","","","","","","","","","eqwe","12.22","pending","2018-11-05 15:53:04","2018-11-05 15:53:04","","","$","1","10","10"),
("8","0","BZh91AY&SYç\0M_@àXø-üD¿ÿÿú`	\0ª(Í10¦a\0\0\0F4ÄÀF`\0\0aÓ`F\0\0	`sLLiF\0\0\0&¤F¦L@4ÙO\"¨=&Ôa¨$ MÐ(bôô§¦ÔýDõ=Fe\0\nW*£é^[®Êù×}öÝéÑ÷åò3s²¯¼Èü2?É¼ÖÙfÆôa¹[_¦§üJÞ7tÏÉÂq­M\\§«&Ns.3y©qÉÉ®ó52ºæ.´âes2VdÒMðÔXþ\"TlÇñ|w·ÙuþZÛ)ÎOÃz¤ô\'®y%JEJ)\"¥t-\'7¹º,ù¿Ï£µÕª:»VScW©ñ\'ÄOA(³ê}NÃ~.NãêÆsd]gÚó`ÃÁð|²hàðn¹ÒUr³¦Ú3.âóv6L0´æ¤ìzFRÄ²óÒºTI}ìRss^KJ%I­¤°©.Ýwk54uSÑí]¥ÍàÃps*r^(;ÔM)+Ðn¤]ái²MÒÖK§G6íÙ²gÉÍÕÁÍ%[:.§U*Yá5:I-$çd²6½é¯5dè©½Ô»ÊÉ·Ú)ÑE©f³mäºDt©2áÉÉ0ÍVNîÇ8­§Ó&î÷c#(H©:RY5Kã&!«6v_µÅØ]n×KÄ)*ÖO;¦0:¹Í­åk&NnnnK´i4IBnNì«¹³«YâÃW\'Fíµw±iN£$G97KwK¥ÝÛ\'-®®ÛmÍfKØ¼Ê`Õ8ÜÛò5·>yµç¸W3#¹£cGÄÚ:MåfYÆÎÊ­8°²Òa.Se%!²Y3LTÔÃ7dÃãÂ&¦Ò²Kf©dd	be&³ÍÇmRüguX¯åIGß251,FaYLVLdìÉ¤àjpY6­ò¯TÔÕÛSb°Ä¬ã&©VZ³Z±scV[Y¨a`¸á[Ói½´jrÚÕT¹Äk³~=½RU÷®²vÍ:w6§)Ó8ÎéËy\0ÉÊhá2æk§ÁqÕVZ§\ntkµL&!ªTFIDÓ=uË{&zª¦VÏ]üXÑpLGÊMÓRn/%E×pjÉ£	®$É3J*ÚÚc4Æ1Ye5CéùÉïÉÛ\'Ö³`âQ(!>^Ù=º7J[Ñ&ø8I{rd\'ÆOÁ>äâMRdêò}æzî÷xIÀT²©.º|Ì{V¥a÷ùßÈÑñ4}§q´-\'(Él?k¢ÖÓ½nÒNç±³36IûÙ0õ§½IõÆJúIi7pn¦·èNé»xÍ^çS!ÿ§I©]çÂit3#)	x/ÚÕüï^ÚôNG´î<3²v\'m.IyÔù©úÍ¦«R½æ§s.ûW}ÑZ»ïaië§äv#Âd¬2a:£Â{m¹ìSÞtvç:z&ÓÀWy×wÎóÿ4ö;Þßï2yÎÉ¹=/\'Úuî²uOdôÓ	ZO4p»M©Õ7ôOYKãfIaUÀõÅ{\'×N&VLL>£Ý<Ó´ôÃë90Ê«Þ¡À÷Ç¾pºêºxêy)ô^#óãK+TÑò_ä8ÎaÎVÆÇM>ÛsÝo9ìeN&Ò°ÔØöësxè4pK®Ó*x*~Éâ10ÞwTâ~§ªWªp²VÐÞëñ0æ})ÅÚ\'Y:%UR©UMÉ¤ÞüïA×Odá;*yÔwyÔu3²þÙGI\nz-­êÈé¶ÌÃR½&ÑtGÔví69	íÂuOõbYaöL510Ã)V©VL©3\nV£	Ý£GaÆ2½Çy©ì\nÔ8YunxÏ<òÌ8K¢ì3É:*®g^5g=§jdàntJè©Ê®gàoTú|\'ï¸Ng}/ÖÑÎWT¯)ä;¯!¼í5håm\'/É£Ó{Nc%~óOú#ÔzÒ½s#&FLÖLü]ÉáBBNc,","bKash","shipto","","10","469.72","asdsadasdasdas","","slRl1541411640","Completed","junnuns@gmail.com","Junnun","Bangladesh","01629552892","Houes: 307 Road: Moddho Azampur, Uttara, Dhaka\nHoues: 307 Road: Moddho Azampur, Uttara, Dhaka","Dhaka","1230","","","","","","","","","","","completed","2018-11-05 15:54:00","2018-11-05 16:26:02","","","$","1","10","10");



DROP TABLE IF EXISTS pages;

CREATE TABLE `pages` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` tinyint(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO pages VALUES("1","About Us","about","<div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 1<br></h2><p><span style=\"font-weight: 700;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 2<br></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 3<br></h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><h2 helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-weight:=\"\" 700;=\"\" line-height:=\"\" 1.1;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" margin:=\"\" 0px=\"\" 15px;=\"\" font-size:=\"\" 30px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\" style=\"font-family: \" 51);\"=\"\">Title number 9<br></h2><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>","1"),
("2","Privacy & Policy","privacy","<div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2><img src=\"https://i.imgur.com/BobQuyA.jpg\" width=\"591\"></h2><h2>Title number 1</h2><p><span style=\"font-weight: 700;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 2<br></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 3<br></h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><h2 helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-weight:=\"\" 700;=\"\" line-height:=\"\" 1.1;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" margin:=\"\" 0px=\"\" 15px;=\"\" font-size:=\"\" 30px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\" 51);\"=\"\" style=\"font-family: \">Title number 9<br></h2><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>","3"),
("3","Service","services","<div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 1<br></h2><p><span style=\"font-weight: 700;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 2<br></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2>Title number 3<br></h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><h2 helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-weight:=\"\" 700;=\"\" line-height:=\"\" 1.1;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" margin:=\"\" 0px=\"\" 15px;=\"\" font-size:=\"\" 30px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\" 51);\"=\"\" style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Title number 9<br></h2><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>","2");



DROP TABLE IF EXISTS pagesettings;

CREATE TABLE `pagesettings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_success` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_text` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` tinyint(4) NOT NULL DEFAULT '1',
  `a_status` tinyint(4) NOT NULL DEFAULT '1',
  `f_status` tinyint(4) NOT NULL DEFAULT '1',
  `bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bnimg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_currency` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pagesettings VALUES("1","Success! Thanks for contacting us, we will get back to you shortly.","admin@geniusocean.com","Drop Us a line","<div style=\"text-align: justify;\">Sifting through teaspoons of clay and sand scraped from the floors of caves, German researchers have to be managed to isolate ancient human DNA without turning up a single bone.</div>","<div style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2 style=\"box-sizing: border-box; font-family: inherit; font-weight: 700; line-height: 1.1; color: inherit; margin: 0px 0px 15px; font-size: 30px;\">Title number 1<br style=\"box-sizing: border-box;\"></h2><p style=\"box-sizing: border-box; margin: 0px 0px 10px;\"><strong style=\"box-sizing: border-box; font-weight: 700;\">Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2 style=\"box-sizing: border-box; font-family: inherit; font-weight: 700; line-height: 1.1; color: inherit; margin: 0px 0px 15px; font-size: 30px;\">Title number 2<br style=\"box-sizing: border-box;\"></h2><p style=\"box-sizing: border-box; margin: 0px 0px 10px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2 style=\"box-sizing: border-box; font-family: inherit; font-weight: 700; line-height: 1.1; color: inherit; margin: 0px 0px 15px; font-size: 30px;\">Title number 3<br style=\"box-sizing: border-box;\"></h2><p style=\"box-sizing: border-box; margin: 0px 0px 10px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"box-sizing: border-box; margin: 0px 0px 10px;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><h2 style=\"box-sizing: border-box; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-weight:=\"\" 700;=\"\" line-height:=\"\" 1.1;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" margin:=\"\" 0px=\"\" 15px;=\"\" font-size:=\"\" 30px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">Title number 9<br style=\"box-sizing: border-box;\"></h2><p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>","<div>\n<h2>What is Lorem Ipsum, Really?</h2>\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\n typesetting industry. Lorem Ipsum has been the industry\'s standard \ndummy text ever since the 1500s, when an unknown printer took a galley \nof type and scrambled it to make a type specimen book. It has survived \nnot only five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.</p>\n</div><div>\n<h2>Why do we use it?</h2>\n<p>It is a long established fact that a reader will be distracted by the\n readable content of a page when looking at its layout. The point of \nusing Lorem Ipsum is that it has a more-or-less normal distribution of \nletters, as opposed to using \'Content here, content here\', making it \nlook like readable English. Many desktop publishing packages and web \npage editors now use Lorem Ipsum as their default model text, and a \nsearch for \'lorem ipsum\' will uncover many web sites still in their \ninfancy. Various versions have evolved over the years, sometimes by \naccident, sometimes on purpose (injected humour and the like).</p>\n</div><br><div>\n<h2>Where does it come from?</h2>\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\n has roots in a piece of classical Latin literature from 45 BC, making \nit over 2000 years old. Richard McClintock, a Latin professor at \nHampden-Sydney College in Virginia, looked up one of the more obscure \nLatin words, consectetur, from a Lorem Ipsum passage, and going through \nthe cites of the word in classical literature, discovered the \nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \nCicero, written in 45 BC. This book is a treatise on the theory of \nethics, very popular during the Renaissance. The first line of Lorem \nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \ntheir exact original form, accompanied by English versions from the 1914\n translation by H. Rackham.</p>\n</div>\n<h2>Where can I get some?</h2>\n<p>There are many variations of passages of Lorem Ipsum available, but \nthe majority have suffered alteration in some form, by injected humour, \nor randomised words which don\'t look even slightly believable. If you \nare going to use a passage of Lorem Ipsum, you need to be sure there \nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \nIpsum generators on the Internet tend to repeat predefined chunks as \nnecessary, making this the first true generator on the Internet. It uses\n a dictionary of over 200 Latin words, combined with a handful of model \nsentence structures, to generate Lorem Ipsum which looks reasonable. The\n generated Lorem Ipsum is therefore always free from repetition, \ninjected humour, or non-characteristic words etc.</p>","1","1","1","https://www.google.com/","1525536094Banner1.png","1");



DROP TABLE IF EXISTS payment_gateways;

CREATE TABLE `payment_gateways` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO payment_gateways VALUES("2","Rocket","<b>Rocket Mobile No: 01728068515<br>Rocket Reference No: 6622</b>","1"),
("3","bKash","<div style=\"text-align: left;\"><b>Mobile Number: 01732716885</b></div><b><div style=\"text-align: left;\"><b>Reference Number: 778899</b></div></b>","1"),
("4","QuickCash","<b>MOBILE NUMBER: 9038423432849</b>","0"),
("5","Easy Cash","<b>Please Call at 98989898989</b>","1");



DROP TABLE IF EXISTS payments;

CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `paid_amount` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `process_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO payments VALUES("5","24","txn_1CAM4hJlIV5dN9n7wuIhtbMO","10","Completed","Vo1522173546","no","Stripe","ch_1CAM4gJlIV5dN9n74exxkQUJ","2018-03-27 23:59:10"),
("6","24","txn_1CAM9BJlIV5dN9n7L95Yg4RU","10","Completed","wp1522173824","yes","Stripe","ch_1CAM9AJlIV5dN9n7GA4akuVa","2018-03-28 00:03:48"),
("8","13","9V52144530246673F","10","Completed","nm1522227283","no","Paypal","","2018-03-28 14:54:43"),
("9","13","4TL74232C9274030Y","10","Completed","YM1522227864","yes","Paypal","","2018-03-28 15:04:24"),
("10","22","txn_1CAhOaJlIV5dN9n7SscUvo5B","20","Completed","6R1522255501","yes","Stripe","ch_1CAhOaJlIV5dN9n740fbr6Rf","2018-03-28 22:45:08"),
("16","7","txn_1CAipgJlIV5dN9n75bFj2vtM","10","Completed","1Y1522261025","no","Stripe","ch_1CAipfJlIV5dN9n7OlUy3ugI","2018-03-29 00:17:12"),
("17","10","txn_1CB5PGJlIV5dN9n7CCj5x5mf","10","Completed","cw1522347801","yes","Stripe","ch_1CB5PFJlIV5dN9n7EL0KpPKJ","2018-03-30 00:23:25"),
("18","10","txn_1CB5VOJlIV5dN9n75O7lhQvU","10","Completed","1N1522348180","yes","Stripe","ch_1CB5VOJlIV5dN9n7PEuwYLuy","2018-03-30 00:29:46");



DROP TABLE IF EXISTS pickups;

CREATE TABLE `pickups` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO pickups VALUES("2","Azampur"),
("3","Dhaka"),
("4","Kazipara"),
("5","Kamarpara"),
("6","Uttara");



DROP TABLE IF EXISTS portfolios;

CREATE TABLE `portfolios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO portfolios VALUES("3","David Smith","1535429478review-profile.png","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra justo quis ligula ullamcorper scelerisque. Quisque tempor nulla quis sapien malesuada ultricies. Nullam sapien elit, laoreet congue sapien eget, suscipit imperdiet nisi. Vivamus rutrum lectus eu urna ullamcorper porta. Nullam sapien elit"),
("4","EBangladesh","1535429473review-profile.png","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra justo quis ligula ullamcorper scelerisque. Quisque tempor nulla quis sapien malesuada ultricies. Nullam sapien elit, laoreet congue sapien eget, suscipit imperdiet nisi. Vivamus rutrum lectus eu urna ullamcorper porta. Nullam sapien elit"),
("5","The Usual Suspects","1535429467review-profile.png","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra justo quis ligula ullamcorper scelerisque. Quisque tempor nulla quis sapien malesuada ultricies. Nullam sapien elit, laoreet congue sapien eget, suscipit imperdiet nisi. Vivamus rutrum lectus eu urna ullamcorper porta. Nllam sapien elit"),
("6","Mr. XYZ","1535429726review-profile.png","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra justo quis ligula ullamcorper scelerisque. Quisque tempor nulla quis sapien malesuada ultricies. Nullam sapien elit, laoreet congue sapien eget, suscipit imperdiet nisi. Vivamus rutrum lectus eu urna ullamcorper porta. Nllam sapien elit");



DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(191) unsigned NOT NULL,
  `subcategory_id` int(191) unsigned DEFAULT NULL,
  `childcategory_id` int(191) unsigned DEFAULT NULL,
  `user_id` int(191) NOT NULL DEFAULT '0',
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cprice` float NOT NULL,
  `pprice` float DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(191) DEFAULT NULL,
  `policy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `views` int(191) unsigned NOT NULL DEFAULT '0',
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `best` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `top` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `hot` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `latest` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `big` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `features` text,
  `colors` text,
  `product_condition` tinyint(1) NOT NULL DEFAULT '0',
  `ship` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_meta` tinyint(1) NOT NULL DEFAULT '0',
  `meta_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO products VALUES("1","11","8","14","0","product 1","1525800263p1.jpg","X,XL,XXL,M,L,S","","37.8","55.9","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></div>","98","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","53","a,b,c,d","2018-05-08 23:24:23","2018-11-05 11:34:09","1","0","1","0","1","0","","","0","","0","",""),
("2","11","8","15","0","product 2","1525800359p2.jpg","","","36.9","66.7","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","16","x,y,z,k","2018-05-08 23:25:59","2018-09-25 11:31:01","0","1","0","1","0","1","","","0","","0","",""),
("3","11","8","16","0","product 3","1525800436p3.png","X,XL,XXL,M,L,S","","59.5","77.33","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","20","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","55","a,b,c,d","2018-05-08 23:27:16","2018-10-06 13:10:34","1","0","1","0","1","0","","","0","","0","",""),
("4","11","9","17","13","product 4","1525800516p4.jpg","","","44.7","77.5","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","25","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","31","x,y,z,k","2018-05-08 23:28:36","2018-09-26 14:42:42","0","1","0","1","1","0","","","0","","0","",""),
("5","11","9","18","13","product 5","1525800616p5.jpg","X,XL,XXL,M,L,S","","33.2","62.3","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","96","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","174","a,b,c,d","2018-05-08 23:30:16","2018-10-28 13:09:31","1","0","1","0","1","0","","","0","","0","",""),
("6","11","10","19","13","product 6","1525800677p6.jpg","","","63.43","79.76","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","24","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","9","x,y,z,k","2018-05-08 23:31:17","2018-09-27 10:30:27","0","1","0","1","0","1","","","0","","0","",""),
("7","11","11","","13","product 7","1525800788p7.jpg","X,XL,XXL,M,L,S","","65.6","84.56","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","96","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","57","a,b,c,d","2018-05-08 23:33:08","2018-10-06 13:10:34","1","0","1","0","1","0","","","0","","0","",""),
("8","11","12","","13","product 8","1525800874p8.jpg","","","85.23","102.32","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","25","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","8","x,y,z,k","2018-05-08 23:34:34","2018-10-06 11:34:00","0","1","0","1","0","1","","","0","","0","",""),
("9","11","10","","13","product 9","1525800963p9.jpg","X,XL,XXL,M,L,S","","88.96","104.22","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","94","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","23","a,b,c,d","2018-05-08 23:36:03","2018-10-07 12:57:33","1","0","1","0","1","0","","","0","","0","",""),
("10","11","10","","13","product 10","1525801012p10.jpg","","","96.3","112.73","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","100","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","28","x,y,z,k","2018-05-08 23:36:52","2018-10-03 21:17:23","0","1","0","1","0","1","","","0","","0","",""),
("11","11","9","17","13","product 11","1525855162p11.jpg","","","104.2","125.94","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","100","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","22","x,y,z,k","2018-05-08 23:36:52","2018-10-28 10:26:25","0","1","0","1","0","1","","","0","","0","",""),
("12","12","","","13","product 12","1525855140p12.jpg","X,XL,XXL,M,L,S","","15.54","44.78","<span style=\"font-size: 16px; text-align: justify;\"><b>Contrary </b>to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","19","<div style=\"text-align: justify;\"><span style=\"font-size: 16px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"font-size: 16px;\"><br></span></div>","1","34","a,b,c,d","2018-05-08 23:38:08","2018-10-06 13:10:34","1","0","1","0","1","0","","","0","","0","",""),
("13","11","8","14","13","product 13","1526044105profile3.jpg","X,XL,XXL,M,L,S","","19.65","56.9","<div style=\"text-align: justify;\"><div style=\"text-align: justify;\"><div style=\"text-align: justify;\">&nbsp; <b>Lorem </b>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div><div style=\"text-align: justify;\">&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div><div style=\"text-align: justify;\">&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div><div style=\"text-align: justify;\">&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div><div style=\"text-align: justify;\">&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div><div style=\"text-align: justify;\">&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div></div></div>","79","<div style=\"text-align: justify;\">&nbsp; Lorem ipsum dolor sit amet, <b>consectetur </b>adipisicing elit, sed do eiusmod</div><div style=\"text-align: justify;\">&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div><div style=\"text-align: justify;\">&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div><div style=\"text-align: justify;\">&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div><div style=\"text-align: justify;\">&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div><div style=\"text-align: justify;\">&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>","1","42","a,b,c,d","2018-05-11 19:08:25","2018-11-05 15:54:00","1","0","1","0","1","0","","","0","","0","",""),
("14","12","","","13","Girl\'s top","152731796915726573_376292779379299_5440191946349331892_n.jpg","X,XL,XXL,M,L,S","","500","800","dgdfg dsdfsd fdgdf","70","hgjhk","1","8","a","2018-05-26 22:59:29","2018-11-05 15:53:04","1","0","1","0","1","0","","","0","","0","",""),
("15","12","","","13","Women cloth\'s","152731827317097974_410184155990161_4279865736148838194_o.jpg","X,XL,XXL,M,L,S","","1000","1200","xcds sdfds df","100","dsf dfdsf dfd","1","6","","2018-05-26 23:04:33","2018-10-03 21:16:32","0","1","0","1","0","1","","","0","","0","",""),
("19","11","8","14","13","Test","1531029611flower-1.jpg","X,XL,XXL,M,L,S","","12","44","Test","100","Test","1","81","Tes,t,t1,t2","2018-07-08 12:00:11","2018-10-28 09:48:24","0","1","0","1","0","1","","","0","","0","",""),
("20","11","8","14","13","LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM,","1536036867maxresdefault.jpg","X,XL,XXL,M,L,S","","44","77","asd","63","asd","1","109","a,b,c,d,e,f,g","2018-09-04 10:54:27","2018-11-05 11:36:07","1","1","1","1","1","1","Cool,Amazing,Beautiful","#5f45ef,#99f0e3,#cda425","0","","0","",""),
("21","11","8","14","13","Dummy","1536505736newarrival-3.jpg","X,XL,XXL,M,L,S","#cb3807,#b12121,#21b1b1,#cf0309,#aa282c,#7d9b37,#bbc50e,#2215bd,#ff80ff","66","99","asd","70","asdas","1","22","","2018-09-09 21:08:56","2018-11-05 15:54:00","1","1","1","1","1","1","Wonderful,Beautiful,Fantastic","#000000,#a522e3,#ebcf50","0","","0","",""),
("22","11","8","14","13","PubG","1537773634f-product-1.jpg","X,XL,XXL,M,L,S","#496f89,#b51ea2,#94893f,#2ba83e","44","88","<span style=\"font-weight: 700; font-size: 16px; text-align: justify;\">Contrary&nbsp;</span><span style=\"font-size: 16px; text-align: justify;\">to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","63","<span style=\"font-size: 16px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br>","1","81","","2018-09-24 13:20:34","2018-11-05 15:54:00","1","1","1","1","1","1","Beautfui,Great","#000000,#2b40a2","0","","0","",""),
("26","11","8","14","13","Product 420","1538474253profile2.jpg","X,XL,XXL,M,L,S","#93953e,#bc1669,#a5842e,#bdb015,#95339f,#508358,#3e339f","45","72","asdffdhgufhdgjklgjsfksdhfjkhsdjkfhsdjklhfkshdjfhksdj","42","dsadfdsgfdghhfdgdfgdfgdfgdfgdf","1","30","","2018-10-02 15:57:33","2018-11-05 15:54:00","1","1","1","1","1","1","","","0","","0","",""),
("27","11","8","14","13","San Andreas","1538802541flower-4.jpg","X,XL,XXL,M,L,S","#afc012,#353d9d,#84ac26,#20b327,#9c368a,#d20000","66","88","<span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Morbi ut velit viverra, laoreet diam sed, molestie erat. Etiam vestibulum lacinia sapien non cursus. Fusce ut turpis id sem convallis fermentum feugiat venenatis arcu. Vivamus varius aliquam dapibus. Sed sagittis vitae massa ut sagittis. Morbi varius felis nec commodo efficitur. Sed quis dignissim neque, at gravida massa. Maecenas sem arcu, maximus a tellus ac, condimentum sodales nisi. Nulla lobortis placerat hendrerit. Vivamus rhoncus odio at metus dignissim egestas ut et lectus. Proin non orci sit amet massa aliquet pretium eget vel dui. Vestibulum pretium dignissim vestibulum. Pellentesque eget enim eget neque fringilla mollis et vel diam. Nulla nec luctus nisi. Phasellus tincidunt ante molestie urna cursus, vitae rutrum mauris mollis. In semper orci ex, ac suscipit eros suscipit ac.</span><br>","44","<span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Etiam et sapien sollicitudin augue viverra tincidunt. Mauris dictum pulvinar justo sit amet tincidunt. Vestibulum ornare, dolor quis dignissim sollicitudin, tortor tortor pretium justo, ut tempus augue arcu quis urna. Praesent tristique ac urna id tempor. Maecenas et commodo nulla, quis ultricies arcu. Mauris ac ligula lectus. Integer placerat, dui et tristique fringilla, tellus est imperdiet odio, quis tristique felis ligula et augue. Sed feugiat mauris arcu, iaculis efficitur sem accumsan et. Donec felis mi, luctus quis neque sed, aliquet ultrices metus. Nunc vulputate lacus at ex maximus, sed ultrices dolor ornare. Curabitur sit amet dictum erat. Maecenas sem nibh, auctor non egestas eu, porta sed dui. Integer felis ante, ullamcorper vel hendrerit sed, tristique eu eros. Praesent iaculis pretium tempus. Vestibulum at ornare orci. Curabitur eu diam est.</span><br>","1","348","","2018-10-06 11:09:01","2018-11-05 11:00:18","1","1","1","1","1","1","50% of,Featured,Trending","#d0b61c,#ed4116,#24e350","0","","0","",""),
("28","11","8","14","13","GTA 7","1538972051f-product-2.jpg","X,XL,XXL,M,L,S","#0163d2,#1bb849,#8232a0,#ad1f1f,#20bfa0","55","86","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula erat, hendrerit ut rhoncus a, pellentesque dictum neque. Maecenas euismod odio quis elit efficitur auctor. Etiam imperdiet a ante quis cursus. Fusce mi justo, tristique eget lectus eu, ornare lacinia eros. Praesent ut justo ut nulla gravida viverra a a risus. Donec finibus placerat dui. Donec vitae est eget ex dictum rhoncus. Integer et nisl egestas, vulputate tellus sit amet, dignissim arcu. Vestibulum sit amet augue egestas, tempor est quis, consectetur elit. Nam ac libero id orci gravida tincidunt. Maecenas nunc nibh, aliquam et iaculis eget, hendrerit sed lectus. Duis in nunc vitae justo pulvinar tempor a faucibus ipsum. Nulla mollis venenatis mauris sit amet sagittis. Pellentesque pulvinar laoreet nulla auctor fringilla.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Maecenas ac fermentum sapien, quis faucibus odio. Maecenas sed pretium metus, sit amet gravida dolor. Sed pharetra metus vel massa convallis laoreet. Phasellus elementum eget magna ac congue. Suspendisse accumsan imperdiet sapien non interdum. Donec sed condimentum urna. Nulla facilisi. Aenean lobortis posuere neque non pretium. Aliquam luctus vulputate tempus. Morbi egestas felis nisi, eget maximus massa bibendum ut. Nunc augue leo, dapibus non nibh in, congue mollis dui. Donec venenatis congue justo, at sodales dui cursus et.</p>","177","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Cras et augue eget orci ultrices dignissim. Nullam placerat vehicula ex at finibus. Vestibulum posuere sapien sit amet lectus euismod, in rutrum orci pharetra. Pellentesque finibus libero ipsum, quis bibendum dui malesuada ut. Donec ut nibh pretium risus maximus convallis at vitae turpis. Proin finibus, diam a porta feugiat, ante dui laoreet nunc, a consectetur diam enim quis arcu. Praesent cursus ipsum tellus, sed volutpat nibh consequat at.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Vestibulum eget odio ultricies, consequat augue congue, condimentum magna. Nullam nec blandit risus, ac maximus ipsum. Nunc euismod id lectus sed consequat. Suspendisse nec tortor libero. Pellentesque finibus vel ex vel egestas. Aliquam eu erat accumsan, rutrum nisl at, bibendum lectus. Curabitur massa arcu, posuere a ante et, cursus porta sapien. In eleifend mi vel ipsum faucibus, quis tristique velit mollis. Curabitur blandit cursus vehicula. Pellentesque eleifend erat eget ligula fermentum placerat. Duis vitae viverra nunc. Etiam arcu magna, commodo in felis in, vulputate hendrerit eros. Quisque efficitur tristique elit ac varius. In mollis elementum lectus, vitae aliquam erat tincidunt sit amet. Nulla dignissim tortor eget commodo viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Mauris ultricies nulla ut ultrices elementum. Mauris ut magna nisl. Praesent nec orci nisl. Etiam vitae lorem velit. Etiam et risus sagittis, blandit nisi quis, pretium risus. Sed porta luctus ornare. Nam porta gravida nulla id blandit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum quis odio at pulvinar. Pellentesque volutpat molestie convallis.</p>","1","15","","2018-10-08 10:14:11","2018-11-05 15:54:00","1","1","1","1","1","1","Legend,Grand,Awesome","#c32525,#cb17b3,#3279a7","2","24 Hours","0","a,b,c,d,e","TEST"),
("29","11","8","14","0","Alpha XD","1538988390flower-2.jpg","X,XL,XXL,M,L,S","#215385,#8fb391,#1e63bb,#3bd2a8,#c531c5","45","88","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet est nec dui hendrerit placerat eget eu ante. Phasellus id eros a justo pulvinar tempus. Vivamus id rutrum nulla, id hendrerit odio. Aenean felis turpis, facilisis id malesuada eget, tincidunt ut mi. Aenean at ultrices tellus, tempus tempus nisl. Phasellus consequat suscipit congue. Praesent accumsan varius accumsan. Ut imperdiet tincidunt nulla non convallis. Donec condimentum vulputate ex, sed laoreet lorem maximus ut. Donec in suscipit urna. Aenean varius pulvinar auctor. Nam blandit mollis risus vel efficitur. Nulla at elit ac enim laoreet rutrum nec at mauris.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Nam pharetra efficitur erat, vel cursus turpis venenatis sed. Maecenas pharetra hendrerit ex, vel aliquam enim bibendum eget. Vivamus eget quam ex. Ut interdum, lorem vitae faucibus aliquet, elit augue lacinia nulla, sit amet lacinia lacus eros sed eros. Aliquam erat volutpat. Integer quis consequat magna, non vestibulum nisi. Suspendisse luctus malesuada suscipit. Vestibulum interdum odio felis, eget vulputate lectus egestas at. Morbi urna quam, lacinia id ligula id, malesuada maximus ante.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Nam eu dui sed tortor rhoncus dapibus ut sit amet tortor. Donec aliquet, lorem vel vehicula efficitur, eros enim suscipit turpis, at placerat lectus est ut urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean auctor eu nisl ut sagittis. Curabitur nec felis ac dolor ornare porttitor vel id lorem. Duis et metus magna. Proin auctor nulla est, et consequat justo vestibulum quis. In risus ex, sagittis hendrerit malesuada nec, consectetur sed ligula. Aliquam ac accumsan mi, eget bibendum nulla. Duis tristique hendrerit enim, at tincidunt turpis varius a. Proin ac ante pellentesque, finibus lorem eget, posuere mauris. Aliquam fermentum, nibh a dignissim molestie, lectus neque molestie ex, vel scelerisque leo lorem ac nisl. Vestibulum mi augue, volutpat id mi non, vulputate facilisis orci. Cras molestie nunc sit amet mi ultricies, id ullamcorper libero scelerisque.</p>","84","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Sed vel pulvinar sapien. Nulla eget lacus mauris. Donec a blandit turpis. Mauris gravida eget ante sagittis eleifend. Cras lectus lorem, luctus sed eleifend fringilla, viverra ut nunc. Morbi congue vel dolor a sagittis. Donec nec mi tempor, pretium enim eu, sodales tortor. Vestibulum convallis volutpat tortor et commodo. Sed finibus urna ut libero bibendum, ut posuere augue posuere. Morbi id facilisis mauris. Aliquam non sapien placerat, aliquam dui malesuada, sagittis massa.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Sed augue nunc, fringilla quis rutrum ac, dapibus sed quam. Maecenas iaculis, ipsum non porta fringilla, nisl magna elementum erat, ultricies sollicitudin tellus justo vel metus. Cras varius diam eget egestas pharetra. Proin tincidunt pellentesque imperdiet. Pellentesque id sapien odio. Vestibulum aliquam lorem ex, mollis posuere dui finibus sit amet. Morbi gravida ante nisl, ut sagittis dolor feugiat gravida. Sed luctus nisl eget tempus euismod. Ut molestie urna dolor, tincidunt imperdiet nisl imperdiet ac. Aenean nisl libero, ultricies auctor condimentum vel, cursus sed nulla.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Sed sem ligula, fermentum nec vulputate ut, condimentum at odio. Integer egestas ligula vel imperdiet elementum. Quisque mattis eros nec quam vestibulum lacinia. In porttitor, metus et efficitur suscipit, felis purus rutrum lacus, non luctus turpis purus id velit. Vestibulum nec lectus convallis, ullamcorper nisi ut, rutrum ex. Donec lacus magna, cursus sed semper rutrum, porta consectetur diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer feugiat leo non neque commodo, vel aliquam libero gravida. Vivamus sem erat, semper vitae dolor vitae, auctor laoreet odio. Aenean scelerisque pretium condimentum. Maecenas varius nec nisi quis aliquam. Curabitur dapibus lacus ac tempor elementum. Fusce condimentum, nisl eget viverra fringilla, tellus lacus hendrerit sapien, at cursus urna nisl non arcu. Nullam efficitur augue diam, id hendrerit felis rutrum ut. Vestibulum quis erat sem. Praesent quis nulla vel diam molestie condimentum faucibus vitae felis.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Phasellus at dui sit amet nulla pulvinar varius a id justo. Nullam vel porta nulla. Suspendisse sed consectetur lacus. Phasellus molestie iaculis odio vitae ultricies. Proin non est sit amet urna pulvinar condimentum posuere ullamcorper massa. Proin a ex placerat, ornare orci nec, vulputate mauris. Sed sodales lectus vel nulla vestibulum semper. Suspendisse potenti. Praesent interdum est ut libero tempus pharetra.</p>","1","10","","2018-10-08 14:46:30","2018-11-06 14:57:11","1","1","1","1","1","1","Epic,Ultimate,Final","#c23333,#78eb34,#0987d1","1","2 Days","0","a,b,c,d","TESTING"),
("30","11","8","14","0","HOLY GRAIL","1541225686flower-2.jpg","X,XL,XXL,M,L,S","#000000,#24417d,#922323,#2631a1","45","55","<span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan lacus in egestas dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean auctor risus eget diam cursus, eu condimentum libero pretium. Aliquam rutrum ex ac sapien porttitor, sed tincidunt velit condimentum. Phasellus venenatis egestas leo, vel sollicitudin felis venenatis in. Maecenas non arcu ac erat suscipit auctor non eget enim. Duis maximus nulla non nisl fermentum ullamcorper. Praesent magna velit, tincidunt ac dapibus molestie, porta eget nulla. Donec ac urna quis ex mollis congue in ut felis. Aenean posuere dolor sed tortor aliquam, at viverra enim rutrum. Nullam consequat, risus et congue rhoncus, neque felis rhoncus justo, ut ullamcorper lectus odio aliquam purus. Proin eu augue ut diam blandit posuere a ut nibh. Proin at tellus vitae magna tristique placerat eget vitae quam. Donec interdum lacus ultrices ex congue fringilla.</span><br>","74","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Aliquam aliquet facilisis volutpat. Aliquam elit est, tincidunt sit amet laoreet finibus, facilisis nec diam. Cras id ex et eros finibus ornare. Fusce dignissim neque diam, in efficitur enim malesuada eu. Fusce feugiat metus erat, a sodales dolor pretium rhoncus. Vivamus at aliquam enim, quis laoreet urna. Praesent congue nibh vitae nulla vehicula cursus eu eu magna. Donec a gravida massa, id pellentesque dui. Nam non lectus eros. Donec feugiat maximus felis.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Nulla vestibulum condimentum augue vel posuere. In fermentum ligula id magna semper, non blandit leo varius. Nullam ut lacus vitae risus molestie vulputate. Sed vitae auctor leo. Duis non venenatis turpis. Morbi lorem quam, convallis ut mollis vitae, sodales in eros. Etiam iaculis aliquam varius.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Proin quis accumsan mauris. In hac habitasse platea dictumst. Cras fermentum lectus ante, nec eleifend libero semper nec. In sodales purus eget nunc porttitor vulputate. Pellentesque vitae erat sed diam semper fringilla a sit amet metus. Aenean luctus volutpat lorem id luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non cursus nulla, non placerat leo. Maecenas quis dictum enim, quis rhoncus sapien. Phasellus dapibus mi quam, et rutrum lectus consequat in. Integer mollis nisi eu scelerisque vestibulum. Pellentesque et odio tempor, pharetra ligula eleifend, pellentesque arcu. Proin lobortis tincidunt ante, ac commodo ex luctus id. Sed interdum quam sit amet posuere vestibulum. Aenean sodales in justo ac hendrerit. Proin quis mattis leo.</p>","1","11","","2018-11-03 12:14:46","2018-11-05 15:53:04","1","1","1","1","1","1","AMAZING,FEATURED","#263cb3,#ba2222","2","2 Days","0","a,b,c,d,e,f,g","TESTS");



DROP TABLE IF EXISTS replies;

CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) unsigned NOT NULL,
  `comment_id` int(191) unsigned NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS reviews;

CREATE TABLE `reviews` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(191) unsigned NOT NULL,
  `product_id` int(191) unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `review_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO reviews VALUES("23","13","7","User","user@gmail.com","Nice","5","2018-09-26 15:21:37"),
("24","13","7","User","user@gmail.com","Excellent","5","2018-09-26 15:21:48"),
("25","13","7","User","user@gmail.com","Wonderful","5","2018-09-26 15:21:58"),
("26","13","7","User","user@gmail.com","Fantastic","5","2018-09-26 15:22:10");



DROP TABLE IF EXISTS seotools;

CREATE TABLE `seotools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `meta_keys` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO seotools VALUES("1","<script>//Google Analytics Scriptfffffffffffffffffffffffssssfffffs</script>","Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea");



DROP TABLE IF EXISTS services;

CREATE TABLE `services` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO services VALUES("2","FREE SHIPPING","Free Shipping All Order","1539837332delivery-van.png"),
("3","PAYMENT METHOD","Secure Payment","1539837356checked.png"),
("4","30 DAY RETURNS","30-Day Return Policy","1539837376refresh-button.png"),
("5","HELP CENTER","24/7 Support System","1539837442customer-support.png");



DROP TABLE IF EXISTS sliders;

CREATE TABLE `sliders` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO sliders VALUES("1","Slider Title 1","Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry","1534412737Slider-image.jpg","slide_style_left"),
("2","Slider Title 2","Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry","1534412745Slider-image3.jpg","slide_style_center"),
("3","Slider Title 3","Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry","1534412750Slider-image4.jpg","slide_style_right");



DROP TABLE IF EXISTS social_providers;

CREATE TABLE `social_providers` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO social_providers VALUES("6","23","102485372716947456487","google","2018-09-24 10:29:42","2018-09-24 10:29:42"),
("7","24","109113432411637170264","google","2018-09-24 11:41:31","2018-09-24 11:41:31");



DROP TABLE IF EXISTS sociallinks;

CREATE TABLE `sociallinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_status` tinyint(4) NOT NULL DEFAULT '1',
  `g_status` tinyint(4) NOT NULL DEFAULT '1',
  `t_status` tinyint(4) NOT NULL DEFAULT '1',
  `l_status` tinyint(4) NOT NULL DEFAULT '1',
  `fcheck` tinyint(10) DEFAULT NULL,
  `gcheck` tinyint(10) DEFAULT NULL,
  `fclient_id` text COLLATE utf8mb4_unicode_ci,
  `fclient_secret` text COLLATE utf8mb4_unicode_ci,
  `fredirect` text COLLATE utf8mb4_unicode_ci,
  `gclient_id` text COLLATE utf8mb4_unicode_ci,
  `gclient_secret` text COLLATE utf8mb4_unicode_ci,
  `gredirect` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sociallinks VALUES("1","https://www.facebook.com/","https://plus.google.com/","https://twitter.com/","https://www.linkedin.com/","1","1","1","1","1","1","503140663460329","f66cd670ec43d14209a2728af26dcc43","https://fbf2ec91.ngrok.io/ecommerceking//auth/facebook/callback","904681031719-o1ptsh6jdnvk3vdg4q9pfju5ji203u5l.apps.googleusercontent.com","JV7cxDa47cq_6dpvwuNVjVc8","http://localhost/new/ecommerceking/auth/google/callback");



DROP TABLE IF EXISTS sub_replies;

CREATE TABLE `sub_replies` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `reply_id` int(191) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS subcategories;

CREATE TABLE `subcategories` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(191) unsigned NOT NULL,
  `sub_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO subcategories VALUES("8","11","Sub Category 1","sub1","1"),
("9","11","Sub Category 2","sub2","1"),
("10","11","Sub Category 3","sub3","1"),
("11","11","Sub Category 4","sub4","1"),
("12","11","Sub Category 5","sub5","1");



DROP TABLE IF EXISTS subscribers;

CREATE TABLE `subscribers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subscribers VALUES("16","abdul@gmail.com"),
("3","abdullah@gmail.com"),
("15","admin@gmail.com"),
("17","aminul@gmail.com"),
("18","asdasr@gmail.com"),
("10","beerus@gmail.com"),
("12","igneel@gmail.com"),
("7","jack@gmail.com"),
("2","junajunnnun@gmail.com"),
("1","junnuns@gmail.com"),
("6","munna@gmail.com"),
("13","rain@gmail.com"),
("4","Siyam@gmail.com"),
("8","tamang@gmail.com"),
("5","tareq@gmail.com"),
("14","user@gmail.com"),
("9","vegeta@gmail.com"),
("11","whis@gmail.com"),
("19","zxcs@gmail.com");



DROP TABLE IF EXISTS user_notifications;

CREATE TABLE `user_notifications` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `conversation_id` int(191) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_provider` tinyint(10) NOT NULL DEFAULT '0',
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_message` text COLLATE utf8mb4_unicode_ci,
  `is_vendor` tinyint(10) NOT NULL DEFAULT '0',
  `shop_details` text COLLATE utf8mb4_unicode_ci,
  `f_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_check` tinyint(5) DEFAULT NULL,
  `g_check` tinyint(5) DEFAULT NULL,
  `t_check` tinyint(5) DEFAULT NULL,
  `l_check` tinyint(5) DEFAULT NULL,
  `shipping_cost` int(191) NOT NULL DEFAULT '0',
  `current_balance` int(191) NOT NULL DEFAULT '0',
  `affilate_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affilate_income` double DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `donors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("13","User","1535953444maxresdefault.jpg","1234","Rain","Uttara","Uttara","01629552892","23123121","user@gmail.com","$2y$10$JsP3wc0OyaFRFaKMX5Cm5.XarjHvitTIMYkepQYVyj.JSDghd0GSS","2018-03-08 00:05:44","2018-11-05 16:26:01","0","Laravel Store","Alexander J Curtis","6434534432423","39 D/A, Washington DC.","5345345435","Hiiiiii","2","<div style=\"text-align: justify;\"><b style=\"font-family: Roboto, sans-serif;\">Lorem</b><span style=\"font-family: Roboto, sans-serif;\"> ipsum dolor sit amet, consectetur adipisicing elit. Error hic unde soluta necessitatibus ad odit, dolores in. Omnis laborum, et nisi!</span></div>","https://www.facebook.com/","https://plus.google.com/","https://twitter.com/","https://www.linkedin.com/","1","1","1","1","5","327","33899bafa30292165430cb90b545728a","");



DROP TABLE IF EXISTS vendor_orders;

CREATE TABLE `vendor_orders` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `order_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `order_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','completed','declined') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO vendor_orders VALUES("29","13","7","1","61","XO4G1541411584","pending"),
("30","13","7","1","50","XO4G1541411584","pending"),
("31","13","7","1","49","XO4G1541411584","pending"),
("32","13","7","1","24","XO4G1541411584","pending"),
("33","13","7","1","528","XO4G1541411584","pending"),
("34","13","8","4","95","slRl1541411640","completed"),
("35","13","8","1","61","slRl1541411640","completed"),
("36","13","8","1","50","slRl1541411640","completed"),
("37","13","8","1","49","slRl1541411640","completed"),
("38","13","8","1","72","slRl1541411640","completed");



DROP TABLE IF EXISTS vendor_sliders;

CREATE TABLE `vendor_sliders` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO vendor_sliders VALUES("3","13","1538545502flower-2.jpg"),
("4","13","1538545512flower-3.jpg"),
("5","13","1538545521flower-1.jpg"),
("6","13","1538545526flower-2.jpg"),
("7","13","1538545532flower-3.jpg"),
("15","13","1538626272flower-3.jpg");



DROP TABLE IF EXISTS wishlists;

CREATE TABLE `wishlists` (
  `id` int(191) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(191) unsigned NOT NULL,
  `product_id` int(191) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

INSERT INTO wishlists VALUES("94","13","1"),
("95","13","3"),
("96","13","2"),
("97","13","13"),
("98","13","27");



DROP TABLE IF EXISTS withdraws;

CREATE TABLE `withdraws` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `user_id` int(191) DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `swift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` float DEFAULT NULL,
  `fee` float DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;





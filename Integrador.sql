CREATE TABLE `users` (
  `id` integer(11) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50),
  `nombreVisible` varchar(50),
  `mail` varchar(50),
  `contrasena` varchar(50),
  `admin` bool(1)
);

CREATE TABLE `comments` (
  `id` integer(11) PRIMARY KEY AUTO_INCREMENT,
  `id_user` integer(11),
  `contenido` varchar(2000),
  `valPositivas` integer(11),
  `valNegativas` integer(11),
  `fechaHora` timestamp
);

CREATE TABLE `commentsComments` (
  `id` integer(11) PRIMARY KEY AUTO_INCREMENT,
  `id_comments` integer(11),
  `id_user` integer(11),
  `contenido` varchar(2000),
  `valPositivas` integer(11),
  `valNegativas` integer(11),
  `fechaHora` timestamp
);

CREATE TABLE `bans` (
  `id` integer(11) PRIMARY KEY AUTO_INCREMENT,
  `id_user` integer(11),
  `razon` varchar(300),
  `id_admin` integer(11),
  `fechaHora` timestamp
);

CREATE TABLE `logs` (
  `id` integer(11) PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(20),
  `tabla` varchar(20),
  `id_cosa` integer(11),
  `id_admin` integer(11),
  `registro` varchar(300)
);

ALTER TABLE `commentsComments` ADD FOREIGN KEY (`id_comments`) REFERENCES `comments` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `commentsComments` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `bans` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `bans` ADD FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

ALTER TABLE `logs` ADD FOREIGN KEY (`id_cosa`) REFERENCES `comments` (`id`);

ALTER TABLE `logs` ADD FOREIGN KEY (`id_cosa`) REFERENCES `users` (`id`);

ALTER TABLE `logs` ADD FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

ALTER TABLE `logs` ADD FOREIGN KEY (`id_cosa`) REFERENCES `commentsComments` (`id`);

ALTER TABLE `logs` ADD FOREIGN KEY (`id_cosa`) REFERENCES `bans` (`id`);

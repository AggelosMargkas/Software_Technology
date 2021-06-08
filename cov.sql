CREATE TABLE posts (
  id int(11) AUTO_INCREMENT NOT NULL,
  vac_user_id int(11) DEFAULT NULL,
  title varchar(255) NOT NULL,
  slug varchar(255) NOT NULL,
  views int(11) NOT NULL DEFAULT 0,
  type enum('Covid','Vaccine') DEFAULT NULL,
  body text NOT NULL,
  published tinyint(1) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   PRIMARY KEY (id),
 FOREIGN KEY (vac_user_id) REFERENCES vac_users (vac_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE qr (
  id int(11) AUTO_INCREMENT NOT NULL,
  vac_user_id int(11) DEFAULT NULL,
  image varchar(255) NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (vac_user_id) REFERENCES vac_users (vac_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE users (
  id int(11) AUTO_INCREMENT NOT NULL,
  nameOfUser varchar(64) DEFAULT NULL,
  surnameOfUser varchar(64) DEFAULT NULL,
  usernameOfUser varchar(255) NOT NULL,
  emailOfUser varchar(255) NOT NULL,
  passwordOfUser varchar(255) NOT NULL,
  dateOfBirth date NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE vac_users (
  vac_id int(11) AUTO_INCREMENT NOT NULL,
  name varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  vac_password varchar(255) NOT NULL,
  birthday date DEFAULT NULL,
  PRIMARY KEY (vac_id)
);

INSERT INTO vac_users (id, name, lastname, username, email, password, vac_password, birthday) VALUES
(NULL, 'asdv', 'sdv', 'asdv', 'juniormarg99@gmail.com', '12', '23', NULL),
(NULL, 'Aggelos', 'Margkas', 'roulismar', 'juniormarg99@gmail.com', '1212', '0', '0000-00-00'),
(NULL, '12', 'Marg', '43244teg', 'juniormarg99@gmail.com', '0', '3', '0000-00-00'),
(NULL, 'giannos', 'chara', 'john', 'captain@gmail.com', '33', '233', '2021-06-24');

INSERT INTO users (id, nameOfUser, surnameOfUser, usernameOfUser, emailOfUser, passwordOfUser, dateOfBirth) VALUES
(NULL, 'agg', 'mar', 'aggmar', 'juniormarg99@gmail.com', '0', '2021-07-01');
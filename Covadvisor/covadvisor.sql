
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


INSERT INTO vac_users (vac_id, name, lastname, username, email, password, vac_password, birthday) VALUES
(NULL, 'aggelos', 'margkas', 'roulismar', 'juniormarg99@gmail.com', '1212', '1234', '2000-06-05'),
(NULL, 'maria', 'kara', 'maria1', 'maria@gmail.com', '21', '3', '1990-11-12'),
(NULL, 'giannos', 'chara', 'john', 'captain@gmail.com', '33', '233', '2001-01-24');

INSERT INTO users (id, nameOfUser, surnameOfUser, usernameOfUser, emailOfUser, passwordOfUser, dateOfBirth) VALUES
(NULL, 'dimitris', 'pits', 'pitsi', 'pits@gmail.com', '4321', '1999-07-01');

INSERT INTO posts (id, vac_user_id, title, slug, views, type, body, published, created_at) VALUES
(NULL, 1, '3h mera', '3h-mera', 2, 'Vaccine', 'Den exw kapoio provlima to emvolio fainetai na einai kalo', 1, '2021-06-05 18:02:23'),
(NULL, 2, '1h mera', '2h-mera', 13, 'Vaccine', 'Niwthw kapws arrwsth apo to emvolio exw symptvmata covid', 1, '2021-06-12 11:20:09'),
(NULL, 2, 'Embolio kai covid', 'embolio-kai-covid', 33, 'Covid', 'Exw pyreto akoma alla niwthw kalytera', 1, '2021-06-14 15:12:43'),
(NULL, 1, 'Deyterh dwsh', 'deyterh-dwsh', 30, 'Vaccine', 'Ekana kai th deuterh dwsh tou emboliou kai paramenw ygihs sas protinw na to kanete kai eseis', 1, '2021-07-12 12:45:15'),
(NULL, 3, '1h mera me covid', '1h-mera-me-covid', 25, 'Covid', 'Exw arxisei na anebazw pyreto kai exw agxothei me ola auta pou akouw', 1, '2021-06-21 18:13:09'),
(NULL, 3, 'Enhmerwsh gia thn katastash mou', '1h-mera', 41, 'Covid', 'Arxisa na niwthw kalutera adika anxwnomoun', 1, '2021-06-24 10:15:11');
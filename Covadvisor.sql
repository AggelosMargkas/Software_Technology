CREATE TABLE users (
  id int(11) AUTO_INCREMENT NOT NULL,
  username varchar(255) NOT NULL UNIQUE,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL UNIQUE,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE vac_users (
  id int(11) AUTO_INCREMENT NOT NULL,
  name varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL,
  username varchar(255) NOT NULL UNIQUE,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL UNIQUE,
  vac_password varchar(255) NOT NULL UNIQUE,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE posts (
 id int(11) NOT NULL AUTO_INCREMENT,
 vac_user_id int(11) DEFAULT NULL,
 title varchar(255) NOT NULL,
 slug varchar(255) NOT NULL UNIQUE,
 views int(11) NOT NULL DEFAULT '0',
 type enum('Covid','Vaccine') DEFAULT NULL,
 body text NOT NULL,
 published tinyint(1) NOT NULL,
 created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 updated_at timestamp NULL DEFAULT NULL,
 PRIMARY KEY(id),
  FOREIGN KEY (vac_user_id) REFERENCES vac_users (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE QR(
id int(11) NOT NULL AUTO_INCREMENT,
 vac_user_id int(11) DEFAULT NULL,
 image varchar(255) NOT NULL UNIQUE,
 PRIMARY KEY(id),
  FOREIGN KEY (vac_user_id) REFERENCES vac_users (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);
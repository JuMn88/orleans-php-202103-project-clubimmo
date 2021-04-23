--
-- Structure de la table `client`
--

CREATE TABLE client(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  propertyType varchar(255),
  firstname varchar(80),
  lastname varchar(80),
  phone varchar(20),
  email varchar(80),
  residence varchar(255),
  city varchar(255),
  postalcode varchar(80),
  topic varchar(255),
  message_client varchar(255));

--
-- Contenu de la table `client` 
--

INSERT INTO client (firstname, lastname, phone, email, residence, city, postalcode, propertyType, topic, message_client)
VALUES ('Anna','Lala','0102030405', 'anna@gmail.com','3 rue gustave', 'Orleans', '45000', 'maison','Je cherche un bien à louer','Hi'),
       ('Lala','Haha','0102030405', 'hanna@gmail.com','', '', '', '','Je cherche un bien à acheter','Hello');
--
-- Create property table 
--

CREATE TABLE property(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  property_type varchar(255),
  prix varchar(255),
  surface int,
  nb_pieces int,
  sector varchar(255),
  city varchar(255),
  photo varchar(255));

INSERT INTO property (property_type, prix, surface, nb_pieces, photo, sector, city) VALUES ("Maison", "200 000",100,4,"/assets/images/advertisement1.jpg",'Cigogne','Orleans'), 
("Maison","260 000",120,5,"/assets/images/advertisement2.jpg",'Moulière','Olivet'), ("Appartement","370 000",140,6,"/assets/images/advertisement3.jpg",'Ardon','Olivet'),
("Appartement","220 000",110,4,"/assets/images/advertisement4.jpg",'Vilpot','Saran'), ("Vila","500 000",240,7,"/assets/images/advertisement5.jpg",'Orée de Sologne','Orleans Sud'),
("Maison","170 000",80,4,"/assets/images/advertisement6.jpg",'Cigogne','Olivet'),("Maison","370 000",140,6,"/assets/images/advertisement3.jpg",'Moulière','Olivet'),
("Maison","220 000",110,4,"/assets/images/advertisement4.jpg",'Les Sablonnières','Saran'),("Maison","370 000",140,6,"/assets/images/advertisement3.jpg",'Moulière','Olivet'),
("Maison","220 000",110,4,"/assets/images/advertisement4.jpg",'Vilpot','Saran'); 




/*!40101

CREATE TABLE `sector`(
  `id` int PRIMARY KEY NOT NULL,
  `district` VARCHAR(255),
  `city` VARCHAR(255),
  `code postal` VARCHAR(255));


CREATE TABLE property(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  prix int,
  surface int,
  nb_pieces int,
  sector_id int,
  CONSTRAINT fk_property_sector
  FOREIGN KEY (sector_id)            
  REFERENCES sector(id));
---
CREATE TABLE `photo`(
   `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    `nom` varchar(255), 
    `url` varchar(255), 
    `property_id` int, 
    CONSTRAINT fk_property_photo 
    FOREIGN KEY (property_id)
    REFERENCES property(id)); 


CREATE TABLE property (
id INT AUTO_INCREMENT NOT NULL,
reference VARCHAR(25),
property_type_id INT,
transaction VARCHAR(25),
sector_id INT,
address VARCHAR(255),
surface INT,
price INT,
rooms INT,
bedrooms INT,
bathrooms INT,
toilets INT,
parking_space INT,
lift BOOL,
kitchen BOOL,
energy_performance CHAR(1),
greenhouse_gases CHAR(1),
description TEXT,
CONSTRAINT C6 PRIMARY KEY (id));


--
-- Contenu de la table `property`
--

INSERT INTO property (property_type_id, transaction, price, surface, rooms, sector_id) VALUES 
(1, "Location", 1000, 100, 4, 1),
(2,"Achat", 370000, 140, 6, 2),
(2,"Location", 950, 110, 4, 3),
(3, "Achat", 500000, 240, 7, 4),
(1,"Location", 700, 80, 4, 5),
(1, "Achat", 370000, 140, 6, 6),
(1, "Location", 900, 110, 4, 7),
(1, "Achat", 370000, 140, 6, 1),
(1, "Location", 1000, 110, 4, 2),
(3, "Achat", 500000, 240, 7, 3);



-- TABLE types of properties
CREATE TABLE propertyType (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

-- Added the FK link the table "property" and "propertyType"

ALTER TABLE property ADD CONSTRAINT FK_PropertyPropertyType FOREIGN KEY (property_type_id)
REFERENCES propertyType(id);
--
-- Contenu de la table `propertyType`
--

INSERT INTO propertyType (name)
VALUES ('Maison'),('Appartement'),('Vila'),('Terrain'), ('Studio'),('Autre');

-- TABLE names of sectors
CREATE TABLE sector(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255));

-- Added the FK link the table "property" and "sector"
ALTER TABLE property ADD CONSTRAINT FK_PropertySector FOREIGN KEY (sector_id)
REFERENCES sector(id);

-- Contenu de la table `sector`
INSERT INTO  sector (name) 
VALUES ('Dunois'),('Madeleine'),('Orléans Centre'),('Orléans Nord'), ('Argonne'),('Saint-Marceau'), ('La Source');


-- TABLE photo
CREATE TABLE photo(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(255),
property_id INT,
name VARCHAR(255));

ALTER TABLE photo ADD CONSTRAINT FK_PropertyPhoto FOREIGN KEY (property_id)
REFERENCES property(id);

insert into photo (property_id, url) 
VALUES (1, "https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80"),
 (2, "https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(3, "https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(4, "https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(5, "https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80"),
 (6, "https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(7, "https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(8, "https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(9, "https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80"),
(10, "https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");


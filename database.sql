/* CREATE TABLE AND INSERT PHOTOS FOR TEST */

/* Create table Photo */
CREATE TABLE photo (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    url VARCHAR(255)
    CONSTRAINT C8 PRIMARY KEY (id));

insert into photo (name, url) values ("exemple_photo_1", "https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80");
insert into photo (name, url) values ("exemple_photo_2", "https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");
insert into photo (name, url) values ("exemple_photo_3", "https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");
insert into photo (name, url) values ("exemple_photo_4", "https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");

/*TABLE 'property' */
--
-- Structure de la table `property`
--

CREATE TABLE property(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  propertyType_id int(11),
  price int,
  surface int,
  nb_pieces int,
  sector varchar(255),
  city varchar(255),
  photo varchar(255));

--
-- Contenu de la table `property`
--

INSERT INTO property (propertyType_id, price, surface, nb_pieces, photo, sector, city) VALUES 
(1, 200000, 100, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Cigogne','Orleans'), 
(1, 260000, 120, 5,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet'), 
(2, 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet'),
(2, 220000, 110, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Vilpot','Saran'), 
(3, 500000, 240, 7,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Orée de Sologne','Orleans Sud'),
(1, 170000, 80, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet'),
(1, 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet'),
(1, 220000, 110, 4,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Les Sablonnières','Saran'),
(3, 370000, 140, 6,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Moulière','Olivet'),
(1, 220000, 110, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Vilpot','Saran'); 



/*TABLE 'propertyType' */
--
-- Structure de la table `propertyType`
--

CREATE TABLE propertyType (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

-- Added the FK link the table "property" and "propertyTYpe"

ALTER TABLE property ADD CONSTRAINT FK_PropertyPropertyType FOREIGN KEY (propertyType_id)
REFERENCES propertyType(id);
--
-- Contenu de la table `propertyType`
--

INSERT INTO propertyType (name)
VALUES ('Maison'),('Appartement'),('Vila'),('Terrain'), ('Studio'),('Autre');


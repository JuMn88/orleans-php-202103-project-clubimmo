/* CREATE TABLES AND INSERT FOR TEST */

/* Create propertyType */
CREATE TABLE propertyType (
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
CONSTRAINT C4 PRIMARY KEY (id));

INSERT INTO propertyType (name)
VALUES ('Maison'),('Appartement'),('Villa'),('Terrain'), ('Studio'),('Autre');


/* Create sector */
CREATE TABLE sector(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
CONSTRAINT C5 PRIMARY KEY (id));

INSERT INTO  sector (name) 
VALUES ('Dunois'),('Madeleine'),('Orléans Centre'),('Orléans Nord'), ('Argonne'),('Saint-Marceau'), ('La Source');


/* Create property */
CREATE TABLE property (
id INT AUTO_INCREMENT NOT NULL,
reference VARCHAR(25),
transaction VARCHAR(25),
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
property_type_id INT,
sector_id INT,
CONSTRAINT C2 FOREIGN KEY (sector_id) REFERENCES sector(id),
CONSTRAINT C3 FOREIGN KEY (property_type_id) REFERENCES propertyType(id),
CONSTRAINT C1 PRIMARY KEY (id));


INSERT INTO property (property_type_id, sector_id, price, surface, rooms, bedrooms, bathrooms, toilets, lift, kitchen, parking_space, transaction, energy_performance, greenhouse_gases, address) VALUES 
(2, 1, 850, 100, 4, 2, 1, 1, true, true, 1, "A Louer", "A", "B", "10 Rue de la Chaussure"), 
(1, 2, 975, 120, 5, 3, 1, 1, false, false, 1, "A Louer", "", "A", "5 Rue de Patay"),  
(2, 3, 370000, 140, 6, 4, 1, 1, true, true, 1, "A Vendre", "A", "C", "2 Rue de la Pompe"),
(2, 4, 750, 110, 4, 2, 1, 1, true, false, 1, "A Louer", "B", "B", "10 Rue de Verneuil"), 
(3, 5, 500000, 240, 7, 4, 2, 2, false, true, 1, "A Vendre", "D", "B", "9 Rue des Boulets"),
(1, 4, 170000, 80, 4, 2, 1, 1, false, true, 1, "A Vendre", "", "B", "20 Rue du Commerce"),
(1, 2, 1100, 140, 6, 3, 1, 1, false, true, 1, "A Louer", "D", "D", "3 Rue du Commerce"),
(1, 3, 220000, 110, 4, 2, 1, 1, false, true, 1, "A Vendre", "A", "D", "7 Rue de Patay"),
(1, 4, 1350, 140, 6, 3, 1, 1, false, true, 1, "A Louer", "A", "B", "8 Rue des Boulets"),
(1, 2, 1000, 110, 4, 2, 1, 1, false, true, 1, "A Louer", "C", "B", "15 Rue de la Chaussure"); 



Update property
SET description = "LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2."
WHERE id = 3;

Update property
SET description = "LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2."
WHERE id = 4;

Update property
SET description = "A 15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 1;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 2;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 5;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 6;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 7;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 8;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 9;

Update property
SET description = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 10;

/* Create photo */
CREATE TABLE photo(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
property_id INT,
CONSTRAINT C6 PRIMARY KEY (id),
CONSTRAINT C7 FOREIGN KEY (property_id) REFERENCES property(id));

INSERT INTO photo (property_id, name) 
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

INSERT INTO photo (property_id, name) 
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
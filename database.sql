/* CREATE TABLE AND INSERT PHOTOS FOR TEST */

/* Create table Photo */
CREATE TABLE photo (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    url VARCHAR(255),
    CONSTRAINT C8 PRIMARY KEY (id));

insert into photo (name, url) values ("exemple_photo_1", "https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80");
insert into photo (name, url) values ("exemple_photo_2", "https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");
insert into photo (name, url) values ("exemple_photo_3", "https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");
insert into photo (name, url) values ("exemple_photo_4", "https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80");

/* Create table property */
CREATE TABLE property (
    id INT NOT NULL AUTO_INCREMENT,
    energy_performance_diagnostic VARCHAR(5),
    greenhouse_gas VARCHAR(5),
    property_type VARCHAR(255),
    price INT,
    surface INT,
    nb_pieces INT,
    sector VARCHAR(255),
    city VARCHAR(255),
    photo VARCHAR(255),
    detail TEXT,
    reference VARCHAR(20),
    CONSTRAINT C5 UNIQUE (reference),
    CONSTRAINT C6 PRIMARY KEY (id));

INSERT INTO property (property_type, price, surface, nb_pieces, photo, sector, city, energy_performance_diagnostic, greenhouse_gas, reference) VALUES 
("Maison", 200000, 100, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Cigogne','Orleans', "A", "B", "REF0150508"), 
("Maison", 260000, 120, 5,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet', "", "A", "REF0579654"), 
("Appartement", 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet', "A", "", "REF2479587"),
("Appartement", 220000, 110, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Vilpot','Saran', "B", "B", "REF0125798"), 
("Vila", 500000, 240, 7,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Orée de Sologne','Orleans Sud', "H", "B", "REF0159657"),
("Maison", 170000, 80, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet', "", "B", "REF0325796"),
("Maison", 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet', "D", "D", "REF0154875"),
("Maison", 220000, 110, 4,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Les Sablonnières','Saran', "A", "D", "REF4879015"),
("Maison", 370000, 140, 6,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Moulière','Olivet', "A", "B", "REF0657908"),
("Maison", 220000, 110, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Vilpot','Saran', "C", "B", "REF3698751"); 


Update property
SET detail = "LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2."
WHERE id = 3;

Update property
SET detail = "LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2."
WHERE id = 4;

Update property
SET detail = "A 15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 1;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 2;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 5;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 6;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 7;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 8;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 9;

Update property
SET detail = "15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d'environ 1200m². 1 garage avec arrivée d'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l'article l.561-5 du code monétaire et financier, la copie de la pièce d'identité de tous les visiteurs vous sera demandée avant la visite."
WHERE id = 10;

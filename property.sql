--
-- Base de données :  `club_de_l_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

CREATE TABLE property(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  property_type varchar(255),
  price int,
  surface int,
  nb_pieces int,
  sector varchar(255),
  city varchar(255),
  photo varchar(255));

--
-- Contenu de la table `property`
--

INSERT INTO property (property_type, price, surface, nb_pieces, photo, sector, city) VALUES 
("Maison", 200000, 100, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Cigogne','Orleans'), 
("Maison", 260000, 120, 5,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet'), 
("Appartement", 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet'),
("Appartement", 220000, 110, 4,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Vilpot','Saran'), 
("Vila", 500000, 240, 7,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Orée de Sologne','Orleans Sud'),
("Maison", 170000, 80, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Ardon','Olivet'),
("Maison", 370000, 140, 6,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Moulière','Olivet'),
("Maison", 220000, 110, 4,"https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Les Sablonnières','Saran'),
("Maison", 370000, 140, 6,"https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80",'Moulière','Olivet'),
("Maison", 220000, 110, 4,"https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80",'Vilpot','Saran'); 

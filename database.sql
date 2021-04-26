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


/* Create table property */
CREATE TABLE property (
    energy_performance_diagnostic VARCHAR(5),
    greenhouse_gas VARCHAR(5),
    CONSTRAINT C6 PRIMARY KEY (id));

CREATE TABLE club_de_l_immo.bien (id INT, energy_performance_diagnostic VARCHAR(255), greenhouse_gas VARCHAR(255));

insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("A", "B");
insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("", "A");
insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("A", "");
insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("B", "B");
insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("H", "B");
insert into bien (energy_performance_diagnostic, greenhouse_gas) values ("A", "B");
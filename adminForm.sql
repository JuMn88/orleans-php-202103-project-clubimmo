/*Table needed to test the form in Admin section*/

/* Create table property */
CREATE TABLE property (
    id INT NOT NULL AUTO_INCREMENT,
    reference VARCHAR(25) NOT NULL,
    surface INT,
    price INT,
    property_type VARCHAR(50),
    transaction VARCHAR(25),
    city VARCHAR(50),
    sector VARCHAR(50),
    rooms INT,
    bedrooms INT,
    energy_performance CHAR(1),
    greenhouse_gases CHAR(1));

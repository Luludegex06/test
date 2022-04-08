CREATE DATABASE tp_sql

CREATE TABLE garage(
	name VARCHAR(64),
    city VARCHAR(64),
    birthdate DATE,
    annual_turnover INT,
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT
);

CREATE TABLE car(
	model VARCHAR(64),
    color VARCHAR(64),
    price INT(64),
    garage_id INT(64),
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT
);

ALTER TABLE car
ADD FOREIGN KEY(garage_id) REFERENCES
garage(id);


INSERT INTO garage(name, city, birthdate, annual_turnover) 
VALUES 
('Garage Celu','Toulouse', '2001-02-12', 170000  ),
('Garage Creuzet', 'Lyon', '1999-01-02', 270000 ),
('Garage Renault', 'Saint-Didier-des-Bois', '2003-04-02', 300000 ),
('Garage Prestige', 'Armand', '1998-05-10', 175000 ),
('Garage Pneus', 'Gex', '1999-10-02', 240000),
('Garage Speed', 'Genève', '1970-03-02', 320000),
('Garage Midas', 'Londres', '1967-12-02', 310000),
('Garage Speedy', 'Lyon', '2009-04-02', 186000 ),
('Garage Carrosserie', 'Annecy', '1940-11-03', 172000 ),
('Garage Gomécanicien', 'Dortmund', '1984-01-02', 230000 );


INSERT INTO car(model, color, price, garage_id) 
VALUES 
(' Bugatti','bleu',20000, 1),
('Alfa Romeo', 'rouge', 20000, 1),
('Chevrolet', 'blanc', 20000, 1),
('Ferrari', 'noir', 20000, 1),
('Hyundai', 'gris', 20000, 1),

('Fiat', 'turquoise', 50000, 2),
('Chrysler', 'vert', 15000, 2),
('Honda', 'orange', 300000, 2),
(' Audi', 'jaune', 20000, 2),
('Isuzu', 'pourpre', 20000, 2),

(' Audi', 'vert', 30000, 3),
('Isuzu', 'pourpre', 12000, 3),
('Chevrolet', 'blanc', 30000, 3),
('Ferrari', 'noir', 20500, 3),
('Chrysler', 'vert', 15000, 3),

('Fiat', 'turquoise', 50000, 4),
('Chrysler', 'vert', 15000, 4),
('Ferrari', 'noir', 20500, 4),
('Chrysler', 'vert', 15000, 4),
('Honda', 'orange', 10000, 4),

(' Bugatti','orange',20000, 5),
('Alfa Romeo', 'pourpre', 40000, 5),
('Chevrolet', 'blanc', 35000, 5),
('Chevrolet', 'vert', 35000, 5),
('Ferrari', 'noir', 23500, 5),

('Ferrari', 'noir', 20000, 6),
('Chrysler', 'bleu', 15000, 6),
('Honda', 'jaune', 10000, 4),
('Alfa Romeo', 'pourpre', 40000, 6),
('Chevrolet', 'jaune', 30000, 6),

('Ferrari', 'gris', 30000, 7),
('Hyundai', 'noir', 25000, 7),
('Chrysler', 'bleu', 15000, 7),
('Honda', 'jaune', 10000, 7),
('Chevrolet', 'turquoise', 40000, 7),

('Honda', 'marron', 30000, 8),
(' Audi', 'bleu', 45000, 8),
('Isuzu', 'orange', 25000, 8),
('Chevrolet', 'bleu', 40000, 8),
('Hyundai', 'gris', 25000, 8),

('Ferrari', 'orange', 20500, 9),
('Chrysler', 'vert', 15000, 9),
('Honda', 'turquoise', 15000, 9),
('Chevrolet', 'bleu', 45000, 9),
('Hyundai', 'gris', 25000, 9),

('Honda', 'marron', 30000, 10),
(' Audi', 'turquoise', 45000, 10),
('Isuzu', 'orange', 25000, 10),
('Hyundai', 'noir', 25000, 10),
('Chrysler', 'vert', 25000, 10);

SELECT * from car;

SELECT * 
FROM `garage` 
WHERE name LIKE "%L%";

SELECT * 
FROM `car` 
ORDER BY price DESC;

SELECT name, COUNT(*)
FROM garage 
JOIN car
ON garage.ID
= car.garage_id
GROUP BY car.garage_id;

SELECT name, SUM(car.price)
FROM car 
JOIN garage
ON car.garage_id
= garage.ID
GROUP BY car.garage_id
ORDER BY SUM(car.price) DESC
LIMIT 1;


DELETE FROM `car` 
WHERE model LIKE "E%";

UPDATE car SET  color = 'vert' WHERE price > 200000;

UPDATE car SET  price = 35000 WHERE garage_id = 2;
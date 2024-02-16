CREATE TABLE produits
(id INT PRIMARY KEY AUTO_INCREMENT,
 numProduct VARCHAR(7) NOT NULL,
 name VARCHAR(70) NOT NULL UNIQUE,
 price DECIMAL(10.2) NOT NULL CHECK (price>=0),
 description TEXT
);

INSERT INTO produits
VALUES(1,'A123456', 'lampe artichaut', '39', 'lampe design éclairage tamisé');

INSERT INTO produits
VALUES(2,'A125896', 'tabouret', '79', 'tabouret style pub irlandais rétro');

INSERT INTO produits
VALUES(3,'A987654', 'plaid', '25', 'plaid cocooning 150*200cm');

INSERT INTO produits
VALUES(4,'A159731', 'coussin', '15', 'coussin design jaune moutarde 50*50cm');

INSERT INTO produits
VALUES(5,'A369874', 'chaise', '100', 'chaise design épuré de style nordique');
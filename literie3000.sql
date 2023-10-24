CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(50),
    name VARCHAR(100),
    size VARCHAR(20),
    price FLOAT,
    solde FLOAT
)

INSERT INTO matelas (marque, name, size, price, solde, img)
 VALUES
 ('EPEPDA', 'Brigitte', '90x190', 759.00, 230, 'https://www.lelit.fr/wp-content/uploads/2021/05/matelas-SAVOY.png'),
 ('DEAMWAY', 'Marine', '90x190', 809.00, 100, 'https://m.media-amazon.com/images/I/81OzwVtD4fL._AC_UF1000,1000_QL80_.jpg'),
 ('BULTEX', 'Positive Attitude', '140x190', 759.00, 230, 'https://www.lelit.fr/wp-content/uploads/2021/05/Realit_06_1110x739.png'),
 ('EPEDA', 'Buro Club', '160x200', 1019.00, 0, 'https://cdn.manomano.com/images/images_products/28057121/P/89587653_1.jpg');
CREATE TABLE administration
(
  id INT PRIMARY KEY NOT NULL,
  login varchar(32) NOT NULL,
  mdp varchar(32) NOT NULL
);

INSERT INTO administration VALUES (1, 'admin', 'admin');

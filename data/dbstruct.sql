DROP TABLE players;
CREATE TABLE players
(
  id INT PRIMARY KEY NOT NULL,
  firstname VARCHAR(64),
  lastname VARCHAR(64),
  position CHAR(3)
);
DROP TABLE contracts;
CREATE TABLE contracts
(
  id INT PRIMARY KEY NOT NULL,
  player_id INT
);
CREATE INDEX player ON contracts (player_id);
DROP TABLE contracts_years;
CREATE TABLE contracts_years
(
  contract_id INT NOT NULL,
  year INT,
  capnumber REAL,
  FOREIGN KEY (contract_id) REFERENCES contracts(id)
);
CREATE INDEX uniqueDate ON contracts_years (contract_id, year);
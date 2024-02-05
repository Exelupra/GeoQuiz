CREATE TABLE Geolo.Historique (
                                  idHistorique INT PRIMARY KEY AUTO_INCREMENT,
                                  idSerie INT,
                                  Score INT,
                                  FOREIGN KEY (idSerie) REFERENCES Geolo.Partie(idSerie)
);

CREATE TABLE Geolo.Partie (
                              idSerie INT PRIMARY KEY,
                              ScoreActuel INT,
                              Etape VARCHAR(255),
                              idPartie INT AUTO_INCREMENT,
                              FOREIGN KEY (idPartie) REFERENCES Geolo.Historique(idHistorique)
);

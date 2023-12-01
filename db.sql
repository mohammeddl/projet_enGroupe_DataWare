CREATE DATABASE dataware2;

create TABLE equipe(
	id_equipe int(10) PRIMARY KEY auto_increment,
   	nom_equipe char(100),
   	date_creation date
);

create TABLE projet(
	id_pro int(10) PRIMARY KEY auto_increment,
   	nom_pro char(100),
	descrp_pro char(200)
);

create TABLE utilisateur(
    id int(10) PRIMARY KEY  auto_increment ,
    nom char(100),
    prenom char(100),
    email varchar(100),
    pass char(100),
    tel  int(10),
    statut  char(100),
    role  char(100),
    equipe int(10),
    FOREIGN KEY (equipe) REFERENCES equipe(id_equipe),
);

ALTER TABLE utilisateur
add projet int(10),
FOREIGN KEY (projet) REFERENCES projet(id_pro);


insert into projet VALUES (1,'Travigo travel','amelioration d'un site web de voyage'),(2,'Restaurant pizza','maquetter et mettre en oeuvre site web de pizza restaurant'),(3,'Salle de sport','realiser et implementer un site web de salle de sport'),(4,'Gamebit','concevoir un site d'une société de gaming'),(5,'Datware','gerer le personnel de l'entreprise dataware');

insert into equipe VALUES (1,'codecrafters','2023-5-10'),(2,'nightcrawlers','2023-7-9'),(3,'thefive','2023-10-7'),(4,'codex','2023-11-23'),(5,'ventures','2023-10-11');

INSERT INTO utilisateur (id,nom,prenom,email,pass,tel,statut,role) VALUES
(1,'Sebti','Douae','douaesb123@gmail.com','douae123',0664589784,'active','ProductOwner'),
(2,'OLM','Yassir','yassirolm123@gmail.com','yassir123',0615878477,'active','membre'),
(3,'Toto','Mouad','mouadtoto123@gmail.com','Mouad123',0687459165,'active','membre'),
(4,'Houas','Chaimae','chaimaeh123@gmail.com','chaimae123',0684516578,'active','membre'),
(5,'Daali','Mohamed','mohamedda123@gmail.com','Mohamed123',0616457899,'active','membre');




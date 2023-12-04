CREATE TABLE `utilisateur` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) ,
  `prenom` varchar(100) ,
  `email` varchar(100),
  `pass` varchar(100) ,
  `tel` int(10) UNIQUE,
  `statut` varchar(100) ,
  `role` varchar(100)
);

CREATE TABLE `projet` (
  `id_pro` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nom_pro` varchar(100) ,
  `descrp_pro` varchar(200) 
);

CREATE TABLE `equipe` (
  `id_equipe` int(10) PRIMARY KEY AUTO_INCREMENT ,
  `nom_equipe` varchar(100) ,
  `date_creation` date
);

CREATE TABLE `question` (
   `id_qst` int(10) PRIMARY KEY AUTO_INCREMENT ,
   `titre_qst` varchar(100) ,
   `descrp_qst` varchar(100) ,
   `date_qst` date ,
   `archive_qst` boolean,
   `like_qst` int(10),
   `dislike_qst` int(10)
);

CREATE TABLE `reponse` (
   `id_rep` int(10) PRIMARY KEY AUTO_INCREMENT ,
   `descrp_rep` varchar(100) ,
   `date_rep` date ,
   `archive_rep` boolean,
   `statut_rep` boolean,
   `like_rep` int(10),
   `dislike_rep` int(10)
);

CREATE TABLE `tags` (
   `id_tag` int(10) PRIMARY KEY AUTO_INCREMENT ,
   `nom_tag` varchar(100)
);

CREATE TABLE `tag_qst` (
   `id_tq` int(10) PRIMARY KEY AUTO_INCREMENT
);

ALTER TABLE utilisateur
add equipe int(10),
ADD FOREIGN KEY (equipe) REFERENCES equipe(id_equipe);

ALTER TABLE utilisateur
add projet int(10),
ADD FOREIGN KEY (projet) REFERENCES projet(id_pro);

ALTER TABLE equipe
add id_pro int(10),
ADD FOREIGN KEY (id_pro) REFERENCES projet(id_pro);

ALTER TABLE question
add id_pro int(10),
ADD FOREIGN KEY (id_pro) REFERENCES projet(id_pro)
ON DELETE CASCADE;

ALTER TABLE question
add id_user int(10),
ADD FOREIGN KEY (id_user) REFERENCES utilisateur(id);

ALTER TABLE reponse
add id_user int(10),
ADD FOREIGN KEY (id_user) REFERENCES utilisateur(id);

ALTER TABLE reponse
add id_qst int(10),
ADD FOREIGN KEY (id_qst) REFERENCES question(id_qst)
ON DELETE CASCADE;

ALTER TABLE tags
add id_qst int(10),
ADD FOREIGN KEY (id_qst) REFERENCES question(id_qst);

ALTER TABLE tag_qst
add id_qst int(10),
ADD FOREIGN KEY (id_qst) REFERENCES question(id_qst);

ALTER TABLE tag_qst
add id_tag int(10),
ADD FOREIGN KEY (id_tag) REFERENCES tags(id_tag);

---- FOREIGN KEYS ----


-- user
  `equipe` int(10),
  `projet` int(10),

-- equipe
  `id_pro` int(10)

-- question
  `id_user` int(10),
  `id_pro` int(10)

-- reponse
  `id_user` int(10),
  `id_qst` int(10)

-- tags
  `id_qst` int(10)

--tag_qst
  `id_tag` int(10),
  `id_qst` int(10)












DROP TABLE IF EXISTS categorie ;
CREATE TABLE categorie (
	id_cat SERIAL INTEGER PRIMARY KEY NOT NULL,
	lib_cat TEXT
);

DROP TABLE IF EXISTS region ;
CREATE TABLE region (
	id_region SERIAL INTEGER PRIMARY KEY NOT NULL,
	lib_region TEXT
);

DROP TABLE IF EXISTS marque ;
CREATE TABLE marque (
	id_marque SERIAL INTEGER PRIMARY KEY NOT NULL,
	lib_marque TEXT
);

DROP TABLE IF EXISTS user ;
CREATE TABLE user (
	id_user SERIAL INTEGER PRIMARY KEY NOT NULL,
	pseudo TEXT,
	nom TEXT,
	prenom TEXT,
	mdp TEXT,
	codePostal INTEGER,
	ville TEXT,
	mail TEXT,
	photo TEXT
);

DROP TABLE IF EXISTS annonce ;
CREATE TABLE annonce (
	id_annonce SERIAL INTEGER PRIMARY KEY NOT NULL,
	titre TEXT,
	description TEXT,
	id_region INTEGER NOT NULL,
	id_cat INTEGER NOT NULL,
	kilomètre INTEGER,
	heure INTEGER,
	prix REAL,
	id_user INTEGER NOT NULL,
	image TEXT,
	id_marque INTEGER NOT NULL,
	date_mel DATE, --AAAA/MM/JJ
	annee INTEGER,
	FOREIGN KEY(id_cat) REFERENCES categorie(id_cat),
	FOREIGN KEY(id_user) REFERENCES user(id_user),
	FOREIGN KEY(id_marque) REFERENCES marque(id_marque),
	FOREIGN KEY(id_region) REFERENCES region(id_region)
);

/*CREATE TABLE ti_user_annonce (
	id_user INTEGER PRIMARY KEY,
	id_annonce INTEGER PRIMARY KEY,
	FOREIGN KEY(annonce) REFERENCES annonce(id_annonce),
	FOREIGN KEY(user) REFERENCES user(id_user)
);*/





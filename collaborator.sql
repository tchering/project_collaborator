-- Active: 1702562500939@@127.0.0.1@3306@collaborator

create table
    colabInfo(
        id int auto_increment primary key,
        civilite enum("Madame", "Monsieur"),
        nom VARCHAR(250) not null,
        prenom VARCHAR(250) not null,
        dateOfBirth DATE not null,
        placeOfBirth char(100) not null,
        socialSecurity int(15) not null,
        emailPro char(50),
        mailPer char(50),
        mobile int(15) not null,
        fixe int(15),
        rue char(250) not NULL,
        complement char(250),
        postalCode int(5) not null,
        ville char(250) not NULL,
        department char(20) not null,
        region varchar(50) not null,
        pays varchar(50) not null,
        nationality varchar(50) not null,
        typeCollab enum(
            "CDD",
            "CDI",
            "Indépendant",
            "Stagiaire"
        ),
    );


CREATE TABLE client(
        id       Int  Auto_increment  NOT NULL ,
        civilite Varchar (50) NOT NULL ,
        nom      Varchar (250) NOT NULL ,
        prenom   Varchar (250) NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


CREATE TABLE info_client(
        id             Int  Auto_increment  NOT NULL ,
        dateOfBirth    Date NOT NULL ,
        placeOfBirth   Char (250) NOT NULL ,
        securitySocial Int NOT NULL ,
        mailPro        Char (50) NOT NULL ,
        mailPer        Char (50) NOT NULL ,
        mobile         Char (15) NOT NULL ,
        phoneFix       Char (15) NOT NULL ,
        id_client      Int NOT NULL
	,CONSTRAINT info_client_PK PRIMARY KEY (id)
	,CONSTRAINT info_client_client_FK FOREIGN KEY (id_client) REFERENCES client(id)
)ENGINE=InnoDB;



CREATE TABLE addresse(
        id          Int  Auto_increment  NOT NULL ,
        rue         Char (100) NOT NULL ,
        complement  Varchar (100) NOT NULL ,
        codePostal  Int NOT NULL ,
        ville       Varchar (50) NOT NULL ,
        department  Char (50) NOT NULL ,
        region      Varchar (50) NOT NULL ,
        pays        Varchar (50) NOT NULL ,
        nationalite Varchar (50) NOT NULL ,
        typeCollab  Varchar (20) NOT NULL ,
        id_client   Int NOT NULL
	,CONSTRAINT addresse_PK PRIMARY KEY (id)
	,CONSTRAINT addresse_client_FK FOREIGN KEY (id_client) REFERENCES client(id)
)ENGINE=InnoDB;


--! here i need to generate view
-- code      Nom et prenom           addrese             mobile         
-- client c        client c          addresse a         client_info     


CREATE or REPLACE view list_view as
select c.id as CODE, CONCAT(c.nom," " ,c.prenom) as "nom" , a.ville as Addresse,i.mobile
from addresse a,client c,info_client i
WHERE
a.id_client = c.id and
i.id_client = c.id
GROUP BY c.nom;
-- Active: 1702969265829@@127.0.0.1@3306@collaborator


create DATABASE collaborator;
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
        civilite ENUM ('Madame','Monsieur') NOT NULL,
        nom      Varchar (250) NOT NULL ,
        prenom   Varchar (250) NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO client (civilite, nom, prenom) VALUES
('Madame', 'Clinton', 'Hillary'),
('Monsieur', 'Trump', 'Donald'),
('Monsieur', 'Biden', 'Joe'),
('Monsieur', 'Obama', 'Barack'),
('Monsieur', 'Bush', 'George'),
('Monsieur', 'Clinton', 'Bill'),
('Monsieur', 'Reagan', 'Ronald'),
('Monsieur', 'Carter', 'Jimmy'),
('Monsieur', 'Ford', 'Gerald'),
('Monsieur', 'Nixon', 'Richard');


CREATE TABLE info_client(
        id             Int  Auto_increment  NOT NULL ,
        dateOfBirth    Date NOT NULL ,
        placeOfBirth   Char (250) NOT NULL ,
        securitySocial Int NOT NULL ,
        mailPro        Char (50) ,
        mailPer        Char (50) NOT NULL ,
        mobile         Char (15) NOT NULL ,
        phoneFix       Char (15) ,
        id_client      Int NOT NULL
	,CONSTRAINT info_client_PK PRIMARY KEY (id)
	,CONSTRAINT info_client_client_FK FOREIGN KEY (id_client) REFERENCES client(id)
)ENGINE=InnoDB;

INSERT INTO info_client (dateOfBirth, placeOfBirth, securitySocial, mailPro, mailPer, mobile, phoneFix, id_client)
VALUES
('1999-12-12', 'Paris', 123456789, 'hillary@gmail.com', 'hillary@gmail.com', '987654321', '987654321', 1),
('1970-06-14', 'New York', 987654321, 'donald@gmail.com', 'donald@gmail.com', '456789012', '456789012', 2),
('1942-11-20', 'Scranton', 555555555, 'joe@gmail.com', 'joe@gmail.com', '111222333', '111222333', 3),
('1961-08-04', 'Honolulu', 111111111, 'barack@gmail.com', 'barack@gmail.com', '222333444', '222333444', 4),
('1946-07-06', 'New Haven', 222222222, 'george@gmail.com', 'george@gmail.com', '333444555', '333444555', 5),
('1946-08-19', 'Hope', 333333333, 'bill@gmail.com', 'bill@gmail.com', '444555666', '444555666', 6),
('1911-02-06', 'Tampico', 444444444, 'ronald@gmail.com', 'ronald@gmail.com', '555666777', '555666777', 7),
('1924-10-01', 'Plains', 555555555, 'jimmy@gmail.com', 'jimmy@gmail.com', '666777888', '666777888', 8),
('1913-07-14', 'Omaha', 666666666, 'gerald@gmail.com', 'gerald@gmail.com', '777888999', '777888999', 9),
('1913-01-09', 'Yorba Linda', 777777777, 'richard@gmail.com', 'richard@gmail.com', '888999000', '888999000', 10);




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

-- Insert addresses for the first 10 clients
INSERT INTO addresse (rue, complement, codePostal, ville, department, region, pays, nationalite, typeCollab, id_client)
VALUES
('123 Main St', 'Apt 456', '75001', 'Paris', 'Ile-de-France', 'IDF', 'France', 'French', 'Residential', 1),
('456 Oak St', 'Unit 789', '10001', 'New York', 'New York', 'NY', 'USA', 'American', 'Residential', 2),
('789 Maple St', 'Suite 012', '18500', 'Scranton', 'Pennsylvania', 'PA', 'USA', 'American', 'Residential', 3),
('321 Pine St', 'Apt 543', '75002', 'Paris', 'Ile-de-France', 'IDF', 'France', 'French', 'Residential', 4),
('654 Cedar St', 'Unit 876', '06510', 'New Haven', 'Connecticut', 'CT', 'USA', 'American', 'Residential', 5),
('987 Birch St', 'Suite 234', '06010', 'Plainville', 'Connecticut', 'CT', 'USA', 'American', 'Residential', 6),
('210 Elm St', 'Apt 567', '92130', 'Issy-les-Moulineaux', 'Ile-de-France', 'IDF', 'France', 'French', 'Residential', 7),
('543 Walnut St', 'Unit 890', '30301', 'Atlanta', 'Georgia', 'GA', 'USA', 'American', 'Residential', 8),
('876 Chestnut St', 'Suite 234', '20001', 'Washington', 'D.C.', 'DC', 'USA', 'American', 'Residential', 9),
('109 Pine St', 'Apt 876', '92808', 'Anaheim', 'California', 'CA', 'USA', 'American', 'Residential', 10);



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


-- create final view to fill the form
CREATE or replace VIEW form2 as
select c.id ,c.civilite,c.nom,c.prenom,i.`dateOfBirth`,i.`placeOfBirth`,i.`securitySocial`,i.`mailPro`,i.`mailPer`,i.mobile,i.`phoneFix`,a.rue,a.complement,a.`codePostal`,a.ville,a.department,a.region,a.pays,a.nationalite,a.`typeCollab`
from client c ,info_client i,addresse a ,list_view l
where i.id_client = c.id and
a.id_client = c.id 
GROUP BY c.nom;

create table collab(
    id INT AUTO_INCREMENT PRIMARY KEY,
    
);
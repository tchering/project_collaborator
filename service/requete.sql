-- Active: 1702969265829@@127.0.0.1@3306@collaborator
-- creation de table collaborateur
create or REPLACE table
    newcollaborateur (
        id int auto_increment primary key,
        civilite enum('madame', 'monsieur') not null DEFAULT 'madame',
        nom VARCHAR(250),
        prenom VARCHAR(250),
        photo VARCHAR(250),
        dateOfBirth date,
         placeOfBirth VARCHAR(250),
        socialSecurity VARCHAR(15),
        emailPro VARCHAR(50),
        mailPer VARCHAR(150),
        mobile VARCHAR(20),
        fixe VARCHAR(20),
        rue VARCHAR(10),
        complement VARCHAR(150),
        postalCode VARCHAR(10),
        ville VARCHAR(250),
        department VARCHAR(50),
        region VARCHAR(100),
        pays VARCHAR(50),
        nationalite VARCHAR(50),
        typeCollab enum('cdd','cdi','independant','stagiaire') DEFAULT 'cdd'
    );

insert into newcollaborateur(civilite,nom,prenom) values
('monsieur','Dupont','Claude'),
('madame','Jason','Claudine'),
('monsieur','Sonam','sherpa'),
('madame','yangji','sherpa');

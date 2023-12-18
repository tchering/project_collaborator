-- Active: 1702562500939@@127.0.0.1@3306@collaborator

crate
table
    colabInfo(
        id int auto_increment primary key,
        civilite enum("Madame", "Monsieur"),
        nom VARCHAR(250) not null,
        prenom VARCHAR(250) not null,
        dateOfBirth DATE not null,
        placeOfBirth char(100),
        socialSecurity char(15),
    );
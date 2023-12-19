CREATE TABLE
    collab (
        id INT AUTO_INCREMENT PRIMARY KEY,
        civilite ENUM('Madame', 'Monsieur') NOT NULL,
        nom VARCHAR(250) NOT NULL,
        prenom VARCHAR(250) NOT NULL,
        dateOfBirth DATE NOT NULL,
        placeOfBirth CHAR(100) NOT NULL,
        socialSecurity BIGINT(15) NOT NULL,
        emailPro CHAR(50),
        mailPer CHAR(50),
        mobile CHAR(15) NOT NULL,
        fixe CHAR(15),
        rue CHAR(250) NOT NULL,
        complement CHAR(250),
        postalCode INT(5) NOT NULL,
        ville CHAR(250) NOT NULL,
        department CHAR(100) NOT NULL,
        region VARCHAR(50) NOT NULL,
        pays CHAR(50) NOT NULL,
        nationalite VARCHAR(100) NOT NULL,
        typeCollab ENUM(
            'CDD',
            'CDI',
            'Indépendant',
            'Stagiaire'
        ) NOT NULL
    );

INSERT INTO
    collab (
        civilite,
        nom,
        prenom,
        dateOfBirth,
        placeOfBirth,
        socialSecurity,
        emailPro,
        mailPer,
        mobile,
        fixe,
        rue,
        complement,
        postalCode,
        ville,
        department,
        region,
        pays,
        nationalite,
        typeCollab
    )
VALUES (
        'Monsieur',
        'Harry',
        'Potter',
        '1985-08-20',
        'Lyon',
        987456598765,
        'harry.martin@example.com',
        'pierre.personal@example.com',
        '9876543210',
        '1234567890',
        '456 Oak Avenue',
        'Suite 789',
        69001,
        'Lyon',
        'ARA',
        'Auvergne-Rhône-Alpes',
        'France',
        'French',
        'CDD'
    );
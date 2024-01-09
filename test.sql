-- Active: 1702969265829@@127.0.0.1@3306@collabnew
create or REPLACE table
    addresse (
        id int auto_increment primary key,
        rue VARCHAR(10),
        complement VARCHAR(150),
        postalCode VARCHAR(10),
        ville VARCHAR(250),
        department VARCHAR(50),
        region VARCHAR(100),
        pays VARCHAR(50)
    );

INSERT INTO addresse (rue, complement, postalCode, ville, department, region, pays)
VALUES 
    ('123 Main St', 'Apt 4B', '12345', 'New York', 'NY', 'North East', 'USA'),
    ('456 Elm St', 'Unit 7', '67890', 'Los Angeles', 'CA', 'West Coast', 'USA'),
    ('789 Oak St', 'Suite 12', '54321', 'Chicago', 'IL', 'Midwest', 'USA'),
    ('321 Pine St', 'Floor 3', '98765', 'Houston', 'TX', 'South', 'USA'),
    ('654 Maple St', 'Room 8', '13579', 'Miami', 'FL', 'South East', 'USA');

create or REPLACE table
    contact_info (
        id int auto_increment primary key,
        emailPro VARCHAR(50),
        mailPer VARCHAR(150),
        mobile VARCHAR(20),
        fixe VARCHAR(20)
    );

INSERT INTO contact_info (emailPro, mailPer, mobile, fixe)
VALUES 
    ('actor1@example.com', 'actor1@gmail.com', '1234567890', '9876543210'),
    ('actor2@example.com', 'actor2@gmail.com', '2345678901', '8765432109'),
    ('actor3@example.com', 'actor3@gmail.com', '3456789012', '7654321098'),
    ('actor4@example.com', 'actor4@gmail.com', '4567890123', '6543210987'),
    ('actor5@example.com', 'actor5@gmail.com', '5678901234', '5432109876');
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
        nationalite VARCHAR(50),
        typeCollab enum('cdd','cdi','independant','stagiaire') DEFAULT 'cdd',
        address_id int,
        contact_info_id int,
        FOREIGN KEY (address_id) REFERENCES address(id),
        FOREIGN KEY (contact_info_id) REFERENCES contact_info(id)
    );
    INSERT INTO newcollaborateur (civilite, nom, prenom, dateOfBirth, placeOfBirth, socialSecurity, nationalite, typeCollab, address_id, contact_info_id)
    VALUES 
        ('madame', 'Smith', 'Emma', '1990-05-15', 'New York', '123456789', 'USA', 'cdd', 1, 1),
        ('monsieur', 'Johnson', 'James', '1985-09-20', 'Los Angeles', '987654321', 'USA', 'cdi', 2, 2),
        ('madame', 'Williams', 'Olivia', '1992-07-10', 'Chicago', '456789123', 'USA', 'independant', 3, 3),
        ('monsieur', 'Brown', 'Noah', '1988-03-25', 'Houston', '789123456', 'USA', 'stagiaire', 4, 4),
        ('madame', 'Jones', 'Ava', '1995-12-05', 'Miami', '321654987', 'USA', 'cdd', 5, 5);


-- this is to create view for liste collab
-- code             nom/prenom          ville as addresse         mobile
-- newcollaborateur      nc               addresse            contact_info

CREATE or REPLACE view listecollab as 
select (nc.id) as CODE,CONCAT(nc.nom," ",nc.prenom) as "Nom et Prenom",(a.ville) as Addresse,c.mobile
from newcollaborateur nc,contact_info c,addresse a
where nc.address_id = a.id and nc.contact_info_id = c.id
GROUP BY nc.nom ORDER BY nc.nom;





    case 'save':
    extract($_POST);
    $connection = connection();
    if ($id == null) {
        // Insert into address table
        $sql = "INSERT INTO address(rue, complement, postalCode, ville, department, region, pays) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $request = $connection->prepare($sql);
        $request->execute([$rue, $complement, $postalCode, $ville, $department, $region, $pays]);
        $address_id = $connection->lastInsertId();

        // Insert into contact_info table
        $sql = "INSERT INTO contact_info(emailPro, mailPer, mobile, fixe) VALUES (?, ?, ?, ?)";
        $request = $connection->prepare($sql);
        $request->execute([$emailPro, $mailPer, $mobile, $fixe]);
        $contact_info_id = $connection->lastInsertId();

        // Insert into newcollaborateur table
        $sql = "INSERT INTO newcollaborateur(civilite, nom, prenom, dateOfBirth, placeOfBirth, socialSecurity, nationalite, typeCollab, address_id, contact_info_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $request = $connection->prepare($sql);
        $request->execute([$civilite, $nom, $prenom, $dateOfBirth, $placeOfBirth, $socialSecurity, $nationalite, $typeCollab, $address_id, $contact_info_id]);
        echo "Nouvelle donnée insérée avec succès";
    } else {
        // Update address table
        $sql = "UPDATE address SET rue = ?, complement = ?, postalCode = ?, ville = ?, department = ?, region = ?, pays = ? WHERE id = ?";
        $request = $connection->prepare($sql);
        $request->execute([$rue, $complement, $postalCode, $ville, $department, $region, $pays, $address_id]);

        // Update contact_info table
        $sql = "UPDATE contact_info SET emailPro = ?, mailPer = ?, mobile = ?, fixe = ? WHERE id = ?";
        $request = $connection->prepare($sql);
        $request->execute([$emailPro, $mailPer, $mobile, $fixe, $contact_info_id]);

        // Update newcollaborateur table
        $sql = "UPDATE newcollaborateur SET civilite = ?, nom = ?, prenom = ?, dateOfBirth = ?, placeOfBirth = ?, socialSecurity = ?, nationalite = ?, typeCollab = ? WHERE id = ?";
        $request = $connection->prepare($sql);
        $request->execute([$civilite, $nom, $prenom, $dateOfBirth, $placeOfBirth, $socialSecurity, $nationalite, $typeCollab, $id]);
        echo "Donnée modifiée avec succès";
    }
    break;
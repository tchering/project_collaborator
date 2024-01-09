-- Active: 1702969265829@@127.0.0.1@3306@collabmany


#------------------------------------------------------------
# Table: departement
#------------------------------------------------------------

CREATE TABLE departement(
    id                 Int  Auto_increment  NOT NULL ,
    LibelleDepartement Varchar (50) NOT NULL
	,CONSTRAINT departement_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: nationalite
#------------------------------------------------------------

CREATE TABLE nationalite(
        id                 Int  Auto_increment  NOT NULL ,
        LibelleNationalite Varchar (50) NOT NULL
	,CONSTRAINT nationalite_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: region
#------------------------------------------------------------

CREATE TABLE region(
        id            Int  Auto_increment  NOT NULL ,
        libelleRegion Varchar (10) NOT NULL
	,CONSTRAINT region_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: typecollab
#------------------------------------------------------------

CREATE TABLE typecollab(
        id                Int  Auto_increment  NOT NULL ,
        libelleTypecollab Varchar (10) NOT NULL
	,CONSTRAINT typecollab_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: civilite
#------------------------------------------------------------

CREATE TABLE civilite(
        id              Int  Auto_increment  NOT NULL ,
        libelleCivilite Varchar (10) NOT NULL
	,CONSTRAINT civilite_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pays
#------------------------------------------------------------

CREATE TABLE pays(
        id          Int  Auto_increment  NOT NULL ,
        libellePays Varchar (10) NOT NULL
	,CONSTRAINT pays_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        id             Int  Auto_increment  NOT NULL ,
        rue            Varchar (50) NOT NULL ,
        complement     Varchar (50) NOT NULL ,
        codePostal     Int NOT NULL ,
        ville          Varchar (10) NOT NULL ,
        id_departement Int NOT NULL ,
        id_region      Int NOT NULL ,
        id_pays        Int NOT NULL
	,CONSTRAINT adresse_PK PRIMARY KEY (id)
	,CONSTRAINT adresse_departement_FK FOREIGN KEY (id_departement) REFERENCES departement(id)
	,CONSTRAINT adresse_region0_FK FOREIGN KEY (id_region) REFERENCES region(id)
	,CONSTRAINT adresse_pays1_FK FOREIGN KEY (id_pays) REFERENCES pays(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: collaborateur
#------------------------------------------------------------

CREATE TABLE collaborateur(
        id                Int  Auto_increment  NOT NULL ,
        nom               Varchar (50) NOT NULL ,
        prenom            Varchar (50) NOT NULL ,
        dateNaissance     Date NOT NULL ,
        lieuNaissance     Varchar (50) NOT NULL ,
        numSecuritySocial Int NOT NULL ,
        mailPro           Varchar (50) NOT NULL ,
        mailPer           Varchar (50) NOT NULL ,
        fixe              Varchar (50) NOT NULL ,
        mobile            Varchar (50) NOT NULL ,
        id_adresse        Int NOT NULL ,
        id_civilite       Int NOT NULL ,
        id_nationalite    Int NOT NULL ,
        id_typecollab     Int NOT NULL
	,CONSTRAINT collaborateur_AK UNIQUE (numSecuritySocial,mailPro,mailPer,fixe,mobile)
	,CONSTRAINT collaborateur_PK PRIMARY KEY (id)
	,CONSTRAINT collaborateur_adresse_FK FOREIGN KEY (id_adresse) REFERENCES adresse(id)
	,CONSTRAINT collaborateur_civilite0_FK FOREIGN KEY (id_civilite) REFERENCES civilite(id)
	,CONSTRAINT collaborateur_nationalite1_FK FOREIGN KEY (id_nationalite) REFERENCES nationalite(id)
	,CONSTRAINT collaborateur_typecollab2_FK FOREIGN KEY (id_typecollab) REFERENCES typecollab(id)
)ENGINE=InnoDB;

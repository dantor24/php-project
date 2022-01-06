--          Projet de Programmation php
-- Le nom de la base de donnee: DBCHC_UEHL
-- Qui content des differeentes table telques
create database DBCHC_UEHL;

-- Entrer dans la base 
use DBCHC_UEHL;

create table Annee_academique(
    id_annee int(10) primary key AUTO_INCREMENT,
    Annee_debut varchar(5),
    Annee_fin varchar(5),
    Date_debut date,
    Date_fin date,
    Etat varchar(10),
    AnneeAcademique varchar(10)
);

create table DossierEdu(
    id int(9) primary key AUTO_INCREMENT,
    Id_Etudiant varchar(9),
    Nom varchar(50),
    Prenom varchar(50),
    Sexe varchar(10),
    Adresse varchar(50),
    Lieu_de_naissance varchar(50),
    Date_de_naissance date,
    Telephone varchar(30),
    Email varchar(30),
    Filiere varchar(30),
    Niveau varchar(30),
    Nif_Cin varchar(30),
    Personne_de_reference varchar(30),
    Telephone_personne_reference varchar(30),
    Photo varchar(255),
    Annee_Academique varchar(10),
    Etat varchar(50), 
    Memo varchar(255)
);
create table DossierProf(
    id int(5) primary key AUTO_INCREMENT,
    Code varchar(9),
    Nom varchar(50),
    Prenom varchar(50),
    Sexe varchar(10),
    Adresse varchar(50),
    Telephone varchar(50),
    Statut_Matrimonial varchar(40),
    Lieu_de_naissance varchar(50),
    Date_de_naissance date,
    Niveau varchar(40),
    Cours_a_enseigner varchar(50),
    Filieres_affectes varchar(50),
    Salaire float(10,2),
    Poste varchar(50),
    Email varchar(50),
    Nif_Cin varchar(50),
    Etat varchar(50),
    Memo varchar(255)
);

create table Cours(
    id int(10) primary key AUTO_INCREMENT,
    Id_Cours varchar(10),
    Nom_cours varchar(30),
    Filiere varchar(30),
    Niveau varchar(30),
    Session_cours varchar(30),
    Coefficient float(8,2),
    Professeur_titulaire varchar(30),
    Professeur_suppleant varchar(30),
    Jours varchar(30),
    Heure_debut varchar(30),
    Heure_Fin varchar(30),
    Etat varchar(50)
);

create table Notes(
    Id_notes int(10) primary key AUTO_INCREMENT,
    Session_notes varchar(30),
    Id_Etudiant varchar(9),
    Id_Cours varchar(10),
    Note float(7,2),
    AnneeAcademique varchar(10)
);

-- Table des Utilisateurs 
Create table Utilisateur(
Id int(10) primary key AUTO_INCREMENT,
Nom varchar(20),
Prenom varchar(20),
Poste varchar(20),
Pseudo varchar(20),
Passworde varchar(20),
Etat varchar(50),
Modules varchar(60)
);

insert into Utilisateur values(null, 'Bien-Aime', 'John', 'ADM', 'admin', 'admin', 'Actif', 'Tous');


-- Creating DataBase

--      CREATE DATABASE polecanydoktor;

-- Creating Tables

CREATE TABLE Roles
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Role_name VARCHAR(7) NOT NULL
);

CREATE TABLE Users 
(   Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(20) NOT NULL, 
    Password_hashed VARCHAR(100) NOT NULL,
    First_name VARCHAR(20), 
    Last_name VARCHAR(35),
    Sex INT(1),
    Birthday DATE,
    Role_Id INT(1) NOT NULL,
    References_adress VARCHAR(20) UNIQUE,
    Image_path VARCHAR(50),
    FOREIGN KEY (Role_Id) REFERENCES Roles(Id) ON DELETE CASCADE
);

CREATE TABLE Doctors
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    User_Id INT NOT NULL,
    References_adress VARCHAR(20) UNIQUE,
    Price_hour DECIMAL(8,2) NOT NULL,
    NFZ_collaborations BOOLEAN NOT NULL DEFAULT 0,
    FOREIGN KEY (User_Id) REFERENCES Users(Id) ON DELETE CASCADE
);

CREATE TABLE Medical_Speciality_Types
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Speciality_name VARCHAR(25) NOT NULL
);

CREATE TABLE Medical_Speciality
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- Doctor_Id INT NOT NULL,  // foreign key
    Medical_speciality_Id INT NOT NULL,
    FOREIGN KEY (Medical_speciality_Id) REFERENCES Medical_Speciality_Types(Id) ON DELETE CASCADE
);

CREATE TABLE Surgery
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Doctor_Id INT NOT NULL,
    Institution_name VARCHAR(75) NOT NULL,
    Street VARCHAR(25) NOT NULL,
    Building_number VARCHAR(6),
    City VARCHAR(25) NOT NULL,
    PostalCode VARCHAR(7) NOT NULL
);

CREATE TABLE Buisness_hours
(
    Id INT NOT NULL PRIMARY KEY,
    Doctor_Id INT NOT NULL,
    Day INt(1) NOT NULL,
    Open_time TIME NOT NULL,
    Close_time TIME NOT NULL,
    FOREIGN KEY (Doctor_Id) REFERENCES Doctors(Id) ON DELETE CASCADE
);

CREATE TABLE Ratings
(
    Id INT NOT NULL PRIMARY KEY,
    User_Id INT NOT NULL,
    Doctor_Id INT NOT NULL,
    Score FLOAT NOT NULL,
    Comment VARCHAR(200) NOT NULL,
    FOREIGN KEY (User_Id) REFERENCES Users(Id) ON DELETE CASCADE,
    FOREIGN KEY (Doctor_Id) REFERENCES Doctors(Id) ON DELETE CASCADE
);

-- visits table

-- Creating users for database

CREATE USER 'Admin'@'localhost' IDENTIFIED BY 'passwordAdmin';



-- Adding Privileges

GRANT ALL PRIVILEGES ON polecanydoktor . * TO 'Admin'@'localhost';



-- Seeding DataBase

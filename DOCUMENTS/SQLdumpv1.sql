DROP TABLE IF EXISTS Wish;
DROP TABLE IF EXISTS Offer;
DROP TABLE IF EXISTS Location;
DROP TABLE IF EXISTS Student;
DROP TABLE IF EXISTS Parent;
DROP TABLE IF EXISTS Class;
DROP TABLE IF EXISTS Teacher;
DROP TABLE IF EXISTS School;

CREATE TABLE School
(
idNumber INT NOT NULL,
teacher_Id INT NOT NULL,
substitue_Id INT,
bundesland VARCHAR(255),
address VARCHAR(255) NOT NULL,
name VARCHAR(255) NOT NULL,
PRIMARY KEY(idNumber)
);

CREATE TABLE Teacher
(
id INT AUTO_INCREMENT,
firstName VARCHAR(255) NOT NULL,
lastName VARCHAR(255) NOT NULL,
email VARCHAR(255),
password VARCHAR(255) NOT NULL,
school_Id INT NOT NULL,
telephone VARCHAR(255) NOT NULL,
isContact TINYINT(1) NOT NULL,
isSub TINYINT(1) NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(school_Id)
  REFERENCES School(idNumber)
  ON DELETE CASCADE
);

CREATE TABLE Class
(
id int AUTO_INCREMENT,
school_Id int NOT NULL,
teacher_Id int NOT NULL,
name varchar(255), 
sumstudents int NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(school_Id)
  REFERENCES School(idNumber)
  ON DELETE CASCADE,
FOREIGN KEY(teacher_Id)
  REFERENCES Teacher(id)
  ON DELETE CASCADE
);

CREATE TABLE Parent
(
id INT,
email VARCHAR(255),
password VARCHAR(255),
PRIMARY KEY(id)
);

CREATE TABLE Student
(
id int AUTO_INCREMENT,
class_Id INT,
parent_Id INT,
firstName VARCHAR(255),
lastname VARCHAR(255) NOT NULL,
bDate VARCHAR(255) NOT NULL,
telPrimary VARCHAR(255) NOT NULL,
telSecondary VARCHAR(255),
hasTicket TINYINT(1),
canTakePhotos TINYINT(1),
skillLevel INT NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(class_Id)
  REFERENCES Class(id)
  ON DELETE CASCADE,
FOREIGN KEY(parent_Id)
  REFERENCES Parent(id)
  ON DELETE CASCADE
);


CREATE TABLE Location
(
id int AUTO_INCREMENT,
name VARCHAR(255),
address VARCHAR(255),
state VARCHAR(255),
telephone VARCHAR(255),
maxCap INT,
PRIMARY KEY(id)
);

CREATE TABLE Offer
(
id int AUTO_INCREMENT,
location_id INT,
ppDpA INT,
ppDpC INT,
overnight TINYINT(1),
startSeason DATE,
endSeason DATE,
PRIMARY KEY(id),
FOREIGN KEY(location_Id)
  REFERENCES Location(id)
  ON DELETE CASCADE
);

CREATE Table Wish
(
id int AUTO_INCREMENT,
class_id INT NOT NULL,
offer_id INT NOT NULL,
teacher1_id INT NOT NULL,
teacher2_id INT NOT NULL,
location_Id INT NOT NULL,
primaryDateStart DATE NOT NULL,
secondaryDateStart DATE,
tertiaryDateStart DATE,
primaryDateEnd DATE NOT NULL,
secondaryDateEnd DATE,
tertiaryDateEnd DATE,
PRIMARY KEY(id),
FOREIGN KEY(class_Id)
  REFERENCES Class(id)
  ON DELETE CASCADE,
FOREIGN KEY(offer_Id)
  REFERENCES Offer(id)
  ON DELETE CASCADE,
FOREIGN KEY(teacher1_Id)
  REFERENCES Teacher(id)
  ON DELETE CASCADE,
FOREIGN KEY(teacher2_Id)
  REFERENCES Class(id)
  ON DELETE CASCADE,
FOREIGN KEY(location_Id)
  REFERENCES Location(id)
  ON DELETE CASCADE
);

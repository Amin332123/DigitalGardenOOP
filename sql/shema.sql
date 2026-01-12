create DATABASE Digital_Garden_OOP;
use Digital_Garden_OOP;
   create table Users (
      id int PRIMARY KEY AUTO_INCREMENT,
      name varchar(30),
      userName varchar(40),
      passsword varchar(40),
      createdDate date,
      role_ID INT,
      Foreign Key (role_ID) REFERENCES role(id)
   );

   create table Themes (
      id int PRIMARY KEY AUTO_INCREMENT,
      themeName varchar(40), 
      bColor varchar(10),
      notesNumber int ,
      userId int ,
      FOREIGN KEY (userId) REFERENCES Users(id)
   );
   CREATE TABLE Notes (
   id int PRIMARY KEY AUTO_INCREMENT,
   title varchar(40),
   importance int,
   createdDate date,
   associatedThemeId int,
   FOREIGN KEY (associatedThemeId) REFERENCES Themes(id)
   );

  create table role (
       id int PRIMARY KEY AUTO_INCREMENT,
       role_name varchar(10)
   );
   CREATE TABLE favorite (
      id INT PRIMARY KEY AUTO_INCREMENT,
      userID int,
      themeID int,
      Foreign Key (userID) REFERENCES Users(id),
      Foreign Key (themeID) REFERENCES Themes(id)
   );

ALTER table 
Themes ADD COLUMN statu ENUM("private","public");


SELECT * FROM Themes;
ALTER Table Users add COLUMN Archive ENUM("Blocked","Active","Pending") DEFAULT "Pending"
alter TABLE Themes DROP COLUMN Archive;
ALTER TABLE Themes ADD COLUMN Archive BOOLEAN DEFAULT 0;


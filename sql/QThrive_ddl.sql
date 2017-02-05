CREATE DATABASE QThrive;

USE QThrive;

CREATE TABLE Member(
	Member_ID int NOT NULL AUTO_INCREMENT,
	F_Name varchar(20) NOT NULL,
	L_Name varchar(20) NOT NULL,
	Email varchar(50) NOT NULL DEFAULT " ",
	Phone_No bigint(15) NOT NULL,
	Grad_Year int(4) NOT NULL DEFAULT " ",
	Faculty varchar(50) NOT NULL DEFAULT " ",
	Degree_Type char(10) NOT NULL DEFAULT " ",
	Password varchar(180) NOT NULL DEFAULT " ",
	PRIMARY KEY (Member_ID)
);

CREATE TABLE Entry(
	Entry_ID int NOT NULL AUTO_INCREMENT,
	Writer_ID int NOT NULL,
  Creation_Date datetime NOT NULL,
	Anger double DEFAULT NULL,
	Joy double DEFAULT NULL,
	Fear double DEFAULT NULL,
	Sadness double DEFAULT NULL,
	Surprise double DEFAULT NULL,
	Entry_Body varchar(500) NOT NULL DEFAULT " ",
	PRIMARY KEY (Entry_ID),
	FOREIGN KEY (Writer_ID) REFERENCES Member(Member_ID) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Queries
-- Insert a journal entry into the database
-- INSERT INTO Entry(Writer_ID, Creation_Date, Entry_Body)
-- VALUES(1,CURRENT_DATE, "What a great day today was!!!")

CREATE TABLE School (
	schoolName VARCHAR(50),
	PRIMARY KEY (schoolName)
);

CREATE TABLE Program (
	programName VARCHAR(30), 
	schoolName VARCHAR(50),
	PRIMARY KEY(programName),
	FOREIGN KEY(schoolName) REFERENCES School (schoolName)
);

CREATE TABLE Address (
	addressline1 VARCHAR(256), 
	city VARCHAR(256), 
	state CHAR(2), 
	countryRegion VARCHAR(256), 
	zipcode INT,
	PRIMARY KEY(addressline1, city, state, countryRegion, zipcode)
	insert into Address( adressLine1, city, state, countryRegion, zipcode) values("19 Circle Drive, Apt 200", "Annapolis", 'MD' , "USA" , 20719  );



	-- UNIQUE (aptSuit)- deleted 
	/*
	make aptSuit Unique key
	test if foreign key can reference unique key
	Note: error may only occur when entering data 
	Update: refer to note below 
	*/
);
 /* 
    refer to store picture in google drive/ chloes ipad
    - deleteing aptsuit attribute, however out UI interface will allow the user to type in their 
	apt , suit, etc and using php we will concat Adressline1 with their apt info and store it under 
	adressLine1


 */


CREATE TABLE Alumni (
	alumniID INT, 
	birthdate DATE, 
	status VARCHAR(10), 
	email VARCHAR(100), 
	phoneNumber VARCHAR(15), 
	firstName VARCHAR(100), 
	middleName VARCHAR(100), 
	lastName VARCHAR(100), 
	addressline1 VARCHAR(256), 
	city VARCHAR(256), 
	state CHAR(2), 
	countryRegion VARCHAR(256), 
	zipcode INT,
	PRIMARY KEY(alumniID, birthdate),
	FOREIGN KEY(addressline1, city, state, countryRegion, zipcode) REFERENCES Address (addressline1, city, state, countryRegion, zipcode)

);




CREATE TABLE Donation (
	date DATE, 
	amount DOUBLE, 
	notes VARCHAR(256),
	PRIMARY KEY(date, amount)
);


CREATE TABLE Employer (
	employerName VARCHAR(256),
	PRIMARY KEY(employerName)
);


CREATE TABLE Donated (
	alumniID INT, 
	birthdate DATE, 
	donationDate DATE, 
	amount DOUBLE,
	PRIMARY KEY(alumniID, birthdate, donationDate, amount),
	FOREIGN KEY(alumniID, birthdate) REFERENCES Alumni (alumniID, birthdate),
	FOREIGN KEY(donationDate, amount) REFERENCES Donation (date, amount)
);

insert into Donated values(6098712, '1985-09-12', '2019-01-28', 250.5);

CREATE TABLE WorksAt (
	alumniId INT, 
	birthdate DATE, 
	jobTitle VARCHAR(100), 
	employerName VARCHAR(100),
	PRIMARY KEY(alumniId, birthdate, employerName),
	FOREIGN KEY(alumniId, birthdate) REFERENCES Alumni (alumniId, birthdate),
	FOREIGN KEY(employerName) REFERENCES Employer (employerName)
);

insert into WorksAt values(6098712, '1985-09-12', 'Software Developer','Qlarant');


CREATE TABLE MinoredIn (
	alumniID INT, 
	birthdate DATE, 
	programName VARCHAR(30),
	PRIMARY KEY(alumniID, birthdate, programName),
	FOREIGN KEY(alumniID, birthdate) REFERENCES Alumni (alumniID, birthdate),
	FOREIGN KEY(programName) REFERENCES Program (programName)
);

CREATE TABLE MajoredIn (
	alumniID INT, 
	birthdate DATE, 
	programName VARCHAR(30), 
	gradYear YEAR,
	PRIMARY KEY(alumniID, birthdate, programName),
	FOREIGN KEY(alumniID, birthdate) REFERENCES Alumni (alumniID, birthdate),
	FOREIGN KEY(programName) REFERENCES Program (programName)
);




-- Inserting data examples

-- Adresss:
insert into Address( addressline1, city, state, countryRegion, zipcode) values ('19 Circle Drive, Apt 200', 'Annapolis', 'MD' , 'USA' , 20719  );
insert into Address( addressline1, city, state, countryRegion, zipcode) values ('19 Circle Drive, Apt 289', 'Annapolis', 'MD' , 'USA' , 20719  );
insert into Address( addressline1, city, state, countryRegion, zipcode) values ('1046 Potomac St NW', 'Washington', 'DC' , 'USA' , 20007  );


-- Alumni
insert into Alumni( alumniId, birthdate, status, email, phoneNumber, firstName, middleName,lastName, addressline1, city, state, countryRegion, zipcode) values (6098712, '1985-9-12','Active', 'asmith1046@gmail.com', '410-888-9910', 'Amber','Lee', 'Smith','1046 Potomac St NW', 'Washington', 'DC' , 'USA' , 20007);
insert into Alumni( alumniId, birthdate, status, email, phoneNumber, firstName, middleName,lastName, addressline1, city, state, countryRegion, zipcode) values (6098712, '2000-01-28','Active', 'jordanA@gmail.com', '301-783-1234', 'Jordan','Bea', 'Adams','19 Circle Drive, Apt 289', 'Annapolis', 'MD' , 'USA' , 20719);



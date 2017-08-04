DROP TABLE IF EXISTS class;
DROP TABLE IF EXISTS TA;
DROP TABLE IF EXISTS backupClass;
DROP TABLE IF EXISTS instructors;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS excelHeader;


CREATE TABLE instructors (
name VARCHAR(40) NOT NULL,
dept VARCHAR(20),
unit INTEGER,
PRIMARY KEY(name)
);


CREATE TABLE backupClass (
subj char(4) NOT NULL,
courseNo VARCHAR(4) NOT NULL,
section char(3) NOT NULL,
term INTEGER NOT NULL,
actType char(3),
days VARCHAR(10),
startTime time NOT NULL,
endTime time NOT NULL,
instructor VARCHAR(40),
TAName VARCHAR(40),
PRIMARY KEY(subj, courseNo, section)
);

CREATE TABLE TA(
name VARCHAR(40) NOT NULL,
year INTEGER,
faculty VARCHAR(20),
PRIMARY KEY(name)
);

CREATE TABLE class (
subj char(4) NOT NULL,
courseNo varchar(4) NOT NULL,
section char(3) NOT NULL,
term INTEGER NOT NULL,
actType char(3),
days varchar(10),
startTime time NOT NULL,
endTime time NOT NULL,
instructor VARCHAR(40),
TAName VARCHAR(40),
PRIMARY KEY(subj, courseNo, section),
FOREIGN KEY(instructor) REFERENCES instructors(name)
	ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (TAName) REFERENCES TA(name)
	ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE user (
userName varchar(30) NOT NULL, 
userRole varchar(10) NOT NULL,
PRIMARY KEY (username)
);

CREATE TABLE excelHeader (
header varchar(50) NOT NULL,
PRIMARY KEY (header)
);

insert into excelheader values ('subject');
insert into excelheader values ('course');
insert into excelheader values ('section');
insert into excelheader values ('term');
insert into excelheader values ('primary act type');
insert into excelheader values ('days');
insert into excelheader values ('start time');
insert into excelheader values ('end time');
insert into excelheader values ('faculty name');
Database setup
Database name: ta_db
Create a user tadbuser with password tadb and grant all privelege as this is the account I used for all
database related stuff

A simple ta office hour system for student and ta.
tables tauser: //This is where we going to store all the user 
	first varchar(50);
	last varchar(50);
	email varchar(50)
	username varchar(50);
	password varchar(50);
	profilepic BLOB; 
	TA int(11);



tables taclass: //TA class information
	username varchar(50);
	classname varchar(8);
	monday varchar(20);//see comment below on format
	tuesday varchar(20);
	wednesday varchar(20);
	thursday varchar(20);
	friday varchar(20);

tables comments:// for storing comments
	topic  varchar(100);
	commentuser varchar(50)
	comment varchar(200)
	commentdate datetime

tables forum:
	username varchar(50)
	topic varchar(100)
	content varchar(200)
	views int(11)
	replies int(11)
	lastpost datetime
	creationtime datetime


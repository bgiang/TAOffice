# TA Office Hour System
A simple web application that allow student and teaching assistant to communicate with each other through a message board and keeping track of TA office hours
# Credit

Brian Giang, Luping Zhou,Yali Li

# Feature
+ Registration- Both TA and student can register an account for the web application.
+ TA scheduling- TA can set their hour of availability for office hour for class they are teaching and student are able to view these schedule.
+ Message Board- TA and student can communicate with each other on a simple message board.
+ Searching- Student can search for a specific class to see if a TA is avaiable are the current time

# Demo
[Video demo of web application](http://www.screencast.com/t/ZpV33Qxm7b)

## Database Setup

Database name: ta_db

Create a user tadbuser with password tadb and grant all privelege as this is the account I used for all
database related stuff


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
	monday varchar(20);
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


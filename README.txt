Database name: ta_db

tables ta_user: //This is where we going to store all the user 
	first varchar(50);
	last varchar(50);
	email varchar(50)
	username varchar(50);
	password varchar(50);
	profilepic BLOB; //Working


//Plan for ta_class
tables ta_class: //TA class information
	username varchar(50);
	classname varchar(7);
	day varchar(2) //ie. M,T,W,Th,F
	hours varchar(18) // Ex. range 8am to 5pm so format 081012 -> (8am,10am.12pm) split string by 2 char
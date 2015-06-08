# SMPublic
This is a REST API I'm writing to serve an iPhone app that I'd like to create.
It is written in PHP, using MySQL as the database. I prefer using the PHP PDO class to 
handle any database operations because of the security and sanitation it provides. 

On the MVC structure:
The models are closest to the database tables. Each model class represents an entity stored in the database, and contains the methods necessary to access its records.

The controllers fetch the data necessary to 'answer' the given request, and pass it along to the view class to be formatted.

The view classes deal with formatting the reponse message. Currently, I have only implemented a JSON view handler.


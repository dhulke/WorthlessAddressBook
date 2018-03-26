Worthless Address Book
======================

Just a simple address book application written in pure PHP/Sqlite (no framework used). The Framework directory is just a collection of helper files I created in a few hours to help me build this application. The entire application was developed in under 12h so the framework is not meant for production and it could be filled with bugs.

Installation
------------

::

	http://host/Setup/install
	
That service will make sure the database file is created and the database schema is uploaded to the database.

::

	http://host/Setup/uninstall
	http://host/Setup/install

Calling both services in that order will reset the database and start a clean installation.

To-Do
-----

- Add support for route mathing in the Router module
- Add a validator class to help with form validations
- Create a better templating system to help with view rendering
- Pretty much throw the whole thing away and start again with a decent framework like Laravel or CodeIgniter.

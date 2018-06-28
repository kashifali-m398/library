# Library


This is a library system which has an admin panel and a frontend.

### Requirements

The system is built with Laravel 5.6, it requires the following things:

* PHP >= 7.1.3
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension

### Installation

Follow the below steps to install and configure the system:
* Clone the project
```sh
$ git clone https://github.com/alyjee/library.git
```
* Get into the project directory
```sh
$ composer install
```
* Install the project dependencies via composer
```sh
$ cd library
```
* Assign permissions to bootstrap and storage directories
```sh
$ sudo chmod 777 -R bootstrap
$ sudo chmod 777 -R storage
```
* Import the database file in PhpMyAdmin "library.sql"
* Configure the database in .env file

License
----

MIT

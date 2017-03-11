# CakePHP Test Application

:star: Just download files, check requirements and follow few steps :star:

## Requirements

* HTTP Server. For example: Apache. Having mod_rewrite is
  preferred, but by no means required.
* PHP 5.6.0 or greater (including PHP 7.1).
* mbstring PHP extension
* intl PHP extension

* MySQL (5.1.10 or greater)
* PostgreSQL
* Microsoft SQL Server (2008 or higher)
* SQLite 3

## Installation

1. Download files.

2. Open file config/app.php, find array "Datasources" and setup values of indexes 
   relevant for your application:
	- database
	- login
	- password.

3. Make the migration. Run

```bash
	cake migration migrate
```

:star: Try it! :star:
OrderPro
========

OrderPro is a web-based product and order management system built with `CodeIgniter 3 <https://codeigniter.com/>`_, designed to help you import, manage, and track products efficiently. It features a modern UI, product import via Excel/CSV, and robust error handling.

----

Features
--------

- Import products from Excel or CSV files using a user-friendly interface
- View and manage products
- Dashboard for quick navigation
- Authentication and session management
- Error and success flash messages for user feedback

----

Requirements
------------

- **PHP**: 7.2 or newer (PHP 8.x supported)
- **XAMPP**: Recommended for local development (`Download XAMPP <https://www.apachefriends.org/download.html>`_)
- **Composer**: For dependency management (`Get Composer <https://getcomposer.org/>`_)
- **MySQL**: For database storage

----

Installation
------------

1. **Clone the Repository**

   .. code-block:: sh

      git clone https://github.com/Vikashjain2/OneNorthShip.git
      cd OneNorthShip

2. **Install Composer Dependencies**

   Make sure `Composer <https://getcomposer.org/>`_ is installed, then run:

   .. code-block:: sh

      composer install

   This will install all dependencies, including `phpoffice/phpspreadsheet <https://github.com/PHPOffice/PhpSpreadsheet>`_, which is required for Excel/CSV import.

3. **XAMPP Setup**

   - Download and install `XAMPP <https://www.apachefriends.org/download.html>`_.
   - Place the project folder inside ``C:\xampp\htdocs\`` (Windows) or ``/Applications/XAMPP/htdocs/`` (Mac).
   - Start Apache and MySQL from the XAMPP Control Panel.

4. **Database Setup**

   - Create a new MySQL database (e.g., ``one_north_ship``).
   - Import the provided SQL file:

     .. code-block:: sh

        # In phpMyAdmin or MySQL CLI:
        mysql -u root -p one_north_ship < db/one_north_ship.sql

   - Update your database credentials in ``application/config/database.php``.

5. **PHP Configuration (php.ini)**

   To support large file uploads and ensure PhpSpreadsheet works correctly, update your ``php.ini`` (usually found in ``C:\xampp\php\php.ini``):

   .. code-block:: ini
      ; Enable required extensions
      extension=mbstring
      extension=gd2
      extension=zip
      extension=xml
      extension=iconv

   **After editing ``php.ini``, restart Apache from the XAMPP Control Panel.**

----

Usage
-----

1. Visit http://localhost/OneNorthShip in your browser.
2. Log in with your credentials.

----

Adding Composer Packages
------------------------

To add PHP packages, use Composer:

.. code-block:: sh

   composer require phpoffice/phpspreadsheet

----

Project Structure
-----------------

.. code-block:: text

   application/
       controllers/
       models/
       views/
       config/
       ...
   assets/
       uploads/
   db/
       one_north_ship.sql
   system/
   vendor/
       autoload.php
       phpoffice/
       ...
   index.php
   composer.json

----

Dependencies
------------

- `CodeIgniter 3 <https://codeigniter.com/>`_
- `phpoffice/phpspreadsheet <https://github.com/PHPOffice/PhpSpreadsheet>`_
- `Composer <https://getcomposer.org/>`_

----

License
-------

This project is licensed under the MIT License. See ``license.txt`` for details.

----

Credits
-------

- CodeIgniter Team
- `PhpSpreadsheet <https://github.com/PHPOffice/PhpSpreadsheet>`_
- FontAwesome for icons

----

Security
--------

For security issues, please contact the maintainer or use the official CodeIgniter `security reporting channels <https://codeigniter.com/security>`_.

----

Author
------

- vikashjain (mailto:vikashjain2205@gmail.com)

----
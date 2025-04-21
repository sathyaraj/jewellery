CodeIgniter 3 Project Setup on XAMPP (Localhost)
------------------------------------------------

Introduction
------------
    This document provides step-by-step instructions to set up a CodeIgniter 3 project on your local machine using XAMPP.

    Requirements

    XAMPP (Apache + MySQL + PHP)

    Web browser

    CodeIgniter 3.x project source code
-------------------------
Setup Instructions

Step 1: Install XAMPP
-------------------------
Download XAMPP from https://www.apachefriends.org

Install and open the XAMPP Control Panel

Start Apache and MySQL services

Step 2: Place Project in htdocs
--------------------------------
Copy your CodeIgniter project folder into the XAMPP htdocs directory:

C:\xampp\htdocs\jewelry

Step 3: Configure Base URL
---------------------------
Open application/config/config.php

Set your base URL:

$config['base_url'] = 'http://localhost/jewelry/';

Step 4: Import the Database
----------------------------
Go to http://localhost/phpmyadmin

Create a new database (e.g., jewelry)

Import the provided .sql file into the database

Step 5: Set Database Configuration
-----------------------------------
Open application/config/database.php

Update the configuration:

$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'jewelry',
    'dbdriver' => 'mysqli',
    // other settings remain unchanged
);

Step 6: Run the Project
------------------------
Open your browser and navigate to:

http://localhost/jewelry/

The homepage should load successfully if everything is set correctly

Folder Structure Overview

application/ – Controllers, Models, Views

system/ – Core CodeIgniter framework

assets/ – CSS, JS, Images

upload/ – Uploaded images/files

index.php – Entry point

.htaccess – URL rewriting

Troubleshooting

Ensure mod_rewrite is enabled for pretty URLs

Check error logs if the page does not load

Verify base_url and database config settings


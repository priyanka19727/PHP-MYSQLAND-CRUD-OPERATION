# PHP MySQL CRUD Website

## 💾 Requirements:
- XAMPP/WAMP
- PHP 7.x or above
- MySQL Server

## 🛠 Setup Instructions

1. **Extract ZIP** to `htdocs` folder inside your XAMPP installation.

2. **Create Database:**
   - Go to `http://localhost/phpmyadmin`
   - Create a new database named `crud_demo`
   - Run this SQL:
     ```
CREATE DATABASE IF NOT EXISTS library;

USE library;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    genre VARCHAR(100),
    year INT,
    description TEXT
);


3. **Run the App:**
   - Start Apache and MySQL from XAMPP Control Panel.
   - Open browser and go to:
     ```
     http://localhost/php-mysql-crud-site/
     ```

You can now add, edit, and delete users.

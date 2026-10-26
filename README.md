
# PHP Login System

A user authentication system built with **PHP** and **MySQL**, organized using an MVC-style structure (Model, View, Controller) to keep the code clean, reusable, and easy to maintain.

## Features

- User signup with server-side validation
- Secure login with password verification
- Secure session configuration
- Separation of concerns (database, model, view, controller)
- Database access through PDO with prepared statements
- Hashed passwords (never stored in plain text)

## Project Structure

Login System/
├── css/ # Stylesheets
├── includes/
│ ├── config_session.inc.php # Secure session settings
│ ├── dbh.inc.php # Database connection handler (PDO)
│ ├── login.inc.php # Login processing
│ ├── signup.inc.php # Signup processing
│ ├── signup_contr.inc.php # Signup controller (validation logic)
│ ├── signup_model.inc.php # Signup model (database queries)
│ └── signup_view.inc.php # Signup view (displays errors/messages)
├── db.sql # Database schema
└── index.php # Main page (login and signup forms)

## How It Works

| File | Role |
|------|------|
| `dbh.inc.php` | Connects to the database |
| `signup_model.inc.php` | Runs the SQL queries |
| `signup_contr.inc.php` | Validates input and handles the logic |
| `signup_view.inc.php` | Shows feedback to the user |
| `config_session.inc.php` | Starts sessions securely |

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/login-system.git
   ```
2. Move the folder into your server directory (e.g., `htdocs` for XAMPP).
3. Create a database in phpMyAdmin and import `db.sql`.
4. Update your credentials in `includes/dbh.inc.php`:
   ```php
   $dsn = "mysql:host=localhost;dbname=your_database";
   $dbusername = "root";
   $dbpassword = "";
   ```
5. Open `http://localhost/Login%20System/` in your browser.

## Tech Stack

- PHP 8+
- MySQL
- HTML & CSS
- Apache (XAMPP / WAMP / LAMP)

## Future Improvements

- Email verification
- Password reset
- CSRF protection
- Remember me option
- User roles and dashboard



## Author

[@John-/Muriungi](https://github.com/John-Muriungi)

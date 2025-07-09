
# 🔐 PHP Login App

This is a beginner-friendly **Login System built with PHP and MySQL**, designed to help understand backend authentication using sessions and hashed passwords.

## ✅ Features
- User **registration** with basic form validation
- **Secure login** using PHP sessions
- Passwords stored using `password_hash()` and verified with `password_verify()`
- **Protected dashboard** page accessible only after login
- Simple folder structure for easy learning

## 🛠 Tech Stack
- PHP (Core backend)
- MySQL (Database)
- HTML/CSS (Frontend)
- XAMPP (Local server environment)

## 📁 Project Structure
/login_app
├── config/ → Database connection file
├── register.php → Registration form and logic
├── login.php → Login logic with sessions
├── dashboard.php → Page after login
├── logout.php → Ends session and logs out
└── style.css → Basic styling 


## 🚀 How to Run
1. Copy the project folder into `htdocs` in XAMPP
2. Start Apache and MySQL via XAMPP
3. Create a MySQL database (e.g., `login_db`) and import the `users` table if provided
4. Update DB credentials in `config/db.php`
5. Open browser and visit: `http://localhost/login_app/`

## 🛡️ Note
This is for learning purposes only. For production, implement stronger validation and CSRF protection.

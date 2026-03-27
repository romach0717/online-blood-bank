# Online Blood Bank Web App

## Tech stack
- HTML, CSS, JavaScript
- PHP (with session-based auth)
- MySQL (phpMyAdmin compatible)

## Setup
1. Install XAMPP/WAMP and start Apache + MySQL.
2. Copy this folder into `htdocs` (XAMPP) or WWW folder (WAMP).
3. Open phpMyAdmin and run `blood_bank.sql` to create DB + tables + sample data.
4. Configure DB credentials in `db.php` if needed.
5. Visit `http://localhost/BB_system/index.php`.

## Features
- Donor registration
- Blood request submission
- Search donor by blood group + city
- Admin login + approval flow
- Data listed in tables with status

## Files
- `db.php`: database connection
- `index.php`: public landing
- `donor_register.php`, `donor_list.php`
- `request_blood.php`, `request_list.php`
- `admin_login.php`, `admin_dashboard.php`, `admin_actions.php`, `admin_logout.php`
- `style.css`, `main.js`
- `blood_bank.sql`: DB schema + sample rows

## Use
- Admin: `admin@example.com` / `admin123`
- Donor data is pending until approved by admin.

## Group members
1. Roma Choudhary
# 🎮 Ecommerce Website

A PHP-based e-commerce website developed as an online game store. The platform allows users to browse games by category, create and manage accounts, add games to a shopping cart, complete checkout, and interact with the website through a contact form.

The project was developed and tested locally using **XAMPP, Apache, PHP, MySQL, and phpMyAdmin**.

---

## ✨ Features

### 👤 User Authentication

* User registration
* User login and logout
* Account management
* Profile management
* Password management

### 🎮 Game Catalogue

* Browse available games
* Browse games by category
* View game information
* Search for games
* Game details and images

### 🛒 Shopping Cart

* Add games to the shopping cart
* View selected games
* Manage cart items
* Calculate purchase totals

### 💳 Checkout & Payments

* Checkout system
* Payment processing
* Store purchased games in the user's account

### 💬 Contact System

* Contact form
* Store submitted contact information in the database

### ⚙️ Admin Area

* Administrative functionality
* Manage website data
* Manage games and categories
* Manage users and other database information

---

## 📸 Screenshots

### 🔐 Authentication

<p align="center">
  <img src="screenshots/login.png" width="45%" alt="Login Page">
  <img src="screenshots/register.png" width="45%" alt="Registration Page">
</p>

### 🎮 Game Categories

<p align="center">
  <img src="screenshots/category.png" width="60%" alt="Game Category Page">
</p>

### 🛒 Shopping Cart

<p align="center">
  <img src="screenshots/shopping-cart.png" width="60%" alt="Shopping Cart">
</p>

### 💳 Checkout

<p align="center">
  <img src="screenshots/checkout.png" width="60%" alt="Checkout Page">
</p>

### 📩 Contact Us

<p align="center">
  <img src="screenshots/contactus.png" width="60%" alt="Contact Us Page">
</p>

---

## 🛠️ Technologies Used

| Technology     | Purpose                       |
| -------------- | ----------------------------- |
| **PHP**        | Server-side application logic |
| **MySQL**      | Database management           |
| **HTML5**      | Website structure             |
| **CSS3**       | Website styling               |
| **JavaScript** | Client-side functionality     |
| **XML**        | Data representation           |
| **XSLT**       | XML transformation            |
| **Apache**     | Web server                    |
| **XAMPP**      | Local development environment |
| **phpMyAdmin** | Database administration       |
| **NuSOAP**     | Web service functionality     |

---

## 🗄️ Database

The website uses a MySQL database named:

```text
mystore
```

The database contains tables including:

```text
users
games
categories
gamesowned
payments
gamecomments
contacts
```

A SQL database backup is included in the repository for reference.

---

## 📂 Project Structure

```text
WEB/
│
├── admin_area/          # Administration functionality
├── CSS/                 # CSS stylesheets
├── CSSxml/              # XML-related styles
├── GameDetails/         # Game details resources
├── image/               # Images and media
├── JAVAScripts/         # JavaScript files
├── NuSoap/              # NuSOAP library
├── PHPScripts/          # PHP application logic
├── PHPxml/              # PHP/XML functionality
├── server/              # Server-side resources
├── XML/                 # XML files
├── screenshots/         # Project screenshots
│
├── index.php            # Main entry point
├── logo.jpeg            # Website logo
└── ...
```

---

## 🏗️ Application Architecture

```text
┌──────────────────────┐
│       Browser        │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│       Apache         │
│      Web Server      │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│        PHP           │
│   Application Logic  │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│        MySQL         │
│       Database       │
└──────────────────────┘
```

---

## 🎯 Project Objectives

This project was developed to gain practical experience in building a database-driven web application.

Key areas covered include:

* Server-side programming with PHP
* Relational database design
* CRUD operations
* User authentication
* Session management
* Shopping cart functionality
* Payment processing
* Dynamic content generation
* XML and XSLT
* Web services
* Client-server architecture
* Local web server configuration

---

## 🔮 Future Improvements

* Responsive design for mobile devices
* Improved UI/UX
* Advanced game search and filtering
* Wishlist functionality
* Game ratings and reviews
* Improved payment integration
* Stronger security and input validation
* REST API integration
* Automated testing
* Production deployment

---


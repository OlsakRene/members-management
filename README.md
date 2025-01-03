# Member Management System (Laravel Project)

This is a **Laravel-based Member Management System** that allows you to manage members and their associated tags. The application provides both **API endpoints** and **web views** for CRUD operations.

---

## 📋 Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Database Schema](#database-schema)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## 🚀 Features
- Manage members and their tags.
- Associate members with tags via a many-to-many relationship.
- Support for both **JSON API requests** and **web views**.
- Fully validated request handling using Laravel Form Requests.
- Supports both **tag names** and **IDs** in API requests.

---

## 🛠️ Installation

### **Clone the Repository:**
```bash
git clone https://github.com/your-username/your-repository.git
cd your-repository
```
### **Install Dependencies:**
```bash
composer install
```
### **Set Up Environment:**
1. Copy the .env.example file and rename it to .env.
2. Configure your database and other environment variables
```bash
cp .env.example .env
```
### **Generate Application Key:**
```bash
php artisan key:generate
```
### **Run Migrations:**
```bash
php artisan migrate
```
### **Run the Application:**
```bash
php artisan serve
```

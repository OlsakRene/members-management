# Member Management System (Laravel Project)

This is a **Laravel-based Member Management Project** that allows you to manage members and their associated tags. The application provides both **API endpoints** and **web views** for CRUD operations.

---

## 🚀 Features
- Manage members and their tags.
- Associate members with tags via a many-to-many relationship.
- Support for both **JSON API requests** and **web views**.
- Fully validated request handling using Laravel Form Requests.

---

## 🛠️ Installation

### **Clone the Repository:**
```bash
git clone https://github.com/OlsakRene/members-management.git
cd members-management
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
### **If you want to use the seeder:**
```bash
php artisan db:seed
```

## Usage

**For API**, I used POSTMAN and added **Content-Type: application/json** and **Accept: application/json** to headers

### **Example for creating user with JSON in for example POSTMAN:**
```bash
{
  "first_name": "John",
  "last_name": "Doe",
  "email": "john.doe@example.com",
  "birth_date": "1990-01-01",
  "tags": [1,2,3]
}
```

### **Example for creating tag:**
```bash
{
  "name": "VIP",
}
```

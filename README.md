# **DigiNepal – Blog Management System**

A clean and feature-rich **Blog Management System** built using **Laravel 12**, **PHP 8.1**, and **MySQL**.

The system includes **role-based authentication** with two roles:

* **User**
* **Admin**

Users can manage their own posts, while admins handle posts, categories, users, analytics, and moderation.
The frontend is built with **Blade** and **TailwindCSS**.

---
## **Technologies Used**
* **Backend:** Laravel 12 (PHP 8.1)
* **Frontend:** Blade, TailwindCSS
* **Database:** MySQL
* **Authentication:** Laravel Breeze (Role-based)
* **Notifications:** Slack Webhook
* **Other:** Middleware, Eloquent ORM

---

## **Features**
### **User Features**
* Create, edit, update, delete own blog posts
* Comment on posts
* SEO-friendly slug for every post
* Post view counter
* Browse posts and categories

### **Admin Features**

* Access to full Admin Dashboard
* Manage all posts
* Manage users (assign Admin role)
* Create, edit, delete categories
* View statistics (posts, categories, users, latest posts)
* comments

### **Common Features**

* Secure login & registration
* Password hashing
* Role-protected routes
* Slack notification when a post is published

---

## **Role Middleware**

Roles used in the project:
```
User  
Admin
```
---

## **Installation Guide**

### 1. Clone the Project

```bash
git clone https://github.com/Aakriti-Dhungel/laravel-blog.git
cd laravel-blog
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Add your database details and Slack webhook:

```
SLACK_WEBHOOK_URL="https://hooks.slack.com/services/XXXX/XXXX/XXXX"
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Build Frontend Assets

```bash
npm run dev
```

### 6. Start the Development Server

```bash
php artisan serve
```

Visit the app:

```
http://127.0.0.1:8000
```

---

## **Usage**

### **User Panel**

* Manage personal posts
* Comment on blogs

### **Admin Panel**

* Dashboard access
* Manage posts, categories, and users
* Assign admin role
* View analytics and recent activity
# Ecommerce API

A RESTful E-commerce API built with Laravel and Laravel Sanctum. This project provides authentication, product management, shopping cart functionality, and order management.

---

## Features

* User Registration
* User Login & Logout
* Laravel Sanctum Authentication
* Product CRUD
* Product Pagination
* Shopping Cart
* Order Management
* MySQL Database
* RESTful API

---

## Technologies Used

* Laravel 12
* PHP 8.2+
* MySQL
* Laravel Sanctum
* Composer

---

## Installation

Clone the repository:

```bash
git clone <repository-url>
```

Navigate into the project:

```bash
cd ecommerce_api
```

Install dependencies:

```bash
composer install
```

Copy the environment file:

```bash
cp .env.example .env
```

Windows:

```cmd
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Update your `.env` database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_api
DB_USERNAME=root
DB_PASSWORD=
```

Create the database:

```sql
CREATE DATABASE ecommerce_api;
```

---

# Run the Project (One Command)

Once the project has been installed and configured, start the development server using:

```bash
composer run dev
```

This command automatically:

* Starts the Laravel development server
* Starts the Vite development server
* Starts the Laravel queue listener (if configured)
* Displays application logs

The API will be available at:

```
http://127.0.0.1:8000
```

---

## Database Migration

Run all migrations:

```bash
php artisan migrate
```

If starting fresh:

```bash
php artisan migrate:fresh
```

---

## API Authentication

This project uses **Laravel Sanctum**.

Register:

```
POST /api/register
```

Login:

```
POST /api/login
```

Include the returned token in every authenticated request:

```
Authorization: Bearer YOUR_TOKEN
```

Logout:

```
POST /api/logout
```

---

## API Endpoints

### Authentication

| Method | Endpoint      |
| ------ | ------------- |
| POST   | /api/register |
| POST   | /api/login    |
| POST   | /api/logout   |

---

### Products

| Method | Endpoint           | Description                  |
| ------ | ------------------ | ---------------------------- |
| GET    | /api/products      | Get all products (paginated) |
| POST   | /api/products      | Create product               |
| GET    | /api/products/{id} | Get product                  |
| PUT    | /api/products/{id} | Update product               |
| DELETE | /api/products/{id} | Delete product               |

Pagination example:

```
GET /api/products?page=1&per_page=10
```

---

### Shopping Cart

| Method | Endpoint       |
| ------ | -------------- |
| GET    | /api/cart      |
| POST   | /api/cart      |
| GET    | /api/cart/{id} |
| PUT    | /api/cart/{id} |
| DELETE | /api/cart/{id} |

---

### Orders

| Method | Endpoint         |
| ------ | ---------------- |
| GET    | /api/orders      |
| POST   | /api/orders      |
| GET    | /api/orders/{id} |
| PUT    | /api/orders/{id} |
| DELETE | /api/orders/{id} |

---

## Testing with Postman

1. Register a user.
2. Login to obtain a Bearer Token.
3. Create products.
4. View paginated products.
5. Add products to the cart.
6. Checkout by creating an order.
7. View orders.
8. Logout.

---

## Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php
│       ├── ProductController.php
│       ├── CartController.php
│       └── OrderController.php
├── Models/
│   ├── User.php
│   ├── Product.php
│   ├── CartItem.php
│   ├── Order.php
│   └── OrderItem.php

database/
├── migrations/

routes/
└── api.php
```

---

## Useful Commands

Generate a controller:

```bash
php artisan make:controller ProductController --api
```

Generate a model with migration:

```bash
php artisan make:model Product -m
```

Run migrations:

```bash
php artisan migrate
```

Refresh database:

```bash
php artisan migrate:fresh
```

View API routes:

```bash
php artisan route:list --path=api
```

Clear caches:

```bash
php artisan optimize:clear
```

---

## License

This project is open-source and available under the MIT License.

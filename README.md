# Ecommerce API

A RESTful E-commerce API built with Laravel 12 and Laravel Sanctum. The project provides secure authentication, product management, shopping cart functionality, and order management.

---

# Features

* User Registration
* User Login & Logout
* Laravel Sanctum Authentication
* Token Expiration (24 Hours)
* Product CRUD
* Product Pagination
* Shopping Cart
* Order Management
* RESTful API
* MySQL Database

---

# Tech Stack

## Backend

* Laravel 12
* PHP 8.2+
* MySQL
* Laravel Sanctum

## Frontend

* React (Vite)
* Axios
* React Router DOM

---

# Installation

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

Configure your database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_api
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

---

# Running the Project

## Backend

Start Laravel using a single command:

```bash
composer run dev
```

The API will be available at:

```
http://127.0.0.1:8000
```

---

## Frontend

Navigate to the frontend project:

```bash
cd ecommerce-frontend
```

Install dependencies:

```bash
npm install
```

Run React:

```bash
npm run dev
```

Frontend URL:

```
http://localhost:5173
```

---

# Authentication

The project uses **Laravel Sanctum**.

## Register

```
POST /api/register
```

## Login

```
POST /api/login
```

Returns

```json
{
    "token": "...",
    "expires_in": 1440,
    "user": {}
}
```

Use the token in every request.

```
Authorization: Bearer YOUR_TOKEN
```

## Logout

```
POST /api/logout
```

---

# API Endpoints

## Authentication

| Method | Endpoint      |
| ------ | ------------- |
| POST   | /api/register |
| POST   | /api/login    |
| POST   | /api/logout   |
| GET    | /api/health   |

---

## Products

| Method | Endpoint           | Description               |
| ------ | ------------------ | ------------------------- |
| GET    | /api/products      | List products (paginated) |
| POST   | /api/products      | Create product            |
| GET    | /api/products/{id} | Get product               |
| PUT    | /api/products/{id} | Update product            |
| DELETE | /api/products/{id} | Delete product            |

Pagination example:

```
GET /api/products?page=1&per_page=10
```

---

## Cart

| Method | Endpoint       |
| ------ | -------------- |
| GET    | /api/cart      |
| POST   | /api/cart      |
| GET    | /api/cart/{id} |
| PUT    | /api/cart/{id} |
| DELETE | /api/cart/{id} |

---

## Orders

| Method | Endpoint         |
| ------ | ---------------- |
| GET    | /api/orders      |
| POST   | /api/orders      |
| GET    | /api/orders/{id} |
| PUT    | /api/orders/{id} |
| DELETE | /api/orders/{id} |

---

# Database Structure

```
users
products
cart_items
orders
order_items
```

Relationships:

```
User
 ├── hasMany Orders
 └── hasMany CartItems

Order
 ├── belongsTo User
 └── hasMany OrderItems

OrderItem
 ├── belongsTo Order
 └── belongsTo Product

Product
 ├── hasMany CartItems
 └── hasMany OrderItems
```

---

# React Integration

The React frontend communicates with Laravel using Axios.

Authentication is handled by Laravel Sanctum using Bearer Tokens stored in Local Storage.

Current frontend modules:

* Login
* Register
* Products
* Product Pagination
* Shopping Cart (In Progress)
* Orders (In Progress)

---

# Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php
│       ├── ProductController.php
│       ├── CartController.php
│       └── OrderController.php

app/
└── Models/
    ├── User.php
    ├── Product.php
    ├── CartItem.php
    ├── Order.php
    └── OrderItem.php

database/
└── migrations/

routes/
└── api.php
```

---

# Useful Commands

Create a controller:

```bash
php artisan make:controller ProductController --api
```

Create a model:

```bash
php artisan make:model Product -m
```

Run migrations:

```bash
php artisan migrate
```

Reset database:

```bash
php artisan migrate:fresh
```

List routes:

```bash
php artisan route:list --path=api
```

Clear cache:

```bash
php artisan optimize:clear
```

---

# API Testing

The API can be tested using:

* Postman
* Insomnia
* Thunder Client (VS Code)

Recommended test flow:

1. Register
2. Login
3. Create Product
4. View Products
5. Add Product to Cart
6. View Cart
7. Checkout
8. View Orders
9. Logout

---

# Current Status

## Backend

* ✅ Authentication
* ✅ Sanctum
* ✅ Product CRUD
* ✅ Pagination
* ✅ Cart API
* ✅ Orders API

## Frontend

* ✅ React + Vite
* ✅ Axios
* ✅ Authentication
* ✅ Login
* ✅ Register
* ✅ Product Listing
* 🚧 Shopping Cart
* 🚧 Checkout
* 🚧 Orders

---

# License

MIT License

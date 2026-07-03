# Laravel Project Initialization for ECOMMERCE-API

This guide provides the basic steps required to initialize and run a the ECOMMERCE-API.

---

# Prerequisites

Ensure the following are installed:

- PHP 8.2 or later
- Composer
- MySQL
- Git 
- Node.js & npm (for frontend assets)

Check installations:

```bash
php -v
composer -V
mysql --version
node -v
npm -v
```

---

# 1. Create a New Laravel Project

Using Composer:

```bash
composer create-project laravel/laravel ECOMMERCE-API
```

Or using the Laravel Installer:

```bash
laravel new ECOMMERCE-API
```

---

# 2. Navigate to the Project

```bash
cd ECOMMERCE-API
```

---

# 3. Start the Development Server

```bash
php artisan serve
```

Default URL:

```
http://127.0.0.1:8000
```

---

# 4. Configure Environment

Copy the example environment file.

```bash
cp .env.example .env
```

On Windows:

```cmd
copy .env.example .env
```

---

# 5. Generate Application Key

```bash
php artisan key:generate
```

---

# 6. Configure Database

Edit the `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_api
DB_USERNAME=root
DB_PASSWORD=root
```

Create the database manually in MySQL.

Example:

```sql
CREATE DATABASE ecommerce_api;
```

---

# 7. Run Migrations

```bash
php artisan migrate
```

---

# 8. Seed Database

Run default seeders:

```bash
php artisan db:seed
```

Or migrate and seed together:

```bash
php artisan migrate:fresh --seed
```

---

# 9. Install Frontend Dependencies (Optional)

```bash
npm install
```

Run Vite development server:

```bash
npm run dev
```

Build production assets:

```bash
npm run build
```

---

# 10. Useful Artisan Commands

Create a controller:

```bash
php artisan make:controller ProductController
```

Create a model:

```bash
php artisan make:model Product
```

Create a model with migration, controller, factory, and seeder:

```bash
php artisan make:model Product -mcrfs
```

Create a migration:

```bash
php artisan make:migration create_products_table
```

Run migrations:

```bash
php artisan migrate
```

Rollback last migration:

```bash
php artisan migrate:rollback
```

Refresh database:

```bash
php artisan migrate:fresh
```

Refresh and seed:

```bash
php artisan migrate:fresh --seed
```

List all routes:

```bash
php artisan route:list
```

Clear cache:

```bash
php artisan optimize:clear
```

Clear configuration cache:

```bash
php artisan config:clear
```

Cache configuration:

```bash
php artisan config:cache
```

---
## API Endpoints

### Authentication

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | /api/register | Register a new user |
| POST | /api/login | Authenticate user |
| POST | /api/logout | Logout authenticated user |
| GET | /api/health | check API health |


### Products

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/products | Get all products |
| GET | /api/products/{id} | Get a single product |
| POST | /api/products | Create a product |
| PUT | /api/products/{id} | Update a product |
| DELETE | /api/products/{id} | Delete a product |

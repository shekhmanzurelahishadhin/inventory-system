
# Inventory & Sales Management System

This is a simple inventory and sales management application built with **Laravel**. It includes product management, sales tracking, stock handling, accounting journals, and financial reporting.

---

## ⚙️ Requirements

- **PHP 8.2**
- **Composer**
- **Laravel 12**
- A database (e.g., MySQL)

---

## 🚀 Features

### ✅ Inventory Module
- Product entry (with price and stock)
- Product listing and restocking
- Stock automatically reduced on sale

### ✅ Sales Module
- Create sales with:
  - Quantity
  - Discount
  - VAT
  - Paid amount
- Automatically deducts stock
- Tracks paid and due amounts

### ✅ Accounting Journals (Auto-Logged)
- Sales
- Discount
- VAT
- Payment (cash or due)
- Opening stock
- Expenses

### ✅ Financial Reporting
- Filterable by date range
- Shows:
  - Total sales
  - Total expenses
  - Total VAT
  - Total discount
  - Paid amount
  - Opening stock value
  - Profit calculation

---

## 📂 Folder Structure

- `/app/Models/` – Models for Product, Sale, Journal, Expense
- `/app/Http/Controllers/` – Logic for managing inventory, sales, and reports
- `/resources/views/` – Blade templates for listing, creating, and reporting
- `/routes/web.php` – Web routes
- `/database/migrations/` – DB schema for products, sales, journals, expenses

---

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/shekhmanzurelahishadhin/inventory-system.git
cd inventory-system
```

2. Install dependencies:

```bash
composer install
```

3. Copy and configure `.env`:

```bash
cp .env.example .env
php artisan key:generate
```

4. Set your database credentials in `.env`:

```dotenv
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations:

```bash
php artisan migrate
```

6. Serve the app:

```bash
php artisan serve
```

> By default, the app runs on http://localhost:8000

---

## 📊 Sample Pages

| Route              | Description              |
|-------------------|--------------------------|
| `/products`        | Product list & restock   |
| `/products/create` | Add new product          |
| `/sales/create`    | Create a new sale        |
| `/sales/index`     | List all sales           |
| `/reports`         | Financial reports        |

---

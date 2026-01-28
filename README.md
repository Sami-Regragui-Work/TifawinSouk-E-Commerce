# TifawinSouk - E-Commerce Back-Office Application

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)](https://mysql.com)
[![License](https://img.shields.io/badge/License-Educational-green.svg)](LICENSE)

> A monolithic web application for managing categories and products, built with Laravel MVC architecture for educational purposes.

**Project by:** Sami Regragui  
**Purpose:** Educational Project - Laravel MVC Development

---

## Table of Contents

1. [About the Project](#about-the-project)
2. [Project Context](#project-context)
3. [Key Features](#key-features)
4. [Technologies Used](#technologies-used)
5. [Architecture](#architecture)
6. [User Stories](#user-stories)
7. [Installation Guide](#installation-guide)
8. [Database Schema](#database-schema)
9. [Project Structure](#project-structure)
10. [Performance Optimization](#performance-optimization)
11. [Testing](#testing)
<!-- 12. [Jira Planning](#jira-planning) -->
12. [Bonus Features](#bonus-features)
13. [Performance Criteria](#performance-criteria)
14. [Contributing](#contributing)
15. [License](#license)
16. [Contact](#contact)

---

<h2 id="about-the-project">📋 About the Project</h2>

TifawinSouk is a monolithic web application designed for a Moroccan SME specializing in local commerce. The application provides a comprehensive back-office for administrators to manage their product catalog and a minimal public interface for customers to browse categories and view products.

### Objectives

- **For Administrative Staff:** Easily manage categories and products (CRUD operations)
- **For Customers:** Navigate by category, browse product lists, and view detailed product information
- **Educational Goal:** Master Laravel MVC architecture and best practices

---

<h2 id="project-context">🎯 Project Context</h2>

As part of the digitalization initiative, TifawinSouk requires a web application that allows:

- **Back-office management:** Complete control over categories and products
- **Public interface:** Simple and intuitive navigation for end customers
- **Secure access:** Authentication system for administrative operations
- **Performance:** Fast loading times and optimized database queries

---

<h2 id="key-features">✨ Key Features</h2>

### Back-Office Features

#### Category Management
- ✅ Create new categories
- ✅ Update existing categories
- ✅ Delete categories
- ✅ View all categories
- **Fields:** id, name, slug, description

#### Product Management
- ✅ Create new products
- ✅ Update existing products
- ✅ Delete products
- ✅ View all products
- ✅ Upload product images
- **Fields:** id, name, reference, short_description, price, stock, category_id, image

### Public Interface Features

- 📂 List all categories
- 📦 View products by category (with pagination)
- 🔍 Detailed product view
- 🔐 Secure authentication for back-office access

### Security & Validation

- 🔒 Secure authentication system
- ✔️ Server-side validation
- 📝 Required field validation
- 💰 Price format validation
- 📊 Stock validation (>= 0)
- 🖼️ Image upload handling via Laravel Storage

### User Experience

- ✅ Success notifications
- ❌ Error notifications
- 📝 Activity logs

---

<h2 id="technologies-used">🛠️ Technologies Used</h2>

### Backend
- **Framework:** Laravel (stable version)
- **Template Engine:** Blade
- **Database:** MySQL / MariaDB
- **Authentication:** Laravel Breeze / UI
- **ORM:** Eloquent

### Frontend
- **HTML5**
- **CSS3**
- **JavaScript** (Vanilla - no SPA required)
- **Bootstrap** (optional for styling)

### Development Tools
- **PHP:** 8.1+
- **Composer**
- **Node.js & NPM**
- **Git**

---

<h2 id="architecture">🏗️ Architecture</h2>

This application follows the **MVC (Model-View-Controller)** architecture pattern provided by Laravel:

```
┌─────────────────────────────────────────┐
│           Client Browser                │
└──────────────┬──────────────────────────┘
               │
               ▼
┌─────────────────────────────────────────┐
│            Routes (Web)                 │
│  ├─ Public Routes                       │
│  └─ Protected Routes (Middleware)       │
└──────────────┬──────────────────────────┘
               │
               ▼
┌─────────────────────────────────────────┐
│          Controllers                    │
│  ├─ CategoryController                  │
│  └─ ProductController                   │
└──────────────┬──────────────────────────┘
               │
               ▼
┌─────────────────────────────────────────┐
│            Models                       │
│  ├─ Category (Eloquent)                 │
│  └─ Product (Eloquent)                  │
└──────────────┬──────────────────────────┘
               │
               ▼
┌─────────────────────────────────────────┐
│           Database (MySQL)              │
│  ├─ categories                          │
│  └─ products                            │
└─────────────────────────────────────────┘
               │
               ▼
┌─────────────────────────────────────────┐
│            Views (Blade)                │
│  ├─ Back-office Templates               │
│  └─ Public Templates                    │
└─────────────────────────────────────────┘
```

---

<h2 id="user-stories">📖 User Stories</h2>

### Administrator Stories

1. **As an administrator**, I can log in to access the back-office.
2. **As an administrator**, I can create a new category with a name and description.
3. **As an administrator**, I can create a new product by assigning it to a category and entering price, stock, and description.
4. **As an administrator**, I can edit or delete a category or product.
5. **As an administrator**, I can upload product images.

### Public User Stories

6. **As a public user**, I can view the list of categories.
7. **As a public user**, I can navigate to a category and see the products associated with it.
8. **As a public user**, I can view the detailed information of a product.

---

<h2 id="installation-guide">🚀 Installation Guide</h2>

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM
- Git

### Step-by-Step Installation

```bash
# 1. Clone the repository
git clone https://github.com/samiregragui/tifawinsouk.git
cd tifawinsouk

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Create environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tifawinsouk
DB_USERNAME=your_username
DB_PASSWORD=your_password

# 7. Run migrations
php artisan migrate

# 8. Seed the database (optional)
php artisan db:seed

# 9. Create storage link
php artisan storage:link

# 10. Build frontend assets
npm run dev

# 11. Start the development server
php artisan serve
```

The application will be available at `http://localhost:8000`

### Default Admin Credentials

After seeding, you can log in with:
- **Email:** admin@tifawinsouk.ma
- **Password:** password

---

<h2 id="database-schema">💾 Database Schema</h2>

### Categories Table

| Field       | Type         | Constraints                    |
|-------------|--------------|--------------------------------|
| id          | BIGINT       | PRIMARY KEY, AUTO_INCREMENT    |
| name        | VARCHAR(255) | NOT NULL                       |
| slug        | VARCHAR(255) | UNIQUE, NOT NULL               |
| description | TEXT         | NULLABLE                       |
| created_at  | TIMESTAMP    | NULLABLE                       |
| updated_at  | TIMESTAMP    | NULLABLE                       |
| deleted_at  | TIMESTAMP    | NULLABLE (Soft Delete)         |

### Products Table

| Field             | Type          | Constraints                              |
|-------------------|---------------|------------------------------------------|
| id                | BIGINT        | PRIMARY KEY, AUTO_INCREMENT              |
| name              | VARCHAR(255)  | NOT NULL                                 |
| reference         | VARCHAR(100)  | UNIQUE, NOT NULL                         |
| short_description | TEXT          | NULLABLE                                 |
| price             | DECIMAL(10,2) | NOT NULL, >= 0                           |
| stock             | INTEGER       | NOT NULL, DEFAULT 0, >= 0                |
| category_id       | BIGINT        | FOREIGN KEY → categories.id, ON DELETE CASCADE |
| image             | VARCHAR(255)  | NULLABLE                                 |
| created_at        | TIMESTAMP     | NULLABLE                                 |
| updated_at        | TIMESTAMP     | NULLABLE                                 |
| deleted_at        | TIMESTAMP     | NULLABLE (Soft Delete)                   |

### Relationships

- **Category** has many **Products** (One-to-Many)
- **Product** belongs to **Category** (Many-to-One)

---

<h2 id="project-structure">📁 Project Structure</h2>

```
tifawinsouk/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CategoryController.php
│   │   │   ├── ProductController.php
│   │   │   └── DashboardController.php
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php
│   │   └── Requests/
│   │       ├── StoreCategoryRequest.php
│   │       ├── UpdateCategoryRequest.php
│   │       ├── StoreProductRequest.php
│   │       └── UpdateProductRequest.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Product.php
│   │   └── User.php
│   └── Providers/
├── database/
│   ├── factories/
│   │   ├── CategoryFactory.php
│   │   └── ProductFactory.php
│   ├── migrations/
│   │   ├── xxxx_create_categories_table.php
│   │   ├── xxxx_create_products_table.php
│   │   └── xxxx_create_users_table.php
│   └── seeders/
│       ├── CategorySeeder.php
│       ├── ProductSeeder.php
│       └── UserSeeder.php
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   ├── categories/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   └── show.blade.php
│   │   │   ├── products/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   └── show.blade.php
│   │   │   └── dashboard.blade.php
│   │   ├── public/
│   │   │   ├── categories/
│   │   │   │   └── index.blade.php
│   │   │   ├── products/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── show.blade.php
│   │   │   └── home.blade.php
│   │   └── layouts/
│   │       ├── app.blade.php
│   │       ├── admin.blade.php
│   │       └── public.blade.php
│   └── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
├── storage/
│   └── app/
│       └── public/
│           └── products/
├── tests/
│   ├── Feature/
│   └── Unit/
├── .env.example
├── composer.json
├── package.json
└── README.md
```

---

<h2 id="performance-optimization">⚡ Performance Optimization</h2>

### 1. Eloquent Query Optimization

```php
// Use eager loading to avoid N+1 problems
$products = Product::with('category')->paginate(15);

// Select only necessary columns
$categories = Category::select('id', 'name', 'slug')->get();
```

### 2. Caching Strategy

```php
// Cache frequently accessed data
$categories = Cache::remember('categories', 3600, function () {
    return Category::all();
});
```

### 3. Database Indexing

- Index on `categories.slug`
- Index on `products.reference`
- Index on `products.category_id`
- Composite index on frequently filtered columns

### 4. View Optimization

- Use Blade component caching
- Minimize database queries in views
- Implement pagination for large datasets
- Lazy load images

### 5. Asset Optimization

```bash
# Production build
npm run build
```

---

<h2 id="testing">🧪 Testing</h2>

### Running Tests

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage
```

### Test Categories

- **Unit Tests:** Model relationships, business logic
- **Feature Tests:** HTTP requests, CRUD operations
- **Browser Tests:** End-to-end user workflows (optional)

---

<!-- <h2 id="jira-planning">📊 Jira Planning</h2>

### Epic Structure

**Epic 1: Project Setup & Configuration**
- Story: Initialize Laravel project
- Story: Configure database and environment
- Story: Set up authentication system
- Story: Create base layouts and components

**Epic 2: Category Management**
- Story: Create Category model and migration
- Story: Implement Category CRUD operations
- Story: Create Category views (index, create, edit)
- Story: Add validation for Category forms
- Story: Implement Category seeder and factory

**Epic 3: Product Management**
- Story: Create Product model and migration
- Story: Implement Product CRUD operations
- Story: Create Product views (index, create, edit, show)
- Story: Add validation for Product forms
- Story: Implement image upload functionality
- Story: Implement Product seeder and factory

**Epic 4: Public Interface**
- Story: Create public category listing page
- Story: Create public product listing page with pagination
- Story: Create product detail page
- Story: Implement navigation and routing

**Epic 5: Performance Optimization**
- Story: Implement query optimization
- Story: Add caching layer
- Story: Implement soft deletes
- Story: Add database indexes
- Story: Optimize views and assets

**Epic 6: Testing & Quality Assurance**
- Story: Write unit tests for models
- Story: Write feature tests for controllers
- Story: Perform performance testing
- Story: Code review and refactoring

### Sprint Breakdown (2-week sprints)

**Sprint 1:** Project Setup + Authentication + Category Management  
**Sprint 2:** Product Management + Image Upload  
**Sprint 3:** Public Interface + Navigation  
**Sprint 4:** Optimization + Testing + Documentation  

### Task Estimation (Story Points)

- Small tasks (1-2 points): Simple CRUD view, basic validation
- Medium tasks (3-5 points): Controller logic, complex validation, relationships
- Large tasks (8-13 points): Complete feature with tests, image upload system -->

---

<h2 id="bonus-features">🎁 Bonus Features</h2>

### Implemented

- ✅ **Soft Deletes:** Restore deleted products and categories
- ✅ **Seeders & Factories:** Populate database for development
- ✅ **Search Functionality:** Simple product search by name
- ✅ **Category Filters:** Filter products by category

### Future Enhancements

- 🔄 Advanced search with multiple filters
- 🔄 Product variants (size, color)
- 🔄 Inventory tracking
- 🔄 Export data to CSV/Excel
- 🔄 Multi-language support
- 🔄 Product reviews and ratings

---

<h2 id="performance-criteria">📈 Performance Criteria</h2>

This project adheres to the following Laravel best practices:

1. ✅ **CRUD Best Practices:** RESTful routing, resource controllers
2. ✅ **Form Validation:** Server-side validation with custom requests
3. ✅ **Middleware Validation:** Route protection and authorization
4. ✅ **Seeders & Factories:** Data population for testing
5. ✅ **Eloquent Optimization:** Eager loading, query scopes
6. ✅ **Eloquent Relationships:** Proper one-to-many relationships
7. ✅ **Soft Deletes:** Non-destructive data removal
8. ✅ **Query Caching:** Cache frequently accessed data
9. ✅ **Performance Testing:** Load testing and optimization
10. ✅ **View Optimization:** Blade component reusability

---

<h2 id="contributing">🤝 Contributing</h2>

This is an educational project. However, feedback and suggestions are welcome!

### How to Contribute

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

<h2 id="license">📄 License</h2>

This project is created for **educational purposes only**. It is part of a Laravel development learning program.

**Author:** Sami Regragui  
**Institution:** YouCode - UM6P | OCP 
**Year:** 2026

---

<h2 id="contact">📧 Contact</h2>

**Sami Regragui**

- Email: sami.regragui.work@protonmail.com
- GitHub: [@samiregragui](https://github.com/sami-regragui-work)
- LinkedIn: [Sami Regragui](https://linkedin.com/in/samiregragui)

---

## Acknowledgments

- Laravel Documentation
- Laravel Community
- TifawinSouk for the project opportunity
- Educational instructors and mentors

---

**Made with ❤️ by Sami Regragui for educational purposes**
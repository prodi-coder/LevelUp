# 🎮 LevelUp — Game Net Management System

> A desktop-oriented Game Net management application built with Laravel, Vue.js, TypeScript, MySQL and Tauri.

---

# 🇬🇧 English

## 📌 About the Project

**LevelUp** is a Game Net management application designed to provide a simple foundation for managing users and administrative operations in a gaming center.

The project is primarily developed as a **personal portfolio project** to demonstrate practical experience with modern web and desktop application technologies.

The current version focuses on implementing the core application structure, authentication, user management, database communication, role-based access, and a desktop interface.

The project is still under development, and the current version should be considered a **functional development milestone rather than a production-ready application**.

---

## ✨ Current Features

### 🔐 Authentication

The application includes a basic authentication system for users and administrators.

Implemented functionality includes:

* Login using username and password
* Input validation
* Invalid credential handling
* Authentication state management
* User information retrieval
* Role detection
* Automatic redirection based on user role
* Logout functionality
* Authentication-aware navigation

---

### 👥 User Roles

The application currently separates users into different roles.

The main roles implemented are:

* **Administrator**
* **Regular User**

The user's role is retrieved after authentication and is used to determine which parts of the application they can access.

---

### 🛡️ Admin Panel

The application includes a dedicated administration area.

Current administrative functionality includes:

* Admin Dashboard
* User management
* User list
* Creating new users
* Viewing user information
* Administrative navigation
* Role-based access to administrative pages

---

### 👤 User Management

Administrators can manage users through the application.

Implemented functionality includes:

* Viewing users
* Creating users
* Sending user information to the backend
* Receiving user information from the API
* Form validation
* Handling API responses
* Managing user-related data

---

### 🧑‍💻 User Dashboard

Regular users have access to their own dashboard.

The user area is separated from the administration area through routing and role-based navigation.

This structure provides a foundation for adding additional user functionality in the future.

---

### 📝 Form Validation

Validation is implemented on different forms throughout the application.

The current implementation includes validation for:

* Login forms
* User creation forms
* Required input fields
* User-provided data
* Backend request data

Validation is handled both on the client side and, where appropriate, on the backend.

---

### 🌐 API Communication

The frontend communicates with the Laravel backend through HTTP API requests.

The current architecture is:

```text
Vue.js / Tauri
      │
      │ HTTP Requests
      ▼
Laravel API
      │
      ▼
MySQL
```

The API is currently used for operations such as:

* Authentication
* User information
* User management
* Creating users
* Sending form data
* Receiving server responses

---

### 🗃️ Database

The backend uses **MySQL** as its primary database.

Database structure is managed using Laravel migrations.

The current database setup includes structures related to:

* Users
* Authentication tokens
* Days
* Cache
* Jobs
* Laravel application data

The project uses migrations to make database structure reproducible between development environments.

---

### 📅 Day Management

The backend contains a small service dedicated to managing application days.

The current implementation includes:

```text
DayService
├── createMissingDays()
└── createTodayIfNotExists()
```

A Laravel Artisan command is also available for synchronizing days:

```bash
php artisan app:sync-days
```

This provides a reusable backend service for maintaining the application's day/date records.

---

### 🧭 Client-Side Routing

The frontend uses **Vue Router** for navigation.

The current application contains separate routes for areas such as:

```text
/login

/admin/dashboard
/admin/...

/user/dashboard

/404
```

Routing handles:

* Page navigation
* Login redirection
* Role-based navigation
* Dashboard redirection
* Invalid routes
* Not Found pages
* Authentication-related redirects

---

### 📦 State Management

**Pinia** is used for state management on the frontend.

The authentication store manages information related to the currently authenticated user and their authentication state.

This provides a centralized state that can be accessed by different parts of the application.

---

### 💾 Client-Side User Data

The frontend uses **Local Storage** for client-side persistence of user-related information.

It is currently used for purposes such as:

* Keeping basic user information
* Checking whether user information exists
* Reading the user's role
* Deciding where the user should be redirected

Sensitive credentials are not intended to be stored in the repository or committed to Git.

---

### 🖥️ Desktop Application

The frontend is integrated with **Tauri** to run as a desktop application.

The Tauri project is currently located inside the frontend project:

```text
levelup_admin/
└── src-tauri/
```

The desktop layer is implemented using:

* Tauri
* Rust

The application also includes desktop window configuration and controls such as:

* Window minimize
* Window maximize
* Window management
* Desktop application configuration

---

### ⚠️ Error Handling

The application includes basic error handling for common situations.

Current examples include:

* Invalid login information
* Failed API requests
* Invalid navigation
* Missing user information
* Authentication-related redirects
* 404 Not Found page
* Form validation errors

---

### 🎨 User Interface

The frontend UI is divided into separate pages and styles for different application areas.

The CSS structure is organized into sections such as:

```text
src/assets/css/

├── admin/
├── user/
└── global/
```

This keeps styles for administrative pages, user pages, and global components separated.

---

## 🏗️ Architecture

The project currently follows a client-server architecture.

```text
                 ┌───────────────────┐
                 │   Desktop User    │
                 │   / Administrator │
                 └─────────┬─────────┘
                           │
                           ▼
                 ┌───────────────────┐
                 │     Vue.js        │
                 │   TypeScript      │
                 │     Pinia         │
                 │   Vue Router      │
                 └─────────┬─────────┘
                           │
                       HTTP / API
                           │
                           ▼
                 ┌───────────────────┐
                 │     Laravel       │
                 │      API          │
                 │ Controllers       │
                 │ Models / Services │
                 └─────────┬─────────┘
                           │
                           ▼
                 ┌───────────────────┐
                 │      MySQL        │
                 └───────────────────┘

                 ┌───────────────────┐
                 │       Tauri       │
                 │       Rust        │
                 └───────────────────┘
```

---

## 🛠️ Technology Stack

### Frontend

* Vue.js
* TypeScript
* Vite
* Vue Router
* Pinia
* CSS

### Backend

* Laravel
* PHP
* Laravel Sanctum
* REST API
* Laravel Controllers
* Laravel Models
* Laravel Services
* Laravel Migrations

### Desktop

* Tauri
* Rust

### Database

* MySQL

### Development Tools

* Git
* GitHub
* VS Code
* npm
* Composer

---

## 📁 Project Structure

```text
LevelUp/
│
├── levelup_admin/
│   │
│   ├── src/
│   │   ├── assets/
│   │   ├── pages/
│   │   ├── router/
│   │   ├── stores/
│   │   ├── App.vue
│   │   └── main.ts
│   │
│   └── src-tauri/
│       ├── src/
│       ├── icons/
│       ├── capabilities/
│       └── tauri.conf.json
│
├── levelup_server/
│   │
│   ├── app/
│   │   ├── Console/
│   │   ├── Http/
│   │   ├── Models/
│   │   ├── Services/
│   │   └── Providers/
│   │
│   ├── database/
│   │   ├── migrations/
│   │   ├── factories/
│   │   └── seeders/
│   │
│   ├── routes/
│   ├── config/
│   ├── bootstrap/
│   └── public/
│
└── LevelUp.code-workspace
```

---

## 🚀 Running the Project

### Backend

```bash
cd levelup_server
composer install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure the database in `.env`, then run:

```bash
php artisan migrate
```

Start the Laravel development server:

```bash
php artisan serve
```

---

### Frontend

```bash
cd levelup_admin
npm install
```

Start the development server:

```bash
npm run dev
```

---

### Tauri Desktop Application

After configuring the required Tauri environment:

```bash
npm run tauri dev
```

The application can then be launched as a desktop application.

---

## 🔒 Environment Configuration

Environment-specific and sensitive configuration is kept outside the repository.

The backend provides:

```text
levelup_server/.env.example
```

Developers should create their own `.env` file and configure the required database and application settings.

The actual `.env` file should never be committed to Git.

---

## 🗺️ Future Development

The current version is intentionally limited to the core functionality required for a basic Game Net management application.

Future development may include:

* Gaming PC management
* Active gaming sessions
* Session timers
* Session history
* User account balance
* Payment records
* More detailed administration
* Usage statistics
* Reporting
* Improved authorization
* More robust authentication
* Automated testing
* Improved error handling
* A more complete desktop client

These features are planned for future iterations and are not necessarily available in the current version.

---

## 📌 Project Status

**Current status: Functional Development Version**

The project is currently usable as a development application, but it is **not production-ready**.

There may still be:

* Minor bugs
* Unhandled edge cases
* Incomplete features
* Areas requiring refactoring
* UI improvements

The current goal is to maintain a working and presentable version while continuing development incrementally.

---

## 📸 Screenshots

Screenshots and demonstrations of the application will be added here.

Planned examples:

* Login
* Admin Dashboard
* User Management
* Create User
* User Dashboard
* Desktop Application

---

# 🇮🇷 فارسی

## 📌 درباره پروژه

**LevelUp** یک نرم‌افزار مدیریت گیم‌نت است که با هدف ایجاد یک سیستم ساده برای مدیریت کاربران و عملیات مدیریتی یک مجموعه گیمینگ طراحی شده است.

این پروژه در درجه اول به‌عنوان یک **پروژه شخصی و Portfolio** توسعه داده شده تا تجربه عملی در کار با تکنولوژی‌های مدرن توسعه نرم‌افزار را نشان دهد.

نسخه فعلی تمرکز خود را روی پیاده‌سازی ساختار اصلی برنامه، احراز هویت، مدیریت کاربران، ارتباط با دیتابیس، دسترسی بر اساس نقش کاربر و اجرای برنامه به‌صورت Desktop قرار داده است.

پروژه همچنان در حال توسعه است و نسخه فعلی یک **نسخه قابل استفاده در محیط توسعه** محسوب می‌شود و هنوز Production-ready نیست.

---

## ✨ قابلیت‌های فعلی

### 🔐 احراز هویت

برنامه دارای سیستم پایه احراز هویت برای کاربران و ادمین‌ها است.

قابلیت‌های پیاده‌سازی‌شده:

* ورود با Username و Password
* اعتبارسنجی اطلاعات ورودی
* مدیریت اطلاعات ورود اشتباه
* مدیریت وضعیت احراز هویت
* دریافت اطلاعات کاربر
* تشخیص Role
* انتقال خودکار کاربر به مسیر مناسب
* Logout
* مدیریت Navigation بر اساس وضعیت احراز هویت

---

### 👥 نقش‌های کاربری

برنامه کاربران را بر اساس Role از یکدیگر جدا می‌کند.

نقش‌های اصلی فعلی:

* **Administrator**
* **Regular User**

پس از ورود، Role کاربر دریافت شده و برای تعیین سطح دسترسی و مسیرهای قابل دسترسی استفاده می‌شود.

---

### 🛡️ پنل مدیریت

برنامه دارای یک بخش اختصاصی برای مدیریت است.

قابلیت‌های فعلی:

* Admin Dashboard
* مدیریت کاربران
* مشاهده لیست کاربران
* ایجاد کاربر جدید
* مشاهده اطلاعات کاربران
* Navigation مخصوص بخش مدیریت
* محدود کردن دسترسی به صفحات مدیریتی

---

### 👤 مدیریت کاربران

ادمین می‌تواند کاربران سیستم را از طریق برنامه مدیریت کند.

قابلیت‌های فعلی:

* مشاهده کاربران
* ایجاد کاربر
* ارسال اطلاعات کاربر به Backend
* دریافت اطلاعات از API
* اعتبارسنجی فرم
* مدیریت Responseهای API
* مدیریت اطلاعات مربوط به کاربران

---

### 🧑‍💻 داشبورد کاربر

کاربران عادی به Dashboard مخصوص خود دسترسی دارند.

بخش کاربری از بخش مدیریت با استفاده از Routing و Role-based Navigation جدا شده است.

این ساختار امکان اضافه کردن قابلیت‌های بیشتر برای کاربران را در آینده فراهم می‌کند.

---

### 📝 اعتبارسنجی فرم‌ها

در بخش‌های مختلف برنامه Validation پیاده‌سازی شده است.

موارد فعلی شامل:

* فرم Login
* فرم ایجاد کاربر
* بررسی فیلدهای ضروری
* بررسی اطلاعات واردشده توسط کاربر
* بررسی داده‌های درخواست در Backend

اعتبارسنجی در سمت Client و در بخش‌های موردنیاز در Backend نیز انجام می‌شود.

---

### 🌐 ارتباط با API

Frontend از طریق HTTP API با Backend ارتباط برقرار می‌کند.

معماری فعلی:

```text
Vue.js / Tauri
      │
      │ HTTP Requests
      ▼
Laravel API
      │
      ▼
MySQL
```

API برای عملیات مختلفی مانند موارد زیر استفاده می‌شود:

* Authentication
* دریافت اطلاعات کاربر
* مدیریت کاربران
* ایجاد کاربر
* ارسال اطلاعات فرم
* دریافت Response از Server

---

### 🗃️ دیتابیس

Backend پروژه از **MySQL** به‌عنوان دیتابیس اصلی استفاده می‌کند.

ساختار دیتابیس با استفاده از Laravel Migrationها مدیریت می‌شود.

ساختار فعلی شامل موارد مرتبط با:

* کاربران
* Authentication Tokenها
* روزها
* Cache
* Jobs
* اطلاعات موردنیاز Laravel

است.

استفاده از Migration باعث می‌شود ساختار دیتابیس در محیط‌های مختلف قابل ایجاد و بازسازی باشد.

---

### 📅 مدیریت روزها

در Backend یک Service اختصاصی برای مدیریت روزهای برنامه وجود دارد.

پیاده‌سازی فعلی شامل:

```text
DayService
├── createMissingDays()
└── createTodayIfNotExists()
```

همچنین یک Artisan Command برای همگام‌سازی روزها وجود دارد:

```bash
php artisan app:sync-days
```

این بخش یک Service قابل استفاده مجدد برای مدیریت رکوردهای مربوط به روز و تاریخ ایجاد می‌کند.

---

### 🧭 مسیریابی

Frontend با استفاده از **Vue Router** مدیریت می‌شود.

مسیرهای فعلی شامل بخش‌هایی مانند:

```text
/login

/admin/dashboard
/admin/...

/user/dashboard

/404
```

Routing وظایفی مانند موارد زیر را انجام می‌دهد:

* Navigation بین صفحات
* انتقال بعد از Login
* Navigation بر اساس Role
* انتقال به Dashboard مناسب
* مدیریت مسیرهای نامعتبر
* صفحه 404
* Redirectهای مرتبط با Authentication

---

### 📦 مدیریت State

برای مدیریت State در Frontend از **Pinia** استفاده شده است.

Store مربوط به Authentication اطلاعات مربوط به User فعلی و وضعیت احراز هویت او را مدیریت می‌کند.

این کار باعث می‌شود وضعیت Authentication به‌صورت متمرکز در بخش‌های مختلف برنامه قابل دسترسی باشد.

---

### 💾 ذخیره اطلاعات کاربر در Client

Frontend برای نگهداری برخی اطلاعات مربوط به کاربر از **Local Storage** استفاده می‌کند.

این اطلاعات در مواردی مانند:

* نگهداری اطلاعات پایه User
* بررسی وجود اطلاعات کاربر
* خواندن Role
* تصمیم‌گیری برای Redirect

استفاده می‌شوند.

اطلاعات حساس نباید در Repository قرار بگیرند یا در Git Commit شوند.

---

### 🖥️ برنامه Desktop

Frontend با استفاده از **Tauri** به یک نرم‌افزار Desktop تبدیل شده است.

در ساختار فعلی پروژه، Tauri داخل پروژه Frontend قرار دارد:

```text
levelup_admin/
└── src-tauri/
```

لایه Desktop با استفاده از:

* Tauri
* Rust

پیاده‌سازی شده است.

همچنین تنظیمات و کنترل‌های مربوط به Window در برنامه وجود دارد، از جمله:

* Minimize
* Maximize
* مدیریت Window
* تنظیمات مربوط به اجرای Desktop Application

---

### ⚠️ مدیریت خطا

برنامه دارای مدیریت خطای پایه برای شرایط مختلف است.

از جمله:

* اطلاعات ورود اشتباه
* خطاهای API
* Navigation نامعتبر
* نبود اطلاعات User
* Redirectهای Authentication
* صفحه 404
* خطاهای Validation فرم

---

### 🎨 رابط کاربری

رابط کاربری برنامه به صفحات و بخش‌های مختلف تقسیم شده است.

CSS نیز بر اساس قسمت‌های مختلف پروژه سازمان‌دهی شده است:

```text
src/assets/css/

├── admin/
├── user/
└── global/
```

این ساختار باعث جدا شدن Styleهای مربوط به صفحات Admin، User و بخش‌های عمومی می‌شود.

---

## 🏗️ معماری پروژه

پروژه در حال حاضر از معماری Client-Server استفاده می‌کند.

```text
                 ┌───────────────────┐
                 │     User/Admin    │
                 └─────────┬─────────┘
                           │
                           ▼
                 ┌───────────────────┐
                 │     Vue.js        │
                 │   TypeScript      │
                 │     Pinia         │
                 │   Vue Router      │
                 └─────────┬─────────┘
                           │
                       HTTP / API
                           │
                           ▼
                 ┌───────────────────┐
                 │     Laravel       │
                 │      API          │
                 │ Controllers       │
                 │ Models / Services │
                 └─────────┬─────────┘
                           │
                           ▼
                 ┌───────────────────┐
                 │      MySQL        │
                 └───────────────────┘

                 ┌───────────────────┐
                 │       Tauri       │
                 │       Rust        │
                 └───────────────────┘
```

---

## 🛠️ تکنولوژی‌های استفاده‌شده

### Frontend

* Vue.js
* TypeScript
* Vite
* Vue Router
* Pinia
* CSS

### Backend

* Laravel
* PHP
* Laravel Sanctum
* REST API
* Laravel Controllers
* Laravel Models
* Laravel Services
* Laravel Migrations

### Desktop

* Tauri
* Rust

### Database

* MySQL

### ابزارهای توسعه

* Git
* GitHub
* VS Code
* npm
* Composer

---

## 📁 ساختار پروژه

```text
LevelUp/
│
├── levelup_admin/
│   │
│   ├── src/
│   │   ├── assets/
│   │   ├── pages/
│   │   ├── router/
│   │   ├── stores/
│   │   ├── App.vue
│   │   └── main.ts
│   │
│   └── src-tauri/
│       ├── src/
│       ├── icons/
│       ├── capabilities/
│       └── tauri.conf.json
│
├── levelup_server/
│   │
│   ├── app/
│   │   ├── Console/
│   │   ├── Http/
│   │   ├── Models/
│   │   ├── Services/
│   │   └── Providers/
│   │
│   ├── database/
│   │   ├── migrations/
│   │   ├── factories/
│   │   └── seeders/
│   │
│   ├── routes/
│   ├── config/
│   ├── bootstrap/
│   └── public/
│
└── LevelUp.code-workspace
```

---

## 🚀 اجرای پروژه

### Backend

```bash
cd levelup_server
composer install
```

ساخت فایل Environment:

```bash
cp .env.example .env
```

ساخت Application Key:

```bash
php artisan key:generate
```

سپس اطلاعات دیتابیس را در `.env` تنظیم کرده و اجرا کنید:

```bash
php artisan migrate
```

اجرای Laravel:

```bash
php artisan serve
```

---

### Frontend

```bash
cd levelup_admin
npm install
```

اجرای Development Server:

```bash
npm run dev
```

---

### Tauri

پس از آماده‌سازی محیط موردنیاز Tauri:

```bash
npm run tauri dev
```

برنامه به‌صورت Desktop Application اجرا خواهد شد.

---

## 🔒 تنظیمات Environment

تنظیمات حساس و وابسته به محیط در Repository قرار نمی‌گیرند.

فایل نمونه Backend در این مسیر قرار دارد:

```text
levelup_server/.env.example
```

هر توسعه‌دهنده باید فایل `.env` مخصوص محیط خودش را ایجاد کرده و اطلاعات دیتابیس و تنظیمات موردنیاز را در آن قرار دهد.

فایل واقعی `.env` نباید در Git Commit شود.

---

## 🗺️ توسعه آینده

نسخه فعلی عمداً روی قابلیت‌های اصلی موردنیاز یک سیستم ساده مدیریت گیم‌نت متمرکز شده است.

برخی برنامه‌های آینده می‌توانند شامل موارد زیر باشند:

* مدیریت سیستم‌های گیمینگ
* مدیریت Sessionهای فعال
* Timer برای Session
* تاریخچه Sessionها
* موجودی حساب کاربران
* ثبت پرداخت‌ها
* امکانات مدیریتی بیشتر
* آمار استفاده
* گزارش‌گیری
* بهبود Authorization
* Authentication کامل‌تر
* تست‌های خودکار
* مدیریت خطای بهتر
* توسعه بیشتر Desktop Client

این موارد مربوط به مراحل بعدی توسعه هستند و لزوماً در نسخه فعلی موجود نیستند.

---

## 📌 وضعیت پروژه

**وضعیت فعلی: Functional Development Version**

نسخه فعلی پروژه قابل اجرا و استفاده در محیط توسعه است، اما **Production-ready نیست**.

ممکن است هنوز موارد زیر وجود داشته باشند:

* Bugهای کوچک
* Edge Caseهای مدیریت‌نشده
* قابلیت‌های ناقص
* بخش‌هایی که نیاز به Refactor دارند
* قسمت‌هایی که نیاز به بهبود UI دارند

هدف فعلی، حفظ یک نسخه **قابل اجرا و قابل ارائه** و ادامه توسعه پروژه به‌صورت مرحله‌ای است.

---

## 📸 تصاویر پروژه

در آینده Screenshot و Demo از برنامه در این بخش قرار خواهد گرفت.

تصاویر پیشنهادی:

* Login
* Admin Dashboard
* User Management
* Create User
* User Dashboard
* Desktop Application

---

## 👨‍💻 Developer

**Prodi Coder**

A personal project built to learn, experiment, solve real problems, and turn ideas into working software.

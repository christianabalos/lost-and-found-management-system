<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Lost and Found Management System

## Developers
* Christian James S. Abalos
* James Patrick C. Cabaluna 
* Bhing Marie Claire S. Untal
  

## Project Description

The Lost and Found Management System is a web-based application developed using Laravel and MySQL. The system allows users to report lost items, report found items, manage claims, and generate downloadable reports.

## Features

### Authentication

* Login
* Logout
* Session Handling
* Password Hashing

### CRUD Operations

* Items Management
* Lost Reports Management
* Found Reports Management
* Claims Management

### REST API

* GET
* POST
* PUT/PATCH
* DELETE

### Reports

* CSV Export
* XLSX Export
* PDF Export
* JSON Export

### Security

* Authentication Middleware
* Role-Based Access (Admin/User)

## Technologies Used

* Laravel 12
* PHP
* MySQL
* Laravel Breeze
* Laravel Excel
* DomPDF
* Blade Templates

## Database Tables

* Users
* Items
* Lost Reports
* Found Reports
* Claims

## How the System Works

1. Users register and log in.
2. Users can create lost reports and found reports.
3. Users can manage item information through CRUD operations.
4. Claims can be submitted for recovered items.
5. Administrators can monitor records through the dashboard.
6. Reports can be exported as CSV, XLSX, PDF, and JSON.

## Installation

```bash
git clone https://github.com/christianabalos/lost-and-found-management-system.git

cd lost-and-found-management-system

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

## API Endpoints

* GET /api/items
* POST /api/items
* PUT /api/items/{id}
* PATCH /api/items/{id}
* DELETE /api/items/{id}

## GitHub Repository

https://github.com/christianabalos/lost-and-found-management-system

## Hosting Link

https://lost-and-found-management-system-production.up.railway.app


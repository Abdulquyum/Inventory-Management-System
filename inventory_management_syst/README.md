# Inventory Management System (NOUN)

Web-based inventory management system for NOUN. It supports item tracking, staff requests, administrative approvals, and reporting with a Laravel backend and a Bootstrap UI.

## Table of Contents

- [Features](#features)
- [Screenshots](#screenshots)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Requirements](#requirements)
- [Setup Instructions](#setup-instructions)
- [Environment Variables](#environment-variables)
- [Common Commands](#common-commands)
- [Tests](#tests)
- [Deployment](#deployment)
- [License](#license)

## Features

- Role-based authentication (administrator and staff)
- Inventory CRUD with stock tracking and categories
- Staff item requests with admin approval workflow
- Reporting with date and category filtering
- Dashboard metrics and recent activity

## Screenshots

Add your screenshots under `docs/images/` and update the links below.

![Login](docs/images/login.png)
![Dashboard](docs/images/dashboard.png)
![Inventory](docs/images/inventory.png)
![Requests](docs/images/requests.png)
![Reports](docs/images/reports.png)

## Tech Stack

- Backend: Laravel 12, PHP 8.2
- Database: MySQL
- Frontend: Bootstrap 5, Vite, Sass

## Project Structure

- `inventory_management_syst/`: Laravel application
- `invent.sql`: SQL dump (optional)

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+ and npm
- MySQL 8+

## Setup Instructions

1. Move into the Laravel app

```bash
cd inventory_management_syst
```

2. Install backend dependencies

```bash
composer install
```

3. Install frontend dependencies

```bash
npm install
```

4. Create a `.env` file

If you have a `.env.example`, copy it. Otherwise create `.env` using the template in the next section.

5. Generate the app key

```bash
php artisan key:generate
```

6. Run migrations (and seeders if needed)

```bash
php artisan migrate
php artisan db:seed
```

7. Build assets and run the app

```bash
npm run build
php artisan serve
```

For local development with Vite hot reload and queue worker:

```bash
composer run dev
```

## Environment Variables

Minimum `.env` template:

```bash
APP_NAME="Inventory Management System"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=
```

## Common Commands

- `composer run dev`: run app, queue worker, and Vite dev server
- `npm run build`: build production assets
- `php artisan migrate`: apply database migrations
- `php artisan db:seed`: seed sample data

## Tests

```bash
composer test
```

## Deployment

- Set `APP_ENV=production`, `APP_DEBUG=false`, and configure database credentials
- Run `php artisan migrate --force`
- Build assets with `npm run build`
- Cache config and routes: `php artisan config:cache` and `php artisan route:cache`
- Point your web server to the `inventory_management_syst/public/` directory

### Render (Docker)

- Use the Dockerfile in `inventory_management_syst/`
- Set Render root directory to `inventory_management_syst`
- Configure env vars: `APP_ENV=production`, `APP_DEBUG=false`, `APP_KEY`, `APP_URL`, and database credentials
- After deploy, run migrations: `php artisan migrate --force`

## License

Specify a license for this project (for example, MIT) or remove this section.

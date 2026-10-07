# Portfolio

A bilingual (English / Arabic) personal portfolio website with a full admin panel, built with **Laravel 11** and **Filament 3**. Everything on the site (projects, services, skills, experience, blog posts, testimonials, CV and site settings) is managed from the dashboard, so no code changes are needed to update content.

<!-- Add a live demo link and screenshots here:
**Live demo:** https://your-site.up.railway.app
![Home page](docs/home.png)
-->

## Features

**Public website**
- Home page with projects, services, skills, experience and testimonials
- Project pages with an image gallery (lightbox)
- Blog with listing and single-post pages
- Service detail pages
- Online CV page and downloadable CV file
- Contact form that stores messages in the database
- English / Arabic language switch (with RTL-friendly layout), remembered per session
- Smooth scrolling and scroll animations, custom 404 page

**Admin panel (`/admin`, Filament)**
- CRUD for Projects (with multiple images), Categories, Services, Skills, Experience, Blog posts and Testimonials
- Inbox for contact-form messages
- Site settings (profile info, favicon, CV file)
- Dashboard stats widget

**DevOps**
- Dockerfile and `start.sh` for container deployment
- Ready-to-use Railway configuration (`railway.toml`, `.env.railway.example`)

## Tech stack

| Layer | Technology |
|---|---|
| Backend | PHP, Laravel 11 |
| Admin panel | Filament 3.2 |
| Frontend | Blade, Tailwind CSS 3, Vite |
| UI libraries | GSAP, Lenis, AOS, GLightbox, Notyf |
| Database | MySQL / SQLite locally, PostgreSQL in production |
| Deployment | Docker, Railway |

## Requirements

- **PHP 8.2, 8.3 or 8.4** (PHP 8.5 is not supported yet by one of Filament's dependencies, `openspout`)
- Composer
- Node.js 18+ and npm
- MySQL (or SQLite) for local development

## Local setup

```bash
# 1. Install dependencies
composer install
npm install

# 2. Environment file
cp .env.example .env
php artisan key:generate
```

Open `.env` and set your database. For MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

Create an empty database named `portfolio`, then:

```bash
# 3. Create tables and link storage
php artisan migrate
php artisan storage:link

# 4. Create your admin account
php artisan make:filament-user

# 5. Build assets and run
npm run build
php artisan serve
```

- Site: http://127.0.0.1:8000
- Admin panel: http://127.0.0.1:8000/admin

For front-end development with hot reload, run `npm run dev` in a second terminal.

> No default user is seeded, on purpose. Always create the admin with `php artisan make:filament-user`.

## Deployment (Railway)

The project ships with a `Dockerfile` and `railway.toml`.

1. Push the repository to GitHub and create a new Railway project from it.
2. Add a **PostgreSQL** service.
3. In **Variables**, copy the values from `.env.railway.example` (set a real `APP_KEY` and `APP_URL`).
4. Deploy. On start, `start.sh` runs migrations, links storage and caches config, routes and views.
5. Create the admin user once from the Railway shell: `php artisan make:filament-user`.

## Project structure

```
app/
  Filament/Resources/   Admin CRUD resources
  Filament/Widgets/     Dashboard widgets
  Http/Controllers/     Home, Project, Blog, Service, Contact
  Http/Middleware/      SetLocale (EN / AR)
  Models/               Project, Post, Service, Skill, Experience, ...
resources/views/        Blade templates
lang/                   Arabic translations
database/migrations/    Schema
```

## Testing

```bash
php artisan test
```

## License

Personal project. All rights reserved unless stated otherwise.
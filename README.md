# Restaurant Web App (Laravel 13)

Restaurant website and admin panel built with Laravel 13 using the Feane theme.

## Assignment Scope Covered

1. Feane theme integration across public pages.
2. Menu CRUD in admin panel.
3. Homepage slideshow CRUD in admin panel (text-based slides: title, subtitle, button text, order, active status).

## Features

### Public Website

- Home page with hero carousel content.
- Menu page with category filtering.
- About page.
- Book Table page.

### Admin Panel

- Dashboard summary.
- Menu management:
	- Create
	- List
	- Edit
	- Delete
- Slides management:
	- Create
	- List
	- Edit
	- Delete

## Tech Stack

- PHP 8.3+
- Laravel 13
- MySQL
- Laravel Breeze (authentication)
- Vite
- Bootstrap 4 theme assets (Feane)

## Project Routes

### Public

- `/` Home
- `/menu` Menu
- `/about` About
- `/book` Book Table

### Admin (Authenticated)

- `/admin` Dashboard
- `/admin/menus` Menu CRUD
- `/admin/slides` Slides CRUD

## Setup Instructions

1. Clone repository.

2. Install PHP dependencies:

```bash
composer install
```

3. Install frontend dependencies:

```bash
npm install
```

4. Create environment file:

```bash
copy .env.example .env
```

5. Update database credentials in `.env`.

6. Generate app key:

```bash
php artisan key:generate
```

7. Run migrations:

```bash
php artisan migrate
```

8. Create storage symlink (for menu images):

```bash
php artisan storage:link
```

9. Build assets:

```bash
npm run build
```

10. Start development server:

```bash
php artisan serve
```

## Development Commands

- Start Vite dev server:

```bash
npm run dev
```

- Run tests:

```bash
php artisan test
```

## Database Notes

- `menus` table supports menu items and uploaded images.
- `slides` table is text-based for carousel content.
- Migration `2026_04_19_000002_drop_image_from_slides_table.php` removes the old slide image field.

## Demo Checklist

1. Show public pages: Home, Menu, About, Book.
2. Login to admin.
3. Perform Menu CRUD (create, edit, delete).
4. Perform Slides CRUD (create, edit, delete).
5. Refresh homepage and verify carousel text updates.

## Theme Credit

- Feane template: https://themewagon.com/themes/free-bootstrap-4-html5-restaurant-website-template-feane/

## License

This project is for educational/assignment purposes.

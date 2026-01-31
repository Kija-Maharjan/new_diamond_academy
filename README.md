# New Diamond Academy

This repository contains the New Diamond Academy Laravel web application — a simple CMS / community site for students, teachers, and founders. The project includes authentication, an admin dashboard, news posting, recommendations (feedback) collection, and a modern responsive UI powered by Bootstrap.

---

## Summary of Work Done

- Installed and integrated Bootstrap (CSS + JS) and Font Awesome for icons and UI components.
- Replaced incorrect files (removed HTML from a CSS file, moved the logo to public storage).
- Added a modern `ui` layout and updated `home`, `welcome`, `news`, and `recommendations` views with animated Bootstrap components.
- Implemented registration and login pages with validation and UX improvements.
- Created an admin dashboard (`/admin`) with user, news, and recommendations management tools.
- Added `AdminUserSeeder` to create an initial admin account: `maharjankija@gmail.com` (seeded password `kija<3980089`).
- Implemented routes, controller methods, validation logic, file upload handling, and admin middleware protections.
- Added CSV/JSON export placeholders and UI actions for data export.

Files changed/created (high level):
- `resources/views/ui.blade.php` — main site layout with Bootstrap and animations
- `resources/views/auth/login.blade.php`, `resources/views/auth/register.blade.php` — auth pages
- `resources/views/home.blade.php`, `resources/views/news/*.blade.php`, `resources/views/recommendations/*.blade.php`, `resources/views/admin.blade.php` — pages and admin UI
- `app/Http/Controllers/AuthController.php` — login/register/toggleAdmin
- `app/Http/Controllers/NewsController.php` — posting/editing/deleting news
- `app/Http/Controllers/RecommendationController.php` — submit/list/download/delete recommendations
- `app/Http/Middleware/Admin.php` — admin access guard
- `database/seeders/AdminUserSeeder.php` — seeds admin user
- `resources/css/bootstrap.css` — imports Bootstrap CSS
- `resources/js/bootstrap.js` — imports Bootstrap JS

---

## How It Functions — Overview

Authentication
- Registration (`GET /register`, `POST /register`) validates `name`, `email`, `password` (confirmed, min length, uppercase and number rules) and `terms` acceptance. New users are created with `is_admin = false` and are logged in automatically.
- Login (`GET /login`, `POST /login`) uses Laravel `Auth::attempt()` and supports `remember`.

Admin
- Admin routes are protected by the `admin` middleware (`app/Http/Middleware/Admin.php`) which checks `Auth::check()` and `Auth::user()->is_admin`.
- Admin dashboard (`/admin`) shows counts and management UIs; admins can toggle other users' admin status via `POST /admin/toggle-admin/{user}`.

News
- Authenticated users can create news items (`title`, `body`, optional `image`) which are stored in the `news` table with `user_id`.
- Images are stored in the `storage` disk (public). The controller handles upload, replacement, and deletion of images.

Recommendations (Feedback)
- Public form to submit `note`, optional `name`, `email`, and an optional file attachment.
- Attachments are stored under `storage` (validated, max 2MB). Admins can download and delete recommendations.

UI & Assets
- Bootstrap and Font Awesome loaded through CDN in `ui.blade.php` for rapid setup.
- Custom CSS/animations are included inline in the layout and in `resources/css/ui.css`.

---

## Arrays, Data Structures, and Logic Used

Typical arrays and structures used in controllers/views:

## New Diamond Academy

This repository contains the New Diamond Academy Laravel web application — a simple CMS / community site for students, teachers, and founders. The project includes authentication, an admin dashboard, news posting, recommendations (feedback) collection, and a modern responsive UI powered by Bootstrap.

---

## Summary of Work Done

- Installed and integrated Bootstrap (CSS + JS) and Font Awesome for icons and UI components.
- Replaced incorrect files (removed HTML from a CSS file, moved the logo to public storage).
- Added a modern `ui` layout and updated `home`, `welcome`, `news`, and `recommendations` views with animated Bootstrap components.
- Implemented registration and login pages with validation and UX improvements.
- Created an admin dashboard (`/admin`) with user, news, and recommendations management tools.
- Added `AdminUserSeeder` to create an initial admin account: `maharjankija@gmail.com` (seeded password `kija<3980089`).
- Implemented routes, controller methods, validation logic, file upload handling, and admin middleware protections.
- Added CSV/JSON export placeholders and UI actions for data export.

Files changed/created (high level):
- `resources/views/ui.blade.php` — main site layout with Bootstrap and animations
- `resources/views/auth/login.blade.php`, `resources/views/auth/register.blade.php` — auth pages
- `resources/views/home.blade.php`, `resources/views/news/*.blade.php`, `resources/views/recommendations/*.blade.php`, `resources/views/admin.blade.php` — pages and admin UI
- `app/Http/Controllers/AuthController.php` — login/register/toggleAdmin
- `app/Http/Controllers/NewsController.php` — posting/editing/deleting news
- `app/Http/Controllers/RecommendationController.php` — submit/list/download/delete recommendations
- `app/Http/Middleware/Admin.php` — admin access guard
- `database/seeders/AdminUserSeeder.php` — seeds admin user
- `resources/css/bootstrap.css` — imports Bootstrap CSS
- `resources/js/bootstrap.js` — imports Bootstrap JS

---

## How It Functions — Overview

### Authentication

Registration (`GET /register`, `POST /register`) validates `name`, `email`, `password` (confirmed, min length, uppercase and number rules) and `terms` acceptance. New users are created with `is_admin = false` and are logged in automatically.

Login (`GET /login`, `POST /login`) uses Laravel `Auth::attempt()` and supports `remember`.

### Admin

Admin routes are protected by the `admin` middleware (`app/Http/Middleware/Admin.php`) which checks `Auth::check()` and `Auth::user()->is_admin`.

Admin dashboard (`/admin`) shows counts and management UIs; admins can toggle other users' admin status via `POST /admin/toggle-admin/{user}`.

### News

Authenticated users can create news items (`title`, `body`, optional `image`) which are stored in the `news` table with `user_id`.

Images are stored in the `storage` disk (public). The controller handles upload, replacement, and deletion of images.

### Recommendations (Feedback)

Public form to submit `note`, optional `name`, `email`, and an optional file attachment.

Attachments are stored under `storage` (validated, max 2MB). Admins can download and delete recommendations.

### UI & Assets

Bootstrap and Font Awesome loaded through CDN in `ui.blade.php` for rapid setup.

Custom CSS/animations are included inline in the layout and in `resources/css/ui.css`.

---

## Arrays, Data Structures, and Logic Used

Typical arrays and structures used in controllers/views:

- Request validation arrays (Laravel style):

  - Example (AuthController@register validation rules):

    - `['name' => 'required|string|max:255', 'email' => 'required|email|unique:users,email', 'password' => 'required|string|min:8|confirmed|regex:/[A-Z]/|regex:/[0-9]/', 'terms' => 'required|accepted']`

- Data arrays prepared for model creation (associative arrays):

  - NewsController@store prepares `$data = ['title' => ..., 'body' => ..., 'user_id' => Auth::id(), 'image' => $path]` before calling `News::create($data)`.

  - RecommendationController@store prepares `$data = ['note' => ..., 'name' => ..., 'email' => ..., 'user_id' => optional, 'attachment_path' => $path]`.

- Blade collections and loops:

  - Views use `@foreach($news as $item)` and `@foreach($recs as $r)` and Laravel Collection methods like `->count()`, `->latest()->get()`.

Logic patterns used:

- Authorization checks: `if (!Auth::check() || !Auth::user()->is_admin) abort(403);`
- Ownership checks for editing news: verify `auth()->id() === $news->user_id || auth()->user()->is_admin`.
- Secure password storage with `Hash::make()`.
- File validation via Laravel `validate()` rules (`image`, `max` size), storage via `$request->file(...)->store(...)`.

---

## Database & Operational Manual

### Prerequisites

- PHP, Composer, and a supported database (MySQL, PostgreSQL, SQLite).
- Node.js + npm if you want to compile frontend assets locally (current setup loads Bootstrap via CDN).

### Basic setup commands (run from `laravel/`):

```bash
composer install
cp .env.example .env
php artisan key:generate
# configure your DB in .env (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan storage:link
php artisan serve
```

### Admin account

The seeder creates/updates an admin with email `maharjankija@gmail.com`. If you prefer not to use the seeded password, remove `AdminUserSeeder` or edit it before seeding. After first login, change the password using the app or implement a password-reset flow.

### Recreate admin user

```bash
php artisan db:seed --class=AdminUserSeeder
```

### Backups & migrations

- Use `php artisan migrate` / `php artisan migrate:rollback` for schema changes.
- Back up your DB using your DBMS tools (mysqldump, pg_dump) before running destructive migrations.

### Storage

- Uploaded files are saved via Laravel's Storage facade. `php artisan storage:link` must be run so `storage/app/public` is available at `public/storage`.

---

## Data Analysis Methods (Recommended)

### Quick in-app metrics

- The admin UI shows counts using model queries, e.g. `User::count()`, `News::count()`, `Recommendation::count()`.

### Export for external analysis

- Use the export buttons (placeholders exist in the UI) to download CSV or JSON. For a simple CSV export implement a controller method to stream data with `fputcsv()` or use a package like `maatwebsite/excel`.

### Suggested analysis steps

- Aggregate counts by date (news per month): use Eloquent:

```php
News::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, count(*) as total')
        ->groupBy('year','month')
        ->orderBy('year','month')
        ->get();
```

- Recommendations sentiment / topic analysis:
  - Export notes to CSV/JSON and run an external script (Python + pandas + simple NLP) to compute basic sentiment, keyword frequency, and topic clustering.

- User activity:
  - Track `created_at` and relationships (news authored) to compute active contributors, average posts per user, etc.

### Example: export recommendations as CSV (basic approach in controller)

```php
// pseudo-code
return response()->stream(function() use ($recs) {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['id','name','email','note','created_at']);
        foreach ($recs as $r) {
                fputcsv($handle, [$r->id, $r->name, $r->email, $r->note, $r->created_at]);
        }
        fclose($handle);
}, 200, $headers);
```

### Advanced analysis

- Connect your DB to a BI/analytics tool (Metabase, Superset) or use ETL pipelines to pull data into a data warehouse for dashboards.

---

## Security & Next Steps (recommended)

1. Remove or rotate seeded plaintext credentials. The file `ADMIN_SETUP.md` contains the seeded password and should be deleted after use.
2. Implement Laravel's built-in password reset (`Auth::routes()` or custom flow) so admins can change passwords securely.
3. Add audit logging for admin actions (who created/edited/deleted content and when).
4. Rate-limit public forms (recommendations) to reduce spam and add CAPTCHA if needed.
5. Use HTTPS in production and set secure cookie flags in `.env`.

---

If you want, I can:
- Remove the temporary `ADMIN_SETUP.md` file now.
- Add password-reset flow and admin password-change page.
- Implement CSV export endpoints and a basic Python notebook for recommendation analysis.

Tell me which of the above you'd like next and I will implement it.


# Render deployment checklist for New Diamond Academy

## 1. Overview ✅

- This repository is configured to deploy to Render using the provided `render.yaml` which uses the project `Dockerfile`.
- The service runs migrations and creates the `storage` symlink at container start.

## 2. Before you deploy 🧾

- Ensure you have an `APP_KEY` set (generate it locally with `php artisan key:generate --show`).
- Decide on file storage for uploads: Render's filesystem is ephemeral. Use S3 (AWS), Supabase Storage, or Cloudflare R2 for persistent uploads. If using S3, set `FILESYSTEM_DRIVER=s3` and the required `AWS_*` env vars.

## 3. Required environment variables

(Add these in Render Dashboard or via `render.yaml`/CLI)

- APP_ENV=production
- APP_DEBUG=false
- APP_KEY=base64:...
- APP_URL=https://your-service.onrender.com (replace `your-service` with your actual service name)
- LOG_CHANNEL=stack
- DB settings: Render-managed Postgres will provide `DATABASE_URL` automatically when you create a DB, or set it manually.
- If using S3: FILESYSTEM_DRIVER=s3 and set `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_DEFAULT_REGION`, `AWS_BUCKET`, and `AWS_URL`.

## 4. Postgres on Render (optional)

- You can provision a managed Postgres DB through the Render Dashboard or via `render.yaml` (a sample DB block is included in `render.yaml`).
- After DB is available, set `DATABASE_URL` in the service environment variables (or Render will attach it automatically).

## 5. Deploy steps (fast path)

- Connect your GitHub/GitLab repo to Render and pick this repository.
- Confirm Render imports `render.yaml` — it will create a web service that uses the `Dockerfile`.
- The container uses a small entrypoint script (`scripts/render-entrypoint.sh`) which waits for the managed Postgres DB to be ready, runs `php artisan migrate --force`, creates the storage symlink, caches config, then starts the server on `$PORT`.

## 6. Running artisan commands on Render

- Use the Render Dashboard Console or the `render` CLI to run one-off commands, e.g.:
  - `render exec <service-id> -- php artisan migrate --force`
  - `render exec <service-id> -- php artisan db:seed --class=DatabaseSeeder --force`

## 7. Files & tweaks we made

- `render.yaml` was switched to use `dockerfilePath: ./Dockerfile` and a `startCommand` that runs migrations and `storage:link` then serves the app on `$PORT`.
- `Dockerfile` was updated to fail on build errors and to use `${PORT:-3000}` at runtime.

## 8. Notes & recommendations 💡

- Use S3 or Supabase for persistent uploads (Render's disk is ephemeral).
- For additional security, set `APP_DEBUG=false` and configure proper logging and backups for Postgres.
- If you want me to set up S3 support (change `config/filesystems.php` and add example env vars), say so and I'll add the change.

## Additional options

If you want, I can also:

- Add an official Render `cron` job or background worker for scheduled work.
- Wire up S3 (or Supabase) with `FILESYSTEM_DISK` and update uploads to use it.

Reply “Proceed” and I’ll finish any additional tweaks you want (S3 support, Postgres provisioning, or run a test deploy using the Render CLI if you give me access).
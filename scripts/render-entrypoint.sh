#!/usr/bin/env bash
set -euo pipefail

# Entrypoint for Render: wait for DB, run migrations, create storage link, then start server
cd /var/www/html/laravel || exit 1

echo "Render entrypoint: waiting for database and running migrations..."

MAX_RETRIES=${MAX_RETRIES:-20}
SLEEP_SECONDS=${SLEEP_SECONDS:-5}

i=0
until php artisan migrate --force; do
  i=$((i+1))
  if [ "$i" -ge "$MAX_RETRIES" ]; then
    echo "Migrations failed after $i attempts; exiting"
    exit 1
  fi
  echo "Database not ready. Retry $i/$MAX_RETRIES in $SLEEP_SECONDS seconds..."
  sleep "$SLEEP_SECONDS"
done

php artisan storage:link || true
php artisan config:cache || true

exec php artisan serve --host 0.0.0.0 --port ${PORT:-3000}

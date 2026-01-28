#!/bin/bash

# Exit on error
set -e

# Install PHP dependencies
if [ -f "laravel/composer.json" ]; then
    cd laravel
    composer install --optimize-autoloader --no-dev
    cd ..
fi

# Install Node dependencies and build
npm install
npm run build

# Copy built files to public directory if needed
if [ -d "laravel/public" ]; then
    echo "Build complete!"
fi

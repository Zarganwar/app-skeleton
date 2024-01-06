#!/bin/bash
# Move to the project root directory
cd ..

# Copy docker-compose.override.example.yml to docker-compose.override.yml if it doesn't exist
cp docker-compose.override.example.yml docker-compose.override.yml || true

# Run container
export UID && docker-compose up -d --build

# Install composer dependencies
docker-compose exec app composer update

# Copy config/local.example.php to config/local.php if it doesn't exist
cp config/local.example.php config/local.php || true
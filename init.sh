#!/bin/bash
mkdir -p storage/mysql
docker compose up -d
docker compose exec web php artisan winter:up
echo "Write down admin password printed above!!! (if any)"

#!make
include .env

up:
	docker compose up -d

up-build:
	docker compose up -d --build

down:
	docker compose down

ps:
	docker ps

bash:
	docker exec -ti ${APP_DIR}-php bash

key:
	docker exec -ti ${APP_DIR}-php php artisan key:generate

winter-version:
	docker exec -ti ${APP_DIR}-php php artisan winter:version

package-discover:
	docker exec -ti ${APP_DIR}-php php artisan package:discover

seed:
	docker exec -ti ${APP_DIR}-php php artisan db:seed

migrate:
	docker exec -ti ${APP_DIR}-php php artisan migrate

migrate-refresh:
	docker exec -ti ${APP_DIR}-php php artisan migrate:refresh

install:
	docker exec -ti ${APP_DIR}-php composer install

composer-update:
	docker exec -ti ${APP_DIR}-php composer update

local-update: install migrate

refresh:
	docker exec -ti ${APP_DIR}-php php artisan migrate:refresh --seed

pint-diff:
	docker exec -ti ${APP_DIR}-php ./vendor/bin/pint --test

pint:
	docker exec -ti ${APP_DIR}-php ./vendor/bin/pint

composer-test:
	docker exec -ti ${APP_DIR}-php composer test

tinker:
	docker exec -ti ${APP_DIR}-php php artisan tinker

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
	docker exec -ti ${APP_NAME}-php bash

seed:
	docker exec -ti ${APP_NAME}-php php artisan db:seed

migrate:
	docker exec -ti ${APP_NAME}-php php artisan migrate

migrate-refresh:
	docker exec -ti ${APP_NAME}-php php artisan migrate:refresh

install:
	docker exec -ti ${APP_NAME}-php composer install

composer-update:
	docker exec -ti ${APP_NAME}-php composer update

local-update: install migrate

refresh:
	docker exec -ti ${APP_NAME}-php php artisan migrate:refresh --seed

pint-diff:
	docker exec -ti ${APP_NAME}-php ./vendor/bin/pint --test

pint:
	docker exec -ti ${APP_NAME}-php ./vendor/bin/pint

composer-test:
	docker exec -ti ${APP_NAME}-php composer test

tinker:
	docker exec -ti ${APP_NAME}-php php artisan tinker

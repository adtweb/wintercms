<p align="center">
    <img src="https://github.com/wintercms/winter/raw/develop/.github/assets/Github%20Banner.png?raw=true" alt="Winter CMS Logo" width="100%" />
</p>

[Winter](https://wintercms.com) — это бесплатная система управления контентом с открытым исходным кодом, основанная на фреймворке Laravel PHP. Разработчики и агентства по всему миру полагаются на Winter из-за его быстрого прототипирования и разработки, безопасной и защищенной кодовой базы и преданности простоте.

[![Version](https://img.shields.io/github/v/release/wintercms/winter?sort=semver&style=flat-square)](https://github.com/wintercms/winter/releases)
[![Tests](https://img.shields.io/github/actions/workflow/status/wintercms/winter/tests.yml?branch=develop&label=tests&style=flat-square)](https://github.com/wintercms/winter/actions)
[![License](https://img.shields.io/github/license/wintercms/winter?label=open%20source&style=flat-square)](https://packagist.org/packages/wintercms/winter)
[![Discord](https://img.shields.io/discord/816852513684193281?label=discord&style=flat-square)](https://discord.gg/D5MFSPH6Ux)
[![RINGER](https://www.ringerhq.com/images/get-support-on-ringer.svg)](https://www.ringerhq.com/i/wintercms/winter)

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/wintercms/winter)

# WINTER CMS + Docker
Платформа для локальной разработки проектов

## Развертывание
Для начала разработки необходимо выполнить следующие шаги:
1. Скопировать `.env.example` в `.env`
2. Запустить сборку проекта - `make up`
3. Запустить первичную установку пакетов командой `make install`
4. Запустить первичное наполнение базы данных `make migrate`
5. Не забыть скопировать и сохранить пароль для доступа в административную часть системы! Он будет создан автоматически и выведен в терминал после миграций.

## Полезности
Полный список полезных команд в файле Makefile

Пересборка проекта
```
make up-build
```

Остановка проекта
```
make down
```

Список запущенных контейнеров
```
make ps
```

Терминал PHP контейнера
```
make bash
```

php artisan db:seed
```
make seed
```

php artisan migrate
```
make migrate
```

php artisan migrate:refresh
```
make migrate-refresh
```

composer update
```
make composer-update
```

composer test
```
make composer-test
```

composer install migrate
```
make local-update
```

php artisan migrate:refresh --seed
```
make refresh
```

Проверка стиля кода
```
make pint-diff
```

Иправление стиля
```
make pint
```

php artisan tinker
```
make tinker
```

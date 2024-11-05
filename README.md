[![Winter](./docs/images/wintercms.svg)](https://wintercms.com)

# Winter CMS

Based on: [![Docker + Winter CMS](https://github.com/MPO-Web-Consulting/docker-wintercms)

## Quick Start

For first run Winter CMS using Docker, start a container using the latest image, mapping your local port 8080 to the container's port 80:

```bash
$ docker compose up
``

Installation of Winter CMS required only on first run:

```bash
$ docker compose exec web php artisan winter:up
```

- Visit [http://localhost:8080](http://localhost:8080) using your browser.
- Login to the [backend](http://localhost:8080/backend) with the username `admin`
- The password for `admin` is generated on first load and printed into the container logs.
- Hit `CTRL-C` to stop the container. Running a container in the foreground will send log outputs to your terminal.

Run the container in the background by passing the `-d` option:

```bash
$ docker compose up -d
``

To stop Winter CMS, stop a container

```bash
$ docker compose down
```

## Tests

The tests are run using [pytest](https://docs.pytest.org/en/6.2.x/). The tests are located in the `tests` directory.

```bash
# run tests
python -m pytest tests
```

## Licence

[![MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](./LICENSE)

[![Winter](./docs/images/wintercms.svg)](https://wintercms.com)

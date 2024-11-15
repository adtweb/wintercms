FROM nginx:stable-alpine

RUN mkdir -p /var/www/${APP_DIR}

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

RUN chown -R www-data:www-data /var/www/${APP_DIR}

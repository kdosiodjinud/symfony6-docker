#################################
### BASE ########################
#################################
FROM php:8.2.4-fpm-alpine as base

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN install-php-extensions pdo_pgsql http intl redis

WORKDIR /var/www

EXPOSE 9000

CMD php-fpm

#################################
### DEVELOPMENT #################
#################################
FROM base as development

ENV APP_ENV=dev

RUN apk --update --no-cache add vim bash

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#################################
### PRODUCTION ##################
#################################
FROM base as production

ENV APP_ENV=prod

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./app/ /var/www/

RUN composer install --no-dev -d /var/www



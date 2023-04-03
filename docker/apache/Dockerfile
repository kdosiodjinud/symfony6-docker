#################################
### BASE ########################
#################################
FROM httpd:2.4.56-alpine as base

RUN apk add --no-cache apache2-proxy

COPY ./docker/apache/files/httpd.conf /etc/apache2/httpd.conf

EXPOSE 80 443

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

#################################
### DEVELOPMENT #################
#################################
FROM base as development

RUN apk add --no-cache vim bash

#################################
### PRODUCTION ##################
#################################
FROM base as production

COPY ./app/public /var/www/public


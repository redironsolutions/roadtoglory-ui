FROM php:7.2.9-apache

#COPY conf/php.ini /usr/local/etc/php/
COPY --chown=www-data:www-data src/ /var/www/html/
COPY conf/root.htaccess /var/www/html/.htaccess

# might need to install php7.2-mbstring and php7.2-dom
#RUN apt-get install php7.2-mysql
#RUN apt-get install php7.2-mbstring
#RUN apt-get install php7.2-dom

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

RUN php -m

CMD ["apache2-foreground"]

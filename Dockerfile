FROM php:7.2.9-apache

#RUN useradd -ms /bin/bash www

#COPY conf/php.ini /usr/local/etc/php/
COPY --chown=www-data:www-data src/ /var/www/html/
COPY conf/root.htaccess /var/www/html/.htaccess

# might need to install php7.2-mbstring and php7.2-dom
# RUN apt-get install php7.2-mbstring
# RUN apt-get install php7.2-dom 

RUN a2enmod rewrite

CMD ["apache2-foreground"] 

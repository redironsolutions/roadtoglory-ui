FROM nginx:latest

RUN useradd -ms /bin/bash www
RUN mkdir /etc/nginx/logs

RUN mkdir -p /var/www/default/htdocs;

RUN apt-get update \
	&& apt-get install -y curl zip unzip git software-properties-common \
	&& add-apt-repository -y ppa:ondrej/php \
	&& apt-get install -y php-fpm php-cli php-mcrypt php-gd php-mysql \
	php-pgsql php-imap php-memcached php-mbstring php-xml \
	&& php -r "readfile('http://getcomposer.org/installer');" | php --install-dir=/usr/bin/ --filename=composer \
RUN mkdir /run/php \
	&& apt-get remove -y --purge software-properties-common \
	&& apt-get clean \
	&& rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#ADD conf/php-fpm.conf /etc/php/7.0/fpm/php-fpm.conf
#ADD conf/www.conf /etc/php/7.0/fpm/pool.d/www.conf

RUN php -v

RUN echo "<?php phpinfo(); ?>" >> /var/www/default/htdocs/index.php

COPY conf/ /etc/nginx/

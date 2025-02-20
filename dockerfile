FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql
#COPY . /var/www/html/
#WORKDIR /var/www/html/
#RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
#RUN echo "Listen 8081" >> /etc/apache2/ports.conf
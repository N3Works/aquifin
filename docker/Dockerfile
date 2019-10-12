FROM centos:7

WORKDIR /var/www/html

COPY ./docker/composer.sh /usr/local/bin/composer
COPY ./docker/app.conf /etc/httpd/conf.d/app.conf
COPY ./docker/app.ini /etc/php.d/app.ini
COPY ./docker/artisan.sh /usr/local/bin/artisan
COPY ./docker/init.sh /init.sh

#RUN yum -y install epel-release
#RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum -y update
RUN yum install yum-utils
RUN yum-config-manager --enable remi-php56
RUN yum -y install nano curl nodejs git httpd php php-mysql php-soap php-xml php-gd php-mbstring php-mcrypt php-sybase php-xmlrpc php-zip

# instala o composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer.phar

# Procura o trecho de codigo <Directory> e substitui "AllowOverride None" por "AllowOverride All"
RUN sed -i '/<Directory "\/var\/www\/html">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf

RUN chmod 0777 /init.sh /usr/local/bin/artisan /usr/local/bin/composer /usr/local/bin/composer.phar
EXPOSE 80
CMD ["/init.sh"]
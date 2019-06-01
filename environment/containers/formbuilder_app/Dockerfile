FROM zimosworld/php-dev:7.2
MAINTAINER "Eiger Docker Plugin <http://github.com/zimosworld/eiger>"

# Add in apache config file
ADD apache-config.conf /etc/httpd/conf.d/000-default.conf

# Add PHP.INI Configs
RUN echo "date.timezone = \"Australia/Sydney\"" >> /etc/php.ini

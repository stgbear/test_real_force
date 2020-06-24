FROM php:7.4-fpm

WORKDIR '/app'

RUN addgroup _www --force-badname
RUN adduser _www --disabled-login --ingroup _www --no-create-home --quiet --system --force-badname

RUN apt-get update --fix-missing
RUN apt-get -y install git unzip
RUN pecl install xdebug pcov && docker-php-ext-enable pcov xdebug

RUN curl https://get.symfony.com/cli/installer > ./installer && \
  chmod +x ./installer && ./installer && rm ./installer && \
  mv /root/.symfony/bin/symfony /bin/symfony

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/bin && \
  php -r "unlink('composer-setup.php');"

COPY ./ /app

RUN composer.phar install

CMD symfony server:start

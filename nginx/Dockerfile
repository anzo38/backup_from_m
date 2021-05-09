################
# CentOS7
################
FROM centos:7

################
# nginx
################
# nginxのインストール
# RUN yum install yum-utils
# nginxのyumリポジトリをセットアップ
COPY ./yum.repos.d/nginx.repo /etc/yum.repos.d/nginx.repo

# nginxのstableをインストール
# -yはyes 事前にれることでインストールの際自動でインストールされる
RUN yum install nginx -y

# postfixをインストール(smtpサーバー,（送信）)
RUN yum install postfix -y

# PHPプログラムをもってくる場所を設定
RUN yum install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm -y
# インストール
# RUN yum install --enablerepo=remi,remi-php74 php php-gd php-mbstring php-pdo ls /etc | grep php.ini libapache2-mod-php php-xml php-soap php-curl php-zip php-intl mod_ssl mysql zip unzip curl php-pecl-xdebug php-fpm php-pgsql -y
RUN yum install --enablerepo=remi,remi-php74 php php-gd php-mbstring php-pdo php-mysql libapache2-mod-php php-xml php-soap php-curl php-zip php-intl mod_ssl mysql zip unzip curl php-pecl-xdebug php-fpm php-pgsql -y


RUN curl -sS https://getcomposer.org/installer > ./composer-setup.php \
    && php ./composer-setup.php --version=1.9.0 \
    && mv ./composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && rm -f ./composer-setup.php


# CMD ["/sbin/init"]

RUN systemctl enable nginx
RUN systemctl enable php-fpm

ENTRYPOINT [ "/entrypoint.sh" ]
# COPY ./nginx/data.php.ini etc/php.ini

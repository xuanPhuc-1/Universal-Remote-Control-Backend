#!/bin/bash
#check if remi-php82, epel-release, mysql-community-server, php, php-mbstring, php-xml, php-pdo, php-pdo_mysql, php-xdebug, composer are installed or not and install them if not installed

# Install EPEL repository
yum -y install epel-release

# Install REMI repository
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm

# Enable REMI repository for PHP 8.2
yum-config-manager --enable remi-php82

# Install PHP 8.2 and required extensions
yum install php php-mbstring php-xml php-pdo php-pdo_mysql php-xdebug -y

# Update all packages
yum update -y

# Install Composer
cd /tmp
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# # Install MySQL 8.0
# yum install mysql-server -y
# systemctl start mysqld
# systemctl enable mysqld
# systemctl status mysqld


# Clean up
rm -rf /tmp/*

echo "Installation completed."

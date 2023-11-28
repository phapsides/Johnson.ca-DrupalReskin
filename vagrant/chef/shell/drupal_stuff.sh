#!/bin/bash
MYSQL_USER="root"
MYSQL_PASSWORD="root"

cd /home/vagrant/sites
drush dl --drupal-project-rename="drupal7" -y
drush @drupal7 si standard -y

mkdir /home/vagrant/sites/drupal7/sites/v3.johnson.ca
ln -s /vagrant/themes /home/vagrant/sites/drupal7/sites/v3.johnson.ca/themes
ln -s /vagrant/modules /home/vagrant/sites/drupal7/sites/v3.johnson.ca/modules
ln -s /vagrant/libraries /home/vagrant/sites/drupal7/sites/v3.johnson.ca/libraries
ln -s /vagrant/data/files /home/vagrant/sites/drupal7/sites/v3.johnson.ca/files

cp /vagrant/settings.php /home/vagrant/sites/drupal7/sites/v3.johnson.ca/settings.php
chmod 777 /home/vagrant/sites/drupal7/sites/v3.johnson.ca/settings.php
cp /vagrant/sites.php /home/vagrant/sites/drupal7/sites/sites.php
chmod 777 /home/vagrant/sites/drupal7/sites/sites.php

mysql -u$MYSQL_USER -p$MYSQL_PASSWORD -e "CREATE DATABASE johnsonca"
mysql -u$MYSQL_USER -p$MYSQL_PASSWORD --max_allowed_packet=1000M johnsonca < /vagrant/data/johnson_v3.sql
cd /home/vagrant/sites
ln -s /home/vagrant/sites/drupal7 /home/vagrant/sites/v3.johnson.ca


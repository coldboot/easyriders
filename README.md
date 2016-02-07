easyriders
==========

The source code for the easy rider website

ER Local Site Setup

Set up local VM - erlocal
Create a user - sydneyea using useradd
mv public_html from the backup into the ~sydneyea directory
symlink /var/www/html -> ~sydneyea/public_html
chmod o+rx on ~sydneyea/public_html

Create database

mysql -u root -e "drop database if exists sydneyea_cycling;";
mysql -u root -e "create database sydneyea_cycling;"
mysql -u root -e "grant all on sydneyea_cycling.* to 'sydneyea_cycling'@'localhost' identified by ‘sbwtstd';"
mysql -u root -e "flush privileges;"

import db using

mysql -u root sydneyea_cycling < sydneyea_cycling.sql

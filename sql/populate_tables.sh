#!/bin/sh 
# Filename: populate_tables.sh
# Description: 
#       This script is used to run the populate_tables.sql

# Credentials
host="us-cdbr-east-06.cleardb.net" 
user="bd22e71ea9fc1e"
password="34602037"
database="heroku_5388512170af7bf"

echo "Loading data for news categories"
mysql -h "$host" -u "$user" "-p$password" "$database" < populate_tables.sql
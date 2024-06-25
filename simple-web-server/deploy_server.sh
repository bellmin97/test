#!/bin/bash

# Stop the Apache2 web server
systemctl stop apache2

# Sync the new files to the web root
rsync -av --delete /home/test/simple-web-server/ /var/www/html/

# Start the Apache2 web server
systemctl start apache2


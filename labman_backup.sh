#!/bin/bash
mysqldump -u user -p'password' db_name > /var/www/dir_name/db_backup/db_$( date +"%Y_%m_%d" ).sql
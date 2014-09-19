#!/bin/bash
MYSQL_USER=root                             #mysql username
MYSQL_PASS=***********                      #mysql password
MAIL_TO=******(((((*@***.**                 #mailling to
WEB_DATA=/home/wwwroot/                     #to be backup dir

#define variables
DataBakName=Data_$(date +%Y%m%d).tar.gz
WebBakName=Web_$(date +%Y%m%d).tar.gz
OldData=Data_$(date -d -3day +%Y%m%d).tar.gz
OldWeb=Web_$(date -d -3day +%Y%m%d).tar.gz
DataSubject="Backup: gregwym.info database "$(date +%Y%m%d)
WebSubject="Backup: gregwym.info web dir "$(date +%Y%m%d)

#delete data from 3days earlier
rm -rf /home/backup/$OldData /home/backup/$OldWeb
cd /home/backup

#export database to compressed gz files
for db in `/usr/local/mysql/bin/mysql -u$MYSQL_USER -p$MYSQL_PASS -B -N -e 'SHOW DATABASES' | xargs`; do
    (/usr/local/mysql/bin/mysqldump --single-transaction -u$MYSQL_USER -p$MYSQL_PASS ${db} | gzip -9 - > ${db}.sql.gz)
done

#compress database files
tar zcf /home/backup/$DataBakName /home/backup/*.sql.gz
rm -rf /home/backup/*.sql.gz
#mail database
echo $DataSubject | mutt -a /home/backup/$DataBakName -s "${DataSubject}" $MAIL_TO

#compress backup dir
tar zcf /home/backup/$WebBakName $WEB_DATA
#mail dir
echo $WebSubject | mutt -a /home/backup/$WebBakName -s "${WebSubject}" $MAIL_TO

echo "bye"
#END
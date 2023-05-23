-- консоль
mysql -u user -ppassword;

-- дамп из базы
mysqldump -u user -ppassword --no-tablespaces Testing > dump.sql;

-- дамп в базу
mysql -u user -ppassword < dump.sql;

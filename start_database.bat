@echo off

REM Start Apache
start /B "XAMPP Apache" "C:\xampp\apache\bin\httpd.exe"

REM Start MySQL
start /B "XAMPP MySQL" "C:\xampp\mysql\bin\mysqld.exe"

REM Start FileZilla
start /B "XAMPP FileZillaFTP" "C:\xampp\FileZillaFTP\FileZilla Server.exe"

echo XAMPP services started.

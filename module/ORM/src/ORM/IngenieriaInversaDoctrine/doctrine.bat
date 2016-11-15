    @echo off
     
    set PHPBIN=C:\xampp\php\php.exe
    if not exist "%PHPBIN%" if "%PHP_PEAR_PHP_BIN%" neq "" goto USE_PEAR_PATH
    GOTO RUN
    :USE_PEAR_PATH
    set PHPBIN=%PHP_PEAR_PHP_BIN%
    :RUN
    "%PHPBIN%" "\xampp\htdocs\inventario\vendor\doctrine\orm\bin\doctrine" %*
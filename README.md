[![License](https://img.shields.io/apm/l/vim-mode.svg)](https://opensource.org/licenses/MIT) ![Development](https://img.shields.io/badge/development-in%20progress-yellow.svg)
# Electronic Documentation
Web service para el control de documentos electrónicos de una empresa.

## Requerimientos
- [Laravel 5.5](https://laravel.com)
- [PHP 7.*](http://php.net)
- [PostgreSQL 9.6.*](https://www.postgresql.org)
- [pgAdmin 4](https://www.pgadmin.org)

## Dependencias
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

## Instalación (Linux)
- Abrir el terminal.
- Clonar el presente proyecto con el comando `git clone (URL)`.
- Entrar en la carpeta creada recientemente con el comando `cd Electronic_Documentation/`.
- Instalar todas las dependencias del proyecto con el comando `composer install`.
- Migrar las tablas necesarias a la base de datos con el comando `php artisan migrate`.
- Ejecutar el servidor de Laravel con el comando `php artisan serve`.
- Ingresar al link que proporciona Laravel para acceder a la web service.

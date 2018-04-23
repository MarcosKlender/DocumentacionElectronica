[![License](https://img.shields.io/apm/l/vim-mode.svg)](https://opensource.org/licenses/MIT) ![Development](https://img.shields.io/badge/development-in%20progress-yellow.svg)
# Electronic Documentation
Web service para el control de documentos electrónicos de una empresa.

## Requerimientos
- [Laravel 5.5](https://laravel.com)
- [PHP 7.*](http://php.net)
- [PostgreSQL 9.6.*](https://www.postgresql.org)

## Dependencias
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

## Instalación (Linux)
Como viene siendo costumbre en los entornos Linux, lo primero que debemos hacer es actualizar los repositorios de la distribución e instalar todas las actualizaciones disponibles antes de descargar e instalar PHP o algún otro componente. Para ello, desde el bash del sistema se debe ejecutar los siguientes comandos:
```
sudo apt update
sudo apt -y upgrade
```

### PHP
Una vez actualizado el sistema, lo siguiente será instalar PHP 7.1 junto con todos los paquetes necesarios. Esto se logra ejecutando el siguiente comando:
```
sudo apt install php7.1 php7.0-cli php7.1-common php7.1-mbstring php7.1-intl php7.1-xml php7.1-mysql php7.1-mcrypt
```
Al finalizar la instalación se puede comprobar la versión de PHP instalada ejecutando:
```
php -v
```

### PostgreSQL
Esta instalación es relativamente sencilla, lo más importante aquí para el funcionamiento del proyecto es la creación del rol y la base de datos en el sistema gestor. Ubuntu incluye PostgreSQL por defecto y para instalarlo junto con los paquetes más comunes del mismo, se debe ejecutar el comando que se muestra a continuación:
```
sudo apt-get install postgresql-9.6
```
Ahora, es necesario habilitar el servidor PostgreSQL de manera que se ejecute cada vez que iniciemos el sistema operativo. Para ello, son necesarios los siguientes comandos:
```
systemctl start postgresql.service
systemctl enable postgresql.service
systemctl status postgresql.service
```

### Laravel
Laravel utiliza Composer, un manejador de dependencias para PHP muy robusto, mismo que permitirá instalar el framework y todas las dependencias enlistadas anteriormente. Para instalar la versión más reciente de Composer se deben ejecutar los siguientes comandos:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
Ahora Composer habrá sido descargado e instalado en el directorio actual. Se recomienda actualizar la ubicación para que Composer funcione de manera global y poder utilizar sus comandos desde cualquier lugar. Para ello se necesita el siguiente comando:
```
sudo mv composer.phar /usr/local/bin/composer
```
Gracias a que el producto hace uso del sistema de control de versiones Github, sólo basta con clonarlo vía HTTPS instalando Git y utilizando el comando clone seguido de la URL:
```
sudo apt-get install git-core
git clone https://github.com/MarcosKlender/Electronic_Documentation.git
```
Con esto descargaremos el proyecto en una carpeta llamada “Electronic_Documentation”. Ahora debemos ingresar a ese directorio y actualizar las dependencias necesarias, tal como se muestra a continuación:
```
cd Electronic_Documentation/
composer install
```
Ahora el proyecto ha sido instalado correctamente, pero la autenticación de usuarios no funcionará hasta migrar las tablas necesarias a la base de datos. Dichas tablas están descritas en los modelos de Laravel y el comando necesario para la migración es el siguiente:
```
php artisan migrate
```
Finalmente, el proyecto estará listo para ser utilizado. Primero se debe levantar el servidor que Laravel trae preinstalado y luego, se debe acceder al link que muestra en pantalla.
```
php artisan serve
```

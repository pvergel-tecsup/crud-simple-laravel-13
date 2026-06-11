<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CRUD Sencillo (Laravel 13)

## Sobre el proyecto

El proyecto presenta dos CRUD para dos tablas: Categoria y Producto.

Estructura de las tablas
Categoria
- id
- descripcion

Producto
- id_producto
- nombre
- marca
- precio
- stock
- id_categoria

## Habilitación de la aplicación
Siga los siguiente pasos para habilitar la aplicación:

### Paso 1: Crear una base de datos en blanco
Cree una base de datos para la aplicación. No es necesario crear tabla alguna.

### Paso 2: Genere el archivo .env
Cree el archivo .env en base al archivo .env.example.

### Paso 3: Configurar la conexión a la base de datos
En su archivo .env coloque la conexión a la base de datos creada en el paso 1.

### Paso 4: Genere la clave de seguridad (APP_KEY) de su aplicación
En la carpeta del proyecto Laravel cree la llave (key) de seguridad de su aplicación ejecutando el siguiente comando:
> php artisan key:generate

Esto colocará la llave de seguridad en la variable APP_KEY en su archivo .env

### Paso 5: Genere las dependencias y librerías externas de su aplicación (carpeta "vendor")
En la carpeta del proyecto Laravel genere la carpeta "vendor" con las dependencias y librerías de la aplicación ejecutando el siguiente comando:
> composer install

### Paso 6: Ejecute las migraciones
En la carpeta del proyecto Laravel ejecute el siguiente comando:
> php artisan migrate

## Para cambiar el idioma a español

Para mostrar los errores de validación en español en Laravel, debe configurar el idioma local en tu archivo .env y asegurarse de que el directorio de traducciones esté publicado en su proyecto.  

Siga estos 3 pasos para configurarlo:

### Configurar el entorno
Abra su archivo .env en la raíz del proyecto y cambie la variable de idioma a español:
> APP_LOCALE=es  
> APP_FALLBACK_LOCALE=es

### Publicar los archivos de idioma
Ejecute el siguiente comando en la terminal para generar la carpeta lang (si no existe en su proyecto):
> php artisan lang:publish

### Instalar las traducciones
Instale el paquete oficial de traducciones para obtener las validaciones de Laravel en español:
> composer require laravel-lang/common --dev  
> php artisan lang:update
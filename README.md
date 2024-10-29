# Biblioteca Web

Este es un proyecto académico para una página web de una biblioteca, desarrollado con PHP y Laravel.

## Requisitos

Componentes necesarios:

- PHP
- Composer
- Node.js y npm
- XAMPP (o cualquier servidor que soporte Apache y MySQL)

## Instalación

Sigue estos pasos para ejecutar el proyecto en tu entorno local:

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/luzma04/TPI-LabIV.git
   cd TPI-LabIV
   
2. **Instala las dependencias de PHP**
    ```bash
    composer install
    
3. **Instala las dependencias de JavaScript**
    ```bash
    npm install

4. **Inicia MySQL y Apache**
Asegúrate de que MySQL y Apache estén corriendo en XAMPP o tu servidor local. En phpMyAdmin crear una base de datos con nombre biblioteca.

5. **Ejecuta las migraciones**
    ```bash
    php artisan migrate

6. **Inicia el servidor de desarrollo**

    ```bash
    php artisan serve
7.
    ```bash
    npm run dev

5. **Asegurate de tener el archivo .env**
# Tienda Informática - Laravel 12 y Bootstrap 5

Aplicación web MVC para la gestión y visualización de productos informáticos (portátiles, ratones e impresoras), desarrollada como actividad de aprendizaje del programa **Análisis y Desarrollo de Software (ADSO) - SENA**.

## Funcionalidades

- Registro de productos con nombre, categoría, precio, descripción e imágenes.
- Carga de **múltiples imágenes por producto**, convertidas a **Base64** y guardadas como un arreglo JSON en la base de datos.
- Validación en el servidor: cada imagen debe ser jpeg, png, jpg o webp y pesar **máximo 300 KB** (`max:300`).
- Catálogo responsive con **Navbar, Cards y Carousel** de Bootstrap 5.

## Tecnologías

- PHP 8.2+
- Laravel 12
- Bootstrap 5.3
- SQLite

## Estructura principal

| Archivo | Descripción |
|---|---|
| `database/migrations/xxxx_create_productos_table.php` | Tabla `productos` con la columna `imagenes` de tipo JSON |
| `app/Models/Producto.php` | Modelo con `$fillable` y cast `imagenes => array` |
| `app/Http/Controllers/ProductoController.php` | Métodos `index`, `create` y `store` (validación y conversión a Base64) |
| `routes/web.php` | Rutas `productos.index`, `productos.create` y `productos.store` |
| `resources/views/productos/index.blade.php` | Catálogo con carrusel de imágenes por producto |
| `resources/views/productos/create.blade.php` | Formulario de registro de productos |

## Instalación y ejecución

El repositorio incluye las dependencias (`vendor`), la configuración y la base de datos `database/database.sqlite` con productos de ejemplo. **No es necesario ejecutar `composer install`, `npm install`, `php artisan key:generate` ni migraciones.**

1. Clonar el repositorio e ingresar a la carpeta:
   ```bash
   git clone <url-del-repositorio>
   cd tienda-informatica
   ```
2. **Cambiar el nombre del archivo `.env.example` a `.env`** (desde el explorador de archivos o con el comando):
   ```bash
   mv .env.example .env
   ```
   En la terminal de Windows (CMD) el comando es `ren .env.example .env`.
3. Iniciar el servidor:
   ```bash
   php artisan serve
   ```
4. Abrir en el navegador: http://127.0.0.1:8000

La llave de la aplicación (`APP_KEY`) se genera automáticamente en el archivo `.env` la primera vez que se ejecuta el proyecto.

**Requisitos:** PHP 8.2 o superior con las extensiones `pdo_sqlite` y `fileinfo` habilitadas (vienen activas en XAMPP).

## Rutas

| Método | URL | Descripción |
|---|---|---|
| GET | `/` | Catálogo de productos |
| GET | `/productos/crear` | Formulario de registro |
| POST | `/productos` | Guardar producto |

## Desarrollado por

Valentina Obando - Aprendiz ADSO, SENA

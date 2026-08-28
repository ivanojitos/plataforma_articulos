# Plataforma de Artículos

Aplicación web desarrollada con Laravel para consultar, clasificar y administrar artículos mediante una interfaz pública y un panel administrativo protegido.

## Demostración

- Aplicación: <https://plataforma-articulos.onrender.com/>
- Repositorio: <https://github.com/ivanojitos/plataforma_articulos>

## Funcionalidades

### Sección pública

- Listado de artículos mediante tarjetas.
- Filtro visible por categoría.
- Conservación del filtro durante la paginación.
- Imagen destacada o presentación alternativa.
- Fecha de publicación visible.
- Vista de detalle accesible mediante slug.
- Diseño adaptable a dispositivos móviles, tabletas y escritorio.
- Estados para listados vacíos y filtros sin resultados.

### Panel administrativo

- Inicio de sesión exclusivo para administradores.
- Registro público deshabilitado.
- Panel administrativo protegido con middleware.
- Creación, edición y eliminación de artículos.
- Gestión de imágenes destacadas.
- Validación de formularios.
- Confirmación antes de eliminar registros.

## Tecnologías

- PHP 8.2 o superior.
- Laravel 12.
- MySQL para desarrollo local.
- PostgreSQL para despliegue en Render.
- Blade.
- Tailwind CSS.
- JavaScript.
- Vite.
- Eloquent ORM.
- PHPUnit.
- Docker y Apache para producción.

## Arquitectura

El proyecto utiliza el patrón MVC proporcionado por Laravel.

### Modelos

- `User`: usuarios y administradores.
- `Categoria`: clasificación de los artículos.
- `Articulo`: contenido publicado.

Una categoría tiene muchos artículos y cada artículo pertenece a una categoría.

### Controladores

- `ArticuloController`: listado y detalle público.
- `Admin\ArticuloController`: operaciones administrativas.
- `Admin\DashboardController`: panel administrativo.
- Controladores de autenticación proporcionados por Laravel Breeze.

### Vistas

- `resources/views/articulos`: interfaz pública.
- `resources/views/admin`: panel administrativo.
- `resources/views/auth`: autenticación.
- `resources/views/layouts`: estructuras reutilizables.

## Seguridad

La aplicación incluye:

- Protección CSRF.
- Contraseñas almacenadas mediante hashing.
- Rate limiting en el inicio de sesión.
- Registro público deshabilitado.
- Acceso administrativo mediante `auth` y middleware `admin`.
- Indicador booleano `users.is_admin`.
- Credenciales administrativas mediante variables de entorno.
- Validación de datos antes de persistir información.
- Escape del contenido público para prevenir XSS.
- Consultas mediante Eloquent para reducir riesgos de inyección SQL.
- Variables y secretos excluidos del repositorio mediante `.gitignore`.

Los usuarios con `is_admin = false` no pueden iniciar sesión en el panel ni acceder a las rutas `/admin`.

## Requisitos

Antes de instalar el proyecto necesitas:

- PHP 8.2 o superior.
- Composer 2.
- Node.js 20 o superior.
- npm.
- MySQL 8 o PostgreSQL.
- Git.

En este proyecto local de Windows, PHP 8 puede ejecutarse mediante el alias `php8`. Si tu instalación utiliza `php`, reemplaza `php8` por `php` en los comandos.

## Instalación en Windows

### 1. Clonar el repositorio

```powershell
git clone https://github.com/ivanojitos/plataforma_articulos.git
```

```powershell
cd plataforma_articulos
```

### 2. Instalar dependencias PHP

```powershell
composer install
```

Si tienes un alias específico de Composer:

```powershell
composer2 install
```

### 3. Instalar dependencias frontend

```powershell
npm install
```

### 4. Crear el archivo de entorno

```powershell
Copy-Item .env.example .env
```

### 5. Generar la clave de Laravel

```powershell
php8 artisan key:generate
```

## Configuración local

Crea una base de datos vacía llamada:

```text
plataforma_articulos
```

Configura `.env`:

```dotenv
APP_NAME="Plataforma de Artículos"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_TIMEZONE=America/Mexico_City

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plataforma_articulos
DB_USERNAME=root
DB_PASSWORD=
```

Ajusta `DB_USERNAME` y `DB_PASSWORD` según tu instalación.

## Administrador

Las credenciales administrativas no están escritas en el código.

Agrega a tu `.env`:

```dotenv
ADMIN_NAME="Administrador"
ADMIN_EMAIL="correo-administrativo@example.com"
ADMIN_PASSWORD="contraseña-larga-y-exclusiva"
```

Utiliza una contraseña de al menos 16 caracteres y no la reutilices en otros servicios.

Nunca publiques estos valores ni subas `.env` al repositorio.

En `.env.example` deben permanecer vacíos:

```dotenv
ADMIN_NAME="Administrador"
ADMIN_EMAIL=
ADMIN_PASSWORD=
```

## Base de datos y datos iniciales

Ejecuta las migraciones y seeders:

```powershell
php8 artisan migrate --seed
```

Los seeders crean categorías, artículos de demostración y la cuenta administrativa configurada mediante variables de entorno.

Los seeders utilizan operaciones repetibles para evitar duplicar los registros principales.

## Almacenamiento de imágenes

Crea el enlace simbólico:

```powershell
php8 artisan storage:link
```

Las imágenes públicas se sirven desde:

```text
public/storage
```

En plataformas con sistema de archivos efímero, las imágenes subidas necesitan almacenamiento persistente externo para no perderse durante reinicios.

## Ejecutar el proyecto

Terminal 1:

```powershell
php8 artisan serve
```

Terminal 2:

```powershell
npm run dev
```

Abre:

```text
http://127.0.0.1:8000
```

## URLs principales

| Sección | URL | Acceso |
|---|---|---|
| Inicio | `/` | Público |
| Artículos | `/articulos` | Público |
| Detalle | `/articulos/{slug}` | Público |
| Login | `/login` | Público |
| Administración | `/admin` | Solo administrador |
| Gestión de artículos | `/admin/articulos` | Solo administrador |
| Health check | `/up` | Público |

## Compilación de producción

```powershell
npm run build
```

## Pruebas automatizadas

Ejecuta todas las pruebas:

```powershell
php8 artisan test
```

Pruebas específicas de seguridad:

```powershell
php8 artisan test tests\Feature\Authorization\AdminAccessTest.php
```

Pruebas de artículos públicos:

```powershell
php8 artisan test tests\Feature\PublicArticleTest.php
```

Las pruebas comprueban:

- Redirección de invitados al login.
- Bloqueo de usuarios no administradores.
- Acceso correcto del administrador.
- Desactivación del registro público.
- Listado público de artículos.
- Filtrado por categoría.
- Imagen destacada y fecha.
- Acceso al detalle mediante slug.

## Despliegue con Docker

El repositorio incluye:

- `Dockerfile`.
- `.dockerignore`.
- Soporte para MySQL y PostgreSQL.
- Compilación de recursos con Vite.
- Ejecución automática de migraciones.
- Creación del enlace de almacenamiento.
- Apache configurado con `public` como raíz.

Variables mínimas para producción:

```dotenv
APP_NAME="Plataforma de Artículos"
APP_ENV=production
APP_DEBUG=false
APP_KEY=
APP_URL=https://tu-dominio.example
ASSET_URL=https://tu-dominio.example

DB_CONNECTION=pgsql
DATABASE_URL=

ADMIN_NAME="Administrador"
ADMIN_EMAIL=
ADMIN_PASSWORD=
```

`APP_KEY`, `DATABASE_URL` y `ADMIN_PASSWORD` deben configurarse como secretos en la plataforma de alojamiento.

## Buenas prácticas para contribuir

Antes de guardar cambios:

```powershell
php8 artisan test
```

```powershell
npm run build
```

```powershell
git diff --check
```

Después:

```powershell
git add .
git commit -m "descripción clara del cambio"
git push origin main
```

No incluir en commits:

- `.env`.
- Contraseñas.
- Tokens.
- URLs privadas de bases de datos.
- Carpetas `vendor` o `node_modules`.
- Copias ZIP del proyecto.

## Experiencia de usuario

La interfaz utiliza una jerarquía visual clara, navegación consistente, controles accesibles y estados comprensibles.

El filtro por categoría permanece visible antes del listado. Cada tarjeta presenta categoría, fecha, título, descripción, imagen y acceso al detalle.

El panel administrativo prioriza las acciones principales y muestra validaciones, confirmaciones y resultados de las operaciones.

## Estado del proyecto

El proyecto se encuentra funcional y en mejora continua. Su objetivo es demostrar conocimientos de Laravel, arquitectura MVC, seguridad, persistencia, autenticación, pruebas y diseño de interfaces.

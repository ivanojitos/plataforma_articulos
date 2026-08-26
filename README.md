# Plataforma de Artículos

## Descripción

Plataforma web desarrollada con Laravel...

## Tecnologías

- Laravel
- PHP
- MySQL
- Blade
- Tailwind CSS
- JavaScript basico
- Eloquent ORM
- MVC
- Migrations + Seeders
- Middleware
- CSRF + Validacion Laravel
- Blade Layouts + Componentes
- Laravel Storage


## Requisitos

PHP 8.2.12
Composer 2.4.4
Node.js 25.8.1
MySQL 8.0.38
NPM 11.11.0

## Instalación

Primero ubicate en la carpeta donde quieres que se instale el proyecto.
una ves posiciondado ahi ahora si ingresa esta linea y da enter.
y por cada linea da enter y espera y cuando finalice ingresa la siguiente linea.


git clone https://github.com/ivanojitos/plataforma_articulos.git

composer install

npm install

cp .env.example .env

php artisan key:generate

## Base de datos

Configurar .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plataforma_articulos
DB_USERNAME=root
DB_PASSWORD=root

## Migraciones

php artisan migrate --seed

## Storage

php artisan storage:link

## Assets

npm run build

## Servidor

php artisan serve

## Usuario administrador

Email:
admin@example.com

Password:
password

## URLs

Público:

/articulos

Administración:

/admin



La sección pública puede ser consultada sin autenticación.

La sección administrativa requiere iniciar sesión con el usuario administrador
creado mediante el Seeder.

## Decisiones UX/UI

La interfaz fue diseña buscando una experiencia sencilla, clara y consistente tanto para los usuarios  de la seccion puiblicac como para el administrador

SECCION PUBLICA

la seccion de articulos utiliza una estructura visual basada en tarjetas para facilitar la exploracion del contenido. cada tarjeta muestra la informacion pricipal del articulo, imagen destacada, titulo, cateegoria y descripcion junto con su fecha de creacion.

el filtro de categoria se muestra visible y accesiuble para que el usuario pueda encontrar contenido especifico sin necesidad de navegar entre diferentes paginas 

la vista de detalle utiliza una jerarquia visual clara , destacando el titulo, categoria, fecha , imagen y contenido completo.

SECCION ADMINISTRATIVA

la administracion se diseño priorizando las acciones principales:

-consultar articulos.
-crear articulos.
-editar articulos.
eliminar articulos.

los formularios utilizan etiquetas claras,mensajes de validacion y estados visuales para comunicar al usuario si una operacion fue realizada correctamente o si existe algun problema.

antes de eliminar un articulo se solicita confirmacion para evitar acciones accidentales.

RESPONSIVE

la interfaz fue desarrollada considerante diferentes tamaños de pantalla.
los componenetes se adaptan a dispositivos, moviles,tablets y escritorio,
manteniendo la legibilidad y accesibilidad de las acciones principales.

Estados.

Se contemplan diferentes estados para mejorar la experiencia:

-lista de articulos vacia.
-filtro sin resultados.
-errores de validacion.
-operaciones realizadas correctamente.
-confirmacion antes de eliminar.
estados de carga y navegacion cuando corresponde. 




## Arquitectura

El proyecto utiliza laravel sigueinte una estrucutra basada en el patron MVC proporcianado por el framework.

Modelo

Los modelos representan las entidades principales de la aplicacion

-user
articulo
categoria

articulos mantiene una relacion bologsto con categoria mientras que categoria mantiene una relacion hasmany con articulo.

Controlador.

La logica relacionad con los articulos se separa entre la seccion publica y la administracion

-articulocontroller : consulta y muestra los articulos publicos.
-admin\ar5ticulocontroller : administra las operaciones crud.
admin\dashboardcontroller : gestiona el panel administrativo.

esta separacion permite mantener diferenciadas las responabilidades de la seccion publica y privada.

VISTAS

las vistas se implementaron utilizando blade y se organizaron por contexto 

-articulos : vistas publicas
-admin/ : vistas administrativas
-layouts/ : estructuras reutilizables
-auth/ : vistas relacionadas con autenticacion 

se utilizan layouts y componentes reutilizables para evitar duplicacion de codigo y mantener consistencia visual.

PERSISTENCIA

la informacion se almacena en una base de datos relacionl utilizando Eloquent ORM.

las tablas principales son 

-user
-categorias
-articulos

la relacion entres articulos yu categorias se estable mediante categoria_id

VALIDACION Y SEGURIDAD

las solicitudes son validadas desde los controladores antes de persistir informacion

se utilizan las funcionalidades prorporciandas por laravel para:

-proteccion CSRF
-autenticacion
-hash seguro de contraseñas.
-validacion de datos.
-proteccion de rutas administrativas.
-escape de contenido mostrado en las vistas.

FRONT END

la interfaz utiliza blade junto con Tailwind css para la construccion de los componentes visuales y el diseño responsive.

la logica de negocio permanece principalmente en laravel , mientras que el font end se encarga de la presentacion y las intereacciones necesarias para la experiencia del usuario.


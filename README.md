# TaskBoard (versión ligera, Semana 11)

Proyecto de Integración de Sistemas (UPED): una pasarela de pagos simple hecha con Laravel.
Tiene comercios, transacciones (con sus eventos), buscador, formulario de nueva transacción
con validación (Form Request), editar, eliminar y cambiar de estado con transiciones válidas.

Esta es una versión **ligera**: le quité todo lo que se puede volver a generar, porque GitHub
no deja subir más de 100 archivos de golpe ni archivos de más de 25 MB.

## Qué quité (y cómo volver a tenerlo)

| Lo que quité | Por qué | Cómo se recupera |
|---|---|---|
| `vendor/` (unos 92 MB y casi 8,900 archivos) | Son las librerías de Laravel, no código mío | `composer install` |
| `.env` | Tiene la `APP_KEY` y configuración local, no se sube | copiar `.env.example` y `php artisan key:generate` |
| `database/database.sqlite` | Era mi base con datos de prueba | `php artisan migrate --seed` la vuelve a crear |
| `storage/framework/views/*.php` | Vistas compiladas por Blade (se hacen solas) | Laravel las regenera al abrir las páginas |
| `bootstrap/cache/services.php` y `packages.php` | Caché que genera Composer | `composer install` las regenera |

No venía incluida la carpeta `node_modules/`, y no hace falta: las vistas usan CSS dentro del layout.

Lo demás está completo: `app/`, `config/`, `routes/`, `resources/`, `database/migrations`,
`database/seeders`, `database/factories`, `public/`, `tests/`, `composer.json` y `composer.lock`.
Las carpetas de `storage/` quedan con sus `.gitignore` para que Laravel las encuentre.

## Cómo levantarlo

Necesitas PHP 8.3 o más y Composer. En la carpeta del proyecto:

```
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

(En PowerShell, en vez de `copy` también sirve `Copy-Item .env.example .env`.
En Mac o Linux: `cp .env.example .env`.)

Si `migrate` pregunta si quieres crear el archivo `database.sqlite`, responde que sí.
El proyecto usa SQLite, así que no hace falta instalar MySQL.

## Datos de prueba

El seeder crea tres comercios: Café Amanecer (2 transacciones), Ferretería El Tornillo
(sin transacciones) y Pupusería Doña Marta (1 transacción).

## Páginas para probar

- `/comercios` : lista con buscador y filtro por rubro
- `/comercios/1` : panel de un comercio con sus transacciones
- `/comercios/1/transacciones/nueva` : formulario de nueva transacción
- Desde el panel del comercio: editar, eliminar y marcar Completada/Fallida

## Ojo

En esta versión todavía no hay login ni usuarios (eso viene en la Semana 12),
así que cualquiera puede ver todos los comercios.

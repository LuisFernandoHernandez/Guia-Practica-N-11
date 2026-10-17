# TaskBoard (Semana 11)

## Qué quité (y cómo volver a tenerlo)

| Lo que quité| Cómo se recupera |
|---|---|---|
| `vendor/` (unos 92 MB y casi 8,900 archivos)| `composer install` |
| `.env` | copiar `.env.example` y `php artisan key:generate` |
| `database/database.sqlite` | `php artisan migrate --seed` la vuelve a crear |
| `storage/framework/views/*.php` | Laravel las regenera al abrir las páginas |
| `bootstrap/cache/services.php` y `packages.php` | `composer install` las regenera |

No venía incluida la carpeta `node_modules/`, y no hace falta: las vistas usan CSS dentro del layout.

Lo demás está completo: `app/`, `config/`, `routes/`, `resources/`, `database/migrations`,
`database/seeders`, `database/factories`, `public/`, `tests/`, `composer.json` y `composer.lock`.
Las carpetas de `storage/` quedan con sus `.gitignore` para que Laravel las encuentre.

## Cómo levantarlo

Necesita PHP 8.3 o más y Composer. En la carpeta del proyecto:

```
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

(En PowerShell, en vez de `copy` también sirve `Copy-Item .env.example .env`.
En Mac o Linux: `cp .env.example .env`.)

Si `migrate` pregunta si quiere crear el archivo `database.sqlite`, responde que sí.
El proyecto usa SQLite, así que no hace falta instalar MySQL.

## Datos de prueba

El seeder crea tres comercios: Café Amanecer (2 transacciones), Ferretería El Tornillo
(sin transacciones) y Pupusería Doña Marta (1 transacción).

## Páginas para probar

- `/comercios` : lista con buscador y filtro por rubro
- `/comercios/1` : panel de un comercio con sus transacciones
- `/comercios/1/transacciones/nueva` : formulario de nueva transacción
- Desde el panel del comercio: editar, eliminar y marcar Completada/Fallida

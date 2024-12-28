# XMShop Attribute

Este paquete añade funcionalidades adicionales de atributos a tu tienda Bagisto.

## Requisitos

Este paquete debe instalarse después de haber instalado ***Bagisto*** y tener la tienda base configurada. De lo 
contrario,
podrían ocurrir errores en las migraciones, ya que las migraciones de este paquete requieren que se hayan ejecutado los seeders de Bagisto.

## Instalación

1. **Actualizar `composer.json`**

   Añade la siguiente línea en la sección `autoload` `psr-4` de tu archivo `composer.json`:

   ```json
   "autoload": {
       "psr-4": {
           /** Los namespaces actuales */
           "XMShop\\Attribute\\": "packages/XMShop/Attribute/src"
       }
   }
   ```

2. **Añadir el Service Provider**

   Añade en el indice `providers` el siguiente Service Provider en tu archivo `config/app.php`:

   ```php
   'providers' => [
        /** El resto de Service Providers */
        XMShop\Attribute\Providers\AttributeServiceProvider::class,
    ]
   ```

3. **Actualizar autoload de composer**

   Ejecuta el siguiente comando para actualizar el autoload de composer:

   ```bash
   composer dump-autoload
   ```
   
4. **Ejecutar las migraciones**

   Ejecuta el siguiente comando para ejecutar las migraciones del paquete:

   ```bash
   php artisan migrate
   ```
   
## Licencia

Este paquete es de código abierto y está disponible bajo la [licencia MIT](./License.txt).
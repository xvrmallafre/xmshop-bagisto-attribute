<?php

namespace XMShop\Attribute\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Product\Models\Product;
use XMShop\Attribute\Console\Commands\ClearAll;
use XMShop\Attribute\Models\Product as XMSProduct;

class AttributeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Cargamos los commands
        $this->commands([
            ClearAll::class,
        ]);

        // Cargamos un helper para acceder a métodos que podamos necesitar
        include __DIR__.'/../Http/helpers.php';

        // Cargamos las migraciones de nuestro paquete
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        // Cargamos las vistas de nuestro paquete
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'XMShop');
        // TODO: mirar como sobrescribir correctamente el controlador para procesar la información de los atributos personalizados

        // Sobrescritura de archivos de la vista de productos del admin
        $this->publishes([
            __DIR__.'/../Resources/views/admin/catalog/products/edit.blade.php' => resource_path('views/admin/catalog/products/edit.blade.php'),
        ]);
    }

    /**
     * Register services.
     */
    public function register()
    {
        // Sobrescribimos el modelo de producto
        //$this->app->bind(Product::class, XMSProduct::class);
    }
}

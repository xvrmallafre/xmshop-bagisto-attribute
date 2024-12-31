<?php
namespace XMShop\Attribute\Providers;

use Webkul\Product\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
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
        // TODO: Sobrescribir la ruta, por algun motivo causa el error: Trying to access array offset on null
        // TODO: Es posible que sea debido a como extendía el controlador, el constructor no estaba definido, y
        // TODO: puede que al no hacerlo, al llamar al metodo download faltase alguna dependencia
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'XMShop');
        Route::middleware('web')
            ->namespace('XMShop\Attribute\Http\Controllers')
            ->group(__DIR__ . '/../Routes/web.php');

        // Sobrescritura de archivos de la vista de productos del admin
        $this->publishes([
            __DIR__ . '/../Resources/views/admin/catalog/products/edit.blade.php' => resource_path('views/admin/catalog/products/edit.blade.php'),
        ]);
    }

    /**
     * Register services.
     */
    public function register()
    {
        // Sobrescribimos el modelo de producto
        $this->app->bind(Product::class, XMSProduct::class);
    }
}
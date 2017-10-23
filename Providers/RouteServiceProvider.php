<?php

namespace Modules\Media\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $rootUrlNamespace = 'Modules\Media\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @param  Router $router
     * @return void
     */
    public function before(Router $router)
    {
        Route::pattern('crip_file', '[a-zA-Z0-9.\-\/\(\)\_\% ]+');
        Route::pattern('crip_folder', '[a-zA-Z0-9.\-\/\(\)\_\% ]+');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        if (!app()->routesAreCached()) {
            require __DIR__ . '/../Http/routes.php';
        }
        $this->mapPackageRoutes();
    }

    /**
     * Define the "package" routes for the application.
     */
    protected function mapPackageRoutes()
    {
        Route::group([
            'prefix'     => 'admin/media/packages/filemanager',
            'as'         => 'admin::media.',
        ], function () {
            Route::resource('api/crip-folders', \Crip\Filesys\App\Controllers\FolderController::class);
            Route::resource('api/crip-files', \Crip\Filesys\App\Controllers\FileController::class);
            Route::get('api/crip-tree', \Crip\Filesys\App\Controllers\TreeController::class);
            Route::get('/', \Crip\Filesys\App\Controllers\ManagerController::class);
        });
    }
}

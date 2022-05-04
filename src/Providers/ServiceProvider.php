<?php

namespace ConnectMalves\AdminLTE\Providers;

use JeroenNoten\LaravelAdminLte\Http\ViewComposers\AdminLteComposer;
use Illuminate\Support\ServiceProvider as BaseProvider;
use Illuminate\Support\Facades\View;

class ServiceProvider extends BaseProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'jcrud');
        View::composer('jcrud::vendor.adminlte.page', AdminLteComposer::class);
    }
}

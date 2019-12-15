<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\EconomyController;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$economy = new EconomyController; 
		$economy->thu_chi();
		View::share('listData',$economy->getData());
        //
		// $data = new Data;
        // View::share('listProductsOfCom',$product->getDataOfCom());
    }
}

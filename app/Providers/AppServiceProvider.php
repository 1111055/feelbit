<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use URL;
use App\Menu;
use App\Setting;
use App\Pagina;
use App\Prazos;
use App\Social;
use App\Categoria;
use App\Expressoes;

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
        Schema::defaultStringLength(191);
       
        //URL::forceScheme('https');


        $menus     = Menu::getAllMenu();
        $menuf     = Menu::getMenuFooter();
        $setting   = Setting::getAllSettings();
        $page      = Pagina::getPagina();
        $social    = Social::getSocial();
        $exp       = Expressoes::where('expression','!=', ' ')->get();
        $exptwo    = $exp->toArray();





       // dd($menus);

         //Session::put('menu', $cart); 

         View::share('menu', $menus);
         View::share('menufooter', $menuf);
         View::share('setting', $setting);
         View::share('paginas', $page);
         View::share('socials', $social);
         View::share('exp', $exptwo);
    
    }
}

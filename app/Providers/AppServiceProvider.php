<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SupportEmail;
use App\Models\HeadOffice;
use App\Models\CorporateOffice;
use App\Models\AboutLink;

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
        View::share('supportEmails', SupportEmail::all());
        View::share('headOffices', HeadOffice::all());
        View::share('corporateOffices', CorporateOffice::all());
        View::share('aboutLinks', AboutLink::all());
        // if (config('app.env') !== 'local') {
        //     \URL::forceScheme('https');
        // }
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SupportEmail;
use App\Models\HeadOffice;
use App\Models\CorporateOffice;
use App\Models\AboutLink;
use App\Models\Branch;
use App\Models\Category;
use App\Models\FrontendManagerCourse;

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
        View::share('branchesWithContent', Branch::with('categories.courses')->get());
        View::share('allCourses', \App\Models\FrontendManagerCourse::all());
        // if (config('app.env') !== 'local') {
        //     \URL::forceScheme('https');
        // }
    }
}

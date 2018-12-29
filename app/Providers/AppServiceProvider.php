<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Providers\Blade\DirectivesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \Carbon\Carbon::setLocale(str_replace('_', '-', app()->getLocale()));
        $this->registerDirectives();
        $this->registerCustonsDirectives();
        // Group Components
        // Form::component('textGroup','components.formGroup.text', ['col', 'label', 'name', 'value' => null, 'attributes' => [], 'errors']);
        Form::component('inputGroup','components.formGroup.input', ['type', 'params', 'errors']);
        Form::component('elementGroup','components.formGroup.element', ['type', 'params', 'errors']);
        //
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create(str_replace('_', '-', app()->getLocale()));
            // return \Faker\Factory::create(app()->getLocale());
        });
        //
    }

    
    /**
     * Register all directives.
     *
     * @return void
     */
    public function registerDirectives()
    {
        $directives = require __DIR__.'/Blade/BladeDirectives.php';
        DirectivesRepository::register($directives);
    }

    /**
     * Register Custons Directives
     * 
     * @return void
     */
    public function registerCustonsDirectives()
    {
        $directives = require __DIR__.'/Blade/BladeCustonsDirectives.php';
        DirectivesRepository::register($directives);
    }
}

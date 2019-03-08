<?php

namespace Ahsan\BladeParse;

use Illuminate\Support\ServiceProvider;

class BladeParseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bladeparse', function () {
            return new Bladeparse;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['blade.compiler']->directive('markdown', function ($markdown) {
            return "<?php echo app('bladeparse')->parse((string) {$markdown}); ?>";
        });
    }
}

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
            if ($markdown) {
                return "<?php echo app('bladeparse')->parse((string) {$markdown}); ?>";
            }

            return '<?php ob_start(); ?>';
        });

        $this->app['blade.compiler']->directive('endmarkdown', function () {
            return "<?php echo app('bladeparse')->parse(ob_get_clean()); ?>";
        });
    }
}

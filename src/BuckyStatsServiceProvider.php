<?php
namespace RockHopSoft\BuckyStats;

use Illuminate\Support\ServiceProvider;

class BuckyStatsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('buckystats', function($app) {
            return new BuckyStatsFacade();
        });
        require __DIR__ . '/routes.php';
        $this->publishes([
            __DIR__.'/Views'         => base_path('resources/views/vendor/buckystats'),
            __DIR__.'/Uploads'       => base_path('storage/app/up/buckystats'),
            __DIR__.'/Models'        => base_path('app/Models'),

            __DIR__.'/Database/2021_03_14_000000_create_buckystats_tables.php'
                => base_path('database/migrations/2021_03_14_000000_create_buckystats_tables.php'),
            __DIR__.'/Database/BuckyStatsSeeder.php'
                => base_path('database/seeders/BuckyStatsSeeder.php'),

            base_path('/vendor/rockhopsoft/buckystats-website/src')
                => base_path('storage/app/up/buckystats')
        ]);
    }
}

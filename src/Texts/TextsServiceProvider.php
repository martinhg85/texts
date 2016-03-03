<?php namespace Martinhg\Texts;

use Illuminate\Support\ServiceProvider;

class TextsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('texts', function ($app) {
            return new Texts();
        });
	}

}

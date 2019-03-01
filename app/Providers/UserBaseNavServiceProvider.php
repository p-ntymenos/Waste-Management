<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserBaseNavServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        view()->composer('partials.leftNav','App\Http\ViewComposers\NavComposer');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

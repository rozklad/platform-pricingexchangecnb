<?php namespace Sanatorium\Pricingexchangecnb\Providers;

use Cartalyst\Support\ServiceProvider;

class CNBServiceProvider extends ServiceProvider {

	/**
	 * {@inheritDoc}
	 */
	public function boot()
	{
		// Register the attributes namespace
		$this->app['sanatorium.shoppricing.exchange']->registerService(
			$this->app['Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController']
		);
	}

	public function register() {}
}




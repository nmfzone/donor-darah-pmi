<?php

namespace DonorDarahPMI\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
	/**
	 * Overwrite any vendor / package configuration.
	 *
	 * @return void
	 */
	public function register()
	{
		config([
			//
		]);
	}

}

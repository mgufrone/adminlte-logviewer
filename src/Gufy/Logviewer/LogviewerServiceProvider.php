<?php namespace Gufy\Logviewer;

use Illuminate\Support\ServiceProvider;

class LogviewerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('gufy/adminlte-logviewer');
		include dirname(__FILE__).'/../../filters.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->register('Mrjuliuss\SyntaraLogviewer\SyntaraLogviewerServiceProvider');
		$this->app->register('Kmd\Logviewer\LogviewerServiceProvider');

		\View::composer('adminlte::layouts.dashboard.master', function($view)
		{
		    $view->with('navPages', $view->navPages.\View::make('syntara-logviewer::navigation'));
		});
		$this->app['config']->set('logviewer::view', 'adminlte-logviewer::viewer');
		/*
		* Create alias for the dependency if its not already created.
		*/
		$this->app->booting(function(){
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$aliases = \Config::get('app.aliases');
			// Alias the Gravatar package

		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}

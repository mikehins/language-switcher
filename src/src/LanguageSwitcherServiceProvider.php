<?php

namespace mikehins\languageswitcher;

use Illuminate\Support\ServiceProvider;

class LanguageSwitcherServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->commands([
			'mikehins\languageswitcher\Commands\AddLanguageSwitcherCommand',
			'mikehins\languageswitcher\Commands\DeleteLanguageSwitcherCommand',
		]);
	}
}

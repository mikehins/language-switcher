<?php

namespace mikehins\languageswitcher\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteLanguageSwitcherCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'switch:delete';
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete the language switcher';
	
	protected $user;
	
	protected $table;
	
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->user = config('auth.providers.users.model');
		
		if (!$this->user) {
			$this->info('You must run php artisan make:auth before to use this package');
			die;
		}
		
		$this->table = (new $this->user)->getTable();
	}
	
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		collect([
			app_path('Http/Middleware/Language.php'),
			app_path('Http/Controllers/LanguageController.php'),
			base_path('config/languages.php'),
		])->each(function ($file) {
			if (file_exists($file)) {
				unlink($file);
			}
		});
		
		if (Schema::hasColumn($this->table, 'default_language')) {
			Schema::table($this->table, function (Blueprint $table) {
				$table->dropColumn('default_language');
			});
		}
		
		$this->remove(array_first(config('view.paths')) . '/layouts/app.blade.php', 'switcher.stub');
		$this->remove(base_path('routes/web.php'), 'routes.stub');
		$this->remove(app_path('Http/Kernel.php'), 'Kernel.stub');
		
		$this->info('The language switcher has been removed');
	}
	
	protected function remove($file, $stub)
	{
		file_put_contents(
			$file,
			str_replace(
				file_get_contents(__DIR__ . '/../stubs/' . $stub),
				'',
				file_get_contents($file)
			)
		);
	}
}
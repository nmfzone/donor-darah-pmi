<?php

namespace DonorDarahPMI\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class StorageFresh extends Command
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'storage:fresh';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fresh the Storage folder (beware about this)';

	/**
	 * The file system instance.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->files = new \Illuminate\Filesystem\Filesystem;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{

		foreach ($this->files->files(storage_path().'/app') as $file)
		{
			$this->files->delete($file);
		}

		foreach ($this->files->files(storage_path().'/framework/cache') as $file)
		{
			$this->files->delete($file);
		}

		foreach ($this->files->files(storage_path().'/framework/sessions') as $file)
		{
			$this->files->delete($file);
		}

		foreach ($this->files->files(storage_path().'/framework/views') as $file)
		{
			$this->files->delete($file);
		}

		foreach ($this->files->files(storage_path().'/logs') as $file)
		{
			$this->files->delete($file);
		}

		$this->info('Storage folder now fresh');
	}

}
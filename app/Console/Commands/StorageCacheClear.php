<?php

namespace DonorDarahPMI\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class StorageCacheClear extends Command
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'storage:cache-clear';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Clear cache in storage folder';

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

		foreach ($this->files->files(storage_path().'/framework/cache') as $file)
		{
			$this->files->delete($file);
		}

		$this->info('Cache files deleted from storage');
	}

}
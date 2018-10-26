<?php

namespace webdeveloperpcpl\test\Console\Commands;

use Illuminate\Console\Command;
use File;
use ZipArchive;

class unpackArchive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unpack {zip_file} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		
		$zipfile = $this->argument('zip_file');
		$force = $this->option('force');
						
		$path = base_path();
		
		$zip = new ZipArchive;
		if ($zip->open($zipfile) === TRUE) {
		
			$files = array();
			for($i = 0; $i < $zip->numFiles; $i++) {
				$filename = $zip->getNameIndex($i);
				//$this->info($filename); 
				$files[] = $filename;
			}
			
			foreach ($files as $file) {
			
				if ((!$force) && (File::exists($path . '/' . $file))) {
				
					$this->error('File:' . '/' . $file . ' is exists'); 
				}
				else {
					
					$zip->extractTo($path . '/', $file);
					$this->info('File:' . '/' . $file . ' extracted'); 
				}
			}	
			
			
			
			$zip->close();
			$this->info('Extracted.'); 
		} else {
			
			$this->error('Archive not found.'); 
		}

		
    }
}

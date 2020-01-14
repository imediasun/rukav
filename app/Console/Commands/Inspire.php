<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Log;
class Inspire extends Command
{
	
	public function __construct()
  {
    parent::__construct();
	
  }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
	
	 
    public function handle()
    {
        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
		
    }
}
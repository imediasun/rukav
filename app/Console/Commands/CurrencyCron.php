<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\CurrencyRate;
class CurrencyCron extends Command
{
	protected $name = 'currency:cron';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running currency cron';

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
        //
	Log::info('Work of Credicom crone : '.date("Y-m-d H:i:s"));
	     $xml = simplexml_load_file("http://www.floatrates.com/daily/usd.xml");
        //dd($xml);
			Log::info('Work of Credicom crone : '.date("Y-m-d H:i:s").print_r($xml,true));
			$currencies_array=array('EUR','GBP','AUD','THB','CNY','RUB','BRL','USD');
        foreach ($xml->item as $cur) {
if(in_array($cur->targetCurrency,$currencies_array)){
	 $currency = \App\CurrencyRate::where('code',$cur->targetCurrency)->first();;
            $currency->code = $cur->targetCurrency;
            $currency->title = $cur->targetName;
            $currency->rate = $cur->inverseRate;
            $currency->update();
	
}
           

            //dd($cur);
            echo $cur->targetCurrency;
            echo "<br>";
        }
		
    }
	
	public function fire()
  {
    $this->info("Amazon catalog updated!");
  }
}

<?php

namespace App\Console\Commands;

use App\Services\Import\PrepareFilescheData;
use App\Services\Import\PrepareScheduleData;
use Illuminate\Console\Command;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportFoxpro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:foxpro {csv : The csv file to import with no file extensions}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import foxpro DBF to MySQL';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $prepare;

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
        $file = $this->argument('csv');
        $csv = storage_path('foxpro').'/'.strtoupper($this->argument('csv')).".CSV";
        if(!file_exists($csv)) {
            $this->error("The file " . $csv . " does not exist.");
            return;
        }
        Excel::load($csv, function($reader) use ($file){
            $this->info("Preparing to import ".$file);

            $results = $reader->toArray();
            $this->output->progressStart(count($results));
            foreach($results as $row){
                switch($file) {
                    case "SCHEFILE":
                        $prepare = new PrepareFilescheData();
                        $prepare->replace_key($row);
                        DB::table(env('OGS').'.FILESCHE')->insert($row);
                    break;
                    case "SCHEDULE":
                        $prepare = new PrepareScheduleData();
                        $prepare->replace_key($row);
                        DB::table(env('OGS').'.SCHEDULE')->insert($row);
                    break;
                }
                $this->output->progressAdvance();
            }
        });
        $this->output->progressFinish();
    }
}
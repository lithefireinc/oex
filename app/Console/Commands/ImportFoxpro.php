<?php

namespace App\Console\Commands;

use App\Services\Import\PrepareAdviserData;
use App\Services\Import\PrepareCollegeData;
use App\Services\Import\PrepareFiledaysData;
use App\Services\Import\PrepareFilescheData;
use App\Services\Import\PrepareFilesectData;
use App\Services\Import\PrepareScheduleData;
use App\Services\Import\PrepareSubjfileData;
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
        $this->info("Preparing to import ".$file);
        Excel::load($csv, function($reader) use ($file){
            $results = $reader->toArray();
            $this->output->progressStart(count($results));
            foreach($results as $row){
                switch($file) {
                    case "SCHEFILE":
                        $prepare = new PrepareFilescheData();
                        $prepare->importData($row);
                    break;
                    case "SCHEDULE":
                        $prepare = new PrepareScheduleData();
                        $prepare->importData($row);
                    break;
                    case "COLL2015":
                        $prepare = new PrepareCollegeData();
                        $prepare->importData($row);
                    break;
                    case "FILESECT":
                        $prepare = new PrepareFilesectData();
                        $prepare->importData($row);
                    break;
                    case "SUBJFILE":
                        $prepare = new PrepareSubjfileData();
                        $prepare->importData($row);
                    break;
                    case "ADVISERS":
                        $prepare = new PrepareAdviserData();
                        $prepare->importData($row);
                    break;
                    case "FILEDAYS":
                        $prepare = new PrepareFiledaysData();
                        $prepare->importData($row);
                        break;
                }
                $this->output->progressAdvance();
            }
        });
        $this->output->progressFinish();
    }
}
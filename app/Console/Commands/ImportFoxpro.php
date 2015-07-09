<?php

namespace App\Console\Commands;

use App\Services\Import\PrepareImportData;
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
    protected $signature = 'import:foxpro {csv? : The csv file to import with no file extensions} {--without="" : exclude tables}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import foxpro DBF to MySQL';

    protected $tables = [
        "ADVISERS",
        "FILEDAYS",
        "FILEROOM",
        "FILESECT",
        "FILESTLE",
        "FILESSTTY",
        "FILETIME",
        "SCHEFILE",
        "SUBJFILE",
        "COLLEGE",
        "SCHEDULE",
    ];

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
        if(!empty($file)) {
            $this->prepareImport($file);
        }else{
            $without = explode(",", $this->option("without"));
            foreach($this->tables as $table) {
                if(in_array($table, $without))
                    continue;
                $this->prepareImport($table);
            }
        }

    }

    public function loadExcel($csv, $file){
        Excel::load($csv, function ($reader) use ($file) {
            $results = $reader->toArray();
            $this->output->progressStart(count($results));
            $class = "App\\Services\\Import\\Prepare".ucfirst(strtolower($file))."Data";
            $prepare = new $class();
            $prepare->truncate();

            foreach ($results as $key => $row) {
                if($row[key($row)] === null){
                    $this->output->progressAdvance();
                    continue;
                }
                $prepare->importData($row);
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
        });
    }

    public function prepareImport($file){
        $csv = storage_path('foxpro') . '/' . strtoupper($file) . ".CSV";
        if (!file_exists($csv)) {
            $this->error("The file " . $csv . " does not exist.");
            return;
        }
        $this->info("Preparing to import " . $file);
        $this->loadExcel($csv, $file);
    }
}
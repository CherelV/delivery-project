<?php

namespace App\Console\Commands;

use App\Models\Quarter;
use App\Models\Region;
use App\Models\Town;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RegisterTownFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:register-town-from-json';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    protected $signature = 'register:town-json';

    protected $description = 'Register a town with its region and quarters from a JSON file';

    public function handle()
    {
        //
        $filePath = $this->ask('file');

        $filePath = storage_path($filePath);

        if(! is_file($filePath)){
            $this->error("File not found: $filePath ");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $towns = json_decode($jsonData, true);

        if(json_last_error() !== JSON_ERROR_NONE){
            $this->error('Invalid JSON format');
            return;
        }

        foreach ($towns as $town)
        {
            $region = Region::firstOrCreate (
                ['slug' => Str::slug($town['region_name'])],
                ['name' => $town['region_name']
            ]);

            $this->info($region->name . ' region created successfuly');
    
            $stored_town = Town::updateOrCreate(
                ['slug' => Str::slug($town['town_name'])],
                [
                    'name' => $town['town_name'],
                    'region_id' => $region->id
                ]
            );

            $this->info($stored_town->name . ' town created successfuly');
    
            foreach($town['quarters'] as $quarter){
                Quarter::updateOrCreate(
                ['slug' => Str::slug($quarter['name'])],
                [
                    'name' => $quarter['name'], 
                    'town_id' => $stored_town->id
                ]
                );
            }
        }


        $this->info('Town, region, and quarters registered successfully.');
    }
}

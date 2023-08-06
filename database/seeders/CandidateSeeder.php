<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = storage_path('app/datatest_bacc.csv'); // Replace 'candidates.csv' with the actual path and filename of your CSV file

        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                Candidate::create([
                    'matricule' => trim($data[0]),
                    'fname' => trim($data[1]),
                    'lname' => isset($data[2]) ? trim($data[2]) : '',
                    'serie' => trim($data[3]),
                    'mention' => isset($data[4]) ? trim($data[4]) : '',
                    'center' => trim($data[5]),
                    'admis' => (bool)$data[6],
                ]);
            }
            fclose($handle);
        }
    }
}

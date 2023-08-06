<?php

namespace App\Imports;

use App\Models\Candidate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class CandidateImport implements ToCollection,WithHeadingRow,WithChunkReading,ShouldQueue
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            Candidate::updateOrCreate(
                [
                    'matricule' => $row['matricule'],
                    'fname' => $row['fname'],
                    'lname' => $row['lname'],
                    'serie' => $row['serie'],
                    'mention' => $row['mention'],
                    'center' => $row['center'],
                    'admis' => $row['admis'],
                ]
            );

        }
        
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust this according to your needs
    }

    // public function chunk(Collection $rows): void
    // {
    //     // Insert the rows into the database using the DB facade
    //     DB::table('candidates')->insert($rows->toArray());
    // }
}
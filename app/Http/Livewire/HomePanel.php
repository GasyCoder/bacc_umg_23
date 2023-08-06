<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use App\Models\Candidate;
use App\Imports\CandidateImport;
use Maatwebsite\Excel\Facades\Excel;

class HomePanel extends Component
{
    protected $perPage = 1000;
    protected $paginationTheme = 'bootstrap';

    

    public function render()
    {
        $candidates = Candidate::paginate($this->perPage); // Adjust the number of candidates displayed per page
        $inscrit = Candidate::count();
        $admis = Candidate::where('admis', true)->count();
        $noadmis = Candidate::where('admis', false)->count();
        $statistic = 0; // Default value if $inscrit is zero to avoid division by zero error
        if ($inscrit != 0) {
            $statistic = number_format(($admis / $inscrit) * 100, 2);
        }
        $control = Setting::find(1);
        return view('livewire.home-panel', [
            'candidates' => $candidates,
            'inscrit' => $inscrit,
            'admis' => $admis,
            'noadmis' => $noadmis,
            'statistic' => $statistic,
            'control'   => $control
        ])
        ->extends('layouts.main')
        ->section('content');
    }

}

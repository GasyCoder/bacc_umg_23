<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Search extends Component
{
    public $query = '';
    public $results = [];
    
    private function search($query)
    {
        if (
            $query == ''
        ) return [];

        return Candidate::admitted()
            ->where('matricule', $query)
            ->get()
            ->toArray();
    }
    public function updated()
    {
        $this->query = preg_replace('/\D/', '', $this->query); // Remove non-numeric characters

        if (strlen($this->query) > 7) {
            $this->query = substr($this->query, 0, 7); // Limit to 7 characters
        }
        $this->results = $this->search($this->query);
    }

    
    public function render()
    {
        $inf = 1340000;
        $sup = 8500000;

        if (!empty($this->query)) {
            if (!preg_match('/^\d{7}$/', $this->query)) {
                $this->results[] = 'Matricule_shortened';
            } elseif ($this->query < $inf || $this->query > $sup) {
                $this->results[] = 'Incorrect_matricule';
            } else {
                $this->results = $this->search($this->query);
                if (empty($this->results)) {
                    $this->results[] = 'Not_admitted';
                } 
            }
        } else {
            $this->results = [] ;
        }
        $noadmis = Candidate::where('matricule', $this->query)->first();
        $control = Setting::find(1);
        return view('livewire.search', [
            'results'   => $this->results,
            'query'     => $this->query,
            'noadmis'   => $noadmis ? $noadmis : null,
            'control'   => $control
        ]);
    }

    // private function search($query)
    // {
    //     if ($query == '') return [];

    //     $response = Http::withHeaders([
    //         'Accept' => 'application/vnd.github.v3+json',
    //         'Authentication' => 'token <ganti dengan access token>'
    //     ])->get('https://api.github.com/search/users', [
    //         'q' => $query,
    //         'per_page' => 100
    //     ]);

    //     return $response->json()['items'];
    // }


}

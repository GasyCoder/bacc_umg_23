<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApiKey extends Component
{
    public function render()
    {
        return view('livewire.api.index')
        ->extends('layouts.main')
        ->section('content');
    }
}

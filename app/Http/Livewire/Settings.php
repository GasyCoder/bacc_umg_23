<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Settings extends Component
{
    use WithFileUploads;
    public $setting;
    public $status;

    protected $rules = [
        'setting.site_name' => 'required|string',
        'setting.fblink' => 'nullable|string',
        'setting.title_message' => 'required|string',
        'setting.message' => 'required|string',
    ];

    public function mount()
    {
        $this->setting = Setting::find(1);
        $this->status = $this->setting->status;
    }

    public function updateSetting()
    {
        $this->validate();
        $this->setting->save();
        session()->flash('message', 'Paramètres mis à jour avec succès.');
        //Alert::success('Félicitation', 'Settings updated successfully');
    }

    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->setting->status = $this->status ? 1 : 0;
        $this->setting->save();

        session()->flash('success', 'Status ' . ($this->status ? 'enabled' : 'disabled') . ' successfully!');
    }


    public function render()
    {
        return view('livewire.settings.index')
        ->extends('layouts.main')
        ->section('content');
    }
}

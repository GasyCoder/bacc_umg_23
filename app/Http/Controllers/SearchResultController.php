<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchResultController extends Controller
{
    public function search_result($query)
    {
        return redirect()->route('livewire.message', ['key' => 'search', 'fname' => 'search'])->with('query', $query);
    }
}

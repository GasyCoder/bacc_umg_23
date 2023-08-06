<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';

    protected $fillable = [
        'fname',
        'lname',
        'serie',
        'matricule',
        'center',
        'mention',
        'admis',
    ];

    public function scopeAdmitted($query)
    {
        return $query->where('admis', true);
    }
}

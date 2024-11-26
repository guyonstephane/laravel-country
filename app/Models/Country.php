<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'nom',
        'population',
        'esperanceVie',
        'PNB',
        'chefEtat',
        'capitale',
    ];
}

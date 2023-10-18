<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GetCandyCountryVendor extends Model
{
    use HasFactory;

    const COUNTRIES = ['Ghana', 'Togo'];


    public function vendors() : HasMany{
        return $this->hasMany(Vendor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code_iso2',
        'code_iso3',
    ];

    /**
     * Get the states for the country.
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    /**
     * Get the addresses for the country.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the companies for the country (where company has a direct country_id).
     */
    public function companies(): HasMany
    {
         // This assumes Company model has a 'country_id' for its primary registered country.
        return $this->hasMany(Company::class, 'country_id');
    }
}

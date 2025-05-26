<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code_iso2', 2)->unique();
            $table->string('code_iso3', 3)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
create_file_with_block
app/Models/Country.php
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
     * Get the companies for the country.
     */
    public function companies(): HasMany
    {
        // Assuming Company model has country_id, which is not explicitly in the spec
        // but common for company's primary address country.
        // If company address is via Address model, this direct relationship might not be needed here.
        // For now, let's comment it out as Company primary address details are directly on company table.
        // return $this->hasMany(Company::class);
        return $this->hasMany(Company::class, 'country_id');
    }
}

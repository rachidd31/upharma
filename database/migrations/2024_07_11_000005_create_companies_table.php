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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            // Address fields directly on company table as per instructions
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable(); // Or state_id if you want FK to states table
            $table->string('zip', 20)->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('set null');

            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('website')->nullable();
            $table->foreignId('default_currency_id')->constrained('currencies')->onDelete('restrict');
            $table->string('tax_id')->nullable(); // General tax identifier
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
create_file_with_block
app/Models/Company.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'street',
        'city',
        'state',
        'zip',
        'country_id',
        'phone',
        'email',
        'website',
        'default_currency_id',
        'tax_id',
    ];

    /**
     * Get the default currency for the company.
     */
    public function defaultCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'default_currency_id');
    }

    /**
     * Get the country for the company's primary address.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get the users associated with the company.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the partners associated with the company.
     */
    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class);
    }

    /**
     * Get the products associated with the company.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Other relationships like productCategories, warehouses, etc. will be added as those models are created.
}

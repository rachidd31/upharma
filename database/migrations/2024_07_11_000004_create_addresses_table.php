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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable'); // addressable_id, addressable_type
            $table->enum('type', ['billing', 'shipping', 'contact', 'main', 'other'])->default('other');
            $table->string('street1');
            $table->string('street2')->nullable();
            $table->string('city');
            $table->foreignId('state_id')->nullable()->constrained()->onDelete('set null');
            $table->string('zip', 20);
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->boolean('is_default_billing')->default(false);
            $table->boolean('is_default_shipping')->default(false);
            // $table->boolean('is_default')->default(false); // General default, used this instead based on instructions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
create_file_with_block
app/Models/Address.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'type',
        'street1',
        'street2',
        'city',
        'state_id',
        'zip',
        'country_id',
        'is_default_billing',
        'is_default_shipping',
        // 'is_default',
    ];

    protected $casts = [
        'is_default_billing' => 'boolean',
        'is_default_shipping' => 'boolean',
        // 'is_default' => 'boolean',
    ];

    /**
     * Get the parent addressable model (e.g., Partner, Company, Warehouse).
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the country for the address.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the state for the address.
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}

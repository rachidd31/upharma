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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., Shelf A1, Receiving Area
            $table->foreignId('parent_location_id')->nullable()->constrained('locations')->onDelete('cascade'); // For hierarchy
            $table->enum('type', ['internal', 'vendor', 'customer', 'inventory_loss', 'production', 'transit', 'view'])->default('internal');
            $table->boolean('is_scrap_location')->default(false);
            $table->boolean('is_return_location')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
create_file_with_block
app/Models/Location.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'warehouse_id',
        'name',
        'parent_location_id',
        'type',
        'is_scrap_location',
        'is_return_location',
        'is_active',
    ];

    protected $casts = [
        'is_scrap_location' => 'boolean',
        'is_return_location' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the company that the location belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the warehouse that this location belongs to.
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the parent location.
     */
    public function parentLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_location_id');
    }

    /**
     * Get the child locations.
     */
    public function childLocations(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_location_id');
    }

    /**
     * Get all of the location's addresses.
     * Typically, a specific location like a shelf doesn't have its own address distinct from the warehouse.
     * But a 'view' type location representing a partner (vendor/customer) might.
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Get product stock levels for this location.
     */
    public function productStocks(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }

    // Relationships to InventoryMove (as source or destination)
    public function sourceInventoryMoves(): HasMany
    {
        return $this->hasMany(InventoryMove::class, 'source_location_id');
    }

    public function destinationInventoryMoves(): HasMany
    {
        return $this->hasMany(InventoryMove::class, 'destination_location_id');
    }
}

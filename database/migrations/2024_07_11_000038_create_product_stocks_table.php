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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            // $table->foreignId('lot_id')->nullable()->constrained('lots')->onDelete('cascade'); // lots table to be created
            $table->decimal('quantity_on_hand', 15, 4)->default(0.0000);
            $table->decimal('reserved_quantity', 15, 4)->default(0.0000);
            $table->foreignId('uom_id')->constrained('unit_of_measures')->onDelete('restrict'); // Should be product's base UoM
            $table->timestamp('last_inventory_date')->nullable();
            $table->timestamps();

            $table->unique(['company_id', 'product_id', 'location_id'/*, 'lot_id'*/], 'product_stock_unique'); // Ensure lot_id is added here if used
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
create_file_with_block
app/Models/ProductStock.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'product_id',
        'location_id',
        // 'lot_id',
        'quantity_on_hand',
        'reserved_quantity',
        'uom_id',
        'last_inventory_date',
    ];

    protected $casts = [
        'quantity_on_hand' => 'decimal:4',
        'reserved_quantity' => 'decimal:4',
        'last_inventory_date' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // public function lot(): BelongsTo
    // {
    //     return $this->belongsTo(Lot::class); // Lot model to be created
    // }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    // Accessor for available quantity
    public function getAvailableQuantityAttribute(): float
    {
        return $this->quantity_on_hand - $this->reserved_quantity;
    }
}

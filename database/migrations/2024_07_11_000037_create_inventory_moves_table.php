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
        Schema::create('inventory_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('inventory_move_line_id')->nullable()->constrained('inventory_move_lines')->onDelete('set null'); // Originating planned move line
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->decimal('quantity_moved', 15, 4);
            $table->foreignId('uom_id')->constrained('unit_of_measures')->onDelete('restrict');
            $table->foreignId('source_location_id')->constrained('locations')->onDelete('restrict');
            $table->foreignId('destination_location_id')->constrained('locations')->onDelete('restrict');
            // $table->foreignId('lot_id')->nullable()->constrained('lots')->onDelete('set null'); // lots table to be created
            // $table->foreignId('serial_number_id')->nullable()->constrained('serial_numbers')->onDelete('set null'); // serial_numbers table to be created
            $table->dateTime('move_date');
            $table->string('reference')->nullable(); // From InventoryOperation or other source
            $table->decimal('cost_price_at_move', 15, 4)->nullable(); // For valuation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_moves');
    }
};
create_file_with_block
app/Models/InventoryMove.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryMove extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'inventory_move_line_id',
        'product_id',
        'quantity_moved',
        'uom_id',
        'source_location_id',
        'destination_location_id',
        // 'lot_id',
        // 'serial_number_id',
        'move_date',
        'reference',
        'cost_price_at_move',
    ];

    protected $casts = [
        'quantity_moved' => 'decimal:4',
        'move_date' => 'datetime',
        'cost_price_at_move' => 'decimal:4',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function inventoryMoveLine(): BelongsTo
    {
        return $this->belongsTo(InventoryMoveLine::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    public function sourceLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'source_location_id');
    }

    public function destinationLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

    // public function lot(): BelongsTo
    // {
    //     return $this->belongsTo(Lot::class); // Lot model to be created
    // }

    // public function serialNumber(): BelongsTo
    // {
    //     return $this->belongsTo(SerialNumber::class); // SerialNumber model to be created
    // }
}

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
        Schema::create('inventory_move_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_operation_id')->constrained('inventory_operations')->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->string('description'); // Product name or custom description
            $table->decimal('quantity_requested', 15, 4);
            $table->decimal('quantity_done', 15, 4)->default(0.0000);
            $table->foreignId('uom_id')->constrained('unit_of_measures')->onDelete('restrict');
            $table->foreignId('source_location_id')->constrained('locations')->onDelete('restrict');
            $table->foreignId('destination_location_id')->constrained('locations')->onDelete('restrict');
            // $table->foreignId('lot_id')->nullable()->constrained('lots')->onDelete('set null'); // lots table not yet created
            // $table->foreignId('package_id')->nullable()->constrained('inventory_packages')->onDelete('set null'); // packages table not yet created
            // $table->foreignId('result_package_id')->nullable()->constrained('inventory_packages')->onDelete('set null');

            $table->foreignId('sales_order_line_id')->nullable()->constrained('sales_order_lines')->onDelete('set null');
            $table->foreignId('purchase_order_line_id')->nullable()->constrained('purchase_order_lines')->onDelete('set null');
            $table->integer('sequence')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_move_lines');
    }
};
create_file_with_block
app/Models/InventoryMoveLine.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventoryMoveLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_operation_id',
        'product_id',
        'description',
        'quantity_requested',
        'quantity_done',
        'uom_id',
        'source_location_id',
        'destination_location_id',
        // 'lot_id',
        // 'package_id',
        // 'result_package_id',
        'sales_order_line_id',
        'purchase_order_line_id',
        'sequence',
        'notes',
    ];

    protected $casts = [
        'quantity_requested' => 'decimal:4',
        'quantity_done' => 'decimal:4',
    ];

    public function inventoryOperation(): BelongsTo
    {
        return $this->belongsTo(InventoryOperation::class);
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

    public function salesOrderLine(): BelongsTo
    {
        return $this->belongsTo(SalesOrderLine::class);
    }

    public function purchaseOrderLine(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrderLine::class);
    }

    /**
     * Get the actual inventory moves generated from this line.
     */
    public function inventoryMoves(): HasMany
    {
        return $this->hasMany(InventoryMove::class);
    }

    // public function lot(): BelongsTo
    // {
    //     return $this->belongsTo(Lot::class); // Lot model to be created
    // }
}

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
        Schema::create('purchase_order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->string('description'); // Product name or custom description
            $table->decimal('quantity_ordered', 15, 4);
            $table->decimal('quantity_received', 15, 4)->default(0.0000);
            $table->decimal('quantity_billed', 15, 4)->default(0.0000);
            $table->foreignId('uom_id')->constrained('unit_of_measures')->onDelete('restrict');
            $table->decimal('unit_price', 15, 4); // Price before discount
            $table->decimal('discount_percent', 5, 2)->default(0.00); // 0-100
            $table->decimal('discount_amount', 15, 4)->default(0.0000); // Calculated or manual
            $table->foreignId('tax_group_id')->nullable()->constrained('tax_groups')->onDelete('set null');
            $table->decimal('tax_amount', 15, 4)->default(0.0000);
            $table->decimal('subtotal_line', 15, 2); // (qty * unit_price) - discount_amount
            $table->decimal('total_line', 15, 2); // subtotal_line + tax_amount
            $table->text('notes')->nullable();
            $table->integer('sequence')->default(0); // For ordering lines
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_lines');
    }
};
create_file_with_block
app/Models/PurchaseOrderLine.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'product_id',
        'description',
        'quantity_ordered',
        'quantity_received',
        'quantity_billed',
        'uom_id',
        'unit_price',
        'discount_percent',
        'discount_amount',
        'tax_group_id',
        'tax_amount',
        'subtotal_line',
        'total_line',
        'notes',
        'sequence',
    ];

    protected $casts = [
        'quantity_ordered' => 'decimal:4',
        'quantity_received' => 'decimal:4',
        'quantity_billed' => 'decimal:4',
        'unit_price' => 'decimal:4',
        'discount_percent' => 'decimal:2',
        'discount_amount' => 'decimal:4',
        'tax_amount' => 'decimal:4',
        'subtotal_line' => 'decimal:2',
        'total_line' => 'decimal:2',
    ];

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(TaxGroup::class);
    }

    /**
     * Get the account move lines related to this purchase order line (for billing).
     */
    public function accountMoveLines(): HasMany
    {
        return $this->hasMany(AccountMoveLine::class);
    }

    /**
     * Get the inventory move lines related to this purchase order line (for receiving).
     */
    public function inventoryMoveLines(): HasMany
    {
        // Assuming InventoryMoveLine model will be created
        return $this->hasMany(InventoryMoveLine::class);
    }
}

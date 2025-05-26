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
        Schema::create('inventory_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('operation_type_id')->constrained('inventory_operation_types')->onDelete('restrict');
            $table->string('reference_number')->unique(); // e.g., WH/OUT/0001, WH/IN/0001
            $table->foreignId('partner_id')->nullable()->constrained('partners')->onDelete('set null'); // Customer for delivery, Vendor for receipt
            $table->foreignId('source_location_id')->constrained('locations')->onDelete('restrict');
            $table->foreignId('destination_location_id')->constrained('locations')->onDelete('restrict');
            $table->dateTime('scheduled_date');
            $table->dateTime('effective_date')->nullable(); // When operation was actually done
            $table->enum('status', ['draft', 'waiting', 'ready', 'in_progress', 'done', 'cancelled'])->default('draft');
            $table->string('source_document')->nullable(); // e.g., Sales Order #, Purchase Order # (could also be morphTo)
            $table->foreignId('sales_order_id')->nullable()->constrained('sales_orders')->onDelete('set null');
            $table->foreignId('purchase_order_id')->nullable()->constrained('purchase_orders')->onDelete('set null');
            $table->foreignId('return_of_operation_id')->nullable()->constrained('inventory_operations')->onDelete('set null');
            // $table->foreignId('carrier_id')->nullable()->constrained('carriers')->onDelete('set null'); // carriers table not yet created
            $table->string('tracking_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_operations');
    }
};
create_file_with_block
app/Models/InventoryOperation.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryOperation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'operation_type_id',
        'reference_number',
        'partner_id',
        'source_location_id',
        'destination_location_id',
        'scheduled_date',
        'effective_date',
        'status',
        'source_document',
        'sales_order_id',
        'purchase_order_id',
        'return_of_operation_id',
        // 'carrier_id',
        'tracking_number',
        'notes',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'effective_date' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function operationType(): BelongsTo
    {
        return $this->belongsTo(InventoryOperationType::class, 'operation_type_id');
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function sourceLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'source_location_id');
    }

    public function destinationLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

    public function salesOrder(): BelongsTo
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function returnOfOperation(): BelongsTo
    {
        return $this->belongsTo(InventoryOperation::class, 'return_of_operation_id');
    }

    public function lines(): HasMany
    {
        return $this->hasMany(InventoryMoveLine::class);
    }

    // public function carrier(): BelongsTo
    // {
    //     return $this->belongsTo(Carrier::class); // Carrier model to be created
    // }
}

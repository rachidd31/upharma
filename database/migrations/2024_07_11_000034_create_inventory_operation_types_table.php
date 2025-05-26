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
        Schema::create('inventory_operation_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., Customer Deliveries, Vendor Receipts, Internal Transfers
            $table->string('code', 10)->unique(); // e.g., OUT, IN, INT
            $table->enum('operation_type', ['receipt', 'delivery', 'internal_transfer', 'manufacturing', 'adjustment']);
            $table->foreignId('default_source_location_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->foreignId('default_destination_location_id')->nullable()->constrained('locations')->onDelete('set null');
            // $table->foreignId('sequence_id')->nullable()->constrained('ir_sequences')->onDelete('set null'); // ir_sequences table not yet created
            $table->boolean('show_lots_serials')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_operation_types');
    }
};
create_file_with_block
app/Models/InventoryOperationType.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventoryOperationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'code',
        'operation_type',
        'default_source_location_id',
        'default_destination_location_id',
        // 'sequence_id',
        'show_lots_serials',
    ];

    protected $casts = [
        'show_lots_serials' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function defaultSourceLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'default_source_location_id');
    }

    public function defaultDestinationLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'default_destination_location_id');
    }

    // public function sequence(): BelongsTo
    // {
    //     return $this->belongsTo(IrSequence::class); // IrSequence model to be created
    // }

    public function inventoryOperations(): HasMany
    {
        return $this->hasMany(InventoryOperation::class, 'operation_type_id');
    }
}

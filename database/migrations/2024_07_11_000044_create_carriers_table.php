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
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., FedEx, UPS, Local Delivery
            $table->string('delivery_time_estimation')->nullable(); // e.g., "3-5 business days"
            $table->string('tracking_url')->nullable(); // e.g., https://www.fedex.com/apps/track/?tracknumbers=
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carriers');
    }
};
create_file_with_block
app/Models/Carrier.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrier extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'delivery_time_estimation',
        'tracking_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // If SalesOrder or PurchaseOrder store carrier_id
    // public function salesOrders(): HasMany
    // {
    //     return $this->hasMany(SalesOrder::class); // Assuming SalesOrder has carrier_id
    // }

    // public function inventoryOperations(): HasMany
    // {
    //     return $this->hasMany(InventoryOperation::class); // Assuming InventoryOperation has carrier_id
    // }
}

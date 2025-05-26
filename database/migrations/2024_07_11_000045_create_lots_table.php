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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('lot_number'); // Unique per product within a company
            $table->date('expiration_date')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamps();

            $table->unique(['company_id', 'product_id', 'lot_number'], 'company_product_lot_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
create_file_with_block
app/Models/Lot.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'product_id',
        'lot_number',
        'expiration_date',
        'internal_notes',
    ];

    protected $casts = [
        'expiration_date' => 'date',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // If InventoryMoveLine stores lot_id directly
    // public function inventoryMoveLines(): HasMany
    // {
    //     return $this->hasMany(InventoryMoveLine::class);
    // }

    // If ProductStock stores lot_id directly
    // public function productStocks(): HasMany
    // {
    //     return $this->hasMany(ProductStock::class);
    // }

    // If SerialNumber belongs to a Lot
    public function serialNumbers(): HasMany
    {
        return $this->hasMany(SerialNumber::class);
    }
}

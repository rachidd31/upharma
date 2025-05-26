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
        Schema::create('pricelist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pricelist_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->onDelete('cascade');
            $table->decimal('min_quantity', 15, 4)->default(1.0000);
            $table->decimal('fixed_price', 15, 4)->nullable();
            $table->decimal('percent_discount', 5, 2)->nullable(); // e.g., 10.50 for 10.50%
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->timestamps();

            // Ensure either product_id or product_category_id is set, or both for specific product in category (more complex)
            // This kind of check is usually better handled at application level or with a DB check constraint if supported easily.
            // For now, schema allows both to be nullable or set.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricelist_items');
    }
};
create_file_with_block
app/Models/PricelistItem.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricelistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricelist_id',
        'product_id',
        'product_category_id',
        'min_quantity',
        'fixed_price',
        'percent_discount',
        'date_start',
        'date_end',
    ];

    protected $casts = [
        'min_quantity' => 'decimal:4',
        'fixed_price' => 'decimal:4',
        'percent_discount' => 'decimal:2',
        'date_start' => 'date',
        'date_end' => 'date',
    ];

    public function pricelist(): BelongsTo
    {
        return $this->belongsTo(Pricelist::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

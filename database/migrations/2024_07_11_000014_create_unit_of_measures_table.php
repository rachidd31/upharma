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
        Schema::create('unit_of_measures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('unit_of_measure_categories')->onDelete('cascade');
            $table->string('name'); // e.g., Kilogram, Meter, Piece
            $table->string('code', 10)->nullable(); // e.g., kg, m, pcs
            $table->enum('type', ['reference', 'bigger', 'smaller']);
            $table->decimal('factor', 15, 6)->default(1.000000); // Factor for conversion against reference UoM in the same category
            $table->decimal('rounding_precision', 10, 5)->default(0.01000);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_of_measures');
    }
};
create_file_with_block
app/Models/UnitOfMeasure.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitOfMeasure extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'code',
        'type',
        'factor',
        'rounding_precision',
        'is_active',
    ];

    protected $casts = [
        'factor' => 'decimal:6',
        'rounding_precision' => 'decimal:5',
        'is_active' => 'boolean',
    ];

    /**
     * Get the company that the UoM belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the category that the unit of measure belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasureCategory::class, 'category_id');
    }

    /**
     * Get products where this UoM is the base UoM.
     */
    public function productsBaseUom(): HasMany
    {
        return $this->hasMany(Product::class, 'uom_id');
    }

    /**
     * Get products where this UoM is the purchase UoM.
     */
    public function productsPurchaseUom(): HasMany
    {
        return $this->hasMany(Product::class, 'purchase_uom_id');
    }

    /**
     * Get products where this UoM is the sale UoM.
     */
    public function productsSaleUom(): HasMany
    {
        return $this->hasMany(Product::class, 'sale_uom_id');
    }
}

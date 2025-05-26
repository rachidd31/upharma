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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., Color, Size
            $table->enum('display_type', ['radio', 'select', 'color'])->default('select');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
create_file_with_block
app/Models/ProductAttribute.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'display_type',
    ];

    /**
     * Get the company that the product attribute belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the values for the product attribute.
     */
    public function values(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    /**
     * Get the products that use this attribute (through product_template_attribute_lines).
     * This might be more complex depending on how attributes are linked to products (e.g. if using an intermediary table).
     * For now, let's assume a direct link if needed, or a more complex relationship via Product model.
     */
    // public function products(): BelongsToMany
    // {
    //    // return $this->belongsToMany(Product::class, 'product_attribute_product'); // Example pivot
    // }
}

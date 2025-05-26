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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('sku')->unique(); // Assuming SKU is unique globally for simplicity. If per company: $table->unique(['company_id', 'sku']);
            $table->text('description')->nullable();
            $table->enum('type', ['storable', 'consumable', 'service'])->default('storable');
            $table->foreignId('product_category_id')->constrained()->onDelete('restrict');
            $table->foreignId('uom_id')->constrained('unit_of_measures')->onDelete('restrict'); // Base UoM
            $table->foreignId('purchase_uom_id')->constrained('unit_of_measures')->onDelete('restrict'); // Purchase UoM
            $table->foreignId('sale_uom_id')->constrained('unit_of_measures')->onDelete('restrict'); // Sale UoM

            $table->decimal('standard_price', 15, 4)->default(0.0000); // Cost price
            $table->decimal('list_price', 15, 4)->default(0.0000); // Sales price

            $table->boolean('track_inventory')->default(true);
            $table->enum('inventory_valuation', ['standard', 'fifo', 'avco'])->default('standard');

            // Accounting Links (nullable, FKs to chart_of_accounts table which is not yet created)
            // These will be added/modified later once chart_of_accounts is available
            $table->foreignId('asset_account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null');
            $table->foreignId('expense_account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null');
            $table->foreignId('income_account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null');

            // Tax Group Link (nullable, FK to tax_groups table not yet created)
            $table->foreignId('tax_group_id')->nullable()->constrained('tax_groups')->onDelete('set null');

            $table->boolean('has_variants')->default(false);
            $table->foreignId('parent_id')->nullable()->constrained('products')->onDelete('cascade'); // For product variants

            $table->decimal('weight', 10, 4)->nullable();
            $table->decimal('volume', 10, 4)->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Ensure SKU is unique per company if not globally unique
            // Schema::table('products', function (Blueprint $table) {
            //     $table->dropUnique('products_sku_unique');
            //     $table->unique(['company_id', 'sku']);
            // });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
create_file_with_block
app/Models/Product.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'sku',
        'description',
        'type',
        'product_category_id',
        'uom_id',
        'purchase_uom_id',
        'sale_uom_id',
        'standard_price',
        'list_price',
        'track_inventory',
        'inventory_valuation',
        'asset_account_id',
        'expense_account_id',
        'income_account_id',
        'tax_group_id',
        'has_variants',
        'parent_id',
        'weight',
        'volume',
        'notes',
    ];

    protected $casts = [
        'track_inventory' => 'boolean',
        'has_variants' => 'boolean',
        'standard_price' => 'decimal:4',
        'list_price' => 'decimal:4',
        'weight' => 'decimal:4',
        'volume' => 'decimal:4',
    ];

    /**
     * Get the company that the product belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the category that the product belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Get the base unit of measure for the product.
     */
    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id');
    }

    /**
     * Get the purchase unit of measure for the product.
     */
    public function purchaseUom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'purchase_uom_id');
    }

    /**
     * Get the sale unit of measure for the product.
     */
    public function saleUom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'sale_uom_id');
    }

    /**
     * Get the parent product if this is a variant.
     */
    public function parentProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    /**
     * Get the variants if this is a template product.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    /**
     * The attribute values that define this product (if it's a variant or a template with default values).
     */
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(ProductAttributeValue::class, 'product_attribute_value_product');
    }

    // Relationships to ChartOfAccount and TaxGroup will be defined once those models are created
    public function assetAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'asset_account_id');
    }

    public function expenseAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'expense_account_id');
    }

    public function incomeAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'income_account_id');
    }

    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(TaxGroup::class, 'tax_group_id');
    }

    // public function productSuppliers(): HasMany
    // {
    //     // Assuming ProductSupplier model will be created
    //     return $this->hasMany(ProductSupplier::class);
    // }
}

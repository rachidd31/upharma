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
        Schema::create('account_move_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_move_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained('chart_of_accounts')->onDelete('restrict');
            $table->foreignId('partner_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name'); // Description for the line
            $table->decimal('debit', 15, 2)->default(0.00);
            $table->decimal('credit', 15, 2)->default(0.00);

            // Optional fields for multi-currency
            $table->decimal('amount_currency', 15, 2)->nullable();
            $table->foreignId('currency_id')->nullable()->constrained()->onDelete('set null');

            // Optional fields for tax
            $table->foreignId('tax_rate_id')->nullable()->constrained()->onDelete('set null'); // If this line is a tax amount itself
            $table->decimal('tax_base_amount', 15, 2)->nullable(); // Base amount for tax calculation if this line relates to a tax

            // Optional fields for product/service link
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('quantity', 15, 4)->nullable();
            $table->foreignId('uom_id')->nullable()->constrained('unit_of_measures')->onDelete('set null');
            $table->decimal('unit_price', 15, 4)->nullable(); // Price before discount

            // Link to Sales Order Line or Purchase Order Line
            $table->foreignId('sales_order_line_id')->nullable()->constrained('sales_order_lines')->onDelete('set null');
            $table->foreignId('purchase_order_line_id')->nullable()->constrained('purchase_order_lines')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_move_lines');
    }
};
create_file_with_block
app/Models/AccountMoveLine.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountMoveLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_move_id',
        'account_id',
        'partner_id',
        'name',
        'debit',
        'credit',
        'amount_currency',
        'currency_id',
        'tax_rate_id',
        'tax_base_amount',
        'product_id',
        'quantity',
        'uom_id',
        'unit_price',
        'sales_order_line_id',
        'purchase_order_line_id',
    ];

    protected $casts = [
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'amount_currency' => 'decimal:2',
        'tax_base_amount' => 'decimal:2',
        'quantity' => 'decimal:4',
        'unit_price' => 'decimal:4',
    ];

    /**
     * Get the account move that this line belongs to.
     */
    public function accountMove(): BelongsTo
    {
        return $this->belongsTo(AccountMove::class);
    }

    /**
     * Get the account for this line.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    /**
     * Get the partner associated with this line.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the currency for this line (if different from move).
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the tax rate if this line represents a tax amount.
     */
    public function taxRate(): BelongsTo
    {
        return $this->belongsTo(TaxRate::class);
    }

    /**
     * Get the product associated with this line.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the unit of measure for this line.
     */
    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    /**
     * Get the sales order line that this account move line relates to.
     */
    public function salesOrderLine(): BelongsTo
    {
        // Assuming SalesOrderLine model will be created
        return $this->belongsTo(SalesOrderLine::class);
    }

    /**
     * Get the purchase order line that this account move line relates to.
     */
    public function purchaseOrderLine(): BelongsTo
    {
        // Assuming PurchaseOrderLine model will be created
        return $this->belongsTo(PurchaseOrderLine::class);
    }
}

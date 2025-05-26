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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique(); // SO/2023/0001
            $table->foreignId('customer_id')->constrained('partners')->onDelete('restrict');
            $table->foreignId('invoice_address_id')->constrained('addresses')->onDelete('restrict');
            $table->foreignId('shipping_address_id')->constrained('addresses')->onDelete('restrict');
            $table->date('order_date');
            $table->date('expected_delivery_date')->nullable();
            $table->foreignId('sales_person_id')->nullable()->constrained('users')->onDelete('set null');
            // $table->foreignId('pricelist_id')->nullable()->constrained('pricelists')->onDelete('set null'); // Pricelist table not yet created
            $table->foreignId('currency_id')->constrained()->onDelete('restrict');
            $table->decimal('currency_rate', 12, 6)->default(1.000000);

            $table->decimal('subtotal_before_discount', 15, 2)->default(0.00);
            $table->decimal('order_discount_amount', 15, 2)->default(0.00);
            $table->decimal('subtotal', 15, 2)->default(0.00); // subtotal_before_discount - order_discount_amount
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('grand_total', 15, 2)->default(0.00); // subtotal + total_tax
            $table->decimal('amount_paid', 15, 2)->default(0.00);

            $table->enum('status', ['draft', 'sent', 'confirmed', 'processing', 'partially_shipped', 'shipped', 'partially_invoiced', 'invoiced', 'paid', 'cancelled'])->default('draft');
            $table->enum('invoice_status', ['no_invoice', 'to_invoice', 'partially_invoiced', 'invoiced'])->default('no_invoice');
            $table->enum('shipping_status', ['no_shipping', 'to_ship', 'partially_shipped', 'shipped'])->default('no_shipping');

            $table->text('notes')->nullable(); // Internal notes
            $table->text('customer_notes')->nullable(); // Notes for customer on printed docs
            $table->foreignId('payment_term_id')->nullable()->constrained('payment_terms')->onDelete('set null');
            // $table->foreignId('shipping_method_id')->nullable()->constrained('shipping_methods')->onDelete('set null'); // shipping_methods table not yet created
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
create_file_with_block
app/Models/SalesOrder.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'order_number',
        'customer_id',
        'invoice_address_id',
        'shipping_address_id',
        'order_date',
        'expected_delivery_date',
        'sales_person_id',
        // 'pricelist_id',
        'currency_id',
        'currency_rate',
        'subtotal_before_discount',
        'order_discount_amount',
        'subtotal',
        'total_tax',
        'grand_total',
        'amount_paid',
        'status',
        'invoice_status',
        'shipping_status',
        'notes',
        'customer_notes',
        'payment_term_id',
        // 'shipping_method_id',
    ];

    protected $casts = [
        'order_date' => 'date',
        'expected_delivery_date' => 'date',
        'currency_rate' => 'decimal:6',
        'subtotal_before_discount' => 'decimal:2',
        'order_discount_amount' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total_tax' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'amount_paid' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'customer_id');
    }

    public function invoiceAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'invoice_address_id');
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function salesPerson(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sales_person_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function paymentTerm(): BelongsTo
    {
        return $this->belongsTo(PaymentTerm::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(SalesOrderLine::class);
    }

    /**
     * Get all of the sales order's account moves (invoices).
     * This relationship assumes that AccountMove will have a polymorphic relation `sourceDocument`
     * or a direct sales_order_id. If using polymorphic, this is one way:
     */
    public function accountMoves(): MorphMany
    {
        return $this->morphMany(AccountMove::class, 'sourceDocument');
    }

    // public function pricelist(): BelongsTo
    // {
    //     return $this->belongsTo(Pricelist::class); // Pricelist model to be created
    // }

    // public function shippingMethod(): BelongsTo
    // {
    //     return $this->belongsTo(ShippingMethod::class); // ShippingMethod model to be created
    // }

    public function inventoryOperations(): HasMany
    {
        // Assuming InventoryOperation model will be created and has sales_order_id
        return $this->hasMany(InventoryOperation::class);
    }
}

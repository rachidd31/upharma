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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique(); // PO/2023/0001
            $table->foreignId('vendor_id')->constrained('partners')->onDelete('restrict');
            $table->foreignId('billing_address_id')->constrained('addresses')->onDelete('restrict');
            $table->foreignId('shipping_address_id')->constrained('addresses')->onDelete('restrict'); // Company's receiving address
            $table->date('order_date');
            $table->date('expected_receipt_date')->nullable();
            $table->foreignId('purchaser_id')->nullable()->constrained('users')->onDelete('set null'); // Employee user
            $table->foreignId('currency_id')->constrained()->onDelete('restrict');
            $table->decimal('currency_rate', 12, 6)->default(1.000000);

            $table->decimal('subtotal_before_discount', 15, 2)->default(0.00);
            $table->decimal('order_discount_amount', 15, 2)->default(0.00);
            $table->decimal('subtotal', 15, 2)->default(0.00);
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('grand_total', 15, 2)->default(0.00);
            $table->decimal('amount_billed', 15, 2)->default(0.00);
            $table->decimal('amount_paid', 15, 2)->default(0.00);


            $table->enum('status', ['draft', 'sent', 'confirmed', 'receiving', 'partially_received', 'received', 'partially_billed', 'billed', 'paid', 'cancelled'])->default('draft');
            $table->enum('billing_status', ['no_bill', 'to_bill', 'partially_billed', 'billed'])->default('no_bill');
            $table->enum('receipt_status', ['no_receipt', 'to_receive', 'partially_received', 'received'])->default('no_receipt');

            $table->text('notes')->nullable(); // Internal notes
            $table->string('vendor_reference')->nullable(); // Vendor's SO number
            $table->foreignId('payment_term_id')->nullable()->constrained('payment_terms')->onDelete('set null');
            // $table->foreignId('shipping_method_id')->nullable()->constrained('shipping_methods')->onDelete('set null'); // To be created
            // $table->foreignId('incoterm_id')->nullable()->constrained('incoterms')->onDelete('set null'); // To be created
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
create_file_with_block
app/Models/PurchaseOrder.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'order_number',
        'vendor_id',
        'billing_address_id',
        'shipping_address_id',
        'order_date',
        'expected_receipt_date',
        'purchaser_id',
        'currency_id',
        'currency_rate',
        'subtotal_before_discount',
        'order_discount_amount',
        'subtotal',
        'total_tax',
        'grand_total',
        'amount_billed',
        'amount_paid',
        'status',
        'billing_status',
        'receipt_status',
        'notes',
        'vendor_reference',
        'payment_term_id',
        // 'shipping_method_id',
        // 'incoterm_id',
    ];

    protected $casts = [
        'order_date' => 'date',
        'expected_receipt_date' => 'date',
        'currency_rate' => 'decimal:6',
        'subtotal_before_discount' => 'decimal:2',
        'order_discount_amount' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total_tax' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'amount_billed' => 'decimal:2',
        'amount_paid' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'vendor_id');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function purchaser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'purchaser_id');
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
        return $this->hasMany(PurchaseOrderLine::class);
    }

    /**
     * Get all of the purchase order's account moves (bills).
     */
    public function accountMoves(): MorphMany
    {
        return $this->morphMany(AccountMove::class, 'sourceDocument');
    }

    public function inventoryOperations(): HasMany
    {
        // Assuming InventoryOperation model will be created and has purchase_order_id
        return $this->hasMany(InventoryOperation::class);
    }

    // public function shippingMethod(): BelongsTo { // ... }
    // public function incoterm(): BelongsTo { // ... }
}

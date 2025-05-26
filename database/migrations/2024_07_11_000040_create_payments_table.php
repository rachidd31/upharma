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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date('payment_date');
            $table->decimal('amount', 15, 2);
            $table->foreignId('currency_id')->constrained()->onDelete('restrict');
            $table->foreignId('partner_id')->nullable()->constrained('partners')->onDelete('set null'); // Customer or Vendor
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->onDelete('set null');
            $table->foreignId('journal_id')->constrained('journals')->onDelete('restrict'); // Bank or Cash journal
            $table->enum('type', ['inbound', 'outbound']); // Inbound from customer, Outbound to vendor
            $table->enum('status', ['draft', 'posted', 'reconciled', 'cancelled'])->default('draft');
            $table->string('reference')->nullable(); // e.g., Check number, transaction ID
            $table->text('notes')->nullable();
            $table->foreignId('account_move_id')->nullable()->constrained('account_moves')->onDelete('set null'); // Journal entry for this payment
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
create_file_with_block
app/Models/Payment.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'payment_date',
        'amount',
        'currency_id',
        'partner_id',
        'payment_method_id',
        'journal_id',
        'type',
        'status',
        'reference',
        'notes',
        'account_move_id',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }

    public function accountMove(): BelongsTo
    {
        return $this->belongsTo(AccountMove::class);
    }

    /**
     * The invoices/bills that this payment is allocated to.
     * This requires a pivot table e.g., 'payment_allocations' or 'account_move_payment'.
     * The pivot table would store `payment_id`, `account_move_id` (for invoice/bill), and `allocated_amount`.
     */
    public function allocatedMoves(): BelongsToMany
    {
        return $this->belongsToMany(AccountMove::class, 'payment_allocations')
                    ->withPivot('allocated_amount')
                    ->withTimestamps();
    }
}

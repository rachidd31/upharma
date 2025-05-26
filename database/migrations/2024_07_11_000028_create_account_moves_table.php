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
        Schema::create('account_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('journal_id')->constrained()->onDelete('restrict');
            $table->string('move_number')->nullable(); // Can be auto-generated: INV/2023/0001, BILL/2023/0001
            $table->date('date');
            $table->enum('type', ['invoice', 'bill', 'payment', 'receipt', 'journal_entry', 'credit_note', 'vendor_credit_note', 'bank_statement'])->default('journal_entry');
            $table->foreignId('partner_id')->nullable()->constrained()->onDelete('set null');
            $table->text('narration')->nullable(); // Description for the whole entry
            $table->decimal('total_debit', 15, 2)->default(0.00);
            $table->decimal('total_credit', 15, 2)->default(0.00);
            $table->enum('status', ['draft', 'posted', 'cancelled'])->default('draft');

            // For Invoices/Bills
            $table->date('invoice_due_date')->nullable();
            $table->foreignId('payment_term_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('source_document_id')->nullable(); // For polymorphic relation
            $table->string('source_document_type')->nullable(); // For polymorphic relation (e.g., SalesOrder, PurchaseOrder)

            $table->foreignId('posted_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('posted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['company_id', 'move_number', 'journal_id', 'type'], 'company_move_journal_type_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_moves');
    }
};
create_file_with_block
app/Models/AccountMove.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountMove extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'journal_id',
        'move_number',
        'date',
        'type',
        'partner_id',
        'narration',
        'total_debit',
        'total_credit',
        'status',
        'invoice_due_date',
        'payment_term_id',
        'source_document_id',
        'source_document_type',
        'posted_by_id',
        'posted_at',
    ];

    protected $casts = [
        'date' => 'date',
        'invoice_due_date' => 'date',
        'posted_at' => 'datetime',
        'total_debit' => 'decimal:2',
        'total_credit' => 'decimal:2',
    ];

    /**
     * Get the company that the account move belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the journal for this account move.
     */
    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }

    /**
     * Get the partner associated with this account move.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the lines of this account move.
     */
    public function lines(): HasMany
    {
        return $this->hasMany(AccountMoveLine::class);
    }

    /**
     * Get the payment term for this account move.
     */
    public function paymentTerm(): BelongsTo
    {
        return $this->belongsTo(PaymentTerm::class);
    }

    /**
     * Get the user who posted this account move.
     */
    public function postedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'posted_by_id');
    }

    /**
     * Get the source document (e.g., SalesOrder, PurchaseOrder).
     */
    public function sourceDocument(): MorphTo
    {
        return $this->morphTo();
    }
}

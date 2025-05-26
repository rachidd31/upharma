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
        Schema::create('payment_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name')->unique(); // e.g., Net 30, Due on Receipt
            $table->text('description')->nullable();
            $table->integer('due_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_terms');
    }
};
create_file_with_block
app/Models/PaymentTerm.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'due_days',
    ];

    /**
     * Get the company that the payment term belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the partners that use this payment term.
     */
    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class, 'default_payment_term_id');
    }

    // Add relationships to SalesOrder, PurchaseOrder, AccountMove (Invoices/Bills) if they store payment_term_id
    // public function salesOrders(): HasMany { return $this->hasMany(SalesOrder::class); }
    // public function purchaseOrders(): HasMany { return $this->hasMany(PurchaseOrder::class); }
    // public function accountMoves(): HasMany { return $this->hasMany(AccountMove::class); }
}

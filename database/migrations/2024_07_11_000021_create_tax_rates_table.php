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
        Schema::create('tax_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('tax_group_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., GST, PST, VAT Component
            $table->decimal('rate_percent', 10, 4); // e.g., 5.0000 for 5%
            $table->enum('scope', ['sales', 'purchase', 'none'])->default('none');
            $table->foreignId('account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null'); // Tax liability/asset account
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_rates');
    }
};
create_file_with_block
app/Models/TaxRate.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'tax_group_id',
        'name',
        'rate_percent',
        'scope',
        'account_id',
        'is_active',
    ];

    protected $casts = [
        'rate_percent' => 'decimal:4',
        'is_active' => 'boolean',
    ];

    /**
     * Get the company that the tax rate belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the tax group that this rate belongs to.
     */
    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(TaxGroup::class);
    }

    /**
     * Get the account associated with this tax rate.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'account_id');
    }
}

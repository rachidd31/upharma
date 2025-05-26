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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique(); // Account code, e.g., 10100, 60500
            $table->string('name');
            $table->enum('type', ['asset', 'liability', 'equity', 'income', 'expense', 'cost_of_goods_sold', 'other_income', 'other_expense']);
            $table->foreignId('parent_id')->nullable()->constrained('chart_of_accounts')->onDelete('cascade'); // For hierarchical chart of accounts
            $table->boolean('is_group')->default(false); // True if this account is a grouping account and doesn't hold direct postings
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
create_file_with_block
app/Models/ChartOfAccount.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChartOfAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'code',
        'name',
        'type',
        'parent_id',
        'is_group',
        'is_active',
        'description',
    ];

    protected $casts = [
        'is_group' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the company that the chart of account belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the parent account.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'parent_id');
    }

    /**
     * Get the child accounts.
     */
    public function children(): HasMany
    {
        return $this->hasMany(ChartOfAccount::class, 'parent_id');
    }

    /**
     * Get the products that use this account as asset account.
     */
    public function productsAsset(): HasMany
    {
        return $this->hasMany(Product::class, 'asset_account_id');
    }

    /**
     * Get the products that use this account as expense account.
     */
    public function productsExpense(): HasMany
    {
        return $this->hasMany(Product::class, 'expense_account_id');
    }

    /**
     * Get the products that use this account as income account.
     */
    public function productsIncome(): HasMany
    {
        return $this->hasMany(Product::class, 'income_account_id');
    }

    /**
     * Get the partners that use this account as default customer account.
     */
    public function partnersCustomer(): HasMany
    {
        return $this->hasMany(Partner::class, 'default_customer_account_id');
    }

    /**
     * Get the partners that use this account as default vendor account.
     */
    public function partnersVendor(): HasMany
    {
        return $this->hasMany(Partner::class, 'default_vendor_account_id');
    }
}

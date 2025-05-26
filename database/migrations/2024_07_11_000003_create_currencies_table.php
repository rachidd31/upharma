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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique(); // e.g., USD, EUR
            $table->string('name'); // e.g., US Dollar
            $table->string('symbol', 5); // e.g., $, €
            $table->decimal('exchange_rate', 15, 6)->default(1.000000);
            $table->boolean('is_base_currency')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
create_file_with_block
app/Models/Currency.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'symbol',
        'exchange_rate',
        'is_base_currency',
    ];

    protected $casts = [
        'is_base_currency' => 'boolean',
        'exchange_rate' => 'decimal:6',
    ];

    /**
     * Get the companies that use this currency as default.
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'default_currency_id');
    }

    // Add relationships to other models that use currency, like SalesOrder, PurchaseOrder, etc.
    // e.g., public function salesOrders(): HasMany { return $this->hasMany(SalesOrder::class); }
}

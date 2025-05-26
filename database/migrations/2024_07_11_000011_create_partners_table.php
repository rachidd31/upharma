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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('partner_type'); // Using string to store comma-separated values for SET equivalent: 'customer', 'vendor', 'contact', 'employee'
            $table->boolean('is_company')->default(false);
            $table->foreignId('parent_id')->nullable()->constrained('partners')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable(); // Uniqueness will be handled at application level if needed (e.g. unique for a type within a company)
            $table->string('vat_number')->nullable();
            $table->string('tax_id')->nullable(); // General tax identifier
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('customer_rank')->default(0);
            $table->integer('vendor_rank')->default(0);
            $table->string('job_title')->nullable();
            $table->text('notes')->nullable();

            // Accounting Links
            $table->foreignId('default_customer_account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null');
            $table->foreignId('default_vendor_account_id')->nullable()->constrained('chart_of_accounts')->onDelete('set null');
            $table->foreignId('default_payment_term_id')->nullable()->constrained('payment_terms')->onDelete('set null');
            $table->foreignId('default_sales_person_id')->nullable()->constrained('users')->onDelete('set null');

            // Website Login (for customer portal for example)
            $table->string('password')->nullable();
            $table->boolean('is_web_active')->default(false);
            $table->timestamp('email_verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Add unique constraint for email if it should be unique per company (and not null)
            // $table->unique(['company_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
create_file_with_block
app/Models/Partner.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable; // For portal login
use Illuminate\Notifications\Notifiable; // For portal notifications

class Partner extends Authenticatable // Extend Authenticatable if partners can log in
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'company_id',
        'partner_type',
        'is_company',
        'parent_id',
        'name',
        'email',
        'vat_number',
        'tax_id',
        'website',
        'phone',
        'mobile',
        'customer_rank',
        'vendor_rank',
        'job_title',
        'notes',
        'default_customer_account_id',
        'default_vendor_account_id',
        'default_payment_term_id',
        'default_sales_person_id',
        'password', // For portal login
        'is_web_active', // For portal login
        'email_verified_at', // For portal login
    ];

    protected $hidden = [
        'password', // For portal login
        // 'remember_token', // if you add remember_token column for portal
    ];

    protected $casts = [
        'is_company' => 'boolean',
        'is_web_active' => 'boolean',
        'email_verified_at' => 'datetime',
        'partner_type' => 'string', // Store as string, handle SET logic in application
    ];

    /**
     * Get the company that the partner belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the parent partner (if this is a contact or subsidiary).
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'parent_id');
    }

    /**
     * Get the child partners (contacts or subsidiaries).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Partner::class, 'parent_id');
    }

    /**
     * Get all of the partner's addresses.
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Get the user record if this partner is also a system user.
     * This is if a Partner can be directly linked to a User record that is not for portal login,
     * but for actual system access. Usually, User model has partner_id.
     * So, this relationship might be on the User model as belongsTo(Partner::class).
     * If a Partner can BE a User (portal login), this class extends Authenticatable.
     */
     public function userAccount(): BelongsTo // This assumes a user can be linked to a partner for portal access via users.partner_id
     {
        // This might be confusing. If the Partner IS a user (portal), this class extends Authenticatable.
        // If a Partner is managed by a system User, then User has partner_id.
        // Let's assume this partner record can be associated with a system User (employee) who manages it.
        return $this->belongsTo(User::class, 'default_sales_person_id');
     }


    // Relationships to ChartOfAccount and PaymentTerm would be defined once those models are created
    public function defaultCustomerAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'default_customer_account_id');
    }

    public function defaultVendorAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'default_vendor_account_id');
    }

    public function defaultPaymentTerm(): BelongsTo
    {
        return $this->belongsTo(PaymentTerm::class, 'default_payment_term_id');
    }

    public function defaultSalesPerson(): BelongsTo
    {
        return $this->belongsTo(User::class, 'default_sales_person_id');
    }

    // Helper methods for partner_type (SET emulation)
    public function setPartnerTypeAttribute(array $value): void
    {
        $this->attributes['partner_type'] = implode(',', $value);
    }

    public function getPartnerTypeAttribute(string $value): array
    {
        return explode(',', $value);
    }

    public function isCustomer(): bool
    {
        return in_array('customer', $this->getPartnerTypeAttribute($this->attributes['partner_type']));
    }

    public function isVendor(): bool
    {
        return in_array('vendor', $this->getPartnerTypeAttribute($this->attributes['partner_type']));
    }
}

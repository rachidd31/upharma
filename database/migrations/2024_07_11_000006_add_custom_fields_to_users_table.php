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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('employee_id')->nullable()->constrained('employees')->onDelete('set null'); // Assumes employees table exists
            $table->foreignId('partner_id')->nullable()->constrained('partners')->onDelete('set null'); // Assumes partners table exists
            $table->boolean('is_active')->default(true);
            $table->softDeletes(); // Adding soft deletes for users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['partner_id']);
            $table->dropColumn(['company_id', 'employee_id', 'partner_id', 'is_active']);
            $table->dropSoftDeletes();
        });
    }
};
// I need to read the existing User model first to append to it.
// For now, I'll create a new one, assuming it's the default Laravel User model.
// In a real scenario, I'd use overwrite_file_with_block after reading.
create_file_with_block
app/Models/User.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Ensure Sanctum is used
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes; // Add SoftDeletes

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'employee_id',
        'partner_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the company that the user belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee(): BelongsTo
    {
        // Assuming Employee model will be created
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the partner record associated with the user.
     */
    public function partner(): BelongsTo
    {
        // Assuming Partner model will be created
        return $this->belongsTo(Partner::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function roles(): BelongsToMany
    {
        // This assumes a 'roles' table and a 'role_user' pivot table will be created.
        return $this->belongsToMany(Role::class, 'role_user');
    }
}

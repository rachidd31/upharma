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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            // user_id is nullable because an employee might not be a system user initially
            // This user_id refers to the main system login, not a portal login.
            $table->foreignId('user_id')->nullable()->unique()->constrained()->onDelete('set null');
            // partner_id for contact details, if storing employee as a type of partner for addresses etc.
            $table->foreignId('partner_id')->nullable()->unique()->constrained('partners')->onDelete('set null');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_number')->unique(); // Company-specific unique employee ID
            $table->string('job_title')->nullable(); // Or FK to a job_titles table
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null'); // Assumes departments table
            $table->foreignId('manager_id')->nullable()->constrained('employees')->onDelete('set null'); // Self-referencing for manager

            $table->string('work_email')->nullable()->unique();
            $table->string('work_phone')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->foreignId('nationality_country_id')->nullable()->constrained('countries')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
create_file_with_block
app/Models/Employee.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'partner_id',
        'first_name',
        'last_name',
        'employee_number',
        'job_title',
        'department_id',
        'manager_id',
        'work_email',
        'work_phone',
        'hire_date',
        'termination_date',
        'gender',
        'date_of_birth',
        'nationality_country_id',
    ];

    protected $casts = [
        'hire_date' => 'date',
        'termination_date' => 'date',
        'date_of_birth' => 'date',
    ];

    /**
     * Get the company that the employee belongs to.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user account associated with this employee.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the partner record associated with this employee (for contact details).
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the department that the employee belongs to.
     */
    public function department(): BelongsTo
    {
        // Assuming Department model will be created
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the manager of this employee.
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    /**
     * Get the subordinates of this employee (if they are a manager).
     */
    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    /**
     * Get the nationality of the employee.
     */
    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'nationality_country_id');
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

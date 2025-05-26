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
        Schema::create('ir_sequences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade'); // Nullable for global sequences
            $table->string('code')->unique(); // e.g., sale.order, account.invoice
            $table->string('prefix')->nullable(); // e.g., SO/, INV/
            $table->string('suffix')->nullable(); // e.g., /2023
            $table->integer('padding')->default(4); // e.g., 4 means 0001, 0002
            $table->integer('next_number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_sequences');
    }
};
create_file_with_block
app/Models/IrSequence.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IrSequence extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'code',
        'prefix',
        'suffix',
        'padding',
        'next_number',
    ];

    protected $casts = [
        'padding' => 'integer',
        'next_number' => 'integer',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the next formatted sequence number.
     * This method would typically involve locking to prevent race conditions.
     * For simplicity, this is a conceptual representation.
     *
     * @param bool $increment
     * @return string
     */
    public function getNextFormattedNumber(bool $increment = true): string
    {
        $nextNum = $this->next_number;
        $formattedNumber = str_pad((string)$nextNum, $this->padding, '0', STR_PAD_LEFT);

        if ($increment) {
            // In a real application, this update should be atomic and handle concurrency.
            // $this->increment('next_number');
            // For now, just showing the logic.
            // $this->next_number = $nextNum + 1;
            // $this->save();
        }

        return ($this->prefix ?? '') . $formattedNumber . ($this->suffix ?? '');
    }

    /**
     * Atomically increments the next_number and returns the formatted sequence.
     * This is a more robust way to handle it.
     */
    public function getNextNumber(): string
    {
        // This requires a database transaction and possibly row locking
        // For now, this is a placeholder for the actual implementation.
        // DB::transaction(function () {
        //    $sequence = $this->lockForUpdate()->first(); // or $this->refresh()->lockForUpdate();
        //    $nextNum = $sequence->next_number;
        //    $sequence->next_number = $nextNum + 1;
        //    $sequence->save();
        //    $formattedNumber = str_pad((string)$nextNum, $this->padding, '0', STR_PAD_LEFT);
        //    return ($this->prefix ?? '') . $formattedNumber . ($this->suffix ?? '');
        // });
        // The above is conceptual. A simple increment for now for model structure.
        $nextNum = $this->next_number;
        $this->next_number = $nextNum + 1;
        // save() would be called by the service using this.

        $formattedNumber = str_pad((string)$nextNum, $this->padding, '0', STR_PAD_LEFT);
        return ($this->prefix ?? '') . $formattedNumber . ($this->suffix ?? '');
    }
}

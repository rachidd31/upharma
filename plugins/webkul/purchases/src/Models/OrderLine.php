<?php

namespace Webkul\Purchase\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\SortableTrait;
use Webkul\Account\Models\MoveLine;
use Webkul\Account\Models\Tax;
use Webkul\Partner\Models\Partner;
use Webkul\Product\Models\Packaging;
use Webkul\Purchase\Database\Factories\OrderLineFactory;
use Webkul\Security\Models\User;
use Webkul\Support\Models\Company;
use Webkul\Support\Models\Currency;
use Webkul\Support\Models\UOM;

class OrderLine extends Model
{
    use HasFactory, SortableTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'purchases_order_lines';

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state',
        'sort',
        'qty_received_method',
        'display_type',
        'product_qty',
        'product_uom_qty',
        'product_packaging_qty',
        'price_tax',
        'discount',
        'price_unit',
        'price_subtotal',
        'price_total',
        'qty_invoiced',
        'qty_received',
        'qty_received_manual',
        'qty_to_invoice',
        'is_downpayment',
        'planned_at',
        'product_description_variants',
        'propagate_cancel',
        'price_total_cc',
        'uom_id',
        'product_id',
        'product_packaging_id',
        'order_id',
        'partner_id',
        'currency_id',
        'company_id',
        'creator_id',
    ];

    /**
     * Table name.
     *
     * @var string
     */
    protected $casts = [
        'planned_at'       => 'datetime',
        'is_downpayment'   => 'boolean',
        'propagate_cancel' => 'boolean',
    ];

    public $sortable = [
        'order_column_name'  => 'sort',
        'sort_when_creating' => true,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productPackaging(): BelongsTo
    {
        return $this->belongsTo(Packaging::class);
    }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(UOM::class);
    }

    public function taxes(): BelongsToMany
    {
        return $this->belongsToMany(Tax::class, 'purchases_order_line_taxes', 'order_line_id', 'tax_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accountMoveLines(): HasMany
    {
        return $this->hasMany(MoveLine::class);
    }

    protected static function newFactory(): OrderLineFactory
    {
        return OrderLineFactory::new();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasUuids;
    use SoftDeletes;

    // Fillables
    protected $fillable = [
        'pop_id',
        'sale_price',
        'profit',
        'sale_date',
    ];

    // Casts
    protected $casts = [
        'sale_date' => 'date',
    ];

    /**
     * Functions
     */
    public function isSold(): bool
    {
        return $this->deleted_at === null;
    }

    // Mark as sold
    public static function markAsSold(Pop $pop, float $sale_price, $sale_date)
    {
        // Create profit
        $profit = $sale_price - $pop->price_paid;

        // Soft delete the entry from Pops table
        $pop->delete();

        // Create the entry
        return self::create([
            'pop_id' => $pop->id,
            'sale_price' => $sale_price,
            'profit' => $profit,
            'sale_date' => $sale_date,
        ]);
    }

    // Mark as not sold
    public function markAsNotSold()
    {
        // Perform soft delete on entry
        $this->delete();
    }

    /**
     * Relationships
     */
    // Pop
    public function pop()
    {
        return $this->belongsTo(Pop::class)->withTrashed();
    }
}

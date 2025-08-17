<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pop extends Model
{
    use HasUuids;
    use SoftDeletes;

    // Fillable
    protected $fillable = [
        'name',
        'chase',
        'number',
        'category_id',
        'license',
        'exclusive_id',
        'variant_id',
        'level',
        'price_paid',
        'worth',
        'difference',
        'as_of_date',
    ];

    // Casts
    protected $casts = [
        'chase' => 'boolean',
    ];

    /**
     * Relationships
     */
    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Exclusives
    public function exclusive()
    {
        return $this->belongsTo(Exclusive::class);
    }

    // Variants
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    // Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

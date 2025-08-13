<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * Relationships
     */
    // Pops
    public function pops()
    {
        return $this->hasMany(Pop::class);
    }
}

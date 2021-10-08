<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'province_id', 'total_population'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}

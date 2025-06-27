<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];
    public function product() {
        return $this->belongsTo(Product::class);
    }
}

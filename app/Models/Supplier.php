<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function detail()
    {
        return $this->hasOne(Detail::class, 'id', 'detail_id');
    }
}

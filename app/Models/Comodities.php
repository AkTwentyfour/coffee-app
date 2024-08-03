<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodities extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    function items() {
        return $this->hasMany(SalesItem::class, 'comodity_id', 'id');
    }
    
    public function getFormattedPriceAttribute() {
        return number_format($this->price, 0, ',', '.');
    }
}

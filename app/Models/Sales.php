<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales_item() {
        return $this->hasMany(SalesItem::class);
    }

    public function getFormattedPriceAttribute() {
        return number_format($this->total_amount, 0, ',', '.');
    }
    public function getFormattedGrossMarginAttribute() {
        return number_format($this->gross_profit, 0, ',', '.');
    }
}

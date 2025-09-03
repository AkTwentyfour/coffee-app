<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales_item()
    {
        return $this->hasMany(SalesItem::class, 'sale_id');
    }

    public function getFormattedTotalAmountAttribute()
    {
        return number_format($this->total_amount, 0, ',', '.');
    }

    public function getFormattedCashPaidAttribute()
    {
        return number_format($this->cash_paid, 0, ',', '.');
    }

    public function getFormattedChangeAmountAttribute()
    {
        return number_format($this->change_amount, 0, ',', '.');
    }
    public function getFormattedGrossMarginAttribute()
    {
        return number_format($this->gross_profit, 0, ',', '.');
    }
}

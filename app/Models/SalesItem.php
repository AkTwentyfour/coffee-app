<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function sale() {
        return $this->belongsTo(Sales::class);
    }


    function comodity() {
        return $this->belongsTo(Comodities::class);
    }
}

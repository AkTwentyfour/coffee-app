<?php

namespace App\Models;

use App\Models\Comodities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComodityCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comdities() 
    {
        return $this->hasMany(Comodities::class);
    }
}

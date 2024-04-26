<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [];


    public function user()
    {
        return $this->belongsTo(Customer::class);
    }
}

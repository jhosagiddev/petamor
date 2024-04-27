<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'breed',
        'age',
        'color',
        'sex',
        'is_ready_to_breed',
    ];

    protected function casts(): array
    {
        return [
            'sex' => 'string',
            'is_ready_to_breed' => 'string',
        ];
    }


    public function user()
    {
        return $this->belongsTo(Customer::class);
    }
}

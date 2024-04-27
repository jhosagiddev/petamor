<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'address',
        'city',
        'status',
        'postal_code'
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
        ];
    }


    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}

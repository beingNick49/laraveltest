<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'cover',
        'logo',
        'name',
        'email',
        'phone',
        'website',
        'status',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
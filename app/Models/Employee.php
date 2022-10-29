<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'company_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'status',
    ];

    public function getNameAttribute()
    {
        if ($this->middle_name) {
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }
        return $this->first_name . ' ' . $this->last_name;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
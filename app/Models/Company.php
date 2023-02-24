<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'logo',
        'address_name',
        'country',
        'city',
        'region',

    ];
    public function branches()
    {
        return $this->hasMany('App\Models\Warehouse');
    }
}

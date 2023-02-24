<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'logo',
        'address_name',
        'country',
        'city',
        'region',
        'company_id'

    ];
    public function sectors()
    {
        return $this->hasMany('App\Models\Sector');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'company_id', 'id');
    }
    // public function children() {
    //     return $this->hasMany('App\Models\Warehouse','parent_warehouse_id');
    // }
    // public function parent() {
    //     return $this->belongsTo('App\Models\Warehouse','parent_warehouse_id');
    // }
}

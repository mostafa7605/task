<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $fillable = [
        'name',
        'location',
        'warehouse_id',
        'parent_sector_id'

    ];
    // public function sectors()
    // {
    //     return $this->hasMany('App\Models\Sector');
    // }
    public function children() {
        return $this->hasMany('App\Models\Sector','parent_sector_id');
    }
    public function parent() {
        return $this->belongsTo('App\Models\Sector','parent_sector_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }  

    
}

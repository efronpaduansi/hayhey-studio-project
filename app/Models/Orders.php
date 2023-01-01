<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packages;
class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    //relasi belongTo ke table packages
    public function packages()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}

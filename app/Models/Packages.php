<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Items;
use App\Models\Orders;
use App\Models\Gallery;
class Packages extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $fillable = ['package_name', 'items_qty', 'gambar'];

    //relasi hasMany ke table items_list
    public function items()
    {
        return $this->hasMany(Items::class, 'id', 'package_id');
    }

    //relasi hasMany ke table orders
    public function orders()
    {
        return $this->hasMany(Orders::class, 'id', 'package_id');
    }

    // relasi hasMany ke table gallery
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'id', 'package_id');
    }
}

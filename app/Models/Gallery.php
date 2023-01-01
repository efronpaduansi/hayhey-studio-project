<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packages;
class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = ['package_id', 'image'];


    //relasi belongsTo ke table packages
    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id', 'id');
    }
}

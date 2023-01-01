<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packages;
class Items extends Model
{
    use HasFactory;
    protected $table = 'items_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'package_id',
        'paket1',
        'ket_paket1',
        'paket2',
        'ket_paket2',
        'paket3',
        'ket_paket3',
        'paket4',
        'ket_paket4',
        'paket5',
        'ket_paket5',
        'paket6',
        'ket_paket6',
    ];

    //relasi belongTo ke table packages
    public function packages()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}

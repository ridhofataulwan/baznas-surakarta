<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataZis extends Model
{
    use HasFactory;

    protected $table = 'laporan_zis';
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(CategoryData::class, 'kategori');
    }
}

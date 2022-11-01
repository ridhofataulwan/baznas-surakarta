<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabarZakat extends Model
{
    use HasFactory;
    protected $table = 'kabar_zakat';
    protected $guarded = ['id'];
}
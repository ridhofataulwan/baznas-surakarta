<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    protected $table = 'distribution';
    protected $guarded = ['id'];

    public static function getAnnualy($year = FALSE)
    {
        return Distribution::where([
            ['created_at', 'LIKE', $year . '%'],
        ]);
    }

    public static function getMonthly($month = FALSE)
    {
        $year = date('Y');
        return Distribution::where('created_at', 'LIKE', $year . '-' . $month . '%');
    }
}
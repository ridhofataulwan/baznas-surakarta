<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $guarded = ['id'];

    public static function getAnnualy($year = FALSE)
    {
        return Payment::where([
            ['updated_at', 'LIKE', $year . '%'],
        ]);
    }

    public static function getMonthly($month = FALSE)
    {
        $year = date('Y');
        return Payment::where('created_at', 'LIKE', $year . '-' . $month . '%');
    }
}

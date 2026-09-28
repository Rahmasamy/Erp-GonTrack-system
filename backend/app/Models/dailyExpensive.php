<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyExpensive extends Model
{
    protected $fillable=["id","expenses_date","client_id","acount_id","page_id","campgian_id","daily_expense"	];
    use HasFactory;
}

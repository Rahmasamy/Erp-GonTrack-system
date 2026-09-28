<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campgian extends Model
{
    use HasFactory;
    protected $fillable = ['campagian_name', 'camp_date', 'acount_id', 'status'];
    public function account()
    {
        return $this->belongsTo(Acount::class, 'acount_id');
    }
    public function report()
    {
        return $this->hasOne(Report::class);
    }
}

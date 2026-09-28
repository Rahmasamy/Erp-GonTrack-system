<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=[
        "id","name"	,"mobile_phone","address","position","date-of-birth"	];
    use HasFactory;
    public function expense(){
        return $this->belongsTo(Expenses::class);
    }
}

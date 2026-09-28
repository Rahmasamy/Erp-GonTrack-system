<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable=["id",	"netSalary",	"kpis",	"overtine_byhour","numberofdays","salary_per_day","absence_per_hour","insurance","salary_deduction"	];

    use HasFactory;
    public function employees(){
      return $this->hasMany(Employee::class);
    }
}

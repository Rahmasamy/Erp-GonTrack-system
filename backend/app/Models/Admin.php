<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=['admin_name','admin_email'];
    use HasFactory;
    public function insertPayments(){
        return $this->hasMany(Payment::class);
    }
}

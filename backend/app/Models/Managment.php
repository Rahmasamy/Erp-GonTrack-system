<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managment extends Model
{
    protected $fillable=["managment_amount","invoice_number","managment_name","clinet_id"];
    use HasFactory;
    public function payemnt(){
        return $this->belongsTo(Payment::class);
    }
}

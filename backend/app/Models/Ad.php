<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable=["ads_amount","invoice_number","ads_name","clinet_id"];
    use HasFactory;
    public function payemnt(){
        return $this->belongsTo(Payment::class);
    }
}

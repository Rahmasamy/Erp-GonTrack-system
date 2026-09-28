<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $fillable=[	"id",	"service_amount","invoice_number","services_name","clinet_id"	];
    use HasFactory;
    public function payemnt(){
        return $this->belongsTo(Payment::class);
    }

}

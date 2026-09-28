<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable=['account_id','campaign_id','commissions'];
    protected function account(){
        return $this->belongsTo(Acount::class);
    }
    protected function campagin(){
        return $this->belongsTo(related: Campgian::class);
    }
}

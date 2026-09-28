<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[	"id"	,"payment_type"	,"payment_method",	"page_id","account-id",	"campgian","clients_id"	,"manag_id"	,"ads_id","service_id","admins_id"	];
    protected function client(){
        return $this->belongsTo(Clinet::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function services(){
        return $this->hasMany(services::class);
    }
    public function pages(){
        return $this->hasMany(Page::class);
    }
    public function managments(){
        return $this->hasMany(related: Managment::class);
    }
    public function ads(){
        return $this->hasMany(related: Ad::class);
    }
}

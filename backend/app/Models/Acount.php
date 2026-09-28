<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acount extends Model
{
    protected $fillable=['client_id','account_name','status'];
    use HasFactory;
    public function client(){
        return $this->belongsTo(Acount::class);
    }
    public function campgians()
    {
        return $this->hasMany(related: Campgian::class);
    }
    public function report(){
        return $this->hasOne(report::class);
    }
    public function page(){
        return $this->hasMany(related: Page::class);
    }

}

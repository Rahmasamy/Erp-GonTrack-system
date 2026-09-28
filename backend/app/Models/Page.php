<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['page_name','account_id'];
    protected function account(){
        return $this->belongsTo(Acount::class);
    }
}

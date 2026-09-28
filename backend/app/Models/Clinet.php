<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinet extends Model
{
    use HasFactory;
      private $taxes;
      private $curruancy;
      private $commission;

    


      public function __construct(array $attributes = [])
      {
          parent::__construct($attributes);


          $this->taxes = 14.00;
          $this->curruancy = 10.00;
          $this->commission = 20.00;

      }


      public function __get($property)
      {
          if (property_exists($this, $property)) {
              return $this->$property;
          }

          return parent::__get($property);
      }
    protected $fillable=['client_name','email','adress','phone','taxes','commission','curruancy'];
    protected function accounts(){
        return $this->hasMany(Acount::class);
    }
    protected function payments(){
        return $this->hasMany(Payment::class);
    }
}

<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $fillable=['name','type' ,'cities_id','Price','description', 'image','date','start','AddRem1','close','AddRem2'];

    public function cities(){
        return $this->belongsTo(City::class);
}
}

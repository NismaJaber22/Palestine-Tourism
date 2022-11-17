<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable=['name','type' ,'location','Price','description', 'image','start','AddRem1','close','AddRem2'];

}

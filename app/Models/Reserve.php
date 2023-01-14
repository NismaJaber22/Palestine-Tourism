<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable=['peoplenum','phone','user_id','place_id','total'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function place(){
        return $this->belongsTo(Place::class);
    }

    
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable=['pname','opinion','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

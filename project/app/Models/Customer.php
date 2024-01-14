<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}

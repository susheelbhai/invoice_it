<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessUser extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class);
    }
}

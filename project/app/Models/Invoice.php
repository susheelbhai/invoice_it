<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function products() {
        return $this->hasMany(InvoiceProduct::class);
    }
    public function payment() {
        return $this->hasMany(InvoicePayment::class);
    }
    public function businessState() {
        return $this->belongsTo(State::class);
    }
    public function customerState() {
        return $this->belongsTo(State::class);
    }
}

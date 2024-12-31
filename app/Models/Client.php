<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = "client_id";
    protected $guarded = [];

    public function addresses() 
    {
        return $this->hasOne(Address::class,'client_id'); // Assuming a client can have multiple addresses
    }
}

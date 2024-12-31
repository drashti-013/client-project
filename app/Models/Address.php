<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $primaryKey="address_id";

    public $guarded=[];
    protected $fillables = [
        'client_id', 'address_1',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id'); // Each address belongs to a client
    }
}

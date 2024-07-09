<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;
    protected $table = 'contact_persons';

    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'address',
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

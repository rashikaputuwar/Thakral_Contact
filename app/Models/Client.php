<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client_tables';

    protected $fillable = [
        'client_name',
        'contact_number',
        'email',
        'website',
        'address',
    ];
    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class, 'client_id');
    }
}

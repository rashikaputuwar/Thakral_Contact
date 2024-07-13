<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitDetail extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_id', 'visited_at', 'visiting'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}

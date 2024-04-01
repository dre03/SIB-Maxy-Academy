<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'description', 'user_id'];

     public function user()
     {
     return $this->belongsTo(User::class);
     }
}

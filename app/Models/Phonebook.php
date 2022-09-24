<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name', 'email','phone',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

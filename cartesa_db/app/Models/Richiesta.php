<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Richiesta extends Model
{
    use HasFactory;
    protected $table = 'richieste';
    protected $fillable = [
        'email',
        'name',
        'surname',
        'telephone',
        'city',
        'cap',
        'description',
        'budget',
        'user_id',
        'accepted_at',
        'is_accepted',
    ];

    protected $hidden = [
        'name',
        'surname',
        'telephone',
    ];
}

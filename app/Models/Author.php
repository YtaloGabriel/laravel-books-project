<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // 'name' is the only field that can be mass assigned
    protected $fillable = [
        'name',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'done',
        'urgent',
    ];

    protected $casts = [
        'done'  => 'boolean',
        'urgent'=> 'boolean',
    ];
}

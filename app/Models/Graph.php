<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    protected $fillable = [
        'labels',
        'weeks',
        'values'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalContact extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image'
    ];
}

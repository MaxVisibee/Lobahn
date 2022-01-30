<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleManagementLevel extends Model
{
    use HasFactory;

    protected $fillabel = [
        'level','priority'
    ];
}

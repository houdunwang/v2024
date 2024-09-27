<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignCount extends Model
{
    use HasFactory;

    public $fillable = ['month', 'year', 'user_id', 'total'];
}

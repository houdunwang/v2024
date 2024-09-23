<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'preview'
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

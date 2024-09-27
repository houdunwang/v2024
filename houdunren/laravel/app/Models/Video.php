<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $fillable = ['title', 'path', 'chapter_id'];

    public $hidden = ['path'];

    protected $with = ['chapter:id,title,preview'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function playlogs()
    {
        return $this->belongsToMany(User::class, 'play_logs');
    }
}

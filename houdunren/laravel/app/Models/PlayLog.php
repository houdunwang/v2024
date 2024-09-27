<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayLog extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'video_id', 'lesson_id'];
    public $with = ['user:id,nickname,avatar', 'video:id,title', 'lesson:id,title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

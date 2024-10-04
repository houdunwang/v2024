<?php

namespace App\Models;

use App\Observers\TopicObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([TopicObserver::class])]
class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    // protected $guarded = [
    //     'id',
    //     'user_id',
    //     'recommend',
    //     'favorite_count',
    //     'favour_count',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

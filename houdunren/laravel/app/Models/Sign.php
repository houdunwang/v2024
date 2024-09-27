<?php

namespace App\Models;

use App\Observers\SignObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([SignObserver::class])]
class Sign extends Model
{
    use HasFactory;

    public $fillable = ['content', 'mood', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

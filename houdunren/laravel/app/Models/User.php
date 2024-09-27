<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'mobile',
        'openid',
        'unionid',
        'email'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public $appends = [
        'is_administrator'
    ];

    // public function isAdministrator()
    // {
    //     return $this->id == 1;
    // }


    /**
     * 是否为超级管理员
     * $user->isAdministrator
     */
    protected function isAdministrator(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->id == 1
        );
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function chapters(): Attribute
    {
        return Attribute::make(
            get: fn() => Chapter::whereIn('id', $this->orders->pluck('chapter_id'))->get()
        );
    }

    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function playlog()
    {
        return $this->belongsToMany(Video::class, 'play_logs');
    }
}

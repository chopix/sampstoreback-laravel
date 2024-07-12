<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'email', 'username', 'money', 'role', 'avatar'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function accounts() {
        return $this->hasMany(Account::class);
    }


    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

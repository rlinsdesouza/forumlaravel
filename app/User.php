<?php

namespace forum;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function temas () {
        return $this->hasMany('forum\Models\Tema');
    }

    public function postagems () {
        return $this->hasMany('forum\Models\Postagem');
    }

    public function respostas () {
        return $this->hasMany('forum\Models\Resposta');
    }
}

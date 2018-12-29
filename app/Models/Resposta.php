<?php

namespace forum\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    //
    public function postagem () {
        return $this->belongsTo('forum\Models\Postagem');
    }

    public function resposta () {
        return $this->belongsTo('forum\Models\Resposta');
    }

    public function respostas () {
        return $this->hasMany('forum\Models\Resposta');
    }
}

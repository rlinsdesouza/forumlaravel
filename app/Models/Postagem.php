<?php

namespace forum\Models;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    //

    public function user () {
        return $this->belongsTo('forum\User');
    }

    public function tema () {
        return $this->belongsTo('forum\Models\Tema');
    }

    public function respostas () {
        return $this->morphMany('forum\Models\Resposta','respostavel');
    }
}

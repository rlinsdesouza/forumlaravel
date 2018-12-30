<?php

namespace forum\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    //

    /*
    https://laravel.com/docs/5.7/eloquent-relationships#one-to-one-polymorphic-relations
    */

    public function respostavel () {
        return $this->morphTo();
    }

    public function user () {
        return $this->belongsTo('forum\User');
    }

    public function respostas () {
        return $this->morphMany('forum\Models\Resposta','respostavel');
    }
}

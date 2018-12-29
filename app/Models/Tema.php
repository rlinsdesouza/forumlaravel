<?php

namespace forum\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    //

    public function user () {
        return $this->belongsTo('forum\User');
    }

    public function postagems () {
        return $this->hasMany('forum\Models\Postagem');
    }
}

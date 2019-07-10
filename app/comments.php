<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $fillable=[

        'post_id',
        'is_active',
        'author',
        'email',
        'body',


    ];




    public function replies(){






        return $this->hasMany('App\commentsReplies','comment_id');
    }



    public function post(){



        return $this->belongsTo('App\post','post_id');
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentsReplies extends Model
{
    //
    protected $fillable=[

        'comment_id',
        'is_active',
        'author',
        'email',
        'body',


    ];


    public function comment(){




        return $this->belongsTo('App\comments','comment_id');
    }




}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable=[
        'id',
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body'



];

    public function user(){



        return $this->belongsTo('App\User','user_id');


    }
    public function photo(){



        return $this->belongsTo('App\photo','photo_id');


    }
    public function category(){



        return $this->belongsTo('App\category','category_id');


    }





    public function comments(){



        return $this->hasMany('App\comments');


    }





}

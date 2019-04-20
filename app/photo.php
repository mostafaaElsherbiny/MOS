<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
    protected $uploads='/imges/';

    protected  $fillable=['file'];

public function  getFileAttribute($photo){



    return $this->uploads .$photo;
}

}

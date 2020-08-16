<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    //
    protected $hidden=['password','created_at'];
    public function articels(){
        return $this->hasMany(Articel::class,'author_id','id');
    }
}

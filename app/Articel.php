<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articel extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(author::class, 'author_id', 'id');
    }
}
